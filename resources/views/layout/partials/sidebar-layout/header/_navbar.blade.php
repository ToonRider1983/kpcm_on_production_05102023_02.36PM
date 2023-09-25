@php
    $AUuserData = (new \App\Http\Controllers\UserMasterController())->loginname();
@endphp

<div class="app-navbar flex-shrink-0">
	<div class="app-navbar-item ms-1 ms-md-3" id="kt_header_user_menu_toggle"> 
		@if($AUuserData)
		<label class="pb-5 ps-3 pe-1 fw-bold fs-4" style="color: #0000ff">{{ $AUuserData->user_name }}</label>
		<label class="pt-5 ps-1 pe-3 fw-bold fs-4" style="color: #0000ff">({{ $AUuserData->company_name }})</label>
		@endif
		<a class="btn btn-info fw-bold fs-4 button-ajax" href="" data-action="{{ route('logout') }}" data-method="post" data-csrf="{{ csrf_token() }}" data-reload="true">
            <i class="fa-solid fa-right-from-bracket"></i>&nbsp;Log out
        </a>
	</div>
	<div class="app-navbar-item d-lg-none ms-2 me-n3" title="Show header menu">
		<div class="btn btn-icon btn-active-color-primary w-30px h-30px w-md-35px h-md-35px" id="kt_app_header_menu_toggle"><i class="fw-bold fs-1 text-light fa-solid fa-bars"></i></div>
	</div>
</div>

