<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
//use App\Models\MstUser;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; // เพิ่ม Import Auth
use App\Exports\UserExport;
use CSV;


class UserMasterController extends Controller
{
    //
    public function index(Request $request)
    {
        //Search TextBox
        $user = User::sortable()->orderBy('updated_at', 'desc');
        $company = DB::table('companies')->whereNull('companies.deleted_at')->get();
       

        if ($request->keyword != null) {
            $user = $user ->Where('users.user_name', 'like', '%' . $request->keyword . '%');
        }
        if ($request-> companys != null) {
            $user = $user->Where('companies.company_name','like',  '%' . $request-> companys . '%');
        }
        if ($request->has('user_scope')) {
            $userScopes = $request->input('user_scope');
            $user = $user->whereIn('users.user_scope', $userScopes);
        }
        

        //Show LIST
        $user = $user
            ->select('users.*', 'companies.company_name as companyname', 'users.user_scope as typename')
            ->whereNull('users.deleted_at') 
            ->leftjoin('companies', 'users.company_id', '=', 'companies.id')
            ->paginate(10); // แบ่งหน้าข้อมูลที่แสดงผลโดยแสดงทีละ 10 รายการ
        //return $query ;
        return view('pages.dashboards.user.index', ['user' => $user, 'company' => $company,]);
    }


            public function exportCSV(Request $request)
        {
            $userData = [];

            // สร้างคำถามข้อมูลผู้ใช้
            $query = DB::table('users')
                ->select(
                    'users.*', 'companies.company_name as companyname', 'users.user_scope as typename'
                )
                ->whereNull('users.deleted_at')
                ->leftjoin('companies', 'users.company_id', '=', 'companies.id');

            // เพิ่มเงื่อนไขการค้นหาตาม request ที่ถูกส่งมา
            if ($request->keyword != null) {
                $query->where('users.user_name', 'like', '%' . $request->keyword . '%');
            }

            if ($request->companys != null) {
                $query->where('companies.company_name', 'like', '%' . $request->companys . '%');
            }

            if ($request->has('user_scope')) {
                $userScopes = $request->input('user_scope');
                $query->whereIn('users.user_scope', $userScopes);
            }

            // ดึงข้อมูลผู้ใช้และเพิ่มลงใน $userData
            $users = $query->get();
            foreach ($users as $user) {
                $TypeName = '';
            
                if($user->user_scope == 1) {
                    $TypeName = 'Local User';
                } elseif($user->user_scope == 2) {
                    $TypeName = 'Own Distributor';
                }elseif($user->user_scope == 3) {
                    $TypeName = 'Own Country';
                }elseif($user->user_scope == 4) {
                    $TypeName = 'World Wide';
                }
                $userData[] = [
                    'Usercode' => $user->id,
                    'Company Name' => $user->companyname,
                    'Username' => $user->user_name,
                    'User Scope' =>$TypeName,
                    'Updated' => $user->updated_at,
                ];
            }

            // สร้างไฟล์ CSV และดาวน์โหลด
            return CSV::download(new UserExport($userData), 'users.csv');
        }



    public function show($id)
    {
        $company = DB::table('companies')->whereNull('companies.deleted_at')->get();
        $user = DB::table('users') ->orderBy('id');
        $user = $user 
            ->select(
                'users.*',
                 'companies.company_name as companyname',
                  'users.user_scope as typename',
                  'create_user_by.user_name as created_by',
                  'update_user_by.user_name as updated_by')
            ->where('users.id', $id)
            ->whereNull('users.deleted_at')
            ->leftjoin('companies', 'users.company_id', '=', 'companies.id')
            ->leftjoin('users as create_user_by','users.created_by','=','create_user_by.id' )
            ->leftjoin('users as update_user_by','users.updated_by','=','update_user_by.id' )
            ->first();

        //return view('companies.show')->with('company', $company );
        return view('pages.dashboards.user.show', ['user' => $user, 'company' => $company,]);
    }

    //สำหรับแก้ไข ของผู้ ล็อคอิน
    public function mypage() {
        $users = Auth::user(); // ดึงข้อมูลผู้ล็อกอินที่กำลังเข้าสู่ระบบ
        $userjoin = User::leftJoin('companies', 'users.company_id', '=', 'companies.id')
        ->select('users.*', 'companies.company_name as company_name')
        ->where('users.id', $users->id)
        ->first();
        return view('pages.dashboards.user.mypage', compact('users','userjoin'));
    }
    public function loginname() {
        $AUuser = Auth::user(); 
    
        if ($AUuser) {
            $AUusersjoin = User::leftJoin('companies', 'users.company_id', '=', 'companies.id')
                ->select('users.*', 'companies.company_name as company_name')
                ->where('users.id', $AUuser->id)
                ->first();
            return $AUusersjoin;
        } else {
            return null;
        }
    }

