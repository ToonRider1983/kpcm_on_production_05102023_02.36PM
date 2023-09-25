{{-- <div id="kt_app_header" class="app-header" style="left:0;background-color: #1995dc;width:100%;">
	<div class="app-container container-fluid d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
		<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
			<a href="/" class="d-lg-none">
				<img alt="Logo" src="{{ image('logos/images/logo_blue.png') }}" class="h-30px" />
			</a>
		</div>
		<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
			@include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/header/_menu/_menu')
			@include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/header/_navbar')
		</div>
	</div>
</div> --}}
@if(config('app.env') === 'local')
<style>
	.navbar .navbar-nav .nav-item a{
    padding: 15px;
}

.navbar .navbar-nav .nav-but {
    padding: 5px;
}

</style>
@php
    $AUuserData = (new \App\Http\Controllers\UserMasterController())->loginname();
@endphp

<nav class="navbar navbar-expand-lg" style="left:0;background-color: #808000;width:100%;">
    <div class="container-fluid">
        <a href="{{ url('/') }}"><img src="{{ image('logos/images/logo_blue.png') }}" alt="logo" style="width: 120px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-0 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fw-bold fs-4 text-white" aria-current="page" href="{{ url('/project') }}">Project</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold fs-4 text-white" href="{{ url('/service') }}">Service</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-bold fs-4  text-white" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Report
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('/servicesummary') }}">Service Summary</a></li>
                        <li><a class="dropdown-item" href="{{ url('/exportCSVfordistributor') }}">Export CSV for distributor</a></li>
                        <li><a class="dropdown-item" href="{{ url('/untouchedmachines') }}">Untouched Machines</a></li>
                        <li><a class="dropdown-item" href="{{ url('/unmaintainedmachine') }}"">Unmaintained machine</a></li>
                        <li><a class="dropdown-item" href="{{ url('/notoverhaulunit') }}">Not Overhaul Unit</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold fs-4  text-white" href="{{ url('/mypage/update') }}">My Page</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-bold fs-4  text-white" href="" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Master
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('/machine') }}">Machine Master</a></li>
                        <li><a class="dropdown-item" href="{{ url('/enduser') }}">End User Master</a></li>
                        <li><a class="dropdown-item" href="{{ url('/companies') }}">Company Master</a></li>
                        <li><a class="dropdown-item" href="{{ url('/user') }}">User Master</a></li>
                        <li><a class="dropdown-item" href="{{ url('/machinemodels') }}">Machine Model Master</a></li>
                        <li><a class="dropdown-item" href="{{ url('/machinetype') }}">Machine Type Master</a></li>
                        <li><a class="dropdown-item" href="{{ url('/industrialzone') }}">Industorial Zone Master</a></li>
                        <li><a class="dropdown-item" href="{{ url('/emails') }}">Mail Master</a></li>
                        <li><a class="dropdown-item" href="{{ url('/export_csv') }}">Export CSV</a></li>
                        <li><a class="dropdown-item" href="{{ url('/service_upload') }}">Service Upload</a></li>
                    </ul>
                </li>
            </ul>
            <span class="col-3  py-6">
                <label class="rounded px-3 py-2  text-white" style="background-color:red">Test</label>
            </span>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-but">
                    @if ($AUuserData)
                        <label class="pb-5 ps-3 pe-1 fw-bold fs-4"
                            style="color: #0000ff">{{ $AUuserData->user_name }}</label>
                        <label class="pt-5 ps-1 pe-3 fw-bold fs-4"
                            style="color: #0000ff">({{ $AUuserData->company_name }})</label>
                    @endif
                </li>
                <li class="nav-but">
                    <a class="btn btn-info fw-bold fs-4 button-ajax" href="" data-action="{{ route('logout') }}"
                        data-method="post" data-csrf="{{ csrf_token() }}" data-reload="true"><i
                            class="fa-solid fa-right-from-bracket"></i>&nbsp;Log out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


@else
<style>
	.navbar .navbar-nav .nav-item a{
    padding: 15px;
}

.navbar .navbar-nav .nav-but {
    padding: 5px;
}

</style>
@php
    $AUuserData = (new \App\Http\Controllers\UserMasterController())->loginname();
@endphp

<nav class="navbar navbar-expand-lg" style="left:0;background-color: #1995dc;width:100%;">
    <div class="container-fluid">
        <a href="{{ url('/') }}"><img src="{{ image('logos/images/logo_blue.png') }}" alt="logo" style="width: 120px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-0 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fw-bold fs-4 text-white" aria-current="page" href="{{ url('/project') }}">Project</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold fs-4 text-white" href="{{ url('/service') }}">Service</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-bold fs-4  text-white" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Report
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('/servicesummary') }}">Service Summary</a></li>
                        <li><a class="dropdown-item" href="{{ url('/exportCSVfordistributor') }}">Export CSV for distributor</a></li>
                        <li><a class="dropdown-item" href="{{ url('/untouchedmachines') }}">Untouched Machines</a></li>
                        <li><a class="dropdown-item" href="{{ url('/unmaintainedmachine') }}"">Unmaintained machine</a></li>
                        <li><a class="dropdown-item" href="{{ url('/notoverhaulunit') }}">Not Overhaul Unit</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold fs-4  text-white" href="{{ url('/mypage/update') }}">My Page</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-bold fs-4  text-white" href="" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Master
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('/machine') }}">Machine Master</a></li>
                        <li><a class="dropdown-item" href="{{ url('/enduser') }}">End User Master</a></li>
                        <li><a class="dropdown-item" href="{{ url('/companies') }}">Company Master</a></li>
                        <li><a class="dropdown-item" href="{{ url('/user') }}">User Master</a></li>
                        <li><a class="dropdown-item" href="{{ url('/machinemodels') }}">Machine Model Master</a></li>
                        <li><a class="dropdown-item" href="{{ url('/machinetype') }}">Machine Type Master</a></li>
                        <li><a class="dropdown-item" href="{{ url('/industrialzone') }}">Industorial Zone Master</a></li>
                        <li><a class="dropdown-item" href="{{ url('/emails') }}">Mail Master</a></li>
                        <li><a class="dropdown-item" href="{{ url('/export_csv') }}">Export CSV</a></li>
                        <li><a class="dropdown-item" href="{{ url('/service_upload') }}">Service Upload</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-but">
                    @if ($AUuserData)
                        <label class="pb-5 ps-3 pe-1 fw-bold fs-4"
                            style="color: #0000ff">{{ $AUuserData->user_name }}</label>
                        <label class="pt-5 ps-1 pe-3 fw-bold fs-4"
                            style="color: #0000ff">({{ $AUuserData->company_name }})</label>
                    @endif
                </li>
                <li class="nav-but">
                    <a class="btn btn-info fw-bold fs-4 button-ajax" href="" data-action="{{ route('logout') }}"
                        data-method="post" data-csrf="{{ csrf_token() }}" data-reload="true"><i
                            class="fa-solid fa-right-from-bracket"></i>&nbsp;Log out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@endif