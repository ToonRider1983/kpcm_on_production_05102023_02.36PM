<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\NotOverhaulUnitExport;
use CSV;

class NotOverhaulUnitController extends Controller
{
    //
    private function applySearchCondition($query, $request, $field, $column) {
        if ($request->has($field)) {
            $value = $request->input($field);
            $query->where("{$column}", 'like', "%{$value}%");
        }
    }

    // ฟังก์ชันเพื่อค้นหาตามช่วงวันที่
    private function applyDateRange($query, $request, $startDateField, $endDateField, $dbColumn)
    {
        $startDate = $request->input($startDateField);
        $endDate = $request->input($endDateField);
    
        if (isset($startDate) && isset($endDate)) {
            $query->whereBetween($dbColumn, [$startDate, $endDate]);
        }
    }
    public function index(Request $request) {
        $query = DB::table('services')->orderBy('services.id')
        ->select(
            'machines.id AS Index',
            'machines.serial AS Serialmachine',
            'machines.machine_cd AS TypeCode',
            'customers.customer_name2 AS Customer',
            'machines.maintenance_contract AS Contract',
            'machines.last_service_dt AS `LastService`',
            'services.running_hours AS `Hrs(Prese)`',
            'services.running_hours AS `Hrs(TTL)`',
            'machines.overhaul_service_dt AS `LastOverhaul`',
            'machines.overhaul_service_dt AS Overhaul',
            'machines.overhaul_remarks AS Remark',
            'services.service_id AS Services',
            'customers.customer_cd AS `UserCode`',
            'customers.customer_name1 AS `EndUser`',
            'countries.country_name AS Country',
            'provinces.province_name AS Province',
            'industrialzones.industrialzone_name AS `I_E.`',
            'companies.address1 AS Address1',
            'companies.address2 AS Address2',
            DB::raw("'' AS `Kobelco`"),
            DB::raw("'' AS `KSL_KCMS`"),
            DB::raw("'' AS `KMA`"),
            DB::raw("'' AS `Comm_Date`"),
            DB::raw("'' AS `C_R_Date`"),
            'machines.compressor_type AS Type',
            DB::raw("'' AS KW"),
            'companies.company_short_name AS Factory',
            'machines.operate_status AS `Status`',
            'machines.remarks AS Remarks',
            'machines.remarks_distributor1 AS Remark1',
            'companies.created_at AS created_at'
        )
        ->leftJoin('machines', 'services.machine_id', '=', 'machines.id')
        ->leftJoin('companies', 'companies.id', '=', 'machines.service_factory_id')
        ->leftJoin('countries', 'countries.id', '=', 'companies.country_id')
        ->leftJoin('provinces', 'provinces.country_id', '=', 'countries.id')
        ->leftJoin('customers', 'customers.id', '=', 'machines.customer_id')
        ->leftJoin('industrialzones', 'industrialzones.country_id', '=', 'countries.id')
        ->where(function ($query) {
            $query->where('services.service_id', '<>', '2')
                ->orWhereRaw('TIMESTAMPDIFF(YEAR, CURDATE(), YEAR(companies.created_at)) >= 6');
        });

    // ใช้ applyDateRange เพื่อค้นหาตามช่วงวันที่
    $this->applyDateRange($query, $request, 'start_date', 'end_date', 'services.service_dt');

        return view('pages.dashboards.notoverhaulunit.index',['request' => $request]);
    }
    public function exportCSV(Request $request)
    {
        // กำหนดคำสั่ง query สำหรับการดึงข้อมูลเครื่องจักร
        $query = DB::table('services')
            ->select(
                'machines.id AS Index',
                'machines.serial AS Serialmachine',
                'machines.machine_cd AS TypeCode',
                'machines.customer_machine_no AS Customer',
                'machines.maintenance_contract AS Contract',
                'machines.last_service_dt AS LastService',
                'machines.overhaul_running_hours AS Hrs_Prese',
                'machines.running_hours_total AS Hrs_TTL',
                'machines.overhaul_service_dt AS LastOverhaul',
                'machines.overhaul_service_dt AS Overhaul',
                'machines.overhaul_remarks AS Remark',
                'services.service_id AS Services',
                'customers.customer_cd AS UserCode',
                'customers.customer_name1 AS EndUser',
                'countries.country_name AS Country',
                'provinces.province_name AS Province',
                'industrialzones.industrialzone_name AS I_E',
                'companies.address1 AS Address1',
                'companies.address2 AS Address2',
                'machines.kcth_order_cd AS Kobelco', 
                'machines.ksl_order_cd AS KSL_KCMS', 
                'machines.kma_order_cd AS KMA',
                'machines.testrun_dt AS Comm_Date',
                'machines.dispatch_dt AS C_R_Date',
                'machines.compressor_type AS Type',
                'machines.motor AS KW',  
                'companies.company_short_name AS Factory',
                'machines.operate_status AS Status',
                'machines.remarks AS Remarks',
                'machines.remarks_distributor1 AS Remark1',
                'companies.created_at AS created_at'
            )
            ->leftJoin('machines', 'services.machine_id', '=', 'machines.id')
            ->leftJoin('companies', 'companies.id', '=', 'machines.service_factory_id')
            ->leftJoin('countries', 'countries.id', '=', 'companies.country_id')
            ->leftJoin('provinces', 'provinces.country_id', '=', 'countries.id')
            ->leftJoin('customers', 'customers.id', '=', 'machines.customer_id')
            ->leftJoin('industrialzones', 'industrialzones.country_id', '=', 'countries.id')
            ->where(function ($query) {
                $query->where('services.service_id', '<>', '2')
                    ->orWhereRaw('TIMESTAMPDIFF(YEAR, CURDATE(), YEAR(companies.created_at)) >= 6');
            })
            ->where(function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->where('machines.compressor_type', '1')
                        ->where('machines.overhaul_running_hours', '>=', 36000); 
                })
                ->orWhere(function ($subQuery) {
                    $subQuery->where('machines.compressor_type', '2')
                        ->where('machines.overhaul_running_hours', '>=', 48000);
                });
            });
            
    
        // ใช้ applyDateRange เพื่อค้นหาตามช่วงวันที่
        $this->applyDateRange($query, $request, 'start_date', 'end_date', 'services.service_dt');
    
        $unmaintained = $query->get();
    
        // สร้างข้อมูลสำหรับการ export CSV
        $unmaintainedData = [];
        foreach ($unmaintained as $unmain) {
            
            $Type = '';
    
            if($unmain->Type == 1) {
                $Type = 'Oil Flooded';
            } elseif($unmain->Type == 2) {
                $Type = 'Oil Free';
            }

            $Status = '';
    
            if($unmain->Status == 1) {
                $Status = 'Registered';
            } elseif($unmain->Status == 2) {
                $Status = 'OK';
            } elseif($unmain->Status == 3) {
                $Status = 'FREE';
            } elseif($unmain->Type == 4) {
                $Status = 'NG';
            } elseif($unmain->Type == 5) {
                $Status = 'Time Out';
            }
            $unmaintainedData[] = [
                'Index' => $unmain->Index,
                'Serial machine' => $unmain->Serialmachine,
                'Type Code' => $unmain->TypeCode,
                'Customer' => $unmain->Customer,
                'Contract' => $unmain->Contract,
                'Last Service' => $unmain->LastService,
                'Hrs(Prese)' => $unmain->Hrs_Prese,
                'Hrs(TTL)' => $unmain->Hrs_TTL,
                'Last Overhaul' => $unmain->LastOverhaul,
                'Overhaul' => $unmain->Overhaul,
                'Remark' => $unmain->Remark,
                'Services' => $unmain->Services,
                'UserCode' => $unmain->UserCode,
                'End User' => $unmain->EndUser,
                'Country' => $unmain->Country, //15
                'Province' => $unmain->Province, //16 
                'I.E.' => $unmain->I_E,  //17
                'Address1' => $unmain->Address1, //18
                'Address2' => $unmain->Address2, //19
                'Kobelco#' => $unmain->Kobelco, //20
                'KSL/KCMS' => $unmain->KSL_KCMS, //21
                'KMA#' => $unmain->KMA, //22
                'Comm Date' => $unmain->Comm_Date, //23
                'C/R Date' => $unmain->C_R_Date, //24
                'Type' => $Type, //25
                'KW' => $unmain->KW, //26
                'Factory' => $unmain->Factory, //27
                'Status' => $Status, //28
                'Remarks' => $unmain->Remarks, //29
                'created_at' => $unmain->created_at, //30
            ];
        }
    
        // สร้างไฟล์ CSV และดาวน์โหลด
        return CSV::download(new NotOverhaulUnitExport($unmaintainedData), 'notoverhaulunit.csv');
    }
    

}

