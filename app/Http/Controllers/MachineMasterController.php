<?php
namespace App\Http\Controllers;
use App\Models\Machine;
use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use App\Exports\MachineExport;
use CSV;

class MachineMasterController extends Controller
{
    //
    private function applySearchCondition($query, $request, $field, $column) {
        if ($request->has($field)) {
            $value = $request->input($field);
            $query->where("{$column}", 'like', "%{$value}%");
        }
    }

    // ฟังก์ชันเพื่อค้นหาตามช่วงวันที่
    private function applyDateRange($query, $request, $startDateField, $endDateField, $dbColumn) {
        $startDate = $request->input($startDateField);
        $endDate = $request->input($endDateField);
    
        if (isset($startDate) && isset($endDate)) {
            $query->where(function ($query) use ($startDate, $endDate, $dbColumn) {
                $query->whereBetween($dbColumn, [$startDate, $endDate]);
            });
        }
    }
  
    
    public function index(Request $request)
    {
        $machine = DB::table('machines as m')->orderBy('id');
        $machinemodels = DB::table('machinemodels');
        $machinetype1s = DB::table('machinetype1s');
        $company = DB::table('companies')->get();
        // $type = DB::table('enumeration')->get();
        $customer = DB::table('customers')->get();
        $country = DB::table('countries')->whereNull('countries.deleted_at')-> get();

        //Search Condition
        // $search_fac = DB::table('enumeration') ->where('grouptype', '=', 'factorytype')->get(); 
        // $search_com = DB::table('enumeration') ->where('grouptype', '=', 'compressortype')->get(); 

        // ใช้ applySearchCondition เพื่อค้นหาตามเงื่อนไขต่าง ๆ
        $this->applySearchCondition($machine, $request, 'customer_cd', 'customers.customer_cd');
        $this->applySearchCondition($machine, $request, 'customer_name', 'customers.customer_name1');
        $this->applySearchCondition($machine, $request, 'typecode', 'm.machine_cd');
        $this->applySearchCondition($machine, $request, 'serial', 'm.serial');
        $this->applySearchCondition($machine, $request, 'factory_type', 'm.factory_type');
        $this->applySearchCondition($machine, $request, 'compressor_type', 'm.compressor_type');
        $this->applySearchCondition($machine, $request, 'country', 'countries.country_name');
        $this->applySearchCondition($machine, $request, 'company', 'companies.company_short_name');
        $this->applySearchCondition($machine, $request, 'remarks', 'm.remarks');
        
        // ใช้ applyDateRange เพื่อค้นหาตามช่วงวันที่
        $this->applyDateRange($machine, $request, 'start_date', 'end_date', 'm.testrun_dt');
        $this->applyDateRange($machine, $request, 'start_date', 'end_date', 'm.dispatch_dt');
        
        //Show LIST
        $machine = $machine
        ->select(
            // 'machinetype1s.machinetype1_name',
            'm.*',
            'm.id',
            'm.serial',
            'm.remarks',
            'm.machine_cd',
            'machinemodels.machinetype1_id',
            'm.customer_machine_no',
            'customers.customer_cd as cus_code',
            'customers.customer_name1 as cus_name1',
            'customers.customer_name2 as cus_name2',
            'customers.country_id as country_id',
            'companies.company_name as com_name',
            'companies.company_short_name as com_shot_name',
            'countries.country_name as country_cus',
            'm.machinemodel_id',
            'm.factory_type as factory_type_name'  ,
            'm.compressor_type as compressor_type_name'  
        )      
        ->whereNull('m.deleted_at') 
        ->leftJoin('customers', 'm.customer_id', '=', 'customers.id')
        ->leftJoin('countries', 'customers.country_id', '=', 'countries.id')
        ->leftJoin('companies', 'm.service_factory_id', '=', 'companies.id')
        ->leftJoin('machinemodels', 'm.machinemodel_id', '=', 'machinemodels.id')
        ->leftJoin('machinetype1s', 'machinemodels.machinetype1_id', '=', 'machinetype1s.id') // แก้ไขต
        // ->leftJoin('enumeration as fac', function ($join) {
        //     $join->on('fac.grouptype', '=', DB::raw("'factorytype'"))
        //         ->on('fac.code', '=', DB::raw("CAST(m.factory_type AS CHAR)"));
        // })
        // ->leftJoin('enumeration as com', function ($join) {
        //     $join->on('com.grouptype', '=', DB::raw("'compressortype'"))
        //         ->on('com.code', '=', DB::raw("CAST(m.compressor_type AS CHAR)"));
        // })

        ->paginate(10);
        return view('pages.dashboards.machine.index', [
            'machine' => $machine, 
            'machinemodels' => $machinemodels, 
            'machinetype1s' => $machinetype1s, 
            'company' => $company, 
            // 'type' => $type  , 
            'customer' => $customer , 
            'country' => $country, 
            // 'search_fac' => $search_fac,
            // 'search_com' => $search_com,
            // 'search_country' => $search_country,
            'request' => $request,
            ] );    
    }

