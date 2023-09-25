<?php

namespace App\Http\Controllers;

use App\Models\Machinetype;
use Illuminate\Pagination\Paginator;
use App\Models\Machinemodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Exports\MachinemodelExport;
use CSV;


class MachinemodelMasterController extends Controller
{
        //
        public function index(Request $request)
        {
            //Search TextBox
            $machinemodels = DB::table('machinemodels as m') ->orderBy('id')  ;
            $machinetype = DB::table('machinetype1s')->whereNull('machinetype1s.deleted_at')->get();


            if ($request->machinemodel_name != null) {
                $machinemodels = $machinemodels ->Where('m.machinemodel_name', 'like', '%' . $request-> machinemodel_name. '%');
                }
            if ($request->power != null) {
                    $machinemodels = $machinemodels ->Where('m.power', 'like', '%' . $request-> power. '%');
                }
           // ข้อมูล Combobox
            if ($request->origin_country_id != null) {
                $machinemodels = $machinemodels ->Where('m.origin_country_id', 'like', '%' . $request-> origin_country_id. '%');
                }
            if ($request->oil_type != null) {
              $machinemodels = $machinemodels->Where('m.oil_type','like',  '%' . $request-> oil_type . '%');
                }
            if ($request-> last_flag != null) {
               $machinemodels = $machinemodels ->Where('m.latest_flg',  'like', '%' .$request-> last_flag. '%' );
                }
            if ($request-> cooler_type != null) {
              $machinemodels = $machinemodels ->Where('m.cooler_type',  'like', '%' .$request-> cooler_type. '%' );
                }
            if ($request->inverter_flg != null) {
                $machinemodels = $machinemodels ->Where('m.inverter_flg', 'like', '%' . $request-> inverter_flg. '%');
                }

            if ($request-> machinetype1 != null) {
                $machinemodels = $machinemodels ->Where('machinetype1s.machinetype1_name', 'like', '%' . $request-> machinetype1. '%');
                }
            //Show LIST

            $machinemodels = $machinemodels
            ->select(
                
                'm.id',
                'm.machinetype1_id',
                'm.machinemodel_name',
                'machinetype1s.machinetype1_name as mtypename',
               
                'm.power',
                'm.updated_at',
                'm.origin_country_id as origin_country_name',
                'm.oil_type as oil_type_name',
                'm.cooler_type as cooler_type_name',
                'm.inverter_flg as inverter_flg_name',
                'm.latest_flg as latest_flg_name'
            )
            ->whereNull('m.deleted_at') 
            ->leftJoin('machinetype1s', 'm.machinetype1_id', '=', 'machinetype1s.id')
            ->paginate(10); // แบ่งหน้าข้อมูลที่แสดงผลโดยแสดงทีละ 10 รายการ

          return view('pages.dashboards.machinemodels.index', [
            'machinemodels' => $machinemodels, 
            'machinetype' => $machinetype
        
        ]);    
        }

