<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use App\Exports\CustomerExport;
use CSV;

class CustomerMasterController extends Controller
{
    //
    public function index(Request $request)
    
    {              //Search TextBox
        $customer = Customer::sortable()->orderBy('id');
        $country = DB::table('countries')->whereNull('countries.deleted_at')->get();
        $province = DB::table('provinces')->whereNull('provinces.deleted_at')->get();
        $industrialzone = DB::table('industrialzones')->whereNull('industrialzones.deleted_at')->get();
        
        if ($request->country) {
            $customer = $customer->where(function($query) use ($request) {
                $query->where('countries.country_name', $request->country)
                    ->orWhere('countries.id', $request->country);
            });
        }
    
        if ($request->industrialzones) {
            $customer = $customer->where(function($query) use ($request) {
                $query->where('industrialzones.industrialzone_name', 'like', '%' . $request->industrialzones . '%')
                    ->orWhere('industrialzones.id', $request->industrialzones);
            });
        }
    
        if ($request->provinces) {
            $customer = $customer->where(function($query) use ($request) {
                $query->where('provinces.province_name', 'like', '%' . $request->provinces . '%')
                    ->orWhere('provinces.id', $request->provinces);
            });
        }
        if ($request->cname != null) {
            $customer = $customer->where('customers.customer_name1', 'like', '%' . $request-> cname . '%'); 
        }
        if ($request->ccode != null) {
            $customer = $customer->where('customers.customer_cd', 'like', '%' . $request-> ccode . '%');           
        }
        if ($request-> remarks != null) {
            $customer = $customer->where('customers.remarks', 'like', '%' . $request->remarks . '%');
        }
        $customer = $customer
            ->select(
                'customers.*',
                'countries.country_name as ct_name',
                'provinces.province_name as pv_name',
                'industrialzones.industrialzone_name as indust'
                )
            ->whereNull('customers.deleted_at') 
            ->leftjoin('countries', 'customers.country_id', '=', 'countries.id')
            ->leftjoin('provinces', 'customers.province_id', '=', 'provinces.id')             
            //->where('enumeration.grouptype','=', 'email_type')  
            ->leftjoin('industrialzones', 'customers.industrialzone_id', '=', 'industrialzones.id')   
            ->paginate(10);
        //return $query ;
        return view('pages.dashboards.enduser.index', [
        'customer' => $customer,
         'country' => $country,
          'province' => $province,
          'industrialzone'=> $industrialzone
        ]);
    }