            public function exportCSV(Request $request)
        {
            // กำหนดคำสั่ง query สำหรับการดึงข้อมูลเครื่องจักร
            $query = DB::table('machines as m')
                ->orderBy('m.id')
                ->select(
                    'm.id',
                    'm.serial',
                    'm.remarks',
                    'm.machine_cd',
                    'm.customer_machine_no',
                    'customers.customer_cd as cus_code',
                    'customers.customer_name1 as cus_name1',
                    'customers.customer_name2 as cus_name2',
                    'customers.country_id as country_id',
                    'companies.company_name as com_name',
                    'companies.company_short_name as com_shot_name',
                    'countries.country_name as country_cus',
                    'm.machinemodel_id',
                    'm.factory_type as factory_type_name'  ,
                    'm.compressor_type as compressor_type_name'  
                )
                ->whereNull('m.deleted_at')
                ->leftJoin('customers', 'm.customer_id', '=', 'customers.id')
                ->leftJoin('countries', 'customers.country_id', '=', 'countries.id')
                ->leftJoin('companies', 'm.service_factory_id', '=', 'companies.id')
                ->leftJoin('machinemodels', 'm.machinemodel_id', '=', 'machinemodels.id');
                // ->leftJoin('enumeration as fac', function ($join) {
                //     $join->on('fac.grouptype', '=', DB::raw("'factorytype'"))
                //         ->on('fac.code', '=', DB::raw("CAST(m.factory_type AS CHAR)"));
                // })
                // ->leftJoin('enumeration as com', function ($join) {
                //     $join->on('com.grouptype', '=', DB::raw("'compressortype'"))
                //         ->on('com.code', '=', DB::raw("CAST(m.compressor_type AS CHAR)"));
                // });

            // ใช้ applySearchCondition เพื่อค้นหาตามเงื่อนไขต่าง ๆ
            $this->applySearchCondition($query, $request, 'customer_cd', 'customers.customer_cd');
            $this->applySearchCondition($query, $request, 'customer_name', 'customers.customer_name1');
            $this->applySearchCondition($query, $request, 'typecode', 'm.machine_cd');
            $this->applySearchCondition($query, $request, 'serial', 'm.serial');
            $this->applySearchCondition($query, $request, 'factory_type', 'm.factory_type');
            $this->applySearchCondition($query, $request, 'compressor_type', 'm.compressor_type');
            $this->applySearchCondition($query, $request, 'country', 'countries.country_name');
            $this->applySearchCondition($query, $request, 'company', 'companies.company_short_name');
            $this->applySearchCondition($query, $request, 'remarks', 'm.remarks');

            // ใช้ applyDateRange เพื่อค้นหาตามช่วงวันที่
            $this->applyDateRange($query, $request, 'start_date', 'end_date', 'm.testrun_dt');
            $this->applyDateRange($query, $request, 'start_date', 'end_date', 'm.dispatch_dt');

            // ดึงข้อมูลเครื่องจักร
            $machines = $query->get();

            // สร้างข้อมูลสำหรับการ export CSV
            $machineData = [];
            foreach ($machines as $machine) {
                $factoryTypeName = '';
            
                if($machine->factory_type_name == 1) {
                    $factoryTypeName = 'KCMS';
                } elseif($machine->factory_type_name == 2) {
                    $factoryTypeName = 'KSL';
                } elseif($machine->factory_type_name == 3) {
                    $factoryTypeName = 'ETC';
                }
            
                $machineData[] = [
                    'ID' => $machine->id,
                    'Serial#' => $machine->serial,
                    'Typecode' => $machine->machine_cd,
                    'Customer Machine#' => $machine->customer_machine_no,
                    'UserCode' => $machine->cus_code,
                    'UserName' => $machine->cus_name1,
                    'Service' => $machine->com_shot_name,
                    'Factory' => strtoupper($factoryTypeName),
                ];
            }

            // สร้างไฟล์ CSV และดาวน์โหลด
            return CSV::download(new MachineExport($machineData), 'machines.csv');
        }


