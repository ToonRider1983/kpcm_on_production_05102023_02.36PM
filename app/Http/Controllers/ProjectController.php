<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
class ProjectController extends Controller
{
    public function index(Request $request)
    {
        //Search TextBox
        $projects = DB::table('projects as pj')->orderBy('id');
        $company = DB::table('companies')->whereNull('companies.deleted_at')->orderBy('company_short_name', 'asc')->get();
        $customer = DB::table('customers')->whereNull('customers.deleted_at')->get();
        $country = DB::table('countries')->whereNull('countries.deleted_at')->get();
        $machinetype = DB::table('machinetype1s')->whereNull('machinetype1s.deleted_at')->get();
        $machinemodel = DB::table('machinemodels')->whereNull('machinemodels.deleted_at')->get();
        $industrialzone = DB::table('industrialzones')->whereNull('industrialzones.deleted_at')->get();
        $fromDateC = $request->input('from_datec');
        $toDateC = $request->input('to_datec');
        $fromDateU = $request->input('from_dateu');
        $toDateU = $request->input('to_dateu');
     
        $projects = $projects->select(
            'pj.*',
            'mm1.machinemodel_name as Mc_name1',
            'mm2.machinemodel_name as Mc_name2',
            'mm3.machinemodel_name as Mc_name3',
            'countries.country_name as Ct_name',
            'industrialzones.industrialzone_name as idz_name',
            'companies.company_short_name as Cpns_name ',
            'customers.customer_cd as cus_cd',     
            'orcm1.origin_country_id  as origincountry_name1',
            'orcm2.origin_country_id  as origincountry_name2',
            'orcm3.origin_country_id  as origincountry_name3',
            // 'oitm1.oil_type as oiltype_name1',
            // 'oitm2.oil_type as oiltype_name2',
            // 'oitm3.oil_type as oiltype_name3',
            'pj.status as status_name',
            'pj.possibility as possibility_name',
            'pj.result as result_name',
            'pj.created_at',
            'pj.updated_at'
             )
            ->leftJoin('companies', 'pj.distributor_id', '=', 'companies.id')
            ->leftJoin('customers', 'pj.customer_id', '=', 'customers.id')
            ->leftJoin('industrialzones', 'pj.industrialzone_id', '=', 'industrialzones.id')
            ->leftJoin('machinemodels as mm1', 'pj.machinemodel1_id', '=', 'mm1.id')
            ->leftJoin('machinemodels as mm2', 'pj.machinemodel2_id', '=', 'mm2.id')
            ->leftJoin('machinemodels as mm3', 'pj.machinemodel3_id', '=', 'mm3.id')
            ->leftJoin('countries', 'pj.country_id', '=', 'countries.id')
            ->leftJoin('machinemodels as orcm1','pj.machinemodel1_id','=','orcm1.id')
            ->leftJoin('machinemodels as orcm2','pj.machinemodel2_id','=','orcm2.id')
            ->leftJoin('machinemodels as orcm3','pj.machinemodel3_id','=','orcm3.id')
            ->leftJoin('machinemodels as oitm1','pj.machinemodel1_id','=','oitm1.id')
            ->leftJoin('machinemodels as oitm2','pj.machinemodel2_id','=','oitm2.id')
            ->leftJoin('machinemodels as oitm3','pj.machinemodel3_id','=','oitm3.id')
            ->paginate(10);                
        return view('pages.dashboards.project.index', [
            'projects' => $projects,
            'country' => $country,
            'company' => $company,
            'machinemodel' => $machinemodel,
            'machinetype' => $machinetype,
            'customer' => $customer,
            'industrialzone' => $industrialzone ,
            'from_datec' => $fromDateC,
            'from_dateu' => $fromDateU,
            'to_datec' => $toDateC,
            'to_dateu' => $toDateU,    
            'request' => $request,   
        ]);
    }