    public function exportCSV(Request $request)
{
    $customerData = [];

    // สร้างคำถามข้อมูลลูกค้า
    $query = DB::table('services')->orderBy('id') 
        ->select(
            'ct.id as ID',
            'ct.customer_cd as CustomerCode',
            'ct.customer_name1 as CustomerName1',
            'ct.customer_name2 as CustomerName2',
            'countries.country_name as Country',
            'provinces.province_name as Province',
            'industrialzones.industrialzone_name as IndustrialZone',
            'ct.zip as Zip',
            'ct.address1 as Address1',
            'ct.address2 as Address2',
            'ct.telephone as Telephone',
            'ct.remarks as Remarks',
            'ct.created_at as Created',
            'ct.updated_at as Updated',
            DB::raw("    CASE
            WHEN (machines.motor >= 500) 
                AND
                (
                    (services.service_id = '2' OR services.service_id = '3') 
                    AND 
                    ((YEAR(CURDATE()) - YEAR(services.service_dt)) <= 1)
                )
                OR
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (YEAR(machines.testrun_dt) <= 1) 
                ) THEN 'A1'
            WHEN (machines.motor >= 200) 
                AND
                (
                    (services.service_id = '2' OR services.service_id = '3') 
                    AND 
                    ((YEAR(CURDATE()) - YEAR(services.service_dt)) <= 1)
                )
                OR
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (YEAR(machines.testrun_dt) <= 1) 
                ) THEN 'A2'
            WHEN (machines.motor >= 74) 
                AND
                (
                    (services.service_id = '2' OR services.service_id = '3') 
                    AND 
                    ((YEAR(CURDATE()) - YEAR(services.service_dt)) <= 1)
                )
                OR
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (YEAR(machines.testrun_dt ) <= 1) 
                ) THEN 'A3'
            WHEN (machines.motor < 74) 
                AND
                (
                    (services.service_id = '2' OR services.service_id = '3') 
                    AND 
                    ((YEAR(CURDATE()) - YEAR(services.service_dt)) <= 1)
                )
                OR
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (YEAR(machines.testrun_dt) <= 1) 
                ) THEN 'A4'
            WHEN (machines.motor >= 500) 
                AND
                (
                    (services.service_id = '2' OR services.service_id = '3') 
                    AND 
                    ((YEAR(CURDATE()) - YEAR(services.service_dt + 1)) <= 2)
                )
                OR
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (YEAR(machines.testrun_dt + 1) <= 2) 
                ) THEN 'B1'
            WHEN (machines.motor >= 200) 
                AND
                (
                    (services.service_id = '2' OR services.service_id = '3') 
                    AND 
                    ((YEAR(CURDATE()) - YEAR(services.service_dt + 1)) <= 2)
                )
                OR
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (YEAR(machines.testrun_dt + 1) <= 2) 
                ) THEN 'B2'
            WHEN (machines.motor >= 74) 
                AND
                (
                    (services.service_id = '2' OR services.service_id = '3') 
                    AND 
                    ((YEAR(CURDATE()) - YEAR(services.service_dt + 1)) <= 2)
                )
                OR
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (YEAR(machines.testrun_dt + 1) <= 2) 
                ) THEN 'B3'
            WHEN (machines.motor < 74) 
                AND
                (
                    (services.service_id = '2' OR services.service_id = '3') 
                    AND 
                    ((YEAR(CURDATE()) - YEAR(services.service_dt + 1)) <= 2)
                )
                OR
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (YEAR(machines.testrun_dt + 1) <= 2) 
                ) THEN 'B4'
            WHEN (machines.motor >= 500) 
                AND
                (
                    (services.service_id = '2' OR services.service_id = '3') 
                    AND 
                    (
                        ((YEAR(CURDATE()) - YEAR(services.service_dt)) <= 2 )
                        OR
                        ((YEAR(CURDATE()) - YEAR(services.service_dt + 1)) <= 3)
                    )
                )
                OR
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (
                        (YEAR(machines.testrun_dt + 1) <= 2) 
                        OR
                        (YEAR(machines.testrun_dt ) <= 3)
                    )
                ) THEN 'C1'
            WHEN (machines.motor >= 200) 
                AND
                (
                    (services.service_id = '2' OR services.service_id = '3') 
                    AND 
                    (
                        ((YEAR(CURDATE()) - YEAR(services.service_dt)) <= 2 )
                        OR
                        ((YEAR(CURDATE()) - YEAR(services.service_dt + 1)) <= 3)
                    )
                )
                OR
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (
                        (YEAR(machines.testrun_dt + 1) <= 2) 
                        OR
                        (YEAR(machines.testrun_dt ) <= 3)
                    )
                ) THEN 'C2'
            WHEN (machines.motor >= 74) 
                AND
                (
                    (services.service_id = '2' OR services.service_id = '3') 
                    AND 
                    (
                        ((YEAR(CURDATE()) - YEAR(services.service_dt)) <= 2 )
                        OR
                        ((YEAR(CURDATE()) - YEAR(services.service_dt + 1)) <= 3)
                    )
                )
                OR
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (
                        (YEAR(machines.testrun_dt + 1) <= 2) 
                        OR
                        (YEAR(machines.testrun_dt ) <= 3)
                    )
                ) THEN 'C3'
            WHEN (machines.motor < 74) 
                AND
                (
                    (services.service_id = '2' OR services.service_id = '3') 
                    AND 
                    (
                        ((YEAR(CURDATE()) - YEAR(services.service_dt)) <= 2 )
                        OR
                        ((YEAR(CURDATE()) - YEAR(services.service_dt + 1)) <= 3)
                    )
                )
                OR
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (
                        (YEAR(machines.testrun_dt + 1) <= 2) 
                        OR
                        (YEAR(machines.testrun_dt ) <= 3)
                    )
                ) THEN 'C4'
            WHEN (machines.motor >= 500) 
                AND
                (
                    (services.service_id = '2' OR services.service_id = '3') 
                    AND 
                    (
                        ((YEAR(CURDATE()) - YEAR(services.service_dt)) <= 5 )
                        OR
                        ((YEAR(CURDATE()) - YEAR(services.service_dt + 1)) <= 3)
                    )
                )
                OR
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (
                        (YEAR(machines.testrun_dt + 1) <= 3) 
                              OR 
                              (YEAR(machines.testrun_dt) <= 5)
                    )
                ) THEN 'D1'
            WHEN (machines.motor >= 200) 
                AND
                (
                    (services.service_id = '2' OR services.service_id = '3') 
                    AND 
                    (
                        ((YEAR(CURDATE()) - YEAR(services.service_dt)) <= 5)
                        OR
                        ((YEAR(CURDATE()) - YEAR(services.service_dt + 1)) <= 3)
                    )
                )
                OR
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (
                        (YEAR(machines.testrun_dt + 1) <= 3) 
                              OR 
                              (YEAR(machines.testrun_dt) <= 5)
                    )
                ) THEN 'D2'
            WHEN (machines.motor >= 74) 
                AND
                (
                    (services.service_id = '2' OR services.service_id = '3') 
                    AND 
                    (
                        ((YEAR(CURDATE()) - YEAR(services.service_dt)) <= 5 )
                        OR
                        ((YEAR(CURDATE()) - YEAR(services.service_dt + 1)) <= 3)
                    )
                )
                OR
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (
                        (YEAR(machines.testrun_dt + 1) <= 3) 
                              OR 
                              (YEAR(machines.testrun_dt) <= 5)
                    )
                ) THEN 'D3'
            WHEN (machines.motor < 74) 
                AND
                (
                    (services.service_id = '2' OR services.service_id = '3') 
                    AND 
                    (
                        ((YEAR(CURDATE()) - YEAR(services.service_dt)) <= 5)
                        OR
                        ((YEAR(CURDATE()) - YEAR(services.service_dt + 1)) <= 3)                 
                    )
                )
                OR
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (
                        (YEAR(machines.testrun_dt + 1) <= 3) 
                              OR
                              (YEAR(machines.testrun_dt) <= 5)
                    )
                ) THEN 'D4'
            WHEN (machines.motor >= 500) 
                AND
                (
                    (services.service_id = '2' OR services.service_id = '3') 
                    AND 
                    (
                        ((YEAR(CURDATE()) - YEAR(services.service_dt)) <= 7)
                        OR
                        ((YEAR(CURDATE()) - YEAR(services.service_dt + 1)) <= 5)
                    )
                )
                OR
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (
                        (YEAR(machines.testrun_dt + 1) <= 5) 
                        OR
                        (YEAR(machines.testrun_dt) <= 7)
                    )
                ) THEN 'E1'
            WHEN (machines.motor >= 200) 
                AND
                (
                    (services.service_id = '2' OR services.service_id = '3') 
                    AND 
                    (
                        ((YEAR(CURDATE()) - YEAR(services.service_dt)) <= 7)
                        OR
                              ((YEAR(CURDATE()) - YEAR(services.service_dt + 1)) <= 5)
                    )
                )
                OR
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (
                        (YEAR(machines.testrun_dt + 1) <= 5)
                        OR
                        (YEAR(machines.testrun_dt) <= 7)
                    )
                ) THEN 'E2'
            WHEN (machines.motor >= 74) 
                AND
                (
                    (services.service_id = '2' OR services.service_id = '3') 
                    AND 
                    (
                        ((YEAR(CURDATE()) - YEAR(services.service_dt)) <= 7)
                        OR
                        ((YEAR(CURDATE()) - YEAR(services.service_dt + 1)) <= 5)
                    )
                )
                OR
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (
                        (YEAR(machines.testrun_dt + 1) <= 5)  
                        OR
                        (YEAR(machines.testrun_dt) <= 7)
                    )
                ) THEN 'E3'
            WHEN (machines.motor < 74) 
                AND
                (
                    (services.service_id = '2' OR services.service_id = '3') 
                    AND 
                    (
                        ((YEAR(CURDATE()) - YEAR(services.service_dt)) <= 7)
                        OR
                        ((YEAR(CURDATE()) - YEAR(services.service_dt + 1)) <= 5)
                    )
                )
                OR
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (
                        (YEAR(machines.testrun_dt + 1) <= 5)
                        OR
                        (YEAR(machines.testrun_dt) <= 7)
                    )
                ) THEN 'E4'
            WHEN (machines.motor >= 500)
                AND
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (
                        ((YEAR(CURDATE()) - YEAR(services.service_dt + 1)) <= 7)
                    )
                )
                OR
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (
                        (YEAR(machines.testrun_dt + 1) <= 7)
                    )
                ) THEN 'F1'
            WHEN (machines.motor >= 200)
                AND
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (
                        ((YEAR(CURDATE()) - YEAR(services.service_dt + 1)) <= 7)
                    )
                )
                OR
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (
                        (YEAR(machines.testrun_dt + 1) <= 7)
                    )
                ) THEN 'F2'
            WHEN (machines.motor >= 74)
                AND
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (
                        ((YEAR(CURDATE()) - YEAR(services.service_dt + 1)) <= 7)
                    )
                )
                OR
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (
                        (YEAR(machines.testrun_dt + 1) <= 7)
                    )
                ) THEN 'F3'
            WHEN (machines.motor < 74) 
                AND
                (
                    (services.service_id <> '2' OR services.service_id <> '3') 
                    AND 
                    (
                        ((YEAR(CURDATE()) - YEAR(services.service_dt + 1)) <= 7)
                    )
                )
                OR
                (
                    (services.service_id <> '2' OR services.service_id <> '3')
                    AND 
                    (
                        (YEAR(machines.testrun_dt + 1) <= 7) 
                    )
                ) THEN 'F4'
            ELSE ''
        END AS `Ranking`
            "),
            
        )
        ->whereNull('ct.deleted_at') 
        ->distinct() //ลองใช้
        ->leftJoin('machines', 'services.machine_id', '=', 'machines.id')
        ->leftJoin('customers as ct', 'ct.id', '=', 'machines.customer_id')
        ->leftJoin('countries', 'ct.country_id', '=', 'countries.id')
        ->leftJoin('provinces', 'ct.province_id', '=', 'provinces.id')
        ->leftJoin('industrialzones', 'ct.industrialzone_id', '=', 'industrialzones.id');
    

    // ตรวจสอบและเพิ่มเงื่อนไขการค้นหาตาม request ที่ถูกส่งมา
    if ($request->country) {
        $query->where(function($query) use ($request) {
            $query->where('countries.country_name', $request->country)
                ->orWhere('countries.id', $request->country);
        });
    }

    if ($request->industrialzones) {
        $query->where(function($query) use ($request) {
            $query->where('industrialzones.industrialzone_name', 'like', '%' . $request->industrialzones . '%')
                ->orWhere('industrialzones.id', $request->industrialzones);
        });
    }

    if ($request->provinces) {
        $query->where(function($query) use ($request) {
            $query->where('provinces.province_name', 'like', '%' . $request->provinces . '%')
                ->orWhere('provinces.id', $request->provinces);
        });
    }

    if ($request->cname != null) {
        $query->where('customers.customer_name1', 'like', '%' . $request->cname . '%');
    }

    if ($request->ccode != null) {
        $query->where('customers.customer_cd', 'like', '%' . $request->ccode . '%');
    }

    if ($request->remarks != null) {
        $query->where('customers.remarks', 'like', '%' . $request->remarks . '%');
    }

    // ดึงข้อมูลลูกค้าและเพิ่มลงใน $customerData
    $customers = $query->get();
    foreach ($customers as $customer) {
        $customerData[] = [

            
            'ID' => $customer->ID,
            'User Code' => $customer->CustomerCode,
            'User Name1' => $customer->CustomerName1,
            'User Name2' => $customer->CustomerName2,
            'Country' => $customer->Country,
            'Province' => $customer->Province,
            'I.E.' => $customer->IndustrialZone,
            'Zip' => $customer->Zip,
            'Address1.' => $customer->Address1,
            'Address2.' => $customer->Address2,
            'Telephone.' => $customer->Telephone,
            'Ranking.' => $customer->Ranking,
            'Remarks.' => $customer->Remarks,
            'Created.' => $customer->Created,
            'Updated.' => $customer->Updated,
        ];
    } 
    // สร้างไฟล์ CSV และดาวน์โหลด
    $userTimezone = '';
    if(isset($_SERVER['HTTP_TIMEZONE'])) {
        $userTimezone = $_SERVER['HTTP_TIMEZONE'];
    } else {
        $userTimezone = 'Asia/Bangkok'; // ตั้งค่าไทม์โซนเริ่มต้นที่นี่
    }

    $now = Carbon::now($userTimezone);
    $date = $now->format('YmdHis');

    $filename = "enduserMaster_$date.csv";

    return CSV::download(new CustomerExport($customerData), $filename);

}


    public function show($id)
    {
        $customer = DB::table('customers');
        $country = DB::table('countries')->get();
        $province = DB::table('provinces')->get();
        $industrialzone = DB::table('industrialzones')->get();
        $customer = $customer
            ->select('customers.*', 'countries.country_name as ct_name', 'provinces.province_name as pv_name' , 'industrialzones.industrialzone_name as indust','users.user_name as created_by','users.user_name as updated_by')
            ->where('customers.id', $id)
            ->whereNull('customers.deleted_at') 
            ->leftjoin('countries', 'customers.country_id', '=', 'countries.id')
          //->leftjoin('countries', 'provinces.country_id', '=', 'countries.id')
            ->leftjoin('provinces', 'customers.province_id', '=', 'provinces.id')  
            ->leftjoin('industrialzones', 'customers.industrialzone_id', '=', 'industrialzones.id')  
            ->leftjoin('users','customers.created_by','=','users.id')
            ->leftjoin('users as users2','customers.updated_by','=','users.id')
            ->first();    
        //return view('companies.show')->with('company', $company );
        return view('pages.dashboards.enduser.show', ['customer' => $customer, 'country' => $country, 'province' => $province , 'industrialzone' => $industrialzone]);
    }

    public function edit($id)
    {
        $customer = DB::table('customers');
        $country = DB::table('countries')->whereNull('countries.deleted_at')->get();
        $province = DB::table('provinces')->whereNull('provinces.deleted_at')->get();
        $industrialzone = DB::table('industrialzones')->whereNull('industrialzones.deleted_at')->get();
        $customer = $customer
        ->select('customers.*', 'countries.country_name as ct_name', 'provinces.province_name as pv_name' , 'industrialzones.industrialzone_name as indust' ,'users.user_name as created_by','users.user_name as updated_by')
        
        ->where('customers.id', $id)
        ->whereNull('customers.deleted_at') 
        ->leftjoin('countries', 'customers.country_id', '=', 'countries.id')
        ->leftjoin('provinces', 'customers.province_id', '=', 'provinces.id') 
        ->leftjoin('industrialzones', 'customers.industrialzone_id', '=', 'industrialzones.id')  
        ->leftjoin('users','customers.created_by','=','users.id')
        ->leftjoin('users as users2','customers.updated_by','=','users.id')
        ->first(); 
        return view('pages.dashboards.enduser.edit', ['customer' => $customer, 'country' => $country, 'province' => $province , 'industrialzone' => $industrialzone]);
    }
    public function update(Request $request, $id)
    {
        $emails = Customer::where('id', $id)->firstOrFail();
        if (!auth()->check()) {
            return redirect('dashboard');
        }
        $input = $request->all();
        $input['updated_by'] = auth()->user()->id;  
        $emails->update($input);
        // return redirect('enduser_result')->with('success', 'Company updated successfully !');
        session(['email' => $emails]);
        return redirect()->route('enduser_result')->with('success', 'Company updated successfully !');
    }
    public function destroy(string $id)
    {
        $emails = Customer::findOrFail($id);
        $emails ->delete();
        return redirect('customer')->with('success', 'Company deleted successfully');
    }
    public function backcompanypage() {
        return view('pages.dashboards.enduser.index');
    }
    //Create resource
    public function create(){ 
        return view('pages.dashboards.enduser.create');
    }
    public function drop(){
        $lastId = Customer::max('id');
        $newId = $lastId ? $lastId + 1 : 1;
        $list = DB::table('countries')
        ->whereNull('countries.deleted_at')
        
        
        // ->orderBy('country_name','asc')
        ->get();
        return view('pages.dashboards.enduser.create', compact('list', 'newId'));
    }

    //ฟังก์ชั่น Fetch คือDynamic Dropdown ในการเลือกจังหวัด
    public function fetch(Request $request)
{
    $id = $request->get('select'); //เลือก id 
    
    $provinces = DB::table('countries') 
        ->whereNull('provinces.deleted_at')
        ->join('provinces', 'countries.id', '=', 'provinces.country_id')
        ->select('provinces.id', 'provinces.province_name')
        ->where('countries.id', $id)
        ->groupBy('provinces.id', 'provinces.province_name')
        ->get();

    $industrialZones = DB::table('countries')
        ->whereNull('industrialzones.deleted_at')
        ->join('industrialzones', 'countries.id', '=', 'industrialzones.country_id')
        ->select('industrialzones.id', 'industrialzones.industrialzone_name')
        ->where('countries.id', $id)
        ->groupBy('industrialzones.id', 'industrialzones.industrialzone_name')
        ->get();
    
    //ในส่วนการแสดงผล
    $outputProvinces = '<option value="">Select Province/Prefecture</option>';
    foreach ($provinces as $province) {
        $outputProvinces .= '<option value="'.$province->id.'">'.$province->province_name.'</option>';
    }
    
    $outputIndustrialZones = '<option value=""></option>';
    foreach ($industrialZones as $industrialZone) {
        $outputIndustrialZones .= '<option value="'.$industrialZone->id.'">'.$industrialZone->industrialzone_name.'</option>';
    }
    //ส่งไปให้json
    return response()->json([
        'provinces' => $outputProvinces,
        'industrialzones' => $outputIndustrialZones,
    ]);
}


     //create data
     public function store(Request $request)
{
        $request->validate([
        'customer_cd' => 'required',            
        'customer_name1' => 'required',
        'customer_name2' => 'nullable',
        'country_id' => 'required',
        'province_id' => 'required',
        'zip' => 'nullable',
        'address1' => 'required',
        'address2' => 'nullable',
        'industrialzone_id' => 'nullable',
        'telephone' => 'nullable',
        'remarks' => 'nullable',
        // 'created_by' => 'required',
        // 'updated_by' => 'required',
        // // 'factory_cd' => 'required',
    ],[
        'customer_cd.required' => 'Please Enter The User Code.',
        'address1.required' => 'Please Enter Address1.',
        'customer_name1.required' => 'Please Enter Company Full Name.',
        'company_name.unique' => 'The Company Name Already Exists In The System.',
        'province_id.required' => 'Please Select the Province/Prefecture.',
    ]);
    $enduser = new Customer();
    $enduser->customer_name1 = $request->customer_name1;
    $enduser->customer_cd = $request->customer_cd;
    $enduser->customer_name2 = $request->customer_name2;
    $enduser->country_id = $request->country_id;
    $enduser->province_id = $request->province_id;
    $enduser->zip = $request->zip;
    $enduser->address1 = $request->address1;
    $enduser->address2 = $request->address2;
    $enduser->industrialzone_id = $request->industrialzone_id;
    $enduser->telephone = $request->telephone;
    $enduser->remarks = $request->remarks;
    // $enduser->created_by = $request->created_by;
    // $enduser->updated_by = $request->updated_by;
    // $enduser->factory_cd = $validatedData'factory_cd';
    if (auth()->check()) {
        $enduser->created_by = auth()->user()->id; // เพิ่มชื่อผู้ล็อกอินที่สร้างรายการ
        $enduser->updated_by = auth()->user()->id;  // เพิ่มชื่อผู้ล็อกอินเป็น updated_by
    } else {
        return redirect()->route('dashboard'); // ส่งผู้ใช้ไปยังหน้า login หรือหน้าที่คุณต้องการ
    }
    $enduser->save();

    // return redirect()->route('enduser.index')->with('success', 'Email created successfully.');
    session(['email' => $enduser]);
    return redirect()->route('enduser_result')->with('success', 'Email created successfully !');
    //มีการเปลี่ยน ในส่วนของตัวfile ชื่อdatabase.php ในconfig เพื่อตรวจสอบการเพิ่มข้อมูล เปลี่ยนเพียงแค่ 'strict' => เป็น false จากที่เป็นtrue
}