        public function fetch(Request $request)
    {
        $countryName = $request->get('country'); // รับค่าประเทศ
        $country = DB::table('countries')->whereNull('countries.deleted_at')->where('country_name', $countryName)->first();
        
        // รับค่า 'company' จาก AJAX request
        $selectedCountry = $request->get('company');

        $companies = DB::table('companies')
            ->whereNull('companies.deleted_at')
            ->where('country_id', $country->id)
            ->select('id', 'company_short_name')
            ->get();

        // ในส่วนการแสดงผลใน dropdown
        $outputcompanies = '<option value="">Select Distributor</option>';
        foreach ($companies as $company) {
            $selected = ($selectedCountry == $company->company_short_name) ? 'selected' : '';
            $outputcompanies .= '<option value="' . $company->company_short_name . '" ' . $selected . '>' . $company->company_short_name . '</option>';
        }

        // ส่งค่ากลับเป็น JSON
        return response()->json([
            'companies' => $outputcompanies,
        ]);
    }

    public function show($id)
    {
        $machine = DB::table('machines as m')->orderBy('id')->where('m.id', $id); 
        $company = DB::table('companies')->whereNull('companies.deleted_at')->get();
        // $type = DB::table('enumeration')->get();
        $customer = DB::table('customers')-> get();
        $country = DB::table('countries') ->whereNull('countries.deleted_at')-> get();
       
        // $search_usercode = DB::table('enumeration') ->where('grouptype', '=', 'origin_country_id') ->get();
        // $search_username = DB::table('enumeration') ->where('grouptype', '=', 'oil_type')->get();
        // $search_type_code = DB::table('enumeration') ->where('grouptype', '=', 'cooler_type') ->get();
        // $search_serial = DB::table('enumeration') ->where('grouptype', '=', 'inverter_flg') ->get();
        // $search_fac_type = DB::table('enumeration') ->where('grouptype', '=', 'latest_flg')->get(); 
        // $search_com_type = DB::table('enumeration') ->where('grouptype', '=', 'latest_flg')->get(); 
        // $search_country = DB::table('enumeration') ->where('grouptype', '=', 'latest_flg')->get(); 
        // $search_remark = DB::table('enumeration') ->where('grouptype', '=', 'latest_flg')->get(); 

        //Show LIST
        $machine = $machine
        ->select(

            'm.*',
            'm.serial',
            'm.machine_cd',
            'm.customer_machine_no',
            'customers.customer_cd as cus_code',
            'customers.customer_name1 as cus_name1',
            'customers.customer_name2 as cus_name2',
            'customers.country_id as country_id',
            'industrialzones.industrialzone_name as industrialzone_id',
            'customers.address1 as address1',
            'customers.address2 as address2',
            'companies.company_name as com_name',
            'companies.company_short_name as com_shot_name',
            'countries.country_name as country_cus',
            'm.operate_status as operstat_name',
            'm.factory_type as factory_type_name'  ,
            'm.compressor_type as compressor_type_name' ,
            'users.user_name as created_by',
            'users2.user_name as updated_by'
        )      
        ->whereNull('m.deleted_at')
        ->leftjoin('users','m.created_by','=','users.id')
        ->leftjoin('users as users2','m.updated_by','=','users2.id')
        ->leftJoin('customers', 'm.customer_id', '=', 'customers.id')
        ->leftJoin('countries', 'customers.country_id', '=', 'countries.id')
        ->leftJoin('industrialzones','customers.industrialzone_id','=','industrialzones.id')
        
        ->leftJoin('companies', 'm.service_factory_id', '=', 'companies.id')
            ->first();
            return view('pages.dashboards.machine.show', [
            'machine' => $machine,
            'company' => $company,
            // 'type' => $type  ,
            'customer' => $customer ,
            'country' => $country] );    
        }

