<div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
    data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
    data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end"
    data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
    data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
    data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
    <div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
        id="kt_app_header_menu" data-kt-menu="true">
        <div data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-0 me-lg-2">
            <span>
                <a href="/">
                    <img alt="Logo" src="{{ image('logos/images/logo_blue.png') }}"
                        class="h-20px h-30px app-sidebar-logo-default" />
                </a>
            </span>
        </div>
        <div data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-0 me-lg-2">
            <span class="menu-link">
                <a href="{{ url('/project') }}">
                    <span class="menu-title fw-bold fs-4 text-gray-800">Project</span>
                    <span class="menu-arrow d-lg-none"></span>
                </a>
            </span>
        </div>
        <div data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-0 me-lg-2">
            <span class="menu-link">
                <a href="{{ url('/service') }}">
                    <span class="menu-title fw-bold fs-4 text-gray-800">Service</span>
                    <span class="menu-arrow d-lg-none"></span>
                </a>
            </span>
        </div>
        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"
            class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
            <span class="menu-link">
                <span class="menu-title fw-bold fs-4 text-gray-800">Report</span>
                <span class="menu-arrow d-lg-none"></span>
            </span>
            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px">
                <div class="menu-item">
                    <a class="menu-link" href="{{ url('/servicesummary') }}" data-bs-toggle="tooltip"
                        data-bs-trigger="hover" data-bs-dismiss="click">
                        <span class="menu-title">Service Summary</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="{{ url('/exportCSVfordistributor') }}" data-bs-toggle="tooltip"
                        data-bs-trigger="hover" data-bs-dismiss="click">
                        <span class="menu-title">Export CSV for distributor</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="{{ url('/untouchedmachines') }}">
                        <span class="menu-title">Untouched Machines</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="{{ url('/unmaintainedmachine') }}" > 
                        <span class="menu-title">Unmaintained machine</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="{{ url('/notoverhaulunit') }}">
                        <span class="menu-title">Not Overhaul Unit</span>
                    </a>
                </div>
            </div>
        </div>
        <div data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-0 me-lg-2">
            <span class="menu-link">
                <a href="{{ url('/mypage/update') }}">
                    <span class="menu-title fw-bold fs-4 text-gray-800">My Page</span>
                    <span class="menu-arrow d-lg-none"></span>
                </a>
            </span>
        </div>
        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"
            class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
            <span class="menu-link">
                <span class="menu-title fw-bold fs-4 text-gray-800">Master</span>
                <span class="menu-arrow d-lg-none"></span>
            </span>
            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px">
                <div class="menu-item">
                    <a class="menu-link" href="{{ url('/machine') }}" data-bs-toggle="tooltip" data-bs-trigger="hover"
                        data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-title">Machine Master</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="{{ url('/enduser') }}" data-bs-toggle="tooltip" data-bs-trigger="hover"
                        data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-title">End User Master</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="{{ url('/companies') }}">
                        <span class="menu-title">Company Master</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="{{ url('/user') }}">
                        <span class="menu-title">User Master</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="{{ url('/machinemodels') }}">
                        <span class="menu-title">Machine Model Master</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="{{ url('/machinetype') }}">
                        <span class="menu-title">Machine Type Master</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="{{ url('/industrialzone') }}">
                        <span class="menu-title">Industorial Zone Master</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="{{ url('/emails') }}">
                        <span class="menu-title">Mail Master</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="{{ url('/export_csv') }}">
                        <span class="menu-title">Export CSV</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="{{ url('/service_upload') }}">
                        <span class="menu-title">Service Upload</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