public function enduser_delete($id)
    {
        $customer = DB::table('customers');
        $country = DB::table('countries')->get();
        $province = DB::table('provinces')->get();
        $industrialzone = DB::table('industrialzones')->get();
        $customer = $customer
            ->select('customers.*', 'countries.country_name as ct_name', 'provinces.province_name as pv_name' , 'industrialzones.industrialzone_name as indust','users.user_name as created_by','users.user_name as updated_by')
            ->where('customers.id', $id)
            ->whereNull('customers.deleted_at') 
            ->leftjoin('countries', 'customers.country_id', '=', 'countries.id')
          //->leftjoin('countries', 'provinces.country_id', '=', 'countries.id')
            ->leftjoin('provinces', 'customers.province_id', '=', 'provinces.id')  
            ->leftjoin('industrialzones', 'customers.industrialzone_id', '=', 'industrialzones.id')  
            ->leftjoin('users','customers.created_by','=','users.id')
            ->leftjoin('users as users2','customers.updated_by','=','users.id')
            ->first();    
        //return view('companies.show')->with('company', $company );
        return view('pages.dashboards.enduser.enduser_delete', ['customer' => $customer, 'country' => $country, 'province' => $province , 'industrialzone' => $industrialzone]);
    }

// public function enduser_delete() {
//     return view('pages.dashboards.enduser.enduser_delete');
// }

