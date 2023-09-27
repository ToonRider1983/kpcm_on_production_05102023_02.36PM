<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\UnmaintainedMachineExport;
use CSV;

class UnmaintainedMachineController extends Controller
{
    //
    private function applyDateRange($query, $request, $startDateField, $endDateField, $dbColumn) {
        $startDate = $request->input($startDateField);
        $endDate = $request->input($endDateField);
    
        if (isset($startDate) && isset($endDate)) {
            $query->where(function ($query) use ($startDate, $endDate, $dbColumn) {
                $query->whereBetween($dbColumn, [$startDate, $endDate]);
            });
        }
    }
    public function index(Request $request) {
             // กำหนดคำสั่ง query สำหรับการดึงข้อมูลเครื่องจักร
             
             
             
             $unmain = DB::table('services')
             ->select(
                 'machines.id AS Index',
                 'machines.serial AS SerialMachine',
                 'machines.machine_cd AS TypeCode',
                 'customers.customer_name2 AS Customer',
                 'customers.customer_cd AS UserCode',
                 'customers.customer_name1 AS EndUser',
                 'services.service_id AS noinfo', 
                 'services.service_dt AS Date',
                 'services.service_id AS Content',
                 'services.service_performer AS Performer',
                 'services.customer_pic AS CustomerPic',
                 'services.panel_version AS Panel',
                 'services.running_hours AS RunHrs',

                 'companies.id AS Service',
                 'services.remarks AS Remarks'
             )
             ->leftJoin('machines', 'services.machine_id', '=', 'machines.id')
             ->leftJoin('companies', 'companies.id', '=', 'machines.service_factory_id')
             ->leftJoin('customers', 'customers.id', '=', 'machines.customer_id')
             ->orderBy('services.service_id', 'asc')
             ->orderBy('machines.serial', 'asc')
             ;
             
                $this->applyDateRange($unmain, $request, 'start_date', 'end_date', 'services.service_dt');
     
             // ใช้ applyDateRange เพื่อค้นหาตามช่วงวันที่
            
     
        return view('pages.dashboards.unmaintainedmachine.index',['request' => $request]);
    }
    

    
    public function exportCSV(Request $request)
    {
        // กำหนดคำสั่ง query สำหรับการดึงข้อมูลเครื่องจักร
        // $query = DB::table('services')->orderBy('services.id')
        // ->select(
        //     'machines.id AS Index',
        //     'machines.serial AS SerialMachine',
        //     'machines.machine_cd AS TypeCode',
        //     // -- เดา Customer_name2
        //     'machines.customer_machine_no AS CustomerMachine',
        //     'customers.customer_cd AS UserCode',
        //     'customers.customer_name1 AS EndUser',
        //     'services.service_id AS noinfo', #
        //     'services.service_dt AS Date',
        //     'services.service_id AS Content',
        //     'services.service_performer AS Performer',
        //     'services.customer_pic AS CustomerPic',
        //     'services.panel_version AS Panel',
        //     'services.running_hours AS RunHrs',
        //     'machines.running_hours_total AS HrsTTL', 
        //     'companies.company_short_name AS Service',
        //     'services.remarks AS Remarks'
        // )
        // ->leftJoin('machines', 'services.machine_id', '=', 'machines.id')
        // ->leftJoin('companies', 'companies.id', '=', 'machines.service_factory_id')
        // ->leftJoin('customers', 'customers.id', '=', 'machines.customer_id')
        // ->where(function($query) {
        //     $query->where('services.service_id', '<>', '3')
        //           ->orWhere('services.service_id', '<>', '2')
        //           ->orWhere('services.service_id', '<>', '6');
        // })

        // // ->whereNotIn('services.service_id', [3, 6, 2]) กรณีไม่เอา 
        // ->orderBy('services.service_id', 'asc')
        // ->orderBy('machines.serial', 'asc')
        // ;
        $query = DB::table('machines')
        ->select(
            'machines.id AS Index',
            'machines.serial AS SerialMachine',
            'machines.machine_cd AS TypeCode',
            'machines.customer_machine_no AS CustomerMachine',
            'customers.customer_cd AS UserCode',
            'customers.customer_name1 AS EndUser',
            'services.service_id AS noinfo',
            'services.service_dt AS Date',
            'services.service_id AS Content',
            'services.service_performer AS Performer',
            'services.customer_pic AS CustomerPic',
            'services.panel_version AS Panel',
            'services.running_hours AS RunHrs',
            'machines.running_hours_total AS HrsTTL',
            'companies.company_short_name AS Service',
            'services.remarks AS Remarks'
        )
        ->leftJoin('services', 'machines.id', '=', 'services.machine_id')
        ->leftJoin('companies', 'companies.id', '=', 'machines.service_factory_id')
        ->leftJoin('customers', 'customers.id', '=', 'machines.customer_id')
        ->where(function($query) {
                $query->where('services.service_id', '<>', '3')
                      ->orWhere('services.service_id', '<>', '2')
                      ->orWhere('services.service_id', '<>', '6');
        })
        ->where(function ($query) use ($request) {
            $query->where('services.service_dt', '>=', $request->start_date)
                ->where('services.service_dt', '<=', $request->end_date ?: now());
        })
        ->orderBy('services.service_id', 'asc')
        ->orderBy('machines.serial', 'asc');
 



        // ใช้ applyDateRange เพื่อค้นหาตามช่วงวันที่
        $this->applyDateRange($query, $request, 'start_date', 'end_date', 'services.service_dt');

        // ดึงข้อมูลเครื่องจักร
        $unmaintained = $query->get(); 

        // สร้างข้อมูลสำหรับการ export CSV
        $unmaintainedData = [];
        foreach ($unmaintained as $unmain) {
            $Content = '';
    
            if($unmain->Content == 1) {
                $Content = 'COMMISSIONING';
            } elseif($unmain->Content == 2) {
                $Content = 'OVERHAUL';
            } elseif($unmain->Content == 3) {
                $Content = 'ANNUAL INSPECTION/PARTS CHANGE';
            } elseif($unmain->Content == 4) {
                $Content = 'REPAIR';
            } elseif($unmain->Content == 5) {
                $Content = 'WARRANTY CLAIM RELATED';
            } elseif($unmain->Content == 6) {
                $Content = 'PATROL SERVICE/CLEANUP';
            } elseif($unmain->Content == 7) {
                $Content = 'OTHERS/ETC';
            } elseif($unmain->Content == 8) {
                $Content = 'EMERGENCY CALL/CHCKUP';
            }

            $unmaintainedData[] = [
                'Index' => $unmain->Index,
                'Serial#' => $unmain->SerialMachine,
                'Type Code' => $unmain->TypeCode,
                'Customer Machine#' => $unmain->CustomerMachine,
                'User Code' => $unmain->UserCode,
                'End User' => $unmain->EndUser,
                '#' => $unmain->noinfo,
                'Date' =>$unmain-> Date,
                'Content' =>$Content ,
                'Performer' => $unmain->Performer,
                'Customer Pic' =>$unmain->CustomerPic ,
                'Panel' => $unmain->Panel,
                'Run.hrs' => (string)$unmain->RunHrs, // Cast to string
                'Hrs(TTL)' => (string)$unmain->HrsTTL, // Cast to string
                'Service' => $unmain->Service,
                'Remark' => $unmain->Remarks,
            ];
        }
        // สร้างไฟล์ CSV และดาวน์โหลด
        return CSV::download(new UnmaintainedMachineExport($unmaintainedData), 'UnmaintainedMachine.csv');
    }
}

