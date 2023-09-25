<?php

namespace App\Http\Controllers;

use App\Exports\CompanyExport;
use App\Models\Company;
use App\Models\Country;
use CSV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CompanyMasterController extends Controller
{
    //
    public function index(Request $request)
    {
        //Search TextBox
        $querycom = DB::table('companies')->orderBy('id');
        $country = DB::table('countries')->whereNull('countries.deleted_at')->get();
        if ($request->keyword != null) {
            $querycom = $querycom->Where('companies.company_name', 'like', '%' . $request->keyword . '%');
        }
        if ($request->country != null) {
            $querycom = $querycom->Where('countries.country_name', $request->country);
        }
        if ($request->has('company_type')) {
            $selectedTypes = $request->input('company_type');
            if (!empty($selectedTypes)) {
                $querycom = $querycom->whereIn('companies.company_type', $selectedTypes);
            }
        }
        //Show LIST
        $querycom = $querycom
        
            ->select('companies.*', 'countries.country_name as ContryName', 'companies.company_type as typename')
            ->whereNull('companies.deleted_at') 
            ->leftjoin('countries', 'companies.country_id', '=', 'countries.id')
            ->paginate(10); // แบ่งหน้าข้อมูลที่แสดงผลโดยแสดงทีละ 10 รายการ
        //return $query ;
        return view('pages.dashboards.company.companies', ['querycom' => $querycom, 'country' => $country]);
    }

    public function exportCSV(Request $request)
    {
        $querycom = DB::table('companies')
            ->select('companies.*', 'countries.country_name as CountryName', 'companies.company_type as TypeName')
            ->whereNull('companies.deleted_at') 
            ->leftjoin('countries', 'companies.country_id', '=', 'countries.id');

        if ($request->keyword != null) {
            $querycom->where('companies.company_name', 'like', '%' . $request->keyword . '%');
        }

        if ($request->country != null) {
            $querycom->where('countries.country_name', $request->country);
        }

        if ($request->has('company_type')) {
            $selectedTypes = $request->input('company_type');
            if (!empty($selectedTypes)) {
                $querycom->whereIn('companies.company_type', $selectedTypes);
            }
        }

        $companies = $querycom->get();

        $companyData = [];

        foreach ($companies as $company) {
            $TypeName = '';

            if ($company->company_type == 1) {
                $TypeName = 'Distributor';
            } elseif ($company->company_type == 2) {
                $TypeName = 'Administrator';
            }
            $companyData[] = [
                'ID' => $company->id,
                'Company Name' => $company->company_name,
                'Shot Name' => $company->company_short_name,
                'Country' => $company->CountryName,
                'Company Type' => $TypeName,
                'Updated' => $company->updated_at,
            ];
        }

        return CSV::download(new CompanyExport($companyData), 'companies.csv');
    }

    public function show($id)
    {
        $company = DB::table('companies')->orderBy('id');
        $country = DB::table('countries')->get();
        $company = $company
            ->select(
                'companies.*',
                'companies.id',
                'countries.country_name as ContryName',
                'companies.company_type as typename',
                'users.user_name as created_by',
                'users2.user_name as updated_by',
                'belongto_id.company_name as Belongto_name'
            )
            ->where('companies.id', $id)
            ->whereNull('companies.deleted_at') 
            ->leftjoin('companies as belongto_id', 'companies.belongto_id', '=', 'belongto_id.id')
            ->leftjoin('countries', 'companies.country_id', '=', 'countries.id')
            ->leftjoin('users', 'companies.created_by', '=', 'users.id')
            ->leftjoin('users as users2', 'companies.updated_by', '=', 'users2.id')
            ->first();

        //return view('companies.show')->with('company', $company );
        return view('pages.dashboards.company.show', ['company' => $company, 'country' => $country]);
    }

    public function edit($id)
    {
        $countries = DB::table('countries')->whereNull('countries.deleted_at')->get();
        $companies = DB::table('companies')->whereNull('companies.deleted_at')->get();
        $company = DB::table('companies as c');
        $company = $company
            ->select(
                'c.*',
                'c.company_name as company_name',
                'countries.country_name as ContryName',
                'c.company_type as typename',
                'p.company_name AS Belongto_name',
                'users.user_name as created_by',
                'users2.user_name as updated_by'
            )
            ->where('c.id', $id)
            ->whereNull('c.deleted_at') 
            ->leftjoin('users', 'c.created_by', '=', 'users.id')
            ->leftjoin('users as users2', 'c.updated_by', '=', 'users2.id')
            ->leftjoin('companies as p', 'c.belongto_id', '=', 'p.id')
            ->leftjoin('countries', 'c.country_id', '=', 'countries.id')
            ->first();
        return view('pages.dashboards.company.edit', ['company' => $company, 'countries' => $countries, 'companies' => $companies]);
    }
    public function update(Request $request, $id)
    {
        $company = Company::where('id', $id)->firstOrFail();
        if (!auth()->check()) {
            return redirect('dashboard');
        }
        $input = $request->all();
        $input['updated_by'] = auth()->user()->id;
        $company->update($input);
        
        // return redirect('companies_result')->with('success', 'Company updated successfully !');
        session(['company' => $company]);
        return redirect()->route('companies_result')->with('success', 'Company updated successfully !');
    }

    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect('companies')->with('success', 'Company deleted successfully');
    }

    public function backcompanypage()
    {
        return view('pages.dashboards.company.companies');
    }

    public function create()
    {
        return view('pages.dashboards.companies.create');
    }

    public function createNew(Request $request)
    {
        // $uppbox = Userk::select('user_privilege_project', 'user_privilege_service', 'user_privilege_maintain', 'user_privilege_judge', 'user_privilege_editall')->get();

        $lastId = Company::max('id');
        $newId = $lastId ? $lastId + 1 : 1;
        // $companies = Company::all()->take(11); // ดึงข้อมูล Company 12 รายการแรก
        $country = DB::table('countries')->whereNull('countries.deleted_at')->get();
        $companies = DB::table('companies AS c')
            ->select('c.id', 'c.company_type', 'c.belongto_id', 'p.company_name AS Belongto_name')
            ->whereNull('c.deleted_at') 
            ->leftJoin('companies AS p', 'c.belongto_id', '=', 'p.id')
            ->get();

        return view('pages.dashboards.company.create', compact('newId', 'companies', 'country', ));

    }

    //create data
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company_type' => 'required',
            'country_id' => 'required',
            'belongto_id' => 'nullable',
            'smap_cd' => 'nullable',
            'company_name' => 'required|unique:companies',
            'company_short_name' => 'nullable',
            'address1' => 'nullable',
            'address2' => 'nullable',
            'telephone' => 'nullable',
        ], [
            'company_type.required' => 'Please Select a Type.',
            'country_id.required' => 'Please Select a Country.',
            'company_name.unique' => 'The Company Name Already Exists In The System.',
            'company_name.required' => 'Please Enter The Company Information.',
        ]);

        $companies = new Company();
        $companies->company_type = $validatedData['company_type'];
        $companies->country_id = $validatedData['country_id'];
        $companies->belongto_id = $validatedData['belongto_id'];
        $companies->smap_cd = $validatedData['smap_cd'];
        $companies->company_name = $validatedData['company_name'];
        $companies->company_short_name = $validatedData['company_short_name'];
        $companies->address1 = $validatedData['address1'];
        $companies->address2 = $validatedData['address2'];
        $companies->telephone = $validatedData['telephone'];
        if (auth()->check()) {
            $companies->created_by = auth()->user()->id; // เพิ่มชื่อผู้ล็อกอินที่สร้างรายการ
            $companies->updated_by = auth()->user()->id; // เพิ่มชื่อผู้ล็อกอินเป็น updated_by
        } else {
            return redirect()->route('dashboard'); // ส่งผู้ใช้ไปยังหน้า login หรือหน้าที่คุณต้องการ
        }

        $companies->save();
        
        session(['company' => $companies]);
        return redirect()->route('companies_result')->with('success', 'Company created successfully !');
        // return redirect(url('/companies_result'))->with('success', 'User created successfully.');
        //มีการเปลี่ยน ในส่วนของตัวfile ชื่อdatabase.php ในconfig เพื่อตรวจสอบการเพิ่มข้อมูล เปลี่ยนเพียงแค่ 'strict' => เป็น false จากที่เป็นtrue

    }

    public function company_delete($id)
    {
        $company = DB::table('companies')->orderBy('id');
        $country = DB::table('countries')->get();
        $company = $company
            ->select(
                'companies.*',
                'companies.id',
                'countries.country_name as ContryName',
                'companies.company_type as typename',
                'users.user_name as created_by',
                'users2.user_name as updated_by',
                'belongto_id.company_name as Belongto_name'
            )
            ->where('companies.id', $id)
            ->leftjoin('companies as belongto_id', 'companies.belongto_id', '=', 'belongto_id.id')
            ->leftjoin('countries', 'companies.country_id', '=', 'countries.id')
            ->leftjoin('users', 'companies.created_by', '=', 'users.id')
            ->leftjoin('users as users2', 'companies.updated_by', '=', 'users2.id')
            ->first();

        return view('pages.dashboards.company.company_delete')->with('company', $company );
        // return view('pages.dashboards.company.company_delete');
    }

    // public function company_result() {
    //     return view('pages.dashboards.company.result');
    // }

    public function company_result(Request $request)
    {
        $companyid = session('company');

        $id = $companyid->id;
        $company = DB::table('companies')->whereNull('companies.deleted_at')->orderBy('id');
        $country = DB::table('countries')->whereNull('countries.deleted_at')->get();
        $company = $company
            ->select(
                'companies.*',
                'companies.id',
                'countries.country_name as ContryName',
                'companies.company_type as typename',
                'users.user_name as created_by',
                'users2.user_name as updated_by',
                'belongto_id.company_name as Belongto_name'
            )
            ->where('companies.id', $id)
            ->whereNull('companies.deleted_at')
            ->leftjoin('companies as belongto_id', 'companies.belongto_id', '=', 'belongto_id.id')
            ->leftjoin('countries', 'companies.country_id', '=', 'countries.id')
            ->leftjoin('users', 'companies.created_by', '=', 'users.id')
            ->leftjoin('users as users2', 'companies.updated_by', '=', 'users2.id')
            ->first();

        //return view('companies.show')->with('company', $company );
        return view('pages.dashboards.company.result', ['company' => $company, 'country' => $country]);
    }
}
