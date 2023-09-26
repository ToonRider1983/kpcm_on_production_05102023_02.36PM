<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Machinetype;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\User;
use App\Exports\Machinetype1Export;
use CSV;

class Machinetype1MasterController extends Controller
{
 
    public function index(Request $request)
    {
        $selecttype = DB::table('machinetype1s')->get();
        $query = DB::table('machinetype1s');
        if ($request->keyword != null) {
            $query->orWhere('machinetype1s.machinetype1_name', 'like', '%' . $request->keyword . '%');
        }
        
        $machinetype = $query->paginate(10);
        return view('pages.dashboards.machinetype.index', ['machinetype' => $machinetype ,'selecttype'=>$selecttype]);
    }

    public function exportCSV(Request $request)
    {
        $query = DB::table('machinetype1s');
        
        if ($request->keyword != null) {
            $query->orWhere('machinetype1s.machinetype1_name', 'like', '%' . $request->keyword . '%');
        }
    
        $machinetype = $query->get();
        
        $machinetypeData = [];
        
        foreach ($machinetype as $type) {
            $machinetypeData[] = [
                'ID' => $type->id,
                'Machine Type Name' => $type->machinetype1_name,
                'Update' => $type->updated_at,
                // เพิ่มส่วนอื่น ๆ ที่คุณต้องการส่งออก
            ];
        }
    
        return CSV::download(new Machinetype1Export($machinetypeData), 'machinetype.csv');
    }
    

    public function show($id)
    {
        $machinetype = DB::table('machinetype1s')
            ->select('machinetype1s.*','users.user_name as created_by','users2.user_name as updated_by')
            ->leftJoin('users','machinetype1s.created_by','=' , 'users.id')
            ->leftJoin('users as users2','machinetype1s.updated_by','=' , 'users2.id')
            ->where('machinetype1s.id', $id) 
            ->first();

            
        return view('pages.dashboards.machinetype.show', ['machinetype' => $machinetype , 'id'=>$id ]);
    }

    public function edit($id)
    {   
        $machinetype = DB::table('machinetype1s')
            ->select('machinetype1s.*', 'users.user_name as created_by_name', 'users2.user_name as updated_by_name')
            ->leftJoin('users', 'machinetype1s.created_by', '=', 'users.id')
            ->leftJoin('users as users2', 'machinetype1s.updated_by', '=', 'users2.id')
            ->where('machinetype1s.id', $id)
            ->first();
    
        return view('pages.dashboards.machinetype.edit', [
            'machinetype' => $machinetype,
        ]);
    }
    public function update(Request $request, $machinetypeid)
    {
        $machinetype = Machinetype::where('id', $machinetypeid)->firstOrFail();
        $input = $request->all();
       
        $input['updated_by'] = auth()->user()->id;  
        $machinetype->update($input);
        // return redirect('machinetype_result')->with('success', 'Company updated successfully !');

        session(['machinetype' => $machinetype]);
        return redirect()->route('machinetype_result')->with('success', 'Machinetype updated successfully !');
    }

    public function destroy(string $machinetypeid)
    {
        $machinetype = Machinetype::findOrFail($machinetypeid);
        $machinetype->delete();
        return redirect('machinetype')->with('success', 'Company deleted successfully');

    }
    //Create resource
    public function create(){ 
        return view('pages.dashboards.machinetype.create');
    }
    //CreateNew คือตามนี้
    //ดึง ID จากdatabase email ออโต้ ต่อจากid ล่าสุด
    //และมีการเรียกดูรายชื่อ Country จาก table counties เพื่อเอาข้อมูลไปเปิดใน create.blade form
    public function createNew()
    {   
        $lastId = Machinetype::max('id');
        $newId = $lastId ? $lastId + 1 : 1;
        
        return view('pages.dashboards.machinetype.create', compact('newId'));
    }
    
     //create data
     public function store(Request $request)
{
    $validatedData = $request->validate([
        'machinetype1_name' => 'required',
    ],[
        'machinetype1_name.required' => 'Please Enter The Machine Type1 Name Information.',       
    ]);
    $machinetype = new Machinetype();
    $machinetype->machinetype1_name = $validatedData['machinetype1_name'];

    if (auth()->check()) {
        $machinetype->created_by = auth()->user()->id; // เพิ่มชื่อผู้ล็อกอินที่สร้างรายการ
        $machinetype->updated_by = auth()->user()->id;  // เพิ่มชื่อผู้ล็อกอินเป็น updated_by
    } else {
        return redirect()->route('dashboard'); // ส่งผู้ใช้ไปยังหน้า login หรือหน้าที่คุณต้องการ
    }
    $machinetype->save();

    session(['machinetype' => $machinetype]);
    return redirect()->route('machinetype_result')->with('success', '?achinetype created successfully !');
    // return redirect()->route('machinetype_result')->with('success', 'machinetype created successfully.');
    //มีการเปลี่ยน ในส่วนของตัวfile ชื่อdatabase.php ในconfig เพื่อตรวจสอบการเพิ่มข้อมูล เปลี่ยนเพียงแค่ 'strict' => เป็น false จากที่เป็นtrue
}

public function machinetype_delete($id)
    {
        $machinetype = DB::table('machinetype1s')
            ->select('machinetype1s.*','users.user_name as created_by','users2.user_name as updated_by')
            ->leftJoin('users','machinetype1s.created_by','=' , 'users.id')
            ->leftJoin('users as users2','machinetype1s.updated_by','=' , 'users2.id')
            ->where('machinetype1s.id', $id) 
            ->first();

            
        return view('pages.dashboards.machinetype.machinetype_delete', ['machinetype' => $machinetype , 'id'=>$id ]);
    }

// public function machinetype_result() {
//     return view('pages.dashboards.machinetype.result');
// }

public function machinetype_result(Request $request)
    {
        $machinetypeid = session('machinetype');

        $id = $machinetypeid->id;
        $machinetype = DB::table('machinetype1s')
            ->select('machinetype1s.*','users.user_name as created_by','users2.user_name as updated_by')
            ->leftJoin('users','machinetype1s.created_by','=' , 'users.id')
            ->leftJoin('users as users2','machinetype1s.updated_by','=' , 'users2.id')
            ->where('machinetype1s.id', $id) 
            ->first();

            
        return view('pages.dashboards.machinetype.result', ['machinetype' => $machinetype , 'id'=>$id ]);
    }
}
