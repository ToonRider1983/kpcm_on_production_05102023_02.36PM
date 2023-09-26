<?php


namespace App\Http\Controllers;

use App\Models\Industrialzone;
use App\Models\Country;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Exports\IndustrialzoneExport;
use CSV;


class IndustrialzoneMasterController extends Controller
{
    //

    public function index(Request $request)
    {
        $industrialzone = DB::table('industrialzones');
        $country = DB::table('countries')->whereNull('countries.deleted_at')->get();

        if ($request->keyword != null) {
            $industrialzone = $industrialzone->orWhere('industrialzones.industrialzone_name', 'like', '%' . $request->keyword . '%');
        }
        if ($request->country != null) {
            $industrialzone = $industrialzone->Where('countries.country_name', $request->country);
        }
        $industrialzone = $industrialzone
            ->select('industrialzones.*', 'countries.country_name as ContryName')
            ->whereNull('industrialzones.deleted_at') 
            ->leftjoin('countries', 'industrialzones.country_id', '=', 'countries.id')
            ->paginate(10);

        return view('pages.dashboards.industrialzone.index', ['industrialzone' => $industrialzone, 'country' => $country]);
    }

    // public function exportCSV(){
    //     return CSV::download(new IndustrialzoneExport,'Industrialzone.csv');
    // }

    public function exportCSV(Request $request)
{
    $industrialzoneData = [];
    $industrialzone = DB::table('industrialzones');
    
    if ($request->keyword != null) {
        $industrialzone = $industrialzone->orWhere('industrialzones.industrialzone_name', 'like', '%' . $request->keyword . '%');
    }
    if ($request->country != null) {
        $industrialzone = $industrialzone->where('countries.country_name', $request->country);
    }
    
    $industrialzones = $industrialzone
        ->select('industrialzones.id', 'industrialzones.industrialzone_name', 'countries.country_name as CountryName', 'industrialzones.updated_at')
        ->whereNull('industrialzones.deleted_at')
        ->leftjoin('countries', 'industrialzones.country_id', '=', 'countries.id')
        ->get();
    
    foreach ($industrialzones as $industrialzone) {
        $industrialzoneData[] = [
            'ID' => $industrialzone->id,
            'Industrial Zone Name' => $industrialzone->industrialzone_name,
            'Country' => $industrialzone->CountryName,
            'Updated' => $industrialzone->updated_at,
        ];
    }

    return CSV::download(new IndustrialzoneExport($industrialzoneData), 'Industrialzone.csv');
}
    
    public function show($id)
    {
        $country = DB::table('countries')->whereNull('countries.deleted_at')->get();
        $industrialzone = DB::table('industrialzones');
        $industrialzone = $industrialzone
            ->select(
             'industrialzones.*',
             'countries.country_name as ContryName',
             'users.user_name as created_by',
             'users2.user_name as updated_by')
            ->where('industrialzones.id', $id)
            ->whereNull('industrialzones.deleted_at')
            ->leftjoin('countries', 'industrialzones.country_id', '=', 'countries.id')
            ->leftjoin('users','industrialzones.created_by','=','users.id')
            ->leftjoin('users as users2','industrialzones.updated_by','=','users2.id')
            ->first();

        return view('pages.dashboards.industrialzone.show', ['industrialzone' => $industrialzone, 'country' => $country]);
    }

    public function edit($id)
    {
        $country = DB::table('countries')->whereNull('countries.deleted_at')->get();
        $industrialzone = DB::table('industrialzones');
        $industrialzone = $industrialzone
            ->select(
                'industrialzones.*',
                'countries.country_name as ContryName',
                'users.user_name as created_by',
                'users2.user_name as updated_by'
                )
            ->where('industrialzones.id', $id)
            ->whereNull('industrialzones.deleted_at')
            ->leftJoin('countries', 'industrialzones.country_id', '=', 'countries.id')
            ->leftjoin('users','industrialzones.created_by','=','users.id')
            ->leftjoin('users as users2','industrialzones.updated_by','=','users2.id')
            ->first();

        return view('pages.dashboards.industrialzone.edit', ['industrialzone' => $industrialzone, 'country' => $country]);
    }

    public function update(Request $request, $id)
    {
        $industrialzone = Industrialzone::where('id', $id)->firstOrFail();
        if (!auth()->check()) {
            return redirect('dashboard');
        }
        $input = $request->all();
        $input['updated_by'] = auth()->user()->id;  
        $industrialzone->update($input);
        // return redirect('industrialzone_resulte')->with('success', 'Company updated successfully !');
        session(['industrialzone' => $industrialzone]);
        return redirect()->route('industrialzone_resulte')->with('success', 'Industrialzone updated successfully !');
    }