    public function result(Request $request)
    {
        
        //Search TextBox
        $projects = Project::sortable()->orderBy('updated_at', 'desc');
        $company = DB::table('companies')->whereNull('companies.deleted_at')->get();
        $customer = DB::table('customers')->whereNull('customers.deleted_at')->get();
        $country = DB::table('countries')->whereNull('countries.deleted_at')->get();
        $machinetype = DB::table('machinetype1s')->whereNull('machinetype1s.deleted_at')->get();
        $machinemodel = DB::table('machinemodels')->whereNull('machinemodels.deleted_at')->get();
        $industrialzone = DB::table('industrialzones')->whereNull('industrialzones.deleted_at')->get();
        $fromDateC = $request->input('from_datec');
        $toDateC = $request->input('to_datec');
        $fromDateU = $request->input('from_dateu');
        $toDateU = $request->input('to_dateu');
        if ($request->company != null) {
            $projects = $projects->where('companies.id', $request->company);
        }
        if ($request->country != null) {
            $projects = $projects->where('countries.country_name', $request->country);
        }
        if ($request->route != null) {
            $projects = $projects->where(function($query) use ($request) {
                $query->where('projects.route1', 'LIKE', '%' . $request->route . '%')
                      ->orWhere('projects.route2', 'LIKE', '%' . $request->route . '%')
                      ->orWhere('projects.route3', 'LIKE', '%' . $request->route . '%');
        });
        }
        if ($request->username != null) {
            $projects = $projects->where('projects.customer_name', 'LIKE', '%' . $request->username . '%');
        }
        if ($request->user_cd != null) {
            $projects = $projects->where('customers.customer_cd', 'LIKE', '%' . $request->user_cd . '%'); //อาจต้องเช็คจาก old_project
        }
        if ($request->pro_id != null) {
            $projects = $projects->where('projects.id',  $request->pro_id ); //อาจต้องเช็คจาก old_project
        }
        if ($request->ref_id != null) {
            $projects = $projects->where('prentid.parent_id',  $request->ref_id ); //อาจต้องเช็คจาก old_project
        }
        if ($request->ref_id != null) {
            $projects = $projects->where('prentid.parent_id',  $request->ref_id ); //อาจต้องเช็คจาก old_project
        }
       if ($request->orc_id != null) {
            $projects = $projects->where('orcm1.origin_country_id',  $request->orc_id ) //อาจต้องเช็คจาก old_project
            -> orWhere('orcm2.origin_country_id',$request->orc_id)
            -> orWhere('orcm3.origin_country_id',$request->orc_id)            
            ;
        }
        if ($request->oil_id != null) {
            $projects = $projects->where('oitm1.oil_type',  $request->oil_id ) //อาจต้องเช็คจาก old_project
            -> orWhere('oitm2.oil_type',$request->oil_id)
            -> orWhere('oitm3.oil_type',$request->oil_id)            
            ;
        }
        // if ($request->machinetype != null) {
        //      $projects = $projects->where('machinetype1s.machinetype1_name',  $request->machinetype ); 
        // }
        if ($request->machinetype != null) {
            $projects = $projects->where('type1.machinetype1_name',  $request->machinetype ) //อาจต้องเช็คจาก old_project
            -> orWhere('type2.machinetype1_name',$request->machinetype)
            -> orWhere('type3.machinetype1_name',$request->machinetype)            
            ;
        }
        if ($request->machinemodel != null) {
            $projects = $projects->where('mm1.machinemodel_name',$request->machinemodel ) //อาจต้องเช็คจาก old_project
            -> orWhere('mm2.machinemodel_name',$request->machinemodel)
            -> orWhere('mm3.machinemodel_name',$request->machinemodel) ;
        }
        if ($request->status != null) {
            $projects = $projects->where('projects.status',  $request->status );//อาจต้องเช็คจาก old_project
        }
        if ($request->result != null) {
            $projects = $projects->where('projects.result',  $request->result ); //อาจต้องเช็คจาก old_project
        }
        if ($request->possibility != null) {
            $projects = $projects->where('projects.possibility',  $request->possibility);//อาจต้องเช็คจาก old_project
        }
        if ($request->filled('from_datec') && $request->filled('to_datec')) {
            $projects = $projects->whereBetween('projects.created_at', [$request->from_datec, $request->to_datec]);//อาจต้องเช็คจาก old_project
        }
        if ($request->filled('from_dateu') && $request->filled('to_dateu')) {
            $projects = $projects->whereBetween('projects.updated_at', [$request->from_dateu, $request->to_dateu]);//อาจต้องเช็คจาก old_project
        }

        $projects = $projects->select(
            'projects.*',
            'prentid.parent_id as parent_id',
            'projects.status as status_name',
            'countries.country_name as Ct_name',
            'mm1.machinemodel_name as Mc_name1',
            'mm2.machinemodel_name as Mc_name2',
            'mm3.machinemodel_name as Mc_name3',
            'industrialzones.industrialzone_name as idz_name',
            'companies.company_short_name as Cpns_name',
            'projects.customer_name as customer_name',
            // 'customers.customer_name as customer_name1',     
            // 'orcm1.origin_country_id  as origincountry_name',
            // 'orcm2.origin_country_id  as origincountry_name',
            // 'orcm3.origin_country_id  as origincountry_name',
            // 'oitm1.oil_type as oiltype_name',
            // 'oitm2.oil_type as oiltype_name',
            // 'oitm3.oil_type as oiltype_name',
            // 'oitm3.oil_type as oiltype_name',
            'projects.route1 as routename1',
            'projects.route2 as routename2',
            'projects.route3 as routename3',
            'projects.possibility as possibility_name',
            'projects.result as result_name',
            'projects.created_at',
            'projects.updated_at'
             )
            ->whereNull('projects.deleted_at') 
            ->leftJoin('projects as prentid','projects.parent_id','=','prentid.id')
            ->leftJoin('companies', 'projects.distributor_id', '=', 'companies.id')
            ->leftJoin('customers', 'projects.customer_id', '=', 'customers.id')
            ->leftJoin('industrialzones', 'projects.industrialzone_id', '=', 'industrialzones.id')
            ->leftJoin('machinemodels as mm1', 'projects.machinemodel1_id', '=', 'mm1.id')
            ->leftJoin('machinemodels as mm2', 'projects.machinemodel2_id', '=', 'mm2.id')
            ->leftJoin('machinemodels as mm3', 'projects.machinemodel3_id', '=', 'mm3.id')
            ->leftJoin('countries', 'projects.country_id', '=', 'countries.id')
            ->leftJoin('machinemodels as orcm1','projects.machinemodel1_id','=','orcm1.id')
            ->leftJoin('machinemodels as orcm2','projects.machinemodel2_id','=','orcm2.id')
            ->leftJoin('machinemodels as orcm3','projects.machinemodel3_id','=','orcm3.id')
            ->leftJoin('machinemodels as oitm1','projects.machinemodel1_id','=','oitm1.id')
            ->leftJoin('machinemodels as oitm2','projects.machinemodel2_id','=','oitm2.id')
            ->leftJoin('machinemodels as oitm3','projects.machinemodel3_id','=','oitm3.id')  
            ->leftJoin('machinetype1s as type1', 'projects.machinemodel1_id', '=', 'type1.id')
            ->leftJoin('machinetype1s as type2', 'projects.machinemodel2_id', '=', 'type2.id')
            ->leftJoin('machinetype1s as type3', 'projects.machinemodel3_id', '=', 'type3.id')            
            ->paginate(50);    
     
        return view('pages.dashboards.project.result', [
            'projects' => $projects,
            'country' => $country,
            'company' => $company,
            'machinemodel' => $machinemodel,
            'machinetype' => $machinetype,
            'customer' => $customer,
            'industrialzone' => $industrialzone ,
            'from_datec' => $fromDateC,
            'from_dateu' => $fromDateU,
            'to_datec' => $toDateC,
            'to_dateu' => $toDateU,    
            'request' => $request,   
        ]);
    }