    public function edit($id)
    {
            
        $company = DB::table('companies') ->whereNull('companies.deleted_at')->get();
        $user = DB::table('users') ->orderBy('id');
        $user = $user
            ->select(
                'users.*', 
                'companies.company_name as companyname',
                 'users.user_scope as typename',
                 'created_by_user.user_name as created_by', 
                 'updated_by_user.user_name as updated_by' )
            ->where('users.id', $id)
            ->whereNull('users.deleted_at')
            ->leftjoin('companies', 'users.company_id', '=', 'companies.id')
            ->leftJoin('users as created_by_user', 'users.created_by', '=', 'created_by_user.id') 
            ->leftJoin('users as updated_by_user', 'users.updated_by', '=', 'updated_by_user.id')
            ->first();

            
            $selectedPrivileges = [
                'Project' => $user->user_privilege_project,
                'Customer Service' => $user->user_privilege_service,
                'Maintenance' => $user->user_privilege_maintain,
                'Judge' => $user->user_privilege_judge,
                'Edit All' => $user->user_privilege_editall,
            ];
            

            return view('pages.dashboards.user.edit', [
                'user' => $user,
                'company' => $company,
                'selectedPrivileges' => $selectedPrivileges
            ]);
        }



    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        if (!auth()->check()) {
            return redirect('dashboard');
        }
        $input = $request->all();
        session(['user' => $user]);
        $user->user_privilege_project = $request->has('user_privilege_project');
        $user->user_privilege_service = $request->has('user_privilege_service');
        $user->user_privilege_maintain = $request->has('user_privilege_maintain');
        $user->user_privilege_judge = $request->has('user_privilege_judge');
        $user->user_privilege_editall = $request->has('user_privilege_editall');

        if (!empty($request->password)) {
            $validatedData = $request->validate([
                'password' => 'required|confirmed',
            ]);
            $user->password = Hash::make($validatedData['password']);
            $user->save();
        }
        