    public function edit($id)
    {
        $machine = DB::table('machines as m')->orderBy('id')->where('m.id', $id);
        $company = DB::table('companies')->whereNull('companies.deleted_at')->get();

        $customer = DB::table('customers')->whereNull('customers.deleted_at')-> get();
        $country = DB::table('countries')->whereNull('countries.deleted_at')-> get();


        //Show LIST
        $machine = $machine
        ->select(
            'm.*',
            'm.serial',
            'm.machine_cd',
            'm.customer_machine_no',
            'customers.customer_cd as cus_code',
            'customers.customer_name1 as cus_name1',
            'customers.customer_name2 as cus_name2',
            'customers.country_id as country_id',
            'industrialzones.industrialzone_name as industrialzone_id',
            'customers.address1 as address1',
            'customers.address2 as address2',
            'companies.company_name as com_name',
            'companies.company_short_name as com_shot_name',
            'countries.country_name as country_cus',
           
            'm.factory_type as factory_type_name'  ,
            'm.compressor_type as compressor_type_name'  ,
            'users.user_name as created_by',
            'users2.user_name as updated_by'
        )      
        ->whereNull('m.deleted_at')
        ->leftJoin('customers', 'm.customer_id', '=', 'customers.id')
        ->leftJoin('countries', 'customers.country_id', '=', 'countries.id')
        ->leftJoin('companies', 'm.service_factory_id', '=', 'companies.id')
        ->leftJoin('users','m.created_by','=','users.id')
        ->leftJoin('users as users2','m.updated_by','=','users2.id')
        ->leftJoin('industrialzones','customers.industrialzone_id','=','industrialzones.id')
       

            ->first();
            return view('pages.dashboards.machine.edit', [
                'machine' => $machine,
                 'company' => $company,
                   'customer' => $customer ,
                    'country' => $country] );   
                     
        }

        public function update(Request $request, $id)
        {
            $machine = Machine::where('id', $id)->firstOrFail();
            if (!auth()->check()) {
                return redirect('dashboard');
            }
            $input = $request->all();
            $input['updated_by'] = auth()->user()->id;  
            $machine->update($input);
            // return redirect('machine_result')->with('success', 'Machine Master updated successfully !');
            session(['machine' => $machine]);
            return redirect()->route('machine_result')->with('success', 'Company updated successfully !');
        }
    
        public function destroy(string $id)
        {
            $machine = Machine::findOrFail($id);
            $machine->delete();
            return redirect('machine')->with('success', 'Machine Master deleted successfully');
        }
        
    public function create(){ 
        return view('pages.dashboards.machine.create');
    }

    public function createNew()
    {
       
        $companies = DB::table('companies')->whereNull('companies.deleted_at')->get();
        $lastId = Machine::max('id');
        $newId = $lastId ? $lastId + 1 : 1;
            return view('pages.dashboards.machine.create', compact('newId', 'companies'));
            
        }

