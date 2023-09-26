<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyMasterController;
use App\Http\Controllers\Machinetype1MasterController;
use App\Http\Controllers\IndustrialzoneMasterController;
use App\Http\Controllers\EmailMasterController;
use App\Http\Controllers\UserMasterController;
use App\Http\Controllers\MachinemodelMasterController;
use App\Http\Controllers\MachineMasterController;
use App\Http\Controllers\CustomerMasterController;
use App\Http\Controllers\ServiceUploadController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceSummaryController;
use App\Http\Controllers\ExportCSVController;
use App\Http\Controllers\ExportCSVfordistributorController;
use App\Http\Controllers\UntouchedMachinesController;
use App\Http\Controllers\UnmaintainedMachineController;
use App\Http\Controllers\NotOverhaulUnitController;
use App\Http\Controllers\PDFController;

Route::get('/generate-pdf/{machine_id}/{id}', [PDFController::class, 'generatePDF'])->name('generatePDF');







Route::resource('companies', CompanyMasterController::class);
Route::resource('machinetype', Machinetype1MasterController::class);
Route::resource('industrialzone', IndustrialzoneMasterController::class);
Route::resource('emails', EmailMasterController::class);
Route::resource('user', UserMasterController::class);
Route::resource('machinemodels', MachinemodelMasterController::class);
Route::resource('machine', MachineMasterController::class);
Route::resource('enduser', CustomerMasterController::class);
Route::resource('service_upload', ServiceUploadController::class);
Route::resource('homeindex', HomeIndexController::class);
Route::resource('project', ProjectController::class);
Route::resource('service', ServiceController::class);
Route::resource('export_csv', ExportCSVController::class);


Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/error', function () {
abort(500);
});


Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);
require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {
Route::get('companies', [CompanyMasterController::class, 'index']);
Route::get('/companies/create', [CompanyMasterController::class, 'createNew'])->name('companies.create');
Route::get('/companies/{companycode}/show', 'CompanyMasterController@show')->name('pages.dashboards.show');
Route::get('/companies/{id}/edit', 'CompanyMasterController@edit')->name('pages.dashboards.edit');
Route::put('/companies/{companycode}', 'CompanyMasterController@update')-> name ('pages.dashboards.update');
Route::get('/exportcompa/csv', [CompanyMasterController::class, 'exportCSV'])->name('companies.export');
Route::get('/companies/{id}/delete', [CompanyMasterController::class, 'company_delete'])->name('companies_delete');
Route::get('/companies_result', [CompanyMasterController::class, 'company_result'])->name('companies_result');

Route::resource('/machinetype', Machinetype1MasterController::class);
Route::get('/machinetype/create', [Machinetype1MasterController::class, 'createNew'])->name('machinetype.create');
Route::get('/machinetype/{id}/show', 'Machinetype1MasterController@show')->name('pages.dashboards.machinetype.show');
Route::get('/machinetype/{id}/edit', 'Machinetype1MasterController@edit')-> name ('pages.dashboards.machinetype.edit');
Route::put('/machinetype/{id}', 'Machinetype1MasterController@update')-> name ('pages.dashboards.machinetype.update');
Route::get('/exporttype/csv', [Machinetype1MasterController::class, 'exportCSV'])->name('machinetype.export');
Route::get('/machinetype/{id}/delete', [Machinetype1MasterController::class, 'machinetype_delete'])->name('machinetype_delete');
Route::get('/machinetype_result', [Machinetype1MasterController::class, 'machinetype_result'])->name('machinetype_result');

Route::resource('/industrialzone', IndustrialzoneMasterController::class);
Route::get('/industrialzone/create', [IndustrialzoneMasterController::class, 'createNew'])->name('industrialzone.create');
Route::post('/dropdownindust/fetchIndustrial', [IndustrialzoneMasterController::class, 'fetch'])->name('dropdownindust.fetchIndustrial');
Route::post('/indust/fetchIndust', [IndustrialzoneMasterController::class, 'fetch2'])->name('dropdownindust.fetchIndust');
Route::get('/industrialzone/{id}/show', 'IndustrialzoneMasterController@show')->name('pages.dashboards.industrialzone.show');
Route::get('/industrialzone/{id}/edit', 'IndustrialzoneMasterController@edit')-> name ('pages.dashboards.industrialzone.edit');
Route::put('/industrialzone/{id}', 'IndustrialzoneMasterController@update')-> name ('pages.dashboards.industrialzone.update');
Route::get('/exportIndust/csv', [IndustrialzoneMasterController::class, 'exportCSV'])->name('industrialzone.export');
Route::get('/industrialzone/{id}/delete', [IndustrialzoneMasterController::class, 'industrialzone_delete'])->name('industrialzone_delete');
Route::get('/industrialzone_resulte', [IndustrialzoneMasterController::class, 'industrialzone_resulte'])->name('industrialzone_resulte');

Route::resource('/emails', EmailMasterController::class);
Route::get('/emails/create', [EmailMasterController::class, 'createNew'])->name('emails.create');
Route::get('/emails/{id}/show', 'EmailMasterController@show')->name('pages.dashboards.emails.show');
Route::get('/emails/{id}/edit', 'EmailMasterController@edit')-> name ('pages.emails.edit');
Route::put('/emails/{id}', 'EmailMasterController@update')-> name ('pages.dashboards.emails.update');
Route::get('/emails/{id}/delete', [EmailMasterController::class, 'email_delete'])->name('email_delete');
Route::get('/emails_result', [EmailMasterController::class, 'email_result'])->name('emails_result');

Route::resource('/user', UserMasterController::class);
Route::get('/user/create', [UserMasterController::class, 'createNew'])->name('user.create');
Route::get('/user/{id}/show', 'UserMasterController@show')->name('pages.dashboards.user.show');
Route::get('/user/{id}/edit', 'UserMasterController@edit')-> name ('pages.user.edit');
Route::put('/user/{id}', 'UserMasterController@update')-> name ('pages.dashboards.user.update');
Route::get('/exportuser/csv', [UserMasterController::class, 'exportCSV'])->name('user.export');
Route::get('/user/{id}/delete', [UserMasterController::class, 'user_delete'])->name('user_delete');
Route::get('/user_result', [UserMasterController::class, 'user_result'])->name('user_result');

Route::resource('/machinemodels', MachinemodelMasterController::class);
Route::get('/machinemodels/create', [MachinemodelMasterController::class, 'createNew'])->name('machinemodels.create');
Route::get('/machinemodels/{id}/show', 'MachinemodelMasterController@show')->name('pages.dashboards.machinemodels.show');
Route::get('/machinemodels/{id}/edit', 'MachinemodelMasterController@edit')->name ('pages.machinemodels.edit');
Route::put('/machinemodels/{id}', 'MachinemodelMasterController@update')->name ('pages.dashboards.machinemodels.update');
Route::get('/machinemodels/{id}/delete', [MachinemodelMasterController::class, 'machinemodel_delete'])->name('machinemodel_delete');
Route::get('/expormodels/csv', [MachinemodelMasterController::class, 'exportCSV'])->name('machinemodels.export');
Route::get('/machinemodel_result', [MachinemodelMasterController::class, 'machinemodel_result'])->name('machinemodel_result');

Route::resource('/machine', MachineMasterController::class);
Route::get('/machine/create', [MachineMasterController::class, 'createNew'])->name('machine.create');
Route::post('/dropdowncompa/fetchIndustrial', [MachineMasterController::class, 'fetch'])->name('dropdowncompa.fetchIndustrial');
Route::get('/searchcustomer', [MachineMasterController::class, 'searchcustomer'])->name('searchcustomer');
Route::get('/machine/{id}/show', 'MachineMasterController@show')->name('pages.dashboards.machine.show');
Route::get('/machine/{id}/edit', 'MachineMasterController@edit')-> name ('pages.machine.edit');
Route::put('/machine/{id}', 'MachineMasterController@update')->name ('pages.dashboards.machine.update');
Route::get('/exportmachine/csv', [MachineMasterController::class, 'exportCSV'])->name('machine.export');
Route::get('/machine/{id}/delete', [MachineMasterController::class, 'machine_delete'])->name('machine_delete');
Route::get('/machine_result', [MachineMasterController::class, 'machine_result'])->name('machine_result');

Route::resource('/enduser', CustomerMasterController::class);
Route::get('/enduser/create', [CustomerMasterController::class, 'drop'])->name('enduser.create');
Route::post('/dropdown/fetch', [CustomerMasterController::class, 'fetch'])->name('dropdown.fetch'); //ในส่วนของJs
Route::post('/dropdown/fetchIndustrial', [CustomerMasterController::class, 'fetch'])->name('dropdown.fetchIndustrial');//ในส่วนของJs
Route::post('/myinput/updateSession', [CustomerMasterController::class, 'updateSession'])->name('myinput.updateSession');
Route::get('/exportenduser/csv', [CustomerMasterController::class, 'exportCSV'])->name('enduser.export');

Route::get('/enduser/show', [CustomerMasterController::class, 'show'])->name('enduser.show');
Route::get('/enduser/edit', [CustomerMasterController::class, 'edit'])->name('enduser.edit');
Route::get('/enduser/{id}/delete', [CustomerMasterController::class, 'enduser_delete'])->name('enduser_delete');
Route::get('/enduser_result', [CustomerMasterController::class, 'enduser_result'])->name('enduser_result');




Route::resource('/service_upload', ServiceUploadController::class);

Route::resource('/project', ProjectController::class);
Route::get('/project/create', [ProjectController::class, 'createNew'])->name('project.create');
Route::post('/dropdown/fetchIndustrial', [ProjectController::class, 'fetch'])->name('dropdown.fetchIndustrial');//ในส่วนของJs
Route::post('/dropdown/fetchUsers', [ProjectController::class, 'fetchUsers'])->name('dropdown.fetchUsers');//ในส่วนของJs
Route::post('/dropdown/fetchUsers2', [ProjectController::class, 'fetchUsers2'])->name('dropdown.fetchUsers2');//ในส่วนของJs
Route::post('/search', [ProjectController::class, 'search'])->name('dropdown.searchproject');//ในส่วนของJs

Route::post('/project/clrSession', [ProjectController::class, 'clearSession'])->name('project.clrSession');
Route::get('/customerpro/fetchCustomer', [ProjectController::class, 'fetchCustomer'])->name('fetchCustomer');
Route::get('/project/{id}/show', [ProjectController::class, 'show'])->name('show');
Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
Route::get('/project_result', [ProjectController::class, 'result'])->name('result');

Route::resource('/service', ServiceController::class);
Route::get('/service_show', [ServiceController::class, 'show'])->name('show');
Route::get('/service_edit', [ServiceController::class, 'edit'])->name('edit');
Route::get('/edit_show', [ServiceController::class, 'edit_show'])->name('edit_show');
Route::get('/service_free', [ServiceController::class, 'add'])->name('add');//oil_free
Route::get('/service_flood', [ServiceController::class, 'add_oil_flood'])->name('add_oil_flood'); //oil_flood
Route::post('/service_save/{id}', [ServiceController::class, 'saveData'])->name('save');
Route::get('/show_oil_flood',  [ServiceController::class, 'show_oil_flood'])->name('show_oil_flood');
Route::get('/show_oil_free',  [ServiceController::class, 'show_oil_free'])->name('show_oil_free');
Route::get('/history',  [ServiceController::class, 'history'])->name('history');

Route::get('service/modify_OFL/{machine_id}/{id}',   [ServiceController::class, 'edit_oil_flood'])->name('edit_oil_flood');
Route::get('service/modify_OF/{machine_id}/{id}', [ServiceController::class, 'edit_oil_free'])->name('edit_oil_free');
Route::get('/service/edit/{id}', 'ServiceController@edit')->name('service.edit');
Route::post('/edit_show/{id}', [ServiceController::class, 'update'])->name('service.update');
Route::post('/update_history/{Id}/{machine_id}/{service_idx}', [ServiceController::class, 'update_history'])->name('update_history');
Route::get('/show_history/{Id}',  [ServiceController::class, 'show_history'])->name('show_history');

Route::resource('/homeindex', HomeIndexController::class);

Route::resource('/servicesummary', ServiceSummaryController::class);

Route::resource('/exportCSVfordistributor', ExportCSVfordistributorController::class);

Route::resource('/untouchedmachines', UntouchedMachinesController::class);


Route::resource('/testlogin', testlogin::class);

Route::get('/mypage_result', [UserMasterController::class, 'mypage_result'])->name('mypage_result');

Route::get('/unmaintainedmachine', [UnmaintainedMachineController::class, 'index'])->name('unmaintainedmachine');
Route::get('/exportunmaintained/csv', [UnmaintainedMachineController::class, 'exportCSV'])->name('unmaintainedmachine.export');

Route::get('/notoverhaulunit', [NotOverhaulUnitController::class, 'index'])->name('notoverhaulunit');
Route::get('/exportnotover/csv', [NotOverhaulUnitController::class, 'exportCSV'])->name('notoverhaulunit.export');
});