        public function exportCSV(Request $request)
        {
            $machinemodelData = [];

            // สร้างคำถามข้อมูล Machinemodels
            $query = DB::table('machinemodels as m')
                ->select(
                    'm.id',
                    'm.machinetype1_id',
                    'm.machinemodel_name',
                    'machinetype1s.machinetype1_name as mtypename',
                   
                    'm.power',
                    'm.updated_at',
                    'm.origin_country_id as origin_country_name',
                    'm.oil_type as oil_type_name',
                    'm.cooler_type as cooler_type_name',
                    'm.inverter_flg as inverter_flg_name',
                    'm.latest_flg as latest_flg_name'
                )
                ->whereNull('m.deleted_at')
                ->leftJoin('machinetype1s', 'm.machinetype1_id', '=', 'machinetype1s.id')
                ->orderBy('m.id');

            // เพิ่มเงื่อนไขการค้นหาตาม request ที่ถูกส่งมา
            if ($request->machinemodel_name != null) {
                $query->where('m.machinemodel_name', 'like', '%' . $request->machinemodel_name . '%');
            }
            if ($request->power != null) {
                $query->where('m.power', 'like', '%' . $request->power . '%');
            }
            if ($request->origin_country_id != null) {
                $query->where('m.origin_country_id', 'like', '%' . $request->origin_country_id . '%');
            }
            if ($request->oil_type != null) {
                $query->where('m.oil_type', 'like', '%' . $request->oil_type . '%');
            }
            if ($request->last_flag != null) {
                $query->where('m.latest_flg', 'like', '%' . $request->last_flag . '%');
            }
            if ($request->cooler_type != null) {
                $query->where('m.cooler_type', 'like', '%' . $request->cooler_type . '%');
            }
            if ($request->inverter_flg != null) {
                $query->where('m.inverter_flg', 'like', '%' . $request->inverter_flg . '%');
            }
            if ($request->machinetype1 != null) {
                $query->where('machinetype1s.machinetype1_name', 'like', '%' . $request->machinetype1 . '%');
            }
            // ดึงข้อมูล Machinemodels และเพิ่มลงใน $machinemodelData
            $machinemodels = $query->get();
            foreach ($machinemodels as $machinemodel) {
                $latest_flg_name = '';
            
                if($machinemodel->latest_flg_name == 1) {
                    $latest_flg_name = 'Yes';
                } elseif($machinemodel->latest_flg_name == 0) {
                    $latest_flg_name = 'No';
                }

                $origin_country_name = '';
                if($machinemodel->origin_country_name == 1) {
                    $origin_country_name = 'Japan';
                } elseif($machinemodel->origin_country_name == 2) {
                    $origin_country_name = 'China';
                }

                $oil_type_name = '';
                if($machinemodel->oil_type_name == 1) {
                    $oil_type_name = 'Oil Free';
                } elseif($machinemodel->oil_type_name == 2) {
                    $oil_type_name = 'Oil Flooded';
                }

                $cooler_type_name = '';
                if($machinemodel->cooler_type_name == 1) {
                    $cooler_type_name = 'Air Cooled';
                } elseif($machinemodel->cooler_type_name == 2) {
                    $cooler_type_name = 'Water Cooled';
                }

                $inverter_flg_name = '';
            
                if($machinemodel->inverter_flg_name == 1) {
                    $inverter_flg_name = 'Yes';
                } elseif($machinemodel->inverter_flg_name == 0) {
                    $inverter_flg_name = 'No';
                }

                $machinemodelData[] = [
                    'ID' => $machinemodel->id,
                    'Machine Type' => $machinemodel->mtypename,
                    'Machine Model Name' => $machinemodel->machinemodel_name,
                    'Active' => $latest_flg_name,
                    'Country Of Origin' => $origin_country_name,
                    'Oil Flooded/Free' => $oil_type_name,
                    'Cooling Method' => $cooler_type_name,
                    'Inverter' => $inverter_flg_name,
                    'Power' => $machinemodel->power,
                    'Updated' => $machinemodel->updated_at,
                ];
            }

            // สร้างไฟล์ CSV และดาวน์โหลด
            return CSV::download(new MachinemodelExport($machinemodelData), 'machinemodels.csv');
        }

        public function show($id)
        {
            $machinemodels = DB::table('machinemodels as m');
            $machinetype = DB::table('machinetype1s')->whereNull('machinetype1s.deleted_at')->get();
            $machinemodels = $machinemodels
            ->select(
                'm.id',
                'm.machinetype1_id',
                'm.machinemodel_name',
                'machinetype1s.machinetype1_name as mtypename',
                
                'm.updated_at',
                'm.created_at',
                'm.remarks',
                'm.power',

                'm.origin_country_id as origin_country_name',
                'm.oil_type as oil_type_name',
                'm.cooler_type as cooler_type_name',
                'm.inverter_flg as inverter_flg_name',
                'm.latest_flg as latest_flg_name',
                'users.user_name as created_by',
                'users2.user_name as updated_by'
                )
            ->where('m.id', $id)
            ->whereNull('m.deleted_at')
            ->leftJoin('machinetype1s', 'm.machinetype1_id', '=', 'machinetype1s.id')
            ->leftjoin('users','m.created_by','=','users.id')
            ->leftjoin('users as users2' ,'m.updated_by','=','users2.id')
            ->first();
            return view('pages.dashboards.machinemodels.show', ['machinemodels' => $machinemodels, 'machinetype' => $machinetype,]);    
        }
    
        public function edit($id)
        {
            // Retrieve specific machinemodel based on the provided ID
            $machinemodels = DB::table('machinemodels as m');
            $machinetype = DB::table('machinetype1s')->get();
            $machinemodels = $machinemodels
                ->select(
                'm.*',
                'm.machinetype1_id',
                'm.machinemodel_name',
                'machinetype1s.machinetype1_name as mtypename',

                'm.remarks',
                'm.origin_country_id as origin_country_name',
                'm.oil_type as oil_type_name',
                'm.cooler_type as cooler_type_name',
                'm.inverter_flg as inverter_flg_name',
                'm.latest_flg as latest_flg_name',
               
                'm.power',
                'm.remarks',
                'users.user_name as created_by',
                'users2.user_name as updated_by'
                )
            ->leftJoin('machinetype1s', 'm.machinetype1_id', '=', 'machinetype1s.id')
            ->leftjoin('users','m.created_by','=','users.id')
            ->leftjoin('users as users2' ,'m.updated_by','=','users2.id')
             ->where('m.id', $id)
                ->first();
            return view('pages.dashboards.machinemodels.edit', compact('machinemodels', 'machinetype'));
        }
        public function update(Request $request, $id)
        {
                $machinemodels =Machinemodel ::where('id', $id)->firstOrFail();
                if (!auth()->check()) {
                    return redirect('dashboard');
                }
                $input['updated_by'] = auth()->user()->id; 
                $input = $request->all();
                $machinemodels->update($input);
            // return redirect('machinemodel_result')->with('success', 'Company updated successfully !');

            session(['machinemodel' => $machinemodels]);
        return redirect()->route('machinemodel_result')->with('success', 'Machinemodel updated successfully !');
        }
    
