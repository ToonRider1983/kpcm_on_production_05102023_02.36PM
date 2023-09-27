<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EmailMasterController extends Controller
{
    public function index(Request $request)
    
    {              //Search TextBox
        $emails = DB::table('emails')->orderBy('id');
        $country = DB::table('countries')->whereNull('countries.deleted_at')->get();

        if ($request->country != null) {
            $emails = $emails->Where('countries.country_name', $request-> country);
        }
        //Show LIST
        $emails = $emails
            ->select('emails.*', 'countries.country_name as ContryName', 'emails.email_type as typename')
            ->whereNull('emails.deleted_at') 
            ->leftjoin('countries', 'emails.country_id', '=', 'countries.id')      
            ->paginate(10);
        //return $query ;
        return view('pages.dashboards.emails.index', ['emails' => $emails, 'country' => $country]);
    }
    public function show($id)
    {
        $country = DB::table('countries')->get();
        $emails = DB::table('emails');
        $emails = $emails
            ->select('emails.*', 'countries.country_name as ContryName', 'emails.email_type as typename',
             'users.user_name as created_by',
            'users2.user_name as updated_by',)
            ->where('emails.id', $id)
            ->whereNull('emails.deleted_at') 
            ->leftjoin('users','emails.created_by','=','users.id')
            ->leftjoin('users as users2','emails.updated_by','=','users2.id')
            ->leftjoin('countries', 'emails.country_id', '=', 'countries.id')
            ->first();
        //return view('companies.show')->with('company', $company );
        return view('pages.dashboards.emails.show', ['emails' => $emails, 'country' => $country]);
    }
    
    public function edit($id)
    {
        $countries = DB::table('countries')->whereNull('countries.deleted_at')->get();
        $emails = DB::table('emails')->where('emails.id', $id);
        $emails = $emails
            ->select('emails.*', 'countries.country_name as ContryName', 'emails.email_type as typename',
            'users.user_name as created_by',
            'users2.user_name as updated_by',)
            ->whereNull('emails.deleted_at') 
            ->leftjoin('users','emails.created_by','=','users.id')
            ->leftjoin('users as users2','emails.updated_by','=','users2.id')
            ->leftjoin('countries', 'emails.country_id', '=', 'countries.id')
            ->first();
        return view('pages.dashboards.emails.edit', ['emails' => $emails, 'countries' => $countries]);
    }

    public function update(Request $request, $id)
    {
        $emails = Email::where('id', $id)->firstOrFail();
        if (!auth()->check()) {
            return redirect('dashboard');
        }
        $input = $request->all();
        $input['updated_by'] = auth()->user()->id; 
        $emails->update($input);
        // return redirect('emails_result')->with('success', 'Company updated successfully !');
        session(['email' => $emails]);
        return redirect()->route('emails_result')->with('success', 'Email updated successfully !');
    }
    public function destroy(string $id)
    {
        $emails = Email::findOrFail($id);
        $emails ->delete();
        return redirect('emails')->with('success', 'Company deleted successfully');
    }
    public function backcompanypage() {
        return view('pages.dashboards.emails.index');
    }
    //Create resource

    public function create(){ 
        return view('pages.dashboards.emails.create');
    }
    //CreateNew คือตามนี้
    //ดึง ID จากdatabase email ออโต้ ต่อจากid ล่าสุด
    //และมีการเรียกดูรายชื่อ Country จาก table counties เพื่อเอาข้อมูลไปเปิดใน create.blade form
    public function createNew()
    {   
        $lastId = Email::max('id');
        $newId = $lastId ? $lastId + 1 : 1;
        $countries = DB::table('countries')->whereNull('countries.deleted_at')->get();
        return view('pages.dashboards.emails.create', compact('newId', 'countries'));
    }
    
     //create data
     public function store(Request $request)
{
    $validatedData = $request->validate([
        'country_id' => 'required',
        'email_type' => 'required',
        'email_subject1' => 'required',
        'email_subject2' => 'nullable',
        'email_subject3' => 'nullable',
        'email_body1' => 'nullable',
        'email_body2' => 'nullable',
        'email_body3' => 'nullable',
        'email_footer' => 'nullable',
        'days' => 'nullable',
    ],[
        'country_id.required' => 'Please Select a Country.',
        'email_type.required' => 'Please Select a Mail Type.', 
        'email_subject1.required' => 'Please Enter The Subject.',
    ]);

    $email = new Email();
    $email->country_id = $validatedData['country_id'];
    $email->email_type = $validatedData['email_type'];
    $email->email_subject1 = $validatedData['email_subject1'];
    $email->email_subject2 = $validatedData['email_subject2'];
    $email->email_subject3 = $validatedData['email_subject3'];
    $email->email_body1 = $validatedData['email_body1'];
    $email->email_body2 = $validatedData['email_body2'];
    $email->email_body3 = $validatedData['email_body3'];
    $email->email_footer = $validatedData['email_footer'];
    // $email->days = $validatedData['days'];
    if (auth()->check()) {
        $email->created_by = auth()->user()->id; // เพิ่มชื่อผู้ล็อกอินที่สร้างรายการ
        $email->updated_by = auth()->user()->id;  // เพิ่มชื่อผู้ล็อกอินเป็น updated_by
    } else {
        return redirect()->route('dashboard'); // ส่งผู้ใช้ไปยังหน้า login หรือหน้าที่คุณต้องการ
    }
    $email->save();

    session(['email' => $email]);
    return redirect()->route('emails_result')->with('success', 'Email created successfully !');
    // return redirect()->route('emails.index')->with('success', 'Email created successfully.');
    //มีการเปลี่ยน ในส่วนของตัวfile ชื่อdatabase.php ในconfig เพื่อตรวจสอบการเพิ่มข้อมูล เปลี่ยนเพียงแค่ 'strict' => เป็น false จากที่เป็นtrue
}


public function email_delete($id)
    {
        $country = DB::table('countries')->get();
        $emails = DB::table('emails');
        $emails = $emails
            ->select('emails.*', 'countries.country_name as ContryName', 'emails.email_type as typename',
             'users.user_name as created_by',
            'users2.user_name as updated_by',)
            ->where('emails.id', $id)
            ->whereNull('emails.deleted_at') 
            ->leftjoin('users','emails.created_by','=','users.id')
            ->leftjoin('users as users2','emails.updated_by','=','users2.id')
            ->leftjoin('countries', 'emails.country_id', '=', 'countries.id')
            ->first();
        //return view('companies.show')->with('company', $company );
        return view('pages.dashboards.emails.email_delete', ['emails' => $emails, 'country' => $country]);
    }

public function email_result(Request $request)
    {
        $emailid = session('email');
        
        $id = $emailid->id;
        $country = DB::table('countries')->whereNull('countries.deleted_at')->get();
        $emails = DB::table('emails');
        $emails = $emails
            ->select('emails.*', 'countries.country_name as ContryName', 'emails.email_type as typename',
             'users.user_name as created_by',
            'users2.user_name as updated_by',)
            ->where('emails.id', $id)
            ->whereNull('emails.deleted_at')
            ->leftjoin('users','emails.created_by','=','users.id')
            ->leftjoin('users as users2','emails.updated_by','=','users2.id')
            ->leftjoin('countries', 'emails.country_id', '=', 'countries.id')
            ->first();
        //return view('companies.show')->with('company', $company );
        return view('pages.dashboards.emails.result', ['emails' => $emails, 'country' => $country]);
    }
}