    public function fetchUsers2(Request $request)
    {
        $id = $request->get('select'); //เลือก id 
        $users = DB::table('companies')
            ->join('users', 'companies.id', '=', 'users.company_id')
            ->select('users.id', 'users.user_name')
            ->where('companies.id', $id)
            ->groupBy('users.id', 'users.user_name')
            ->get();
    
        //ในส่วนการแสดงผล
        $outputUsers = '<option value="">Select User</option>';
        foreach ($users as $user) {
            $outputUsers .= '<option value="'.$user->id.'">'.$user->user_name.'</option>';
        }
    
        //ส่งไปให้เป็น JSON response
        return response()->json([
            'users' => $outputUsers,
        ]);
        }


    public function edit($id)
    {
        //Search TextBox
        $projects = DB::table('projects as pj')->orderBy('id')->where('pj.id', $id);
        $company = DB::table('companies')->whereNull('companies.deleted_at')->get();
        $customer = DB::table('customers')->whereNull('customers.deleted_at')->get();
        $country = DB::table('countries')->whereNull('countries.deleted_at')->get();
        $machinetype = DB::table('machinetype1s')->whereNull('machinetype1s.deleted_at')->get();
        $machinemodel = DB::table('machinemodels')->whereNull('machinemodels.deleted_at')->get();
        $industrialzone = DB::table('industrialzones')->whereNull('industrialzones.deleted_at')->get();
     
        $projects = $projects->select(
            'pj.*',
            'prentid.parent_id as parent_id',
            'pj.status as status_name',
            'countries.country_name as Ct_name',
            'mm1.machinemodel_name as Mc_name1',
            'mm2.machinemodel_name as Mc_name2',
            'mm3.machinemodel_name as Mc_name3',
            'industrialzones.industrialzone_name as idz_name',
            'companies.company_short_name as Cpns_name',
            'pj.customer_name as customer_name',
            'users.user_name as user_name',
            // 'customers.customer_name as customer_name1',     
            // 'orcm1.origin_country_id  as origincountry_name',
            // 'orcm2.origin_country_id  as origincountry_name',
            // 'orcm3.origin_country_id  as origincountry_name',
            // 'oitm1.oil_type as oiltype_name',
            // 'oitm2.oil_type as oiltype_name',
            // 'oitm3.oil_type as oiltype_name',
            // 'oitm3.oil_type as oiltype_name',
            'pj.route1 as routename1',
            'pj.route2 as routename2',
            'pj.route3 as routename3',
            'pj.possibility as possibility_name',
            'pj.result as result_name',
             )
             ->whereNull('pj.deleted_at')
            ->leftJoin('projects as prentid','pj.parent_id','=','prentid.id')
            ->leftJoin('companies', 'pj.distributor_id', '=', 'companies.id')
            ->leftJoin('users','companies.id', '=', 'users.company_id')
            ->leftJoin('customers', 'pj.customer_id', '=', 'customers.id')
            ->leftJoin('industrialzones', 'pj.industrialzone_id', '=', 'industrialzones.id')
            ->leftJoin('machinemodels as mm1', 'pj.machinemodel1_id', '=', 'mm1.id')
            ->leftJoin('machinemodels as mm2', 'pj.machinemodel2_id', '=', 'mm2.id')
            ->leftJoin('machinemodels as mm3', 'pj.machinemodel3_id', '=', 'mm3.id')
            ->leftJoin('countries', 'pj.country_id', '=', 'countries.id')
            ->leftJoin('machinemodels as orcm1','pj.machinemodel1_id','=','orcm1.id')
            ->leftJoin('machinemodels as orcm2','pj.machinemodel2_id','=','orcm2.id')
            ->leftJoin('machinemodels as orcm3','pj.machinemodel3_id','=','orcm3.id')
            ->leftJoin('machinemodels as oitm1','pj.machinemodel1_id','=','oitm1.id')
            ->leftJoin('machinemodels as oitm2','pj.machinemodel2_id','=','oitm2.id')
            ->leftJoin('machinemodels as oitm3','pj.machinemodel3_id','=','oitm3.id')  
            ->leftJoin('machinetype1s as type1', 'pj.machinemodel1_id', '=', 'type1.id')
            ->leftJoin('machinetype1s as type2', 'pj.machinemodel2_id', '=', 'type2.id')
            ->leftJoin('machinetype1s as type3', 'pj.machinemodel3_id', '=', 'type3.id')             
            ->first();
        return view('pages.dashboards.project.edit', [
            'projects' => $projects,
            'country' => $country,
            'company' => $company,
            'machinemodel' => $machinemodel,
            'machinetype' => $machinetype,
            'customer' => $customer,
            'industrialzone' => $industrialzone , 
        ]);
    }