        public function destroy(string $id)
        {
                $machinemodels = Machinemodel::findOrFail($id);
                $machinemodels->delete();
            return redirect('machinemodels')->with('success', 'Company deleted successfully');
        }
    
        public function backcompanypage() {
            return view('pages.dashboards.machinemodels.index');
        }   
        //Create resource

        public function create(){ 
            return view('pages.dashboards.machinemodels.create');
        }

        public function createNew()
        {
            $lastId = Machinemodel::max('id');
            $newId = $lastId ? $lastId + 1 : 1;
            $machinetype1s = Machinetype::all();

            return view('pages.dashboards.machinemodels.create', compact('newId', 'machinetype1s'));
        }

        //create data
        public function store(Request $request)
        {
        $validatedData = $request->validate([
            'machinetype1_id' => 'required',
            'machinemodel_name' => 'required|unique:machinemodels',
            'origin_country_id' => 'required',
            'oil_type' => 'required',
            'cooler_type' => 'required',
            'power' => 'required',
            'inverter_flg' => 'required',
            'latest_flg' => 'required',
            'remarks' => 'nullable',
        ],[
            'machinemodel_name.required' => 'Please Enter The Machine Model Information.',
            'machinemodel_name.unique' => 'The Machine Model Already Exists In The System. ',
            'origin_country_id.required' => 'Please Select a Country Of Origin.',
            'oil_type.required' => 'Please Select a Oil Flooded/Free. ', 
            'cooler_type.required' => 'Please Select a Cooling Method. ',
            'power.required' => 'Please Enter The power Information.',
            'latest_flg.required' => 'Please Select a Active.',
            'inverter_flg.required' => 'Please Select a Inverter.',           
        ]);

        $machinemodel = new Machinemodel();
        $machinemodel->machinetype1_id = $validatedData['machinetype1_id'];
        $machinemodel->machinemodel_name = $validatedData['machinemodel_name'];
        $machinemodel->origin_country_id = $validatedData['origin_country_id'];
        $machinemodel->oil_type = $validatedData['oil_type'];
        $machinemodel->cooler_type = $validatedData['cooler_type'];
        $machinemodel->inverter_flg = $validatedData['inverter_flg'];
        $machinemodel->latest_flg = $validatedData['latest_flg'];
        $machinemodel->remarks = $validatedData['remarks'];
        $machinemodel->power = $validatedData['power'];
        if (auth()->check()) {
            $machinemodel->created_by = auth()->user()->id; // เพิ่มชื่อผู้ล็อกอินที่สร้างรายการ
            $machinemodel->updated_by = auth()->user()->id;  // เพิ่มชื่อผู้ล็อกอินเป็น updated_by
        } else {
            return redirect()->route('dashboard'); // ส่งผู้ใช้ไปยังหน้า login หรือหน้าที่คุณต้องการ
        }
        
        $machinemodel->save();

        session(['machinemodel' => $machinemodel]);
        return redirect()->route('machinemodel_result')->with('success', 'Machinemodels created successfully !');
        // return redirect()->route('machinemodel_result')->with('success', 'Machinemodels created successfully.');
        //มีการเปลี่ยน ในส่วนของตัวfile ชื่อdatabase.php ในconfig เพื่อตรวจสอบการเพิ่มข้อมูล เปลี่ยนเพียงแค่ 'strict' => เป็น false จากที่เป็นtrue
    }

    public function machinemodel_delete() {
        return view('pages.dashboards.machinemodels.machinemodel_delete');
    }

    // public function machinemodel_result() {
    //     return view('pages.dashboards.machinemodels.result');
    // }

    public function machinemodel_result(Request $request)
        {
            $machinemodelid = session('machinemodel');

            $id = $machinemodelid->id;
            $machinemodels = DB::table('machinemodels as m');
            $machinetype = DB::table('machinetype1s')->get();
            $machinemodels = $machinemodels
            ->select(
                'm.id',
                'm.machinetype1_id',
                'm.machinemodel_name',
                'machinetype1s.machinetype1_name as mtypename',
                
                'm.updated_at',
                'm.created_at',
                'm.remarks',
                'm.power',

                'm.origin_country_id as origin_country_name',
                'm.oil_type as oil_type_name',
                'm.cooler_type as cooler_type_name',
                'm.inverter_flg as inverter_flg_name',
                'm.latest_flg as latest_flg_name',
                'users.user_name as created_by',
                'users2.user_name as updated_by'
                )
            ->where('m.id', $id)
            ->leftJoin('machinetype1s', 'm.machinetype1_id', '=', 'machinetype1s.id')
            ->leftjoin('users','m.created_by','=','users.id')
            ->leftjoin('users as users2' ,'m.updated_by','=','users2.id')
            ->first();
            return view('pages.dashboards.machinemodels.result', ['machinemodels' => $machinemodels, 'machinetype' => $machinetype,]);    
        }
}