// public function enduser_result() {
//     return view('pages.dashboards.enduser.result');
// }

public function enduser_result(Request $request)
    {
        $emailid = session('email');

        $id = $emailid->id;
        $customer = DB::table('customers');
        $country = DB::table('countries')->whereNull('countries.deleted_at')->get();
        $province = DB::table('provinces')->whereNull('provinces.deleted_at')->get();
        $industrialzone = DB::table('industrialzones')->whereNull('industrialzones.deleted_at')->get();
        $customer = $customer
            ->select('customers.*', 'countries.country_name as ct_name', 'provinces.province_name as pv_name' , 'industrialzones.industrialzone_name as indust','users.user_name as created_by','users.user_name as updated_by')
            ->where('customers.id', $id)
            ->whereNull('customers.deleted_at')
            ->leftjoin('countries', 'customers.country_id', '=', 'countries.id')
          //->leftjoin('countries', 'provinces.country_id', '=', 'countries.id')
            ->leftjoin('provinces', 'customers.province_id', '=', 'provinces.id')  
            ->leftjoin('industrialzones', 'customers.industrialzone_id', '=', 'industrialzones.id')  
            ->leftjoin('users','customers.created_by','=','users.id')
            ->leftjoin('users as users2','customers.updated_by','=','users.id')
            ->first();    
        //return view('companies.show')->with('company', $company );
        return view('pages.dashboards.enduser.result', ['customer' => $customer, 'country' => $country, 'province' => $province , 'industrialzone' => $industrialzone]);
    }
}
