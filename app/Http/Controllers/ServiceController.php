<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Servicedetails;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Machine;
use App\Models\Customer;
use App\Models\Company;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    //
    public function index(Request $request)
        {
            //Search TextBox
            $service = DB::table('services as sv')->orderBy('id');
            $company = DB::table('companies') ->where('companies.company_short_name','!=','') ->get();
            $customer = DB::table('customers')->get();

            $machine = DB::table('machines')->get();


            $country = DB::table('countries')->get();
            $machinetype = DB::table('machinetype1s')->get();
            $machinemodel = DB::table('machinemodels')->get();
            $industrialzone = DB::table('industrialzones')->get();
            // $type = DB::table('enumeration')->get();
            // $search_stus = DB::table('enumeration') ->where('grouptype', '=', 'status') ->get();
            // $search_psb = DB::table('enumeration') ->where('grouptype', '=', 'possibility')->get();
            // $search_rs = DB::table('enumeration') ->where('grouptype', '=', 'result') ->get();
            // $search_orc = DB::table('enumeration') ->where('grouptype', '=', 'origin_country_id') ->get();
            // $search_oit = DB::table('enumeration') ->where('grouptype', '=', 'oil_type')->get();
    
            if ($request->serial != null) {
                $service = $service->where('machines.serial', $request->serial);
                Session::put('selected_serial', $request->serial);
            }
            if ($request->country != null) {
                $service = $service->where('countries.country_name', $request->country);
                Session::put('selected_country', $request->country);
            }
            
            // if ($request->status != null) {
            //     $service = $service->where('stus.name', 'like', '%' . $request->status . '%');
            //     Session::put('selected_status', $request->status);
            // }
            // if ($request->possibility != null) {
            //     $service = $service->where('psb.name', 'like', '%' . $request->possibility . '%');
            //     Session::put('selected_possibility', $request->possibility);
            // }
            // if ($request->result != null) {
            //     $service = $service->where('rs.name', 'like', '%' . $request->result . '%');
            //     Session::put('selected_result', $request->result);
            // }
            // if ($request->orc_id != null) {
            //     $service = $service ->where('orc.name', 'like', '%' . $request->orc_id . '%');
            //     Session::put('selected_orc_id', $request->orc_id);
            // }
            // if ($request->oil_id != null) {
            //     $service = $service->where('oit.name', 'like', '%' . $request->oil_id . '%');
            //     Session::put('selected_oil_id', $request->oil_id);
            // }
            // if ($request->route != null) {
            //     $service = $service->where('projects.route1', 'like', '%' . $request->route . '%');
            //     Session::put('selected_route', $request->route);
            // }
            // if ($request->pro_id != null) {
            //     $service = $service->where('projects.id', 'like', '%' . $request->pro_id . '%');
            //     Session::put('selected_pro_id', $request->pro_id);
            // }
            //********************************************* DATE ******************************************* */
            if ($request->filled('from_datec') && $request->filled('to_datec')) {
                $service = $service->whereBetween('sv.created_at', [$request->from_datec, $request->to_datec]);
                Session::put('selected_datec', [$request->from_datec, $request->to_datec]);
            }
            if ($request->filled('from_dateu') && $request->filled('to_dateu')) {
                $service = $service->whereBetween('sv.updated_at', [$request->from_dateu, $request->to_dateu]);
                Session::put('selected_dateu', [$request->from_dateu, $request->to_dateu]);
            }
            //************************************************************************************************ */
            
            // เป็นการ Clear session เก่าออกไป ในหน้า index project 
            // คือไม่ว่าจะกด f5 หรือเปลี่ยนหน้าอื่นข้อมูลก่อนหน้าจะยังอยู่
            //จึงต้องใส่ การใช่ปุ่มลบข้อมูล session เก่าไป
            if ($request->has('clear_session')) {
                Session::forget('selected_serial');
                Session::forget('selected_country');
                // Session::forget('selected_username');
                // Session::forget('selected_user_cd');
                // Session::forget('selected_machinetype');
                // Session::forget('selected_machinemodel');
                // Session::forget('selected_status');
                // Session::forget('selected_possibility');
                // Session::forget('selected_result');
                // Session::forget('selected_orc_id');
                // Session::forget('selected_oil_id');
                // Session::forget('selected_route'); 
                // Session::forget('selected_pro_id');
                // Session::forget('selected_datec');
                // Session::forget('selected_dateu');  
                // เพิ่ม session อื่นๆ ที่ต้องการเคลียร์ตรงนี้
            }
            $service = $service->select(
                'sv.*',

                'machines.serial as sr_code',
                // 'machinetype1s.machinetype1_name as Mt_name',
                // 'mm1.machinemodel_name as Mc_name1',
                // 'mm2.machinemodel_name as Mc_name2',
                // 'mm3.machinemodel_name as Mc_name3',
    
                'countries.country_name as Ct_name',
                // 'industrialzones.industrialzone_name as idz_name',
                'companies.company_short_name as Cpns_name',
                // 'customers.customer_cd as cus_cd',
                // 'orc.name as origincountry_name',
                // 'oit.name as oiltype_name',
                // 'stus.name as status_name',
                // 'psb.name as possibility_name',
                // 'rs.name as result_name'
            )
                ->leftJoin('machines', 'sv.machine_id', '=', 'machines.id')
                // ->leftJoin('customers', 'pj.customer_id', '=', 'customers.id')
                // ->leftJoin('industrialzones', 'pj.industrialzone_id', '=', 'industrialzones.id')    
                // ->leftJoin('machinetype1s', 'mm1.id', '=', 'machinetype1s.id')
                 ->leftJoin('companies', 'machines.service_factory_id', '=', 'companies.id')
                 ->leftJoin('countries', 'companies.country_id', '=', 'countries.id')
                 



                // ->leftJoin('enumeration as stus', function ($join) {
                //     $join->on('stus.grouptype', '=', DB::raw("'status'"))
                //         ->on('stus.code', '=', DB::raw("CAST(pj.status AS CHAR)"));
                // })
                // ->leftJoin('enumeration as psb', function ($join) {
                //     $join->on('psb.grouptype', '=', DB::raw("'possibility'"))
                //         ->on('psb.code', '=', DB::raw("CAST(pj.possibility AS CHAR)"));
                // })
                // ->leftJoin('enumeration as rs', function ($join) {
                //     $join->on('rs.grouptype', '=', DB::raw("'result'"))
                //         ->on('rs.code', '=', DB::raw("CAST(pj.result AS CHAR)"));
                // })    
                // ->leftJoin('enumeration as orc', function ($join) {
                //     $join->on('orc.grouptype', '=', DB::raw("'origin_country_id'"))
                //         ->on('orc.code', '=', DB::raw("CAST(pj.result AS CHAR)"));
                // })   
                // ->leftJoin('enumeration as oit', function ($join) {
                //     $join->on('rs.grouptype', '=', DB::raw("'result'"))
                //         ->on('rs.code', '=', DB::raw("CAST(pj.result AS CHAR)"));
                // })   
            
            ->paginate(10);
            
            return view('pages.dashboards.service.index', [
                'service' => $service,
                'country' => $country,
                // 'type' => $type,
                'company' => $company,
                'machine' => $machine,

                'machinemodel' => $machinemodel,
                'machinetype' => $machinetype,
                'customer' => $customer,
                'industrialzone' => $industrialzone,
                // 'search_orc' => $search_orc,
                // 'search_oit' => $search_oit,
                // 'search_rs' => $search_rs,
                // 'search_psb' => $search_psb,
                // 'search_stus' => $search_stus,
                'request' => $request, // เพิ่มตรงนี้
            ]);
        }

    public function show(Request $request) {


        $serial = $request->input('serial');
        $Type_Code = $request->input('Type_Code');
        
        $dataQuery = Machine::select('machines.*', 'customers.customer_name1', 'companies.company_short_name', 'companies.company_name')
            ->join('customers', 'machines.customer_id', '=', 'customers.id')
            ->join('companies', 'machines.service_factory_id', '=', 'companies.id')
            ->where(function ($query) use ($serial, $Type_Code) {
                if ($serial) {
                    $query->where('machines.serial', '=', $serial);
                }
                if ($Type_Code) {
                    $query->where('machines.machine_cd', '=', $Type_Code);
                }
            });

            $data = $dataQuery->paginate(10);
        




        return view('pages.dashboards.service.result', ['Data'=>$data]);
 
        
        
    }
    
    
    function edit(Request $request) {

        $data= Machine::select('machines.*', 'users.user_name', 'updated_by_user.user_name AS updated_by_user_name')
        ->leftJoin('users', 'machines.created_by', '=', 'users.id')
        ->leftJoin('users as updated_by_user', 'machines.updated_by', '=', 'updated_by_user.id')
        ->where('machines.id',$request->input('Id'))
        ->first();
  
        $Id = $request->input('Id');
        $Serial = $request->input('Serial');
        $Customer_Machine = $request->input('cm_m');
        $maintenance_contract =$request->input('mainten_con');
        $remarks_distributor1 =$request->input('remarks_1');
        $remarks_distributor2= $request->input('remarks_2');
        $created_by=$request->input('created_by');
        $updated_by=$request->input('updated_by');
        
    
        return view('pages.dashboards.service.edit',[

            'Id'=>$Id, 
            'Serial'=>$Serial,
            'cm_m'=>$Customer_Machine,
            'mainten_con'=>$maintenance_contract,
            'remarks_1'=>$remarks_distributor1, 
            'remarks_2'=>$remarks_distributor2,
            'created_by'=>$data->user_name,
            'updated_by'=>$data->updated_by_user_name,
            'created_at'=>$data->created_at,
            'updated_at'=>$data->updated_at
            
        ])->with('success', 'User created successfully.');
    }

    function update(Request $request, $id) {
  
       
        $Machine = Machine::find($id);
    
    
        if (!$Machine) {
            
            return redirect()->back()->with('error', 'Record not found');
        }

      
        $Machine->customer_machine_no  = $request->input('cm_m');
        $Machine->operate_status        = $request->input('operate_status');
        $Machine->maintenance_contract  = $request->input('mainten_con');
        $Machine->remarks_distributor1  = $request->input('remarks_1');
        $Machine->remarks_distributor2  = $request->input('remarks_2');
        $Machine->save();

        $machineId = $Machine->id;


        $data= Machine::select('machines.*', 'users.user_name', 'updated_by_user.user_name AS updated_by_user_name')
        ->leftJoin('users', 'machines.created_by', '=', 'users.id')
        ->leftJoin('users as updated_by_user', 'machines.updated_by', '=', 'updated_by_user.id')
        ->where('machines.id', $machineId)
        ->first();
       
        return view('pages.dashboards.service.edit_show',['data'=>$data])->with('success', 'User created successfully.');
        
       
    }

    public function add(Request $request) {

        $oil_type = 'oil_type';
        //simple
        $Id             = $request->input('Id');
        $Serial         = $request->input('Serial');
        $TypeCode       = $request->input('Type');
        $Service_cus    = $request->input('Service_cus');
        $Service_com    = $request->input('Service_com');
        $panel_version  = $request->input('panel_version');


        //report
        $data = Machine::select('machines.*' , 'customers.address1','services.*' )
        ->join('services', 'machines.id', '=', 'services.id')
        ->join('customers', 'machines.customer_id', '=', 'customers.id')
        // ->join('enumeration', 'machines.compressor_type', '=', 'enumeration.code')
        ->where('machines.serial', '=', $Serial)

        ->distinct()
        ->get();


        $DataN_O = $data->first()->ksl_order_cd;  //O.No.
        $DataN_MC = $data->first()->customer_machine_no;  //Customer MC No.
        $Address = $data->first()->address1;  //Address
        $Oil_tpye = $data->first()->compressor_type;  //Address
        $Comm_Date = $data->first()->testrun_dt;  //Address
        $panel_version = $data->first()->panel_version;  //Address
     

        return view('pages.dashboards.service.add',[

            'Id'            => $Id, 
            'TypeCode'      => $TypeCode, 
            'Serial'        => $Serial, 
            'Service_cus'   => $Service_cus,
            'Service_com'   => $Service_com,
            'DataO'         => $DataN_O,
            'DataN_MC'      => $DataN_MC,
            'Address'       => $Address,
            'Oil_tpye'      => $Oil_tpye,
            'Comm_Date'     => $Comm_Date,
            'panel_version'     => $panel_version
            
           
        ]);
    }
    function add_oil_flood(Request $request) {

        
   
        //simple
        $Id             = $request->input('Id');
        $Serial         = $request->input('Serial');
        $TypeCode       = $request->input('Type');
        $Service_cus    = $request->input('Service_cus');
        $Service_com    = $request->input('Service_com');
        $panel_version  = $request->input('panel_version');


        //report
        $data = Machine::select('machines.*' , 'customers.address1', 'services.*' )
        ->join('services', 'machines.id', '=', 'services.id')
        ->join('customers', 'machines.customer_id', '=', 'customers.id')
        // ->join('enumeration', 'machines.compressor_type', '=', 'enumeration.code')
        ->where('machines.serial', '=', $Serial)
     
        ->distinct()
        ->get();


        $DataN_O = $data->first()->ksl_order_cd;  //O.No.
        $DataN_MC = $data->first()->customer_machine_no;  //Customer MC No.
        $Address = $data->first()->address1; 
        $Oil_tpye = $data->first()->compressor_type;  
        $Comm_Date = $data->first()->testrun_dt;  
        $panel_version = $data->first()->panel_version;  

        return view('pages.dashboards.service.add_oil_flood',[

           
            'Id'            => $Id, 
            'TypeCode'      => $TypeCode, 
            'Serial'        => $Serial, 
            'Service_cus'   => $Service_cus,
            'Service_com'   => $Service_com,
            'DataO'         => $DataN_O,
            'DataN_MC'      => $DataN_MC,
            'Address'       => $Address,
            'Oil_tpye'      => $Oil_tpye,
            'Comm_Date'     => $Comm_Date,
            'panel_version'     => $panel_version
            
           
        ]);
        
    }

    public function saveData(Request $request, $Id) {

        $oil_id= Machine::select('machines.*')
        ->where('machines.id', $Id)
        ->first();
        $oil_type = $oil_id['compressor_type'];

     
        
    
        $count = DB:: table('services')
            -> where('machine_id', $Id)
            -> count();
    
        $countPlusOne = $count + 1;
    
    
        $Data_oil_free = [];
        $Data_oil_flood = [];
    
        $validatedData = $request -> validate([
    
            //service-add ลงตาราง service
            'service_dt'        => 'nullable',
            'service_performer' => 'nullable',
            'customer_pic'      => 'nullable',
            'running_hours'     => 'nullable',
            'change_panel'      => 'nullable',
            'remarks'           => 'nullable',
    
            //service-add ลงตาราง servicedetail
            'report_no' => 'nullable',
    
            //Ventilation
            'site_ventilation'          => 'nullable',
            'site_roomtemp'             => 'nullable',
            'site_cooling_temp_in'      => 'nullable',
            'site_cooling_temp_out'     => 'nullable',
            'site_cooling_pressure_in'  => 'nullable',
            'site_cooling_pressure_out' => 'nullable',
    
            //SERVICE_CONTENT
            'service_id_Content'        => 'required',
    
            //SERVICE CONTENT (Detail)
            'detail_motor'           => 'nullable',
            'detail_cooler'          => 'nullable',
            'detail_topup'           => 'nullable',
            'detail_topup_liters'    => 'nullable',
            'detail_replace'         => 'nullable',
            'detail_replace_brand'   => 'nullable',
            'detail_overhaul_air'    => 'nullable',
            'detail_overhaul_motor'  => 'nullable',
            'detail_rewind'          => 'nullable',
            'detail_3000'            => 'nullable',
            'detail_6000'            => 'nullable',
            'detail_12000'           => 'nullable',
            'detail_other'           => 'nullable',      
    
            //MACHINE SETTING
            'setting_operation_local'       => 'nullable',
            'setting_operation_run_on'      => 'nullable',
            'setting_operation_run_load'    => 'nullable',
            'setting_group_link'            => 'nullable',
            'setting_group_panel'           => 'nullable',
            'setting_op_load'               => 'nullable',
            'setting_op_unload'             => 'nullable',
            'setting_op_auto'               => 'nullable',
            'setting_op_constant'           => 'nullable',
            'setting_phh'                   => 'nullable',
            'setting_phl'                   => 'nullable',
            'setting_ph'                    => 'nullable',
            'setting_pl'                    => 'nullable',
            'setting_pll'                   => 'nullable',
    
            //MEASUREMENT
            'meas_voltage_rs_on'        => 'nullable',
            'meas_voltage_rs_off'       => 'nullable',
            'meas_voltage_st_on'        => 'nullable',
            'meas_voltage_st_off'       => 'nullable',
            'meas_voltage_tr_on'        => 'nullable',
            'meas_voltage_tr_off'       => 'nullable',
            'meas_input_r_load'         => 'nullable',
            'meas_input_r_unload'       => 'nullable',
            'meas_input_s_load'         => 'nullable',
            'meas_input_s_unload'       => 'nullable',
            'meas_input_t_load'         => 'nullable',
            'meas_input_t_unload'       => 'nullable',
            'meas_motor_u_load'         => 'nullable',
            'meas_motor_u_unload'       => 'nullable',
            'meas_motor_v_load'         => 'nullable',
            'meas_motor_v_unload'       => 'nullable',
            'meas_motor_w_load'         => 'nullable',
            'meas_motor_w_unload'       => 'nullable',
            'meas_pipetemp'             => 'nullable',
    
            //INSULATION TEST
            'insulation_main_u1v1'  => 'nullable',
            'insulation_main_v1w1'  => 'nullable',
            'insulation_main_w1u1'  => 'nullable',
            'insulation_main_u1u2'  => 'nullable',
            'insulation_main_v1v2'  => 'nullable',
            'insulation_main_w1w2'  => 'nullable',
            'insulation_main_u1e'   => 'nullable',
            'insulation_main_v1e'   => 'nullable',
            'insulation_main_w1e'   => 'nullable',
            'insulation_fan_u1v1'   => 'nullable',
            'insulation_fan_v1w1'   => 'nullable',
            'insulation_fan_w1u1'   => 'nullable',
            'insulation_fan_u1e'    => 'nullable',
            'insulation_fan_v1e'    => 'nullable',
            'insulation_fan_w1e'    => 'nullable',
    
    
            //AIR DRYER
            'Type'          => 'nullable',
            'dryer_maker'   => 'nullable',
            'dryer_model'   => 'nullable',
            'dryer_sn'      => 'nullable',
            'dryer_dew'     => 'nullable',
            'dryer_inlet'   => 'nullable',
    
            //FILTER
            'filter_maker'          => 'nullable',
            'filter_comment_1'      => 'nullable',
            'filter_comment_2'      => 'nullable',
            'filter_comment_3'      => 'nullable',
            'filter_replacement_1'  => 'nullable',
            'filter_replacement_2'  => 'nullable',
            'filter_replacement_3'  => 'nullable',
    
            //COMMENTS
            'comment_compressor_normal'     => 'nullable',
            'comment_compressor_abnormal'   => 'nullable',
    
        ]);
    
        $Service = new Service();
        $Servicedetails = new Servicedetails();
    
        if ($oil_type == 2)
        {
            $Data_oil_free = $request -> validate([
    
                //RUNNING OIL FREE
                'running_oil_temp'             => 'nullable',
                'running_oil_pressure'         => 'nullable',
                'running_1st_dis_temp'         => 'nullable',
                'running_1st_dis_pressure'     => 'nullable',
                'running_2nd_suc_temp'         => 'nullable',
                'running_2nd_dis_pressure'     => 'nullable',
                'running_2nd_dis_temp'         => 'nullable',
                'running_signal'               => 'nullable',
                'running_suction_pressure'     => 'nullable',
                'running_load'                 => 'nullable',
                'running_ambient_temp'         => 'nullable',
                'running_count'                => 'nullable',
                'running_pt5_pressure'         => 'nullable',
                'running_load_hour'            => 'nullable',
                'running_current'              => 'nullable',
                'running_hourmeter_check'      => 'nullable',
                'running_tc_temp'              => 'nullable',
                'running_load_count'           => 'nullable',
           
    
                //CHECK FUNCTIONS
                'functions_monitor'         => 'nullable',
                'functions_battery'         => 'nullable',
                'functions_sensor'          => 'nullable',
                'functions_ocr'             => 'nullable',
                'functions_timer'           => 'nullable',
                'functions_valve_operate'   => 'nullable',
                'functions_thermal'         => 'nullable',
                'functions_magnetic'        => 'nullable',
                'functions_presssensor'     => 'nullable',
                'functions_tempsensor'      => 'nullable',
                'functions_flowswitch'      => 'nullable',
                'dischargev/v'              => 'nullable',
    
                //MAINTENANCE
                'maint_suction1'              => 'nullable',
                'maint_oilfiter1'             => 'nullable',
                'maint_oil1'                  => 'nullable',
                'maint_oilseparator1'         => 'nullable',
                'maint_drainseparator1'       => 'nullable',
                'maint_motorgrease1'          => 'nullable',
                'maint_solenoid1'             => 'nullable',
                'maint_shuttle1'              => 'nullable',
                'maint_capacityvav1'          => 'nullable',
                'maint_discharge_silenser1'   => 'nullable',
                'maint_oillevel1'             => 'nullable',
                'maint_intercooler1'          => 'nullable',
                'maint_aftercooler1'          => 'nullable',
                'maint_oilcooler1'            => 'nullable',
                'maint_mainmotor1'            => 'nullable',
                'maint_oilseal1'              => 'nullable',
                'maint_fanmotor1'             => 'nullable',
                'maint_oilpump1'              => 'nullable',
                'maint_1st_air1'              => 'nullable',
                'maint_2nd_air1'              => 'nullable',
                'maint_bearingmotor1'         => 'nullable',
                'maint_gauge1'                => 'nullable',
                'maint_magnetic1'             => 'nullable',
                'maint_sensor1'               => 'nullable',
                'maint_maininv1'              => 'nullable',
                'maint_faninv1'               => 'nullable',
                'maint_leakage1'              => 'nullable',
            ]);
    
          
            $Service -> machine_id = $Id;
            $Service -> service_idx = $countPlusOne;
            $Servicedetails = new $Servicedetails();
    
            //RUNNING CONDITION1
            $Servicedetails -> running_oil_temp           = $Data_oil_free['running_oil_temp'] ?? null;
            $Servicedetails -> running_oil_pressure       = $Data_oil_free['running_oil_pressure'] ?? null;
            $Servicedetails -> running_1st_dis_temp       = $Data_oil_free['running_1st_dis_temp'] ?? null;
            $Servicedetails -> running_1st_dis_pressure   = $Data_oil_free['running_1st_dis_pressure'] ?? null;
            $Servicedetails -> running_2nd_suc_temp       = $Data_oil_free['running_2nd_suc_temp'] ?? null;
            $Servicedetails -> running_2nd_dis_pressure   = $Data_oil_free['running_2nd_dis_pressure'] ?? null;
            $Servicedetails -> running_2nd_dis_temp       = $Data_oil_free['running_2nd_dis_temp'] ?? null;
            $Servicedetails -> running_signal             = $Data_oil_free['running_signal'] ?? null;
            $Servicedetails -> running_suction_pressure   = $Data_oil_free['running_suction_pressure'] ?? null;
            $Servicedetails -> running_load               = $Data_oil_free['running_load'] ?? null;
            $Servicedetails -> running_ambient_temp       = $Data_oil_free['running_ambient_temp'] ?? null;
            $Servicedetails -> running_count              = $Data_oil_free['running_count'] ?? null;
            $Servicedetails -> running_pt5_pressure       = $Data_oil_free['running_pt5_pressure'] ?? null;
            $Servicedetails -> running_load_hour          = $Data_oil_free['running_load_hour'] ?? null;
            $Servicedetails -> running_current            = $Data_oil_free['running_current'] ?? null;
            $Servicedetails -> running_hourmeter_check    = $Data_oil_free['running_hourmeter_check'] ?? null;
            $Servicedetails -> running_tc_temp            = $Data_oil_free['running_tc_temp'] ?? null;
            $Servicedetails -> running_load_count         = $Data_oil_free['running_load_count'] ?? null;
    
            //CHECK FUNCTIONS
            $Servicedetails -> functions_monitor          = $Data_oil_free['functions_monitor'] ?? null;
            $Servicedetails -> functions_battery          = $Data_oil_free['functions_battery'] ?? null;
            $Servicedetails -> functions_sensor           = $Data_oil_free['functions_sensor'] ?? null;
            $Servicedetails -> functions_ocr              = $Data_oil_free['functions_ocr'] ?? null;
            $Servicedetails -> functions_timer            = $Data_oil_free['functions_timer'] ?? null;
            $Servicedetails -> functions_valve_operate    = $Data_oil_free['functions_valve_operate'] ?? null;
            $Servicedetails -> functions_thermal          = $Data_oil_free['functions_thermal'] ?? null;
            $Servicedetails -> functions_magnetic         = $Data_oil_free['functions_magnetic'] ?? null;
            $Servicedetails -> functions_presssensor      = $Data_oil_free['functions_presssensor'] ?? null;
            $Servicedetails -> functions_tempsensor       = $Data_oil_free['functions_tempsensor'] ?? null;
            $Servicedetails -> functions_flowswitch       = $Data_oil_free['functions_flowswitch'] ?? null;
            $Servicedetails -> functions_discharge        = $Data_oil_free['dischargev/v'] ?? null;
    
    
            $Servicedetails -> maint_suction              = $Data_oil_free['maint_suction1'] ?? null;
            $Servicedetails -> maint_oilfiter             = $Data_oil_free['maint_oilfiter1'] ?? null;
            $Servicedetails -> maint_oil                  = $Data_oil_free['maint_oil1'] ?? null;
            $Servicedetails -> maint_oilseparator         = $Data_oil_free['maint_oilseparator1'] ?? null;
            $Servicedetails -> maint_drainseparator       = $Data_oil_free['maint_drainseparator1'] ?? null;
            $Servicedetails -> maint_motorgrease          = $Data_oil_free['maint_motorgrease1'] ?? null;
            $Servicedetails -> maint_solenoid             = $Data_oil_free['maint_solenoid1'] ?? null;
            $Servicedetails -> maint_shuttle              = $Data_oil_free['maint_shuttle1'] ?? null;
            $Servicedetails -> maint_capacityvav          = $Data_oil_free['maint_capacityvav1'] ?? null;
            $Servicedetails -> maint_discharge_silenser   = $Data_oil_free['maint_discharge_silenser1'] ?? null;
            $Servicedetails -> maint_oillevel             = $Data_oil_free['maint_oillevel1'] ?? null;
            $Servicedetails -> maint_intercooler          = $Data_oil_free['maint_intercooler1'] ?? null;
            $Servicedetails -> maint_aftercooler          = $Data_oil_free['maint_aftercooler1'] ?? null;
            $Servicedetails -> maint_oilcooler            = $Data_oil_free['maint_oilcooler1'] ?? null;
            $Servicedetails -> maint_mainmotor            = $Data_oil_free['maint_mainmotor1'] ?? null;
            $Servicedetails -> maint_oilseal              = $Data_oil_free['maint_oilseal1'] ?? null;
            $Servicedetails -> maint_fanmotor             = $Data_oil_free['maint_fanmotor1'] ?? null;
            $Servicedetails -> maint_oilpump              = $Data_oil_free['maint_oilpump1'] ?? null;
            $Servicedetails -> maint_1st_air              = $Data_oil_free['maint_1st_air1'] ?? null;
            $Servicedetails -> maint_2nd_air              = $Data_oil_free['maint_2nd_air1'] ?? null;
            $Servicedetails -> maint_bearingmotor         = $Data_oil_free['maint_bearingmotor1'] ?? null;
            $Servicedetails -> maint_gauge                = $Data_oil_free['maint_gauge1'] ?? null;
            $Servicedetails -> maint_magnetic             = $Data_oil_free['maint_magnetic1'] ?? null;
            $Servicedetails -> maint_sensor               = $Data_oil_free['maint_sensor1'] ?? null;
            $Servicedetails -> maint_maininv              = $Data_oil_free['maint_maininv1'] ?? null;
            $Servicedetails -> maint_faninv               = $Data_oil_free['maint_faninv1'] ?? null;
            $Servicedetails -> maint_leakage              = $Data_oil_free['maint_leakage1'] ?? null;
    
    
        } elseif($oil_type == 1) {
            $Data_oil_flood = $request -> validate([
                //RUNNING OIL FLOOD
                'running_air_pressure_load'     => 'nullable',
                'running_air_pressure_unload'   => 'nullable',
                'running_air_pressure_normal'   => 'nullable',
                'running_os_pressure'           => 'nullable',
                'running_load'                  => 'nullable',
                'running_air_temp_load'         => 'nullable',
                'running_air_temp_unload'       => 'nullable',
                'running_hourmeter_check'       => 'nullable',
                'running_current_load'          => 'nullable',
                'running_current_unload'        => 'nullable',
                'running_os_temp'               => 'nullable',
                'running_ambient_temp'          => 'nullable',
                'running_tc_temp'               => 'nullable',
                'running_load_count'            => 'nullable',
                'running_load_hour'             => 'nullable',
                'running_count'                 => 'nullable',
                'running_suction_pressure'      => 'nullable',
    
    
                //CHECK FUNCTIONS
                'functions_monitor'         => 'nullable',
                'functions_battery'         => 'nullable',
                'functions_sensor'          => 'nullable',
                'functions_ocr'             => 'nullable',
                'functions_timer'           => 'nullable',
                'functions_valve_blow'      => 'nullable',
                'functions_valve_operate'   => 'nullable',
                'functions_thermal'         => 'nullable',
                'functions_magnetic'        => 'nullable',
                'functions_presssensor'     => 'nullable',
                'functions_tempsensor'      => 'nullable',
                'functions_flowswitch'      => 'nullable',
                'functions_discharge'       => 'nullable',
                'functions_valve_open'      => 'nullable',
    
                //MAINTENANCE
                'maint_suction1'              => 'nullable',
                'maint_oilfiter1'             => 'nullable',
                'maint_oil1'                  => 'nullable',
                'maint_oilseparator1'         => 'nullable',
                'maint_drainseparator1'       => 'nullable',
                'maint_motorgrease1'          => 'nullable',
                'maint_autoblowoff1'          => 'nullable',
                'maint_capacityvav1'          => 'nullable',
                'maint_presscontvav1'         => 'nullable',
                'maint_presskeepvav1'         => 'nullable',
                'maint_thermovav1'            => 'nullable',
                'maint_oillevel1'             => 'nullable',
                'maint_oilrecovery1'          => 'nullable',
                'maint_belt'                  => 'nullable',
                'maint_aftercooler1'          => 'nullable',
                'maint_oilcooler1'            => 'nullable',
                'maint_mainmotor1'            => 'nullable',
                'maint_oilseal1'              => 'nullable',
                'maint_fanmotor1'             => 'nullable',
                'maint_airend1'               => 'nullable',
                'maint_bearingair1'           => 'nullable',
                'maint_bearingmotor1'         => 'nullable',
                'maint_gauge1'                => 'nullable',
                'maint_magnetic1'             => 'nullable',
                'maint_sensor1'               => 'nullable',
                'maint_maininv1'              => 'nullable',
                'maint_faninv1'               => 'nullable',
                'maint_leakage1'              => 'nullable',
            ]);
    
            $Servicedetails = new $Servicedetails();
    
            //RUNNING OIL FLOOD
            $Servicedetails -> running_air_pressure_load        = $Data_oil_flood['running_air_pressure_load'] ?? null;
            $Servicedetails -> running_air_pressure_unload      = $Data_oil_flood['running_air_pressure_unload'] ?? null;
            $Servicedetails -> running_air_pressure_normal      = $Data_oil_flood['running_air_pressure_normal'] ?? null;
            $Servicedetails -> running_os_pressure              = $Data_oil_flood['running_os_pressure'] ?? null;
            $Servicedetails -> running_load                     = $Data_oil_flood['running_load'] ?? null;
            $Servicedetails -> running_air_temp_load            = $Data_oil_flood['running_air_temp_load'] ?? null;
            $Servicedetails -> running_air_temp_unload          = $Data_oil_flood['running_air_temp_unload'] ?? null;
            $Servicedetails -> running_hourmeter_check          = $Data_oil_flood['running_hourmeter_check'] ?? null;
            $Servicedetails -> running_current_load             = $Data_oil_flood['running_current_load'] ?? null;
            $Servicedetails -> running_current_unload           = $Data_oil_flood['running_current_unload'] ?? null;
            $Servicedetails -> running_os_temp                  = $Data_oil_flood['running_os_temp'] ?? null;
            $Servicedetails -> running_ambient_temp             = $Data_oil_flood['running_ambient_temp'] ?? null;
            $Servicedetails -> running_tc_temp                  = $Data_oil_flood['running_tc_temp'] ?? null;
            $Servicedetails -> running_load_count               = $Data_oil_flood['running_load_count'] ?? null;
            $Servicedetails -> running_load_hour                = $Data_oil_flood['running_load_hour'] ?? null;
            $Servicedetails -> running_count                    = $Data_oil_flood['running_count'] ?? null;
            $Servicedetails -> running_suction_pressure         = $Data_oil_flood['running_suction_pressure'] ?? null;
            
    
            //CHECK FUNCTIONS
            $Servicedetails -> functions_monitor          = $Data_oil_flood['functions_monitor'] ?? null;
            $Servicedetails -> functions_battery          = $Data_oil_flood['functions_battery'] ?? null;
            $Servicedetails -> functions_sensor           = $Data_oil_flood['functions_sensor'] ?? null;
            $Servicedetails -> functions_ocr              = $Data_oil_flood['functions_ocr'] ?? null;
            $Servicedetails -> functions_timer            = $Data_oil_flood['functions_timer'] ?? null;
            $Servicedetails -> functions_valve_open       = $Data_oil_flood['functions_valve_open'] ?? null;
            $Servicedetails -> functions_valve_blow       = $Data_oil_flood['functions_valve_blow'] ?? null;
            $Servicedetails -> functions_valve_operate    = $Data_oil_flood['functions_valve_operate'] ?? null;
            $Servicedetails -> functions_thermal          = $Data_oil_flood['functions_thermal'] ?? null;
            $Servicedetails -> functions_magnetic         = $Data_oil_flood['functions_magnetic'] ?? null;
            $Servicedetails -> functions_presssensor      = $Data_oil_flood['functions_presssensor'] ?? null;
            $Servicedetails -> functions_tempsensor       = $Data_oil_flood['functions_tempsensor'] ?? null;
            $Servicedetails -> functions_flowswitch       = $Data_oil_flood['functions_flowswitch'] ?? null;
            $Servicedetails -> functions_discharge        = $Data_oil_flood['functions_discharge'] ?? null;
    
    
            $Servicedetails -> maint_suction              = $Data_oil_flood['maint_suction1'] ?? null ;
            $Servicedetails -> maint_oilfiter             = $Data_oil_flood['maint_oilfiter1'] ?? null ;
            $Servicedetails -> maint_oil                  = $Data_oil_flood['maint_oil1'] ?? null ;
            $Servicedetails -> maint_oilseparator         = $Data_oil_flood['maint_oilseparator1'] ?? null ;
            $Servicedetails -> maint_drainseparator       = $Data_oil_flood['maint_drainseparator1' ] ?? null ;
            $Servicedetails -> maint_motorgrease          = $Data_oil_flood['maint_motorgrease1'] ?? null ;
            $Servicedetails -> maint_autoblowoff          = $Data_oil_flood['maint_autoblowoff1'] ?? null ;
            $Servicedetails -> maint_capacityvav          = $Data_oil_flood['maint_capacityvav1'] ?? null ;
            $Servicedetails -> maint_presscontvav         = $Data_oil_flood['maint_presscontvav1'] ?? null ;
            $Servicedetails -> maint_presskeepvav         = $Data_oil_flood['maint_presskeepvav1'] ?? null ;
            $Servicedetails -> maint_thermovav            = $Data_oil_flood['maint_thermovav1'] ?? null ;
            $Servicedetails -> maint_oillevel             = $Data_oil_flood['maint_oillevel1'] ?? null ;
            $Servicedetails -> maint_oilrecovery          = $Data_oil_flood['maint_oilrecovery1'] ?? null ;
            $Servicedetails -> maint_belt                 = $Data_oil_flood['maint_belt'] ?? null ;
            $Servicedetails -> maint_aftercooler          = $Data_oil_flood['maint_aftercooler1'] ?? null ;
            $Servicedetails -> maint_oilcooler            = $Data_oil_flood['maint_oilcooler1'] ?? null ;
            $Servicedetails -> maint_mainmotor            = $Data_oil_flood['maint_mainmotor1'] ?? null ;
            $Servicedetails -> maint_oilseal              = $Data_oil_flood['maint_oilseal1'] ?? null ;
            $Servicedetails -> maint_fanmotor             = $Data_oil_flood['maint_fanmotor1'] ?? null ;
            $Servicedetails -> maint_airend               = $Data_oil_flood['maint_airend1'] ?? null ;
            $Servicedetails -> maint_bearingair           = $Data_oil_flood['maint_bearingair1'] ?? null ;
            $Servicedetails -> maint_bearingmotor         = $Data_oil_flood['maint_bearingmotor1'] ?? null ;
            $Servicedetails -> maint_gauge                = $Data_oil_flood['maint_gauge1'] ?? null ;
            $Servicedetails -> maint_magnetic             = $Data_oil_flood['maint_magnetic1'] ?? null ;
            $Servicedetails -> maint_sensor               = $Data_oil_flood['maint_sensor1'] ?? null ;
            $Servicedetails -> maint_maininv              = $Data_oil_flood['maint_maininv1'] ?? null ;
            $Servicedetails -> maint_faninv               = $Data_oil_flood['maint_faninv1'] ?? null ;
            $Servicedetails -> maint_leakage              = $Data_oil_flood['maint_leakage1'] ?? null ;
    
        }
    
    
       
        $Service -> machine_id    = $Id;
        $Service -> service_idx   = $countPlusOne;
        $Service -> service_dt    = $validatedData['service_dt'];
        $Service -> customer_pic  = $validatedData['customer_pic'];
        $Service -> service_performer  = $validatedData['service_performer'];
        $Service -> running_hours = $validatedData['running_hours'];
        $Service -> service_id    = $validatedData['service_id_Content'];
        // $Service->last_in_version = $validatedData['change_panel'];
        $Service -> panel_version    = $request -> panel_version;
        $Service -> remarks       = $validatedData['remarks'];
    
        $Service -> save();
        $serviceId = $Service -> id;
    
     
    
        $Servicedetails -> service_id = $serviceId;
        $Servicedetails -> report_no = $validatedData['report_no'];
    
    
        //Ventilation
        $Servicedetails -> site_ventilation             = $validatedData['site_ventilation'] ?? null;
        $Servicedetails -> site_roomtemp                = $validatedData['site_roomtemp'];
        $Servicedetails -> site_cooling_temp_in         = $validatedData['site_cooling_temp_in'];
        $Servicedetails -> site_cooling_temp_out        = $validatedData['site_cooling_temp_out'];
        $Servicedetails -> site_cooling_pressure_in     = $validatedData['site_cooling_pressure_in'];
        $Servicedetails -> site_cooling_pressure_out    = $validatedData['site_cooling_pressure_out'];
    
        //SERVICE CONTENT (Detail)
        $Servicedetails -> detail_motor                 = $validatedData['detail_motor'] ?? null;
        $Servicedetails -> detail_cooler                = $validatedData['detail_cooler'] ?? null;
        $Servicedetails -> detail_topup                 = $validatedData['detail_topup'] ?? null;
        $Servicedetails -> detail_topup_liters          = $validatedData['detail_topup_liters'] ?? null;
        $Servicedetails -> detail_replace               = $validatedData['detail_replace'] ?? null;
        $Servicedetails -> detail_replace_brand         = $validatedData['detail_replace_brand'] ?? null;
        $Servicedetails -> detail_overhaul_air          = $validatedData['detail_overhaul_air'] ?? null;
        $Servicedetails -> detail_overhaul_motor        = $validatedData['detail_overhaul_motor'] ?? null;
        $Servicedetails -> detail_rewind                = $validatedData['detail_rewind'] ?? null;
        $Servicedetails -> detail_3000                  = $validatedData['detail_3000'] ?? null;
        $Servicedetails -> detail_6000                  = $validatedData['detail_6000'] ?? null;
        $Servicedetails -> detail_12000                 = $validatedData['detail_12000'] ?? null;
        $Servicedetails -> detail_other                 = $validatedData['detail_other'] ?? null;
    
    
    
        //MACHINE SETTING
        $Servicedetails -> setting_operation_local    = $validatedData['setting_operation_local'] ?? null;
        $Servicedetails -> setting_operation_run_on   = $validatedData['setting_operation_run_on'] ?? null;
        $Servicedetails -> setting_operation_run_load = $validatedData['setting_operation_run_load'] ?? null;
        $Servicedetails -> setting_group_link         = $validatedData['setting_group_link'] ?? null;
        $Servicedetails -> setting_group_panel        = $validatedData['setting_group_panel'] ?? null;
        $Servicedetails -> setting_op_load            = $validatedData['setting_op_load'] ?? null;
        $Servicedetails -> setting_op_unload          = $validatedData['setting_op_unload'] ?? null;
        $Servicedetails -> setting_op_auto            = $validatedData['setting_op_auto'] ?? null;
        $Servicedetails -> setting_op_constant        = $validatedData['setting_op_constant'] ?? null;
        $Servicedetails -> setting_phh                = $validatedData['setting_phh'] ?? null;
        $Servicedetails -> setting_phl                = $validatedData['setting_phl'] ?? null;
        $Servicedetails -> setting_ph                 = $validatedData['setting_ph'] ?? null;
        $Servicedetails -> setting_pl                 = $validatedData['setting_pl'] ?? null;
        $Servicedetails -> setting_pll                = $validatedData['setting_pll'] ?? null;
    
        //MEASUREMENT
        $Servicedetails -> meas_voltage_rs_on         = $validatedData['meas_voltage_rs_on'];
        $Servicedetails -> meas_voltage_rs_off        = $validatedData['meas_voltage_rs_off'];
        $Servicedetails -> meas_voltage_st_on         = $validatedData['meas_voltage_st_on'];
        $Servicedetails -> meas_voltage_st_off        = $validatedData['meas_voltage_st_off'];
        $Servicedetails -> meas_voltage_tr_on         = $validatedData['meas_voltage_tr_on'];
        $Servicedetails -> meas_voltage_tr_off        = $validatedData['meas_voltage_tr_off'];
        $Servicedetails -> meas_input_r_load          = $validatedData['meas_input_r_load'];
        $Servicedetails -> meas_input_r_unload        = $validatedData['meas_input_r_unload'];
        $Servicedetails -> meas_input_s_load          = $validatedData['meas_input_s_load'];
        $Servicedetails -> meas_input_s_unload        = $validatedData['meas_input_s_unload'];
        $Servicedetails -> meas_input_t_load          = $validatedData['meas_input_t_load'];
        $Servicedetails -> meas_input_t_unload        = $validatedData['meas_input_t_unload'];
        $Servicedetails -> meas_motor_u_load          = $validatedData['meas_motor_u_load'];
        $Servicedetails -> meas_motor_u_unload        = $validatedData['meas_motor_u_unload'];
        $Servicedetails -> meas_motor_v_load          = $validatedData['meas_motor_v_load'];
        $Servicedetails -> meas_motor_v_unload        = $validatedData['meas_motor_v_unload'];
        $Servicedetails -> meas_motor_w_load          = $validatedData['meas_motor_w_load'];
        $Servicedetails -> meas_motor_w_unload        = $validatedData['meas_motor_w_unload'];
        $Servicedetails -> meas_pipetemp              = $validatedData['meas_pipetemp'];
    
    
    
        //INSULATION TEST
        $Servicedetails -> insulation_main_u1v1       = $validatedData['insulation_main_u1v1'];
        $Servicedetails -> insulation_main_v1w1       = $validatedData['insulation_main_v1w1'];
        $Servicedetails -> insulation_main_w1u1       = $validatedData['insulation_main_w1u1'];
        $Servicedetails -> insulation_main_u1u2       = $validatedData['insulation_main_u1u2'];
        $Servicedetails -> insulation_main_v1v2       = $validatedData['insulation_main_v1v2'];
        $Servicedetails -> insulation_main_w1w2       = $validatedData['insulation_main_w1w2'];
        $Servicedetails -> insulation_main_u1e        = $validatedData['insulation_main_u1e'];
        $Servicedetails -> insulation_main_v1e        = $validatedData['insulation_main_v1e'];
        $Servicedetails -> insulation_main_w1e        = $validatedData['insulation_main_w1e'];
        $Servicedetails -> insulation_fan_u1v1        = $validatedData['insulation_fan_u1v1'];
        $Servicedetails -> insulation_fan_v1w1        = $validatedData['insulation_fan_v1w1'];
        $Servicedetails -> insulation_fan_w1u1        = $validatedData['insulation_fan_w1u1'];
        $Servicedetails -> insulation_fan_u1e         = $validatedData['insulation_fan_u1e'];
        $Servicedetails -> insulation_fan_v1e         = $validatedData['insulation_fan_v1e'] ?? null;
        $Servicedetails -> insulation_fan_w1e         = $validatedData['insulation_fan_w1e'];
    
        //AIR DRYER
        $Servicedetails -> dryer_type                 = $validatedData['Type'] ?? null;
        $Servicedetails -> dryer_maker                = $validatedData['dryer_maker'] ?? null;
        $Servicedetails -> dryer_model                = $validatedData['dryer_model'] ?? null;
        $Servicedetails -> dryer_sn                   = $validatedData['dryer_sn'] ?? null;
        $Servicedetails -> dryer_dew                  = $validatedData['dryer_dew'] ?? null;
        $Servicedetails -> dryer_inlet                = $validatedData['dryer_inlet'] ?? null;
    
        //FILTER
        $Servicedetails -> filter_maker               = $validatedData['filter_maker'] ?? null;
        $Servicedetails -> filter_comment_1           = $validatedData['filter_comment_1'] ?? null;
        $Servicedetails -> filter_comment_2           = $validatedData['filter_comment_2'] ?? null;
        $Servicedetails -> filter_comment_3           = $validatedData['filter_comment_3'] ?? null;
        $Servicedetails -> filter_replacement_1       = $validatedData['filter_replacement_1'] ?? null;
        $Servicedetails -> filter_replacement_2       = $validatedData['filter_replacement_2'] ?? null;
        $Servicedetails -> filter_replacement_3       = $validatedData['filter_replacement_3'] ?? null;
        //MAINTENANCE
    
        $Servicedetails -> comment_compressor_normal      = $validatedData['comment_compressor_normal'] ?? null;
        $Servicedetails -> comment_compressor_abnormal    = $validatedData['comment_compressor_abnormal'] ?? null;
    
       
        $Servicedetails -> save();

        $ServicedetailsId = $Servicedetails->id;

        $result =  DB::table('machines')
        ->select(
            'machines.*',
            'servicedetails.*',
            'services.*',
            'services.service_id AS service_content',
            'services.service_dt AS service_dt',
            'services.service_idx AS service_idx',
            'customers.customer_name1 AS customer_name1',
            'customers.address1 AS address1',
            'companies.company_name AS company_name',
            'companies.company_short_name AS company_short_name',
            'companies.company_name AS company_name'

        )
        ->leftJoin('services', 'machines.id', '=', 'services.machine_id')
        ->leftJoin('servicedetails', 'services.id', '=', 'servicedetails.service_id')
        ->leftJoin('customers', 'machines.customer_id', '=', 'customers.id')
        ->leftJoin('companies', 'machines.service_factory_id', '=', 'companies.id')

        ->where('servicedetails.id',$ServicedetailsId)
        ->get(); // ระบุคอลัมน์ที่ต้องกา
       
        $dateshow = $result[0];

        
       

       
       
        if ($oil_type == 1) {
            session(['key' => $dateshow]);
            return redirect()->route('show_oil_flood')->with('success', 'Update successfully.');
        
 
        } 
        elseif  ($oil_type == 2) {
            session(['key' => $dateshow]);
            return redirect()->route('show_oil_free')->with('success', 'Update successfully.');
        }

        
    
    }
    
    public function update_history(Request $request, $Id,$machine_id,$service_idx) {

        $service = service::find($Id);

        $service -> service_dt      = $request->service_dt;
        $service -> customer_pic    = $request->customer_pic;
        $service -> service_performer  = $request->service_performer;
        $service -> running_hours   = $request->running_hours;
        $service -> service_id      = $request->service_id_Content;
        $service -> panel_version   = $request->panel_version;
        $service -> remarks         = $request->remarks;
    
        $service->save();

        $result =  DB::table('machines')
        ->select(
            'machines.*',
            'servicedetails.*',
            'services.*',
            'services.service_id AS service_content',
            'services.service_dt AS service_dt',
            'services.service_idx AS service_idx',
            'customers.customer_name1 AS customer_name1',
            'customers.address1 AS address1',
            'companies.company_name AS company_name',
            'companies.company_short_name AS company_short_name',
            'companies.company_name AS company_name'

        )
        ->leftJoin('services', 'machines.id', '=', 'services.machine_id')
        ->leftJoin('servicedetails', 'services.id', '=', 'servicedetails.service_id')
        ->leftJoin('customers', 'machines.customer_id', '=', 'customers.id')
        ->leftJoin('companies', 'machines.service_factory_id', '=', 'companies.id')

        ->where('servicedetails.service_id',$Id)
        ->get(); // ระบุคอลัมน์ที่ต้องกา
       
        $dateshow = $result[0];
       

            session(['key' => $dateshow]);
            return redirect()->route('show_oil_free')->with('success', 'Update successfully.');
        
 
    
    }

       
    public function  show_oil_flood(Request $request) {

        $key = session('key');        
        return view('pages.dashboards.service.show_oil_flood', ['key' => $key])->with('success', 'Update successfully.');

    }

    public function show_oil_free(Request $request) {
        $key = session('key');
    
        return view('pages.dashboards.service.show_oil_free', ['key' => $key])->with('success', 'Update successfully.');
    }

    public function  show_history($Id) {

        $result =  DB::table('machines')
        ->select(
            'machines.*',
            'servicedetails.*',
            'services.*',
            'services.service_id AS service_content',
            'services.service_dt AS service_dt',
            'services.service_idx AS service_idx',
            'customers.customer_name1 AS customer_name1',
            'customers.address1 AS address1',
            'companies.company_name AS company_name',
            'companies.company_short_name AS company_short_name',
            'companies.company_name AS company_name'

        )
        ->leftJoin('services', 'machines.id', '=', 'services.machine_id')
        ->leftJoin('servicedetails', 'services.id', '=', 'servicedetails.service_id')
        ->leftJoin('customers', 'machines.customer_id', '=', 'customers.id')
        ->leftJoin('companies', 'machines.service_factory_id', '=', 'companies.id')

        ->where('servicedetails.service_id',$Id)
        ->get(); 
       
        $dateshow = $result[0];
       

        $key =   $dateshow ;        
        return view('pages.dashboards.service.show_oil_flood', ['key' => $key])->with('success', 'Update successfully.');

    }


    function history(Request $request) {

      
        $id =$request->machine_id;

        $data =   DB::table('machines')
        ->leftJoin('customers', 'machines.customer_id', '=', 'customers.id')
        ->leftJoin('companies', 'machines.service_factory_id', '=', 'companies.id')
        ->where('machines.id', $id)
        ->first('*');
     

        $result = DB::table('services')
        ->select(
            'companies.*',
            'services.*',
            'services.id AS id'

        )
        ->leftJoin('companies', 'services.service_factory_id', '=', 'companies.id')
        ->where('services.machine_id', $id)
        ->paginate(10);

      
        
    //   dd($result);
        return view('pages.dashboards.service.history', ['key' => $result, 'data' => $data, 'id' => $id]);
    }

    public function edit_oil_flood($Id , $Machineid) {

       
        $keyValue = $Machineid;
        
        $ServicedetailsId =  $keyValue;
        $result =  DB::table('machines')
        ->select(
            'machines.*',
            'servicedetails.*',
            'services.*',
            'services.service_id AS service_content',
            'services.service_dt AS service_dt',
            'services.service_idx AS service_idx',
            'customers.customer_name1 AS customer_name1',
            'customers.address1 AS address1',
            'companies.company_name AS company_name',
            'companies.company_short_name AS company_short_name',
            'companies.company_name AS company_name'

        )
        ->leftJoin('services', 'machines.id', '=', 'services.machine_id')
        ->leftJoin('servicedetails', 'services.id', '=', 'servicedetails.service_id')
        ->leftJoin('customers', 'machines.customer_id', '=', 'customers.id')
        ->leftJoin('companies', 'machines.service_factory_id', '=', 'companies.id')

        ->where('services.id',$ServicedetailsId)
        ->get(); // ระบุคอลัมน์ที่ต้องกา
       
        $dateshow = $result[0];
      
    
        return view('pages.dashboards.service.edit_oil_flood',['key' => $dateshow])->with('success', 'User created successfully.');
    }

    public function edit_oil_free($Id , $Machineid) {
        $keyValue = $Machineid;
        
        $ServicedetailsId =  $keyValue;
        $result =  DB::table('machines')
        ->select(
            'machines.*',
            'servicedetails.*',
            'services.*',
            'services.service_id AS service_content',
            'services.service_dt AS service_dt',
            'services.service_idx AS service_idx',
            'customers.customer_name1 AS customer_name1',
            'customers.address1 AS address1',
            'companies.company_name AS company_name',
            'companies.company_short_name AS company_short_name',
            'companies.company_name AS company_name'

        )
        ->leftJoin('services', 'machines.id', '=', 'services.machine_id')
        ->leftJoin('servicedetails', 'services.id', '=', 'servicedetails.service_id')
        ->leftJoin('customers', 'machines.customer_id', '=', 'customers.id')
        ->leftJoin('companies', 'machines.service_factory_id', '=', 'companies.id')

        ->where('services.id',$ServicedetailsId)
        ->get(); // ระบุคอลัมน์ที่ต้องกา
       
        $dateshow = $result[0];

        return view('pages.dashboards.service.edit_oil_free',['key' => $dateshow])->with('success', 'User created successfully.');
    }

    

}