    public function resultUp(Request $request, $id)
    {
        $project = Project::where('id', $id)->firstOrFail();
        if (!auth()->check()) {
            return redirect('dashboard');
        }
        $input = $request->all();
        if ($request->has('button1')) {
            $input['status'] = '';
        } elseif ($request->has('')) {
            $input['status'] = '';
        } elseif ($request->has('')) {
            $input['status'] = '';
        }
        $project->update($input);
    
        return redirect('project')->with('success', 'Project updated successfully!');
    }

public function showMark2 ($id)
{
    $project = DB::table('projects as pj')
        ->leftJoin('companies', 'pj.distributor_id', '=', 'companies.id')
        ->leftJoin('customers', 'pj.customer_id', '=', 'customers.id')
        ->leftJoin('industrialzones', 'pj.industrialzone_id', '=', 'industrialzones.id')
        ->leftJoin('machinemodels as mm1', 'pj.machinemodel1_id', '=', 'mm1.id')
        ->leftJoin('machinemodels as mm2', 'pj.machinemodel2_id', '=', 'mm2.id')
        ->leftJoin('machinemodels as mm3', 'pj.machinemodel3_id', '=', 'mm3.id')
        ->leftJoin('countries', 'pj.country_id', '=', 'countries.id')
        ->leftJoin('enumeration as stus', function ($join) {
            $join->on('stus.grouptype', '=', DB::raw("'status'"))
                ->on('stus.code', '=', DB::raw("CAST(pj.status AS CHAR)"));
        })
        ->leftJoin('enumeration as psb', function ($join) {
            $join->on('psb.grouptype', '=', DB::raw("'possibility'"))
                ->on('psb.code', '=', DB::raw("CAST(pj.possibility AS CHAR)"));
        })
        ->leftJoin('enumeration as rs', function ($join) {
            $join->on('rs.grouptype', '=', DB::raw("'result'"))
                ->on('rs.code', '=', DB::raw("CAST(pj.result AS CHAR)"));
        })
        ->leftJoin('enumeration as orcm1', function ($join) {
            $join->on('orcm1.grouptype', '=', DB::raw("'origin_country_id'"))
                ->on('orcm1.code', '=', DB::raw("CAST(mm1.origin_country_id AS CHAR)"));
        })
        ->leftJoin('enumeration as orcm2', function ($join) {
            $join->on('orcm2.grouptype', '=', DB::raw("'origin_country_id'"))
                ->on('orcm2.code', '=', DB::raw("CAST(mm2.origin_country_id AS CHAR)"));
        })
        ->leftJoin('enumeration as orcm3', function ($join) {
            $join->on('orcm3.grouptype', '=', DB::raw("'origin_country_id'"))
                ->on('orcm3.code', '=', DB::raw("CAST(mm3.origin_country_id AS CHAR)"));
        })
        ->leftJoin('enumeration as oitm1', function ($join) {
            $join->on('oitm1.grouptype', '=', DB::raw("'oil_type'"))
                ->on('oitm1.code', '=', DB::raw("CAST(mm1.oil_type AS CHAR)"));
        })
        ->leftJoin('enumeration as oitm2', function ($join) {
            $join->on('oitm2.grouptype', '=', DB::raw("'oil_type'"))
                ->on('oitm2.code', '=', DB::raw("CAST(mm2.oil_type AS CHAR)"));
        })
        ->leftJoin('enumeration as oitm3', function ($join) {
            $join->on('oitm3.grouptype', '=', DB::raw("'oil_type'"))
                ->on('oitm3.code', '=', DB::raw("CAST(mm3.oil_type AS CHAR)"));
        })
        ->where('pj.id', $id)
        ->select(
            'pj.*',
            'mm1.machinemodel_name as Mc_name1',
            'mm2.machinemodel_name as Mc_name2',
            'mm3.machinemodel_name as Mc_name3',
            'countries.country_name as Ct_name',
            'industrialzones.industrialzone_name as idz_name',
            'companies.company_short_name as Cpns_name ',
            'customers.customer_cd as cus_cd',
            'orcm1.name as origincountry_name',
            'orcm2.name as origincountry_name',
            'orcm3.name as origincountry_name',
            'oitm1.name as oiltype_name',
            'oitm2.name as oiltype_name',
            'oitm3.name as oiltype_name',
            'stus.name as status_name',
            'psb.name as possibility_name',
            'rs.name as result_name'
        )
        ->first();

    if (!$project) {
        abort(404); 
    }

    return view('pages.dashboards.project.show', [
        'project' => $project,
    ]);
}



    