        public function searchcustomer(Request $request)
            {
            $searchTerm = $request->input('searchTerm');
            
            // ตรวจสอบความยาวของคำค้นหา
            if (strlen($searchTerm) < 2) {
                return response()->json(['search_results' => []]);
            }
            
            // ตรวจสอบว่ามีข้อมูลในแคชหรือไม่
            if (Cache::has('search_results_' . $searchTerm)) {
                $searchResults = Cache::get('search_results_' . $searchTerm);
            } else {
                // สร้างคำสั่ง SQL สำหรับค้นหาข้อมูลลูกค้า
                $sql = "SELECT
                            customers.id AS id,
                            customers.customer_cd AS customer_cd,
                            countries.country_name AS country,
                            industrialzones.industrialzone_name AS industrialzone,
                            customers.address1 AS address1,
                            customers.address2 AS address2,
                            customers.customer_name1 AS customer_name1,
                            customers.customer_name2 AS customer_name2
                        FROM customers
                        LEFT JOIN countries ON customers.country_id = countries.id
                        LEFT JOIN industrialzones ON customers.industrialzone_id = industrialzones.id
                        WHERE
                                (customers.deleted_at IS NULL)
                                    AND (
                                        customers.customer_cd LIKE ?
                                        OR customers.customer_name1 LIKE ?
                                        OR customers.customer_name2 LIKE ?
                                        OR countries.country_name LIKE ?
                                    )";

                $customers = DB::select($sql, ["%$searchTerm%", "%$searchTerm%", "%$searchTerm%", "%$searchTerm%"]);
                
                $searchResults = [];
                
                foreach ($customers as $customer) {
                    $searchResults[] = [
                        'id' => $customer->id,
                        'customer_cd' => $customer->customer_cd,
                        'country' => $customer->country,
                        'industrialzone' => $customer->industrialzone,
                        'address1' => $customer->address1,
                        'address2' => $customer->address2,
                        'customer_name1' => $customer->customer_name1,
                        'customer_name2' => $customer->customer_name2,
                    ];
                }
                // เก็บคำตอบในแคชเพื่อใช้ในครั้งถัดไป
                Cache::put('search_results_' . $searchTerm, $searchResults, 60); // แคชมีอายุ 60 นาที
            }
            
            return response()->json(['search_results' => $searchResults]);
        }
            
    
    //create data
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'serial' => 'required',
            'factory_type' => 'required',
            'compressor_type' => 'required',
            'customer_machine_no' => 'nullable',
            // 'machinemodel_id' => 'required',
            'machine_cd' => 'required',
            'service_factory_id' => 'required',
            'customer_id' => 'nullable',
            'kcth_order_cd' => 'nullable',
            'ksl_order_cd' => 'nullable',
            'kma_order_cd' => 'nullable',
            'testrun_dt' => 'nullable',
            'dispatch_dt' => 'nullable',
            'operate_status' => 'required',
            'motor' => 'nullable',
            'remarks' => 'nullable',
            'remarks_distributor1' => 'nullable',
            'remarks_distributor2' => 'nullable',
        ],[
            'serial.required' => 'Please Enter The Serial Information.',
            'factory_type.required' => 'Please Select a Factory.',
            'compressor_type.required' => 'Please Select a Compressor Type. ',
            'machine_cd.required' => 'Please Enter The Machine Type Code Information.',
            'service_factory_id.required' => 'Please Select a Service Company.',
            'operate_status.required' => 'Please Select a Operation Status.',
        ]);
      

        $machine = new Machine();
        $machine->serial = $validatedData['serial'];
        $machine->factory_type = $validatedData['factory_type'];
        $machine->compressor_type = $validatedData['compressor_type'];
        $machine->customer_machine_no = $validatedData['customer_machine_no'];
        // $machine->machinemodel_id = $validatedData['machinemodel_id'];
        $machine->machine_cd = $validatedData['machine_cd'];
        $machine->service_factory_id = $validatedData['service_factory_id'];
        $machine->customer_id = $validatedData['customer_id'];
        $machine->kcth_order_cd = $validatedData['kcth_order_cd'];
        $machine->ksl_order_cd = $validatedData['ksl_order_cd'];
        $machine->kma_order_cd = $validatedData['kma_order_cd'];
        $machine->testrun_dt = $validatedData['testrun_dt'];
        $machine->dispatch_dt = $validatedData['dispatch_dt'];
        $machine->operate_status = $validatedData['operate_status'];
        $machine->motor = $validatedData['motor'];
        $machine->remarks = $validatedData['remarks'];
        $machine->remarks_distributor1 = $validatedData['remarks_distributor1'];
        $machine->remarks_distributor2 = $validatedData['remarks_distributor2'];
        ///////ตัวTest ในส่วนที่ไม่ได้ถูกเพิ่มเข้ามาในระบบ ///////
        if (auth()->check()) {
            $machine->created_by = auth()->user()->id; // เพิ่มชื่อผู้ล็อกอินที่สร้างรายการ
            $machine->updated_by = auth()->user()->id;  // เพิ่มชื่อผู้ล็อกอินเป็น updated_by
        } else {
            return redirect()->route('dashboard'); // ส่งผู้ใช้ไปยังหน้า login หรือหน้าที่คุณต้องการ
        }
        $machine->save();
        
        session(['machine' => $machine]);
        return redirect()->route('machine_result')->with('success', 'Machine created successfully !');
        // return redirect()->route('machine_result')->with('success', 'Machine created successfully.');
        //มีการเปลี่ยน ในส่วนของตัวfile ชื่อdatabase.php ในconfig เพื่อตรวจสอบการเพิ่มข้อมูล เปลี่ยนเพียงแค่ 'strict' => เป็น false จากที่เป็นtrue
    }
    
    public function machine_delete() {
        return view('pages.dashboards.machine.machine_delete');
    }

    public function machine_result() {

        $machineid = session('machine');

        $id = $machineid->id;
        $machine = DB::table('machines as m')->orderBy('id')->where('m.id', $id); 
        $company = DB::table('companies')->whereNull('companies.deleted_at')->get();
        // $type = DB::table('enumeration')->get();
        $customer = DB::table('customers')-> get();
        $country = DB::table('countries')-> get();
        //Show LIST
        $machine = $machine
        ->select(

            'm.*',
            'm.serial',
            'm.machine_cd',
            'm.customer_machine_no',
            'customers.customer_cd as cus_code',
            'customers.customer_name1 as cus_name1',
            'customers.customer_name2 as cus_name2',
            'customers.country_id as country_id',
            'industrialzones.industrialzone_name as industrialzone_id',
            'customers.address1 as address1',
            'customers.address2 as address2',
            'companies.company_name as com_name',
            'companies.company_short_name as com_shot_name',
            'countries.country_name as country_cus',
            'm.operate_status as operstat_name',
            'm.factory_type as factory_type_name'  ,
            'm.compressor_type as compressor_type_name' ,
            'users.user_name as created_by',
            'users2.user_name as updated_by'
        )      
        ->whereNull('m.deleted_at')
        ->leftjoin('users','m.created_by','=','users.id')
        ->leftjoin('users as users2','m.updated_by','=','users2.id')
        ->leftJoin('customers', 'm.customer_id', '=', 'customers.id')
        ->leftJoin('countries', 'customers.country_id', '=', 'countries.id')
        ->leftJoin('industrialzones','customers.industrialzone_id','=','industrialzones.id')
        
        ->leftJoin('companies', 'm.service_factory_id', '=', 'companies.id')
            ->first();
            return view('pages.dashboards.machine.result', [
            'machine' => $machine,
            'company' => $company,
            // 'type' => $type  ,
            'customer' => $customer ,
            'country' => $country] );   
    }
}