    public function destroy(string $id)
    {
        $industrialzone = Industrialzone::findOrFail($id);
        $industrialzone->delete();
        return redirect('industrialzone')->with('success', 'Company deleted successfully');
    }
     //Create resource

     public function create(){ 
        return view('pages.dashboards.industrialzone.create');
    }
    //CreateNew คือตามนี้
    //ดึง ID จากdatabase email ออโต้ ต่อจากid ล่าสุด
    //และมีการเรียกดูรายชื่อ Country จาก table counties เพื่อเอาข้อมูลไปเปิดใน create.blade form
    public function createNew()
    {   
        $lastId = Industrialzone::max('id');
        $newId = $lastId ? $lastId + 1 : 1;
        $country = DB::table('countries')->whereNull('countries.deleted_at')->get();
        return view('pages.dashboards.industrialzone.create', compact('newId', 'country',));
    }
    
     //create data
     public function store(Request $request)
{
    $validatedData = $request->validate([
        'country_id' => 'required',
        'industrialzone_name' => 'required',
    ],[
        'country_id.required' => 'Please Select a Select Country.',
        'industrialzone_name.required' => 'Please Enter The Industrial Zone Name Information.',
    ]);
    $industrialzone = new Industrialzone();
    $industrialzone->country_id = $validatedData['country_id'];
    $industrialzone->industrialzone_name = $validatedData['industrialzone_name'];
    if (auth()->check()) {
        $industrialzone->created_by = auth()->user()->id; // เพิ่มชื่อผู้ล็อกอินที่สร้างรายการ
        $industrialzone->updated_by = auth()->user()->id;  // เพิ่มชื่อผู้ล็อกอินเป็น updated_by
    } else {
        return redirect()->route('dashboard'); // ส่งผู้ใช้ไปยังหน้า login หรือหน้าที่คุณต้องการ
    }
    $industrialzone->save();

    session(['industrialzone' => $industrialzone]);
    return redirect()->route('industrialzone_resulte')->with('success', 'Email created successfully !');
    // return redirect()->route('industrialzone_resulte')->with('success', 'Email created successfully.');
    //มีการเปลี่ยน ในส่วนของตัวfile ชื่อdatabase.php ในconfig เพื่อตรวจสอบการเพิ่มข้อมูล เปลี่ยนเพียงแค่ 'strict' => เป็น false จากที่เป็นtrue
}

public function industrialzone_delete($id)
    {
        $country = DB::table('countries')->whereNull('countries.deleted_at')->get();
        $industrialzone = DB::table('industrialzones');
        $industrialzone = $industrialzone
            ->select(
             'industrialzones.*',
             'countries.country_name as ContryName',
             'users.user_name as created_by',
             'users2.user_name as updated_by')
            ->where('industrialzones.id', $id)
            ->whereNull('industrialzones.deleted_at')
            ->leftjoin('countries', 'industrialzones.country_id', '=', 'countries.id')
            ->leftjoin('users','industrialzones.created_by','=','users.id')
            ->leftjoin('users as users2','industrialzones.updated_by','=','users2.id')
            ->first();

        return view('pages.dashboards.industrialzone.industrialzone_delete', ['industrialzone' => $industrialzone, 'country' => $country]);
    }

// public function industrialzone_delete() {
//     return view('pages.dashboards.industrialzone.industrialzone_delete');
// }

// public function industrialzone_resulte() {
//     return view('pages.dashboards.industrialzone.result');
// }

public function industrialzone_resulte(Request $request)
    {
        $industrialzoneid = session('industrialzone');
        
        $id = $industrialzoneid->id;
        $country = DB::table('countries')->whereNull('countries.deleted_at')->get();
        $industrialzone = DB::table('industrialzones');
        $industrialzone = $industrialzone
            ->select(
             'industrialzones.*',
             'countries.country_name as ContryName',
             'users.user_name as created_by',
             'users2.user_name as updated_by')
            ->where('industrialzones.id', $id)
            ->whereNull('industrialzones.deleted_at')
            ->leftjoin('countries', 'industrialzones.country_id', '=', 'countries.id')
            ->leftjoin('users','industrialzones.created_by','=','users.id')
            ->leftjoin('users as users2','industrialzones.updated_by','=','users2.id')
            ->first();

        return view('pages.dashboards.industrialzone.result', ['industrialzone' => $industrialzone, 'country' => $country]);
    }

}
