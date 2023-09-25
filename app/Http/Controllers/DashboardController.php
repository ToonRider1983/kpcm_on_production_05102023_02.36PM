<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function index(Request $request)
    {
               //Search TextBox
               $projects = DB::table('projects as pj')->orderBy('updated_at', 'desc');
               $company = DB::table('companies')->get();
               $customer = DB::table('customers')->get();
               $country = DB::table('countries')->get();
               $machinetype = DB::table('machinetype1s')->get();
               $machinemodel = DB::table('machinemodels')->get();
               $industrialzone = DB::table('industrialzones')->get();
       
           
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
                   ->paginate(10);    
            

        return view('pages.dashboards.homeindex', [
            'projects' => $projects,
            'country' => $country,
            'company' => $company,
            'machinemodel' => $machinemodel,
            'machinetype' => $machinetype,
            'customer' => $customer,
            'industrialzone' => $industrialzone ,   
            'request' => $request,   
        ]);
    }
}