        $input = $request->except(['password', 'password_confirmation']);     
        $input['updated_by'] = auth()->user()->id;  
        $user->update($input);
        
        
        return redirect()->route('user_result')->with('success', 'User updated successfully !');
    }

    public function mypage_update2(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        if (!auth()->check()) {
            return redirect('dashboard');
        }
        $input = $request->all();
        session(['user' => $user]);


        if (!empty($request->password)) {
            $validatedData = $request->validate([
                'password' => 'required|confirmed',
            ]);
            $user->password = Hash::make($validatedData['password']);
            $user->save();
        }
        
        $input = $request->except(['password', 'password_confirmation']);     
        $input['updated_by'] = auth()->user()->id;  
        $user->update($input);
        
        
        return redirect()->route('mypage_result')->with('success', 'User updated successfully !');
    }


    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('user')->with('success', 'Company deleted successfully');
    }

    public function backcompanypage() {
        return view('pages.dashboards.user.index');
    }
    public function create(){ 
        return view('pages.dashboards.user.create');
    }

    public function createNew(Request $request)
    {
        $uppbox = User::select('user_privilege_project', 'user_privilege_service', 'user_privilege_maintain', 'user_privilege_judge', 'user_privilege_editall')->get();
        
        
        $lastId = User::max('id');
        $newId = $lastId ? $lastId + 1 : 1;
        $companies = DB::table('companies') ->whereNull('companies.deleted_at')->get();

            return view('pages.dashboards.user.create', compact('newId', 'companies','uppbox','request',));
            
        }

    
    //create data
    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'company_id' => 'required',
        'loginid' => 'required|unique:users|max:15',
        'user_scope' => 'required',
        'user_privilege_project' => 'required' ,
        'user_privilege_service' => 'required' ,
        'user_privilege_maintain' => 'required',
        'user_privilege_judge'  => 'required',
        'user_privilege_editall' => 'required',
        'user_name'=> 'required',
        'email' => 'required|unique:users',
        'password' => 'required|confirmed',
        'language_type' => 'required',
        'reference' => 'nullable',
    ],[
        'loginid.required' => 'Please Enter The Login ID Information.',
        'loginid.unique' => 'The ID has already been taken.',
        'company_id.required' => 'Please Select a Company.',
        'user_scope.required' => 'Please Select a User Scope. ',
        'user_name.required' => 'Please Enter The Username Information.',
        'email.required' => 'Please Enter The Email Information.',
        'email.unique' => 'The Email has already been taken.',
        'password.required' => 'Please Enter The Password Information.',
        'password.confirmed' => 'รหัสผ่านไม่ตรงกัน'
    ]);
    

    $user = new User();
    $user->company_id = $validatedData['company_id'];
    $user->loginid = $validatedData['loginid'];
    $user->user_scope = $validatedData['user_scope'];
    $user->user_privilege_project = $validatedData['user_privilege_project'];
    $user->user_privilege_service = $validatedData['user_privilege_service'];
    $user->user_privilege_maintain = $validatedData['user_privilege_maintain'];
    $user->user_privilege_judge = $validatedData['user_privilege_judge'];
    $user->user_privilege_editall = $validatedData['user_privilege_editall'];
    $user->user_name = $validatedData['user_name'];
    $user->email = $validatedData['email'];
    $user->password = Hash::make($validatedData['password']);
    $user->language_type = $validatedData['language_type'];
    $user->reference = $validatedData['reference'];
    

    if (auth()->check()) {
        $user->created_by = auth()->user()->id; // เพิ่มชื่อผู้ล็อกอินที่สร้างรายการ
        $user->updated_by = auth()->user()->id;  // เพิ่มชื่อผู้ล็อกอินเป็น updated_by
    } else {
        return redirect()->route('dashboard'); // ส่งผู้ใช้ไปยังหน้า login หรือหน้าที่คุณต้องการ
    }
    $user->save();

    // return redirect()->route('user.index')->with('success', 'User created successfully.');
    session(['user' => $user]);
    return redirect()->route('user_result')->with('success', 'User created successfully !');
    //มีการเปลี่ยน ในส่วนของตัวfile ชื่อdatabase.php ในconfig เพื่อตรวจสอบการเพิ่มข้อมูล เปลี่ยนเพียงแค่ 'strict' => เป็น false จากที่เป็นtrue
}

public function user_delete($id)
    {
        $company = DB::table('companies')->get();
        $user = DB::table('users') ->orderBy('id');
        $user = $user 
            ->select(
                'users.*',
                 'companies.company_name as companyname',
                  'users.user_scope as typename',
                  'create_user_by.user_name as created_by',
                  'update_user_by.user_name as updated_by')
            ->where('users.id', $id)
            ->leftjoin('companies', 'users.company_id', '=', 'companies.id')
            ->leftjoin('users as create_user_by','users.created_by','=','create_user_by.id' )
            ->leftjoin('users as update_user_by','users.updated_by','=','update_user_by.id' )
            ->first();

        //return view('companies.show')->with('company', $company );
        return view('pages.dashboards.user.user_delete', ['user' => $user, 'company' => $company,]);
    }

public function mypage_result() {
    $users = Auth::user(); // ดึงข้อมูลผู้ล็อกอินที่กำลังเข้าสู่ระบบ
        $userjoin = User::leftJoin('companies', 'users.company_id', '=', 'companies.id')
        ->select('users.*', 'companies.company_name as company_name')
        ->where('users.id', $users->id)
        ->first();
        return view('pages.dashboards.user.mypage_result', compact('users','userjoin'));
}

// public function user_result() {
//     return view('pages.dashboards.user.result');
// }

public function user_result(Request $request)
    {
        $userid = session('user');

        $id = $userid->id;
        $company = DB::table('companies')->whereNull('companies.deleted_at')->get();
        $user = DB::table('users') ->orderBy('id');
        $user = $user 
            ->select(
                'users.*',
                 'companies.company_name as companyname',
                  'users.user_scope as typename',
                  'create_user_by.user_name as created_by',
                  'update_user_by.user_name as updated_by')
            ->where('users.id', $id)
            ->leftjoin('companies', 'users.company_id', '=', 'companies.id')
            ->leftjoin('users as create_user_by','users.created_by','=','create_user_by.id' )
            ->leftjoin('users as update_user_by','users.updated_by','=','update_user_by.id' )
            ->first();

        //return view('companies.show')->with('company', $company );
        return view('pages.dashboards.user.result', ['user' => $user, 'company' => $company,]);
    }

}