    public function insertData(Request $request)
{
    $data = $request->all();  
    $newData = new Project(); 
    $newData->distributor_project_id = $data['distributor_project_id'];
    $newData->parent_id = $data['parent_id'];
    $newData->distributor_id = $data['distributor_id'];
    $newData->pic_id = $data['pic_id'];
    $newData->customer_id = $data['customer_id'];
    $newData->customer_name = $data['customer_name'];
    $newData->country_id = $data['country_id'];
    $newData->industrialzone_id = $data['industrialzone_id'];
    $newData->address1 = $data['address1'];
    $newData->address2 = $data['address2'];
    $newData->route1 = $data['route1'];
    $newData->route2 = $data['route2'];
    $newData->route3 = $data['route3'];
    $newData->machinemodel1_id = $data['machinemodel1_id'];
    $newData->machinemodel2_id = $data['machinemodel2_id'];
    $newData->machinemodel3_id = $data['machinemodel3_id'];
    $newData->machinemodel1_qty = $data['machinemodel1_qty'];
    $newData->machinemodel2_qty = $data['machinemodel2_qty'];
    $newData->machinemodel3_qty = $data['machinemodel3_qty'];
    $newData->compatitor1 = $data['compatitor1'];
    $newData->compatitor2 = $data['compatitor2'];
    $newData->progress = $data['progress'];
    $newData->possibility = $data['possibility'];
    $newData->expected_order_dt = $data['expected_order_dt'];
    $newData->delivery_due_dt = $data['delivery_due_dt'];
    $newData->result = $data['result'];

    $newData->save();
    return redirect()->back()->with('success', 'ข้อมูลถูกเพิ่มเรียบร้อยแล้ว');
}

// public function updateData(NOEnum)(Request $request, $id)
// {
//     $data = $request->all();
//     $record = Project::findOrFail($id);
//     $record->distributor_project_id = $data['distributor_project_id'];
//     $record->parent_id = $data['parent_id'];
//     $record->distributor_id = $data['distributor_id'];
//     $record->pic_id = $data['pic_id'];
//     $record->customer_id = $data['customer_id'];
//     $record->customer_name = $data['customer_name'];
//     $record->country_id = $data['country_id'];
//     $record->industrialzone_id = $data['industrialzone_id'];
//     $record->address1 = $data['address1'];
//     $record->address2 = $data['address2'];
//     $record->route1 = $data['route1'];
//     $record->route2 = $data['route2'];
//     $record->route3 = $data['route3'];
//     $record->machinemodel1_id = $data['machinemodel1_id'];
//     $record->machinemodel2_id = $data['machinemodel2_id'];
//     $record->machinemodel3_id = $data['machinemodel3_id'];
//     $record->machinemodel1_qty = $data['machinemodel1_qty'];
//     $record->machinemodel2_qty = $data['machinemodel2_qty'];
//     $record->machinemodel3_qty = $data['machinemodel3_qty'];
//     $record->compatitor1 = $data['compatitor1'];
//     $record->compatitor2 = $data['compatitor2'];
//     $record->progress = $data['progress'];
//     $record->possibility = $data['possibility'];
//     $record->expected_order_dt = $data['expected_order_dt'];
//     $record->delivery_due_dt = $data['delivery_due_dt'];
//     $record->result = $data['result'];

//     $record->save();
//     return redirect()->back()->with('success');
// }

public function updateData(Request $request, $id)
{
   
    $data = $request->all();

    $project = Project::findOrFail($id); 
    $project->distributor_project_id = $data['distributor_project_id'];
    $project->parent_id = $data['parent_id'];
    $project->distributor_id = $data['distributor_id'];
    $project->pic_id = $data['pic_id'];
    $project->customer_id = $data['customer_id'];
    $project->customer_name = $data['customer_name'];
    $project->country_id = $data['country_id'];
    $project->industrialzone_id = $data['industrialzone_id'];
    $project->address1 = $data['address1'];
    $project->address2 = $data['address2'];
    $project->route1 = $data['route1'];
    $project->route2 = $data['route2'];
    $project->route3 = $data['route3'];
    $project->machinemodel1_id = $data['machinemodel1_id'];
    $project->machinemodel2_id = $data['machinemodel2_id'];
    $project->machinemodel3_id = $data['machinemodel3_id'];
    $project->machinemodel1_qty = $data['machinemodel1_qty'];
    $project->machinemodel2_qty = $data['machinemodel2_qty'];
    $project->machinemodel3_qty = $data['machinemodel3_qty'];
    $project->compatitor1 = $data['compatitor1'];
    $project->compatitor2 = $data['compatitor2'];
    $project->progress = $data['progress'];
    $project->possibility = $data['possibility'];
    $project->expected_order_dt = $data['expected_order_dt'];
    $project->delivery_due_dt = $data['delivery_due_dt'];
    $project->result = $data['result'];
    $project->save();

    return redirect()->back()->with('success');
}


    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect('project')->with('success', 'Company deleted successfully');
    }

    public function create(){ 
        return view('pages.dashboards.project.create');
    }

    public function createNew(Request $request)
    { 
        $lastId = Project::max('id');
        $newId = $lastId ? $lastId + 1 : 1;
        $country = DB::table('countries')->whereNull('countries.deleted_at')->get();
        $industrialzone = DB::table('industrialzones')->whereNull('industrialzones.deleted_at')->get();
        $list = DB::table('companies')->whereNull('companies.deleted_at')->get();

            return view('pages.dashboards.project.create', compact(
                'newId',
                'country',
                'industrialzone',
                'list',
            ));
        }
        public function search(Request $request)
        {
            // Get the selected values from the request
            $origin = $request->input('origin_country_id');
            $oilType = $request->input('oil_type');
            $coolerType = $request->input('cooler_type');
            $inverter = $request->input('inverter_flg');
        
            // Query the machinemodels table based on the selected values
            $query = DB::table('machinemodels')->whereNull('machinemodels.deleted_at');
        
            if ($origin) {
                $query->where('origin_country_id', $origin);
            }
        
            if ($oilType) {
                $query->where('oil_type', $oilType);
            }
            
            if ($coolerType) {
                $query->where('cooler_type', $coolerType);
            }
        
            if ($inverter) {
                $query->where('inverter_flg', $inverter);
            }
        
            // Get the value from the Power input
            $power = $request->input('power');
        
            // If power is provided, add it to the search condition
            if ($power) {
                $query->where('power', $power);
            }
        
            // Execute the query and get the matched data
            $machinemodels = $query->get();
        
            // Replace the code with the corresponding names in the result
        
            $machinemodels = $machinemodels->map(function ($item) {
                $item->origin_country_id = [$item->origin_country_id] ?? '';
                $item->oil_type = [$item->oil_type] ?? '';
                $item->cooler_type =  [$item->cooler_type] ?? '';
                $item->inverter_flg = [$item->inverter_flg] ?? '';
                return $item;
            });
        
            // Return the matched data as a JSON response
            return response()->json($machinemodels);
        }
        
          //ฟังก์ชั่น Fetch คือDynamic Dropdown ในการเลือกจังหวัด
    public function fetch(Request $request)
    {
        $id = $request->get('select'); //เลือก id 
        $industrialZones = DB::table('countries')
            ->whereNull('industrialzones.deleted_at')
            ->join('industrialzones', 'countries.id', '=', 'industrialzones.country_id')
            ->select('industrialzones.id', 'industrialzones.industrialzone_name')
            ->where('countries.id', $id)
            ->groupBy('industrialzones.id', 'industrialzones.industrialzone_name')
            ->get();

        //ในส่วนการแสดงผล
        $outputIndustrialZones = '<option value="0">Select IndustrialZone</option>';
        foreach ($industrialZones as $industrialZone) {
            $outputIndustrialZones .= '<option value="'.$industrialZone->id.'">'.$industrialZone->industrialzone_name.'</option>';
        }
        //ส่งไปให้json
        return response()->json([
            'industrialzones' => $outputIndustrialZones,
        ]);
    }

    public function fetchUsers(Request $request)
{
    $id = $request->get('select'); //เลือก id 
    $users = DB::table('companies')
        ->whereNull('users.deleted_at')
        ->join('users', 'companies.id', '=', 'users.company_id')
        ->select('users.id', 'users.user_name')
        ->where('companies.id', $id)
        ->groupBy('users.id', 'users.user_name')
        ->get();

    //ในส่วนการแสดงผล
    $outputUsers = '<option value="0">Select User</option>';
    foreach ($users as $user) {
        $outputUsers .= '<option value="'.$user->id.'">'.$user->user_name.'</option>';
    }

    //ส่งไปให้เป็น JSON response
    return response()->json([
        'users' => $outputUsers,
    ]);
    }
    public function fetchCustomer(Request $request)
    {
        $customerId = $request->get('customer_id');
        $customer = DB::table('customers')->find($customerId);
    
        $customerName = $customer ? $customer->customer_name : null;
    
        return response()->json([
            'customer_id' => $customerId,
            'customer_name' => $customerName,
        ]);
    }
    
    
    
    //create data
    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'distributor_id' => 'required',
        'pic_id' => 'required',
        'customer_id' => 'nullable', 
        'country_id' => 'nullable' , 
        'industrialzone_id' => 'nullable' ,
        'address1' => 'required',
        'address2'  => 'nullable',
        'route1' => 'nullable',
        'route2'=> 'nullable',
        'route3' => 'nullable',
        'machinemodel1_id' => 'nullable',
        'machinemodel2_id' => 'nullable',
        'machinemodel3_id' => 'nullable',
        'machinemodel1_qty' => 'nullable',
        'machinemodel2_qty' => 'nullable',
        'machinemodel3_qty' => 'nullable',
        'compatitor1' => 'nullable',
        'compatitor2' => 'nullable',
        'progress' => 'nullable',
        'possibility' => 'required',
        'expected_order_dt' => 'nullable',
        'delivery_due_dt' => 'nullable',
        'result' => 'required',
        'reason' => 'nullable',
        'remarks1' => 'nullable',
        'remarks2' => 'nullable',
        'status' => 'required',
        'admin_remarks1' => 'nullable',
        'admin_remarks2' => 'nullable',
        
    ],[
        'distributor_id.required' => 'Please Select a Distributor.',
        'pic_id.required' => 'Please Select a PIC.',
        'address1.required' => 'Please Enter The Address1.',
        'possibility.required' => 'Please Select a Possibility.',
        'result.required' => 'Please Select a Result.',

        'status.required' => 'Please Select a Status.',
    ]);
    

    $project = new Project();
    $newId = $request->input('newId');
    $project->id = $newId;
    $project->distributor_id = $validatedData['distributor_id'];
    $project->pic_id = $validatedData['pic_id'];
    $project->customer_id = $validatedData['customer_id'];   
    $project->country_id = $validatedData['country_id'];
    $project->industrialzone_id = $validatedData['industrialzone_id'];
    $project->address1 = $validatedData['address1'];
    $project->address2 = $validatedData['address2'];
    $customer = DB::table('customers')->find($validatedData['customer_id']);
    $customerName = $customer ? $customer->customer_name1 : null;
    $project->customer_name = $customerName;
    $project->route1 = $validatedData['route1'];
    $project->route2 = $validatedData['route2'];
    $project->route3 = $validatedData['route3'];
    $project->machinemodel1_id = $validatedData['machinemodel1_id'];
    $project->machinemodel2_id = $validatedData['machinemodel2_id'];
    $project->machinemodel3_id = $validatedData['machinemodel3_id'];
    $project->machinemodel1_qty = $validatedData['machinemodel1_qty'];
    $project->machinemodel2_qty = $validatedData['machinemodel2_qty'];
    $project->machinemodel3_qty = $validatedData['machinemodel3_qty'];
    $project->compatitor1 = $validatedData['compatitor1'];
    $project->compatitor2 = $validatedData['compatitor2'];
    $project->progress = $validatedData['progress'];
    $project->possibility = $validatedData['possibility'];
    $project->expected_order_dt = $validatedData['expected_order_dt'];
    $project->delivery_due_dt = $validatedData['delivery_due_dt'];
    $project->result = $validatedData['result'];
    $project->reason = $validatedData['reason'];
    $project->remarks1 = $validatedData['remarks1'];
    $project->remarks2 = $validatedData['remarks2'];
    $project->status = $validatedData['status'];
    $project->admin_remarks1 = $validatedData['admin_remarks1'];
    $project->admin_remarks2 = $validatedData['admin_remarks2'];

    if (auth()->check()) {
        $project->created_by = auth()->user()->id; // เพิ่มชื่อผู้ล็อกอินที่สร้างรายการ
        $project->updated_by = auth()->user()->id;  // เพิ่มชื่อผู้ล็อกอินเป็น updated_by
    } else {
        return redirect()->route('dashboard'); // ส่งผู้ใช้ไปยังหน้า login หรือหน้าที่คุณต้องการ
    }
    $project->save();

    return redirect()->route('project.index')->with('success', 'User created successfully.');
    //มีการเปลี่ยน ในส่วนของตัวfile ชื่อdatabase.php ในconfig เพื่อตรวจสอบการเพิ่มข้อมูล เปลี่ยนเพียงแค่ 'strict' => เป็น false จากที่เป็นtrue
}
}