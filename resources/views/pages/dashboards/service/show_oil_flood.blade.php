<x-default-layout>
    <style>
        .card {
            background-color: #fff;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
        }

        .col-add {
            display: flex;
        }

        .center {
            display: flex;
            justify-content: center;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .numpad {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            max-width: 200px;
            margin: auto;
            margin-top: 20px;
        }

        .numpad button {
            padding: 10px;
            font-size: 18px;
            width: 100%;
        }
    </style>

    <div class="container">
        <label class="h1 mb-5 fw-bold">Service - Result</label>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @php
            $text_content = ''; 
            $text_site_condition = '';
            $text_monitor = '';
            $text_battery = '';
            $text_sensor = '';
            $text_ocr = '';
            $text_magnetic = '';
            $text_presssensor = '';
            $text_tempsensor = '';
            $text_flowswitch = '';
            $text_discharge = '';

        @endphp
        
        {{-- Service Content --}}
        @if ($key->service_content == 6)
            @php
                $text_content = "PATROL SERVICE/CLEANUP";
            @endphp
        @elseif ($key->service_content == 3)
            @php
                $text_content = "ANNUAL INSPECTION/PARTS CHANGE";
            @endphp
        @elseif ($key->service_content == 4)
            @php
                $text_content = "REPAIR";
            @endphp
        @elseif ($key->service_content == 2)
            @php
                $text_content = "OVERHAUL";
            @endphp
        @elseif ($key->service_content == 1)
            @php
                $text_content = "COMMISSIONING";
            @endphp
        @elseif ($key->service_content == 5)
            @php
                $text_content = "WARRANTY CLAIM RELATED";
            @endphp
        @elseif ($key->service_content == 8)
            @php
                $text_content = "EMERGENCY CALL/CHCKUP";
            @endphp
        @elseif ($key->service_content == 7)
            @php
                $text_content = "OTHERS/ETC";
            @endphp
        @endif


        {{-- Ventilation --}}
        @if ($key->site_ventilation == 1)
            @php
                $text_site_condition = "Good ";
            @endphp
        @elseif ($key->site_ventilation == 2)
            @php
                $text_site_condition = "Fair";
            @endphp
        @elseif ($key->site_ventilation == 3)
            @php
                $text_site_condition = "Not Goog";
            @endphp
        @elseif ($key->site_ventilation == 0)
            @php
                $text_site_condition = "N/A";
            @endphp
        @endif





        <div class="col-12 text-end">
            <button type="button" class="btn btn-primary" onclick="printPDF(<?php echo $key->machine_id ?>, <?php echo $key->id ?>)"><i class="fa-solid fa-print"></i>&nbsp;Print</button>
        </div>
        <form method="POST" action="">
            @csrf
            @method('PUT')

            <div class="card-container mb-4 ">
                <div class="card-body">
                    <ul class="nav nav-tabs fs-1 fw-bold vertical-center text-gray-900">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">Simple</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">Report</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane show active" id="kt_tab_pane_1" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-lg-12 rounded-2 bg-light text-dark my-4 py-3 px-3">
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-3 text-start">
                                                Index :
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-5 text-md-start col-9 text-start pb-5 pt-1">
                                                <label class="pt-3" for="">{{$key->service_idx}}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-3 text-start">
                                                Serial# :
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-5 text-md-start col-9 text-start pb-5">
                                                <label class="pt-3" for="">{{$key->serial}}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                                                Machine Type Code :
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                                                <label class="pt-3" for="">{{$key->machine_cd}}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                                                Service Company :
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                                                <label class="pt-3" for="">{{$key->company_name}}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                                                End User :
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                                                <label class="pt-3" for="">{{$key->customer_name1}}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 rounded-2 bg-light text-dark my-4 py-3 px-3">
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-6 text-start">
                                                Service Date :
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-5 text-md-start col-6 text-start pb-5">
                                                <label class="pt-3" for="">{{$key->service_dt}}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                                                Service Content :
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                                                <label class="pt-3" for="">{{$text_content}}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                                                Service Performer :
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                                                <label class="pt-3" for="">{{$key->service_performer}}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                                                Customer PIC :
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                                                <label class="pt-3" for="">{{$key->customer_pic}}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 rounded-2 bg-light text-dark my-4 py-3 px-3">
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-6 text-start">
                                                Runing Hours :
                                            </div>
                                            <div
                                                class="col-lg-7 text-lg-start col-md-7 text-md-start col-6 text-start pb-5">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-3 text-lg-start col-md-3 col-md-start col-12 col-start">
                                                        <label class="pt-3" for="">{{$key->running_hours}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-6 text-start">
                                                Panel Generation :
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-7 text-md-start col-6 text-start pb-5">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-3 text-lg-start col-md-3 col-md-start col-12 col-start">
                                                        <label class="pt-3" for="">{{$key->panel_version_current}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 rounded-2 bg-light text-dark my-4 py-3 px-3">
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                                                Remarks :
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                                                <label class="pt-3" for="">{{$key->remarks}}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 rounded-2 bg-light text-dark my-4 py-3 px-3">
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-6 text-start">
                                                Created :
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-5 text-md-start col-6 text-start pb-5">
                                                <label class="pt-4" ><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ \Carbon\Carbon::parse($key->created_at)->format('d/m/Y') }}&nbsp;{{ \Carbon\Carbon::parse($key->created_at)->format('H:i') }}&nbsp;
                                                    <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $key->created_by }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-6 text-start">
                                                Updated :
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-5 text-md-start col-6 text-start pb-5">
                                                <label class="pt-4" ><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ \Carbon\Carbon::parse($key->updated_at)->format('d/m/Y') }}&nbsp;{{ \Carbon\Carbon::parse($key->updated_at)->format('H:i') }}&nbsp;
                                                    <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $key->updated_by }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane " id="kt_tab_pane_2" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row pt-5 pb-3">
                                        <div class="col-lg-2 col-md-3 col-12">
                                            <img alt="Logo"
                                                src="{{ image('logos/images/kobelco_100x21_blue.png') }}"
                                                class="h-25px app-sidebar-logo-default" />
                                        </div>
                                        <div class="col-lg-4 text-lg-start col-md-9 text-lg-start col-12 text-start">
                                            <label class="fs-3 fw-bold" for="">OIL FLOODED COMPRESSOR SERVICE
                                                REPORT</label>
                                        </div>
                                        <div class="col-lg-2 text-lg-end col-md-2 text-md-end col-12">

                                        </div>
                                        <div class="pt-3 col-lg-4 text-lg-end col-md-12 text-md-end col-12">
                                            <div class="row">
                                                <div
                                                    class="col-lg-9 text-lg-end col-md-3 text-md-start col-6 text-start">
                                                    <label class="fs-5 fw-bold" for="">Unit of
                                                        Pressure</label>
                                                </div>
                                                <div
                                                    class="col-lg-3 text-lg-end col-md-2 text-md-start col-6 text-start">
                                                    <label class="form-check-label" for="bar,mbar">
                                                        bar, mbar
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-5 mb-4">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div
                                                class="py-3 p-3 rounded-2 bg-light text-dark col-lg-12 text-lg-start col-md-12 text-md-start col-12">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-3 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                        <u class="fw-bold fs-6 text-gray-800">End User Name</u>
                                                    </div>
                                                    <div
                                                        class="col-lg-9 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                        <label for="">{{$key->customer_name1}}</label>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div
                                                        class="col-lg-3 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                        <u class="fw-bold fs-6 text-gray-800">Address</u>
                                                    </div>
                                                    <div
                                                        class="col-lg-9 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                        <label for="">{{ $key->address1}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div
                                                class="py-3 p-3 rounded-2 bg-light text-dark col-lg-12 text-lg-end col-md-12 text-md-start col-12">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12 col-12">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-6 text-lg-start col-md-4 text-md-start col-6 text-start">
                                                                <label
                                                                    class="pt-3 fw-bold fs-6 text-gray-800">Date<b class="h1" style="color: red;z-index: 1040;">&#42;</b></label>
                                                            </div>
                                                            <div
                                                                class="col-lg-6 text-lg-start col-md-8 text-md-start col-6 text-start my-3">
                                                                <label class="pt-3"
                                                                    for=""></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-12">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-6 text-lg-start col-md-4 text-md-start col-6 text-start">
                                                                <label class="pt-6 fw-bold fs-6 text-gray-800">Report
                                                                    No.</label>
                                                            </div>
                                                            <div
                                                                class="col-lg-6 text-lg-start col-md-8 text-md-start col-6 text-start my-3">
                                                                <label class="pt-3" for="">{{$key->report_no}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12 col-12">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-auto text-lg-start col-md-5 text-md-start col-6 text-start">
                                                                <label class="pt-3 fw-bold fs-6 text-gray-800">Work
                                                                    Start Date<b class="h1" style="color: red;z-index: 1040;">&#42;</b></label>
                                                            </div>
                                                            <div
                                                                class="col-lg-6 text-lg-end col-md-7 text-md-start col-6 text-start my-3">
                                                                <label class="pt-3"
                                                                    for="">01/01/1999</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-12">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-6 text-lg-start col-md-5 text-md-start col-6 text-start">
                                                                <label class="pt-6 fw-bold fs-6 text-gray-800">Work
                                                                    Finish Date</label>
                                                            </div>
                                                            <div
                                                                class="col-lg-6 text-lg-end col-md-7 text-md-start col-6 text-start my-3">
                                                                <label class="pt-3"
                                                                    for="">01/01/1999</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-lg-12 text-lg-center col-md-12 text-md-center col-12 text-center">
                                                    <label for=""
                                                        class="fw-bold fs-4 text-gray-800 pt-5">{{$key->company_name}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-12 mb-4">
                                        <div class="py-3 row rounded-2 bg-light text-dark">
                                            <div class="col-lg-2 col-lg-start col-md-12 col-md-start col-12 col-start">
                                                <u class="fw-bold fs-6 text-gray-800">MACHINE DATA</u>
                                            </div>
                                            <div class="col-lg-10 col-md-12 col-12">
                                                <div class="row">
                                                    <span class="col-lg-4 col-md-4 col-12">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-6 text-lg-start col-md-7 text-md-start col-6 text-start">
                                                                <label class="fw-bold fs-6 text-gray-800"
                                                                    for="">Model</label>
                                                            </div>
                                                            <div
                                                                class="col-lg-6 text-lg-start col-md-5 text-md-start col-6 text-start">
                                                                <label for="">{{$key->machine_cd}}</label>
                                                            </div>
                                                        </div>
                                                    </span>
                                                    <span class="col-lg-4 col-md-4 col-12">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-6 text-lg-start col-md-7 text-md-start col-6 text-start">
                                                                <label class="fw-bold fs-6 text-gray-800"
                                                                    for="">Serial No.</label>
                                                            </div>
                                                            <div
                                                                class="col-lg-6 text-lg-start col-md-5 text-md-start col-6 text-start">
                                                                <label for="">{{$key->serial}}</label>
                                                            </div>
                                                        </div>
                                                    </span>
                                                    <span class="col-lg-4 col-md-4 col-12">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-6 text-start">
                                                                <label class="fw-bold fs-6 text-gray-800"
                                                                    for="">O.No.</label>
                                                            </div>
                                                            <div
                                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-6 text-start">
                                                                <label for="">{{ $key->ksl_order_cd}}</label>
                                                            </div>
                                                        </div>
                                                    </span>
                                                </div>
                                                <div class="row">
                                                    <span class="col-lg-4 col-md-4 col-12">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-6 text-lg-start col-md-8 text-md-start col-6 text-start">
                                                                <label class="fw-bold fs-6 text-gray-800"
                                                                    for="">Year of Manufacture</label>
                                                            </div>
                                                            <div
                                                                class="col-lg-6 text-lg-start col-md-4 text-md-start col-6 text-start">
                                                                <label for=""></label>
                                                            </div>
                                                        </div>
                                                    </span>
                                                    <span class="col-lg-4 col-md-4 col-12">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-6 text-lg-start col-md-7 text-md-start col-6 text-start">
                                                                <label class="fw-bold fs-6 text-gray-800"
                                                                    for="">Customer MC No.</label>
                                                            </div>
                                                            <div
                                                                class="col-lg-6 text-lg-start col-md-5 text-md-start col-6 text-start">
                                                                <label for="">{{ $key->customer_machine_no }}</label>
                                                            </div>
                                                        </div>
                                                    </span>
                                                    <span class="col-lg-4 col-md-4 col-12">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-6 text-start">
                                                                <label class="fw-bold fs-6 text-gray-800"
                                                                    for="">Comm' Date</label>
                                                            </div>
                                                            <div
                                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-6 text-start">
                                                                <label for="">{{ $key->testrun_dt}}</label>
                                                            </div>
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-12 mb-4">
                                        <div class="py-3 row rounded-2 bg-light text-dark">
                                            <div
                                                class="col-lg-2 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                <u class="fw-bold fs-6 text-gray-800">SITE CONDITION</u>
                                            </div>
                                            <div class="col-lg-10 col-md-12 col-12">
                                                <div class="row">
                                                    <span class="col-lg-7 col-md-7 col-12">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-2 text-lg-start col-md-3 text-md-start col-4 text-start">
                                                                <label class="py-3 fw-bold fs-6 text-gray-800"
                                                                    for="">Ventilation</label>
                                                            </div>
                                                            <div
                                                                class="py-3 col-lg-10 text-lg-start col-md-9 text-md-start col-8 text-start">


                                                                <label class="text-gray-800 form-check-label"
                                                                    for="N/A"> {{ $text_site_condition }}</label>
                                                            </div>
                                                        </div>
                                                    </span>
                                                    <span class="col-lg-5 col-md-5 col-12">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-3 text-lg-start col-md-5 text-md-start col-4 text-start">
                                                                <label class="py-3 fw-bold fs-6 text-gray-800"
                                                                    for="">Room Temp.</label>
                                                            </div>
                                                            <div
                                                                class="col-lg-3 text-lg-start col-md-5 text-md-start col-5 text-start">
                                                                <label class="pt-3" for="">{{  $key->site_roomtemp}}</label>
                                                            </div>
                                                        </div>
                                                    </span>
                                                </div>
                                                <div class="row">
                                                    <span class="col-lg-5 col-md-6 col-12">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-4 text-lg-start col-md-auto text-md-start col-5 text-start">
                                                                <label class="py-3 fw-bold fs-6 text-gray-800"
                                                                    for="">Cooling Water</label>
                                                            </div>
                                                            <div
                                                                class="col-lg-6 text-lg-start col-md-7 text-md-start col-7 text-start">
                                                                <label class="pt-3"
                                                                    for=""><span class="fw-bold fs-7 text-gray-800">Temp</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $key->site_cooling_temp_in}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fw-bold fs-7 text-gray-800">/</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $key->site_cooling_temp_out}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            </div>
                                                        </div>
                                                    </span>
                                                    <span class="col-lg-7 col-md-6 col-12">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-auto text-lg-start col-md-auto text-md-start col-4 text-start">
                                                                <label class="py-3 fw-bold fs-7 text-gray-800"
                                                                    for="">Pressure</label>
                                                            </div>
                                                            <div
                                                                class="col-lg-10 text-lg-start col-md-9 text-md-start col-8 text-start">
                                                                <div class="row">
                                                                    <div
                                                                        class="py-3 col-lg-2 text-lg-center col-md-2 text-md-start col-3 text-end">
                                                                        <label class=" fs-7 text-gray-800"
                                                                            for="">{{ $key->site_cooling_pressure_in }}</label>
                                                                    </div>
                                                                    <div
                                                                        class="py-3 col-lg-auto text-lg-center col-md-auto text-md-start col-auto text-end">
                                                                        <label class=" fs-6 fw-bold text-gray-800"
                                                                            for="">/</label>
                                                                    </div>
                                                                    <div
                                                                        class="py-3 col-lg-2 text-lg-center col-md-2 text-md-start col-3 text-end">
                                                                        <label class=" fs-7 text-gray-800"
                                                                            for="">{{ $key->site_cooling_pressure_out }}</label>
                                                                    </div>
                                                                    <div
                                                                        class="py-3 col-lg-auto text-lg-start col-md-auto text-md-start col-3 text-end">
                                                                        <label class=" fw-bold fs-7 text-gray-800"
                                                                            for="">(In/Out)</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-12 mb-4">
                                        <div class="py-3 row rounded-2 bg-light text-dark">
                                            <div
                                                class="col-lg-2 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                <u class="fw-bold fs-6 text-gray-800">SERVICE CONTENT<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b></u>
                                            </div>
                                            <div
                                                class="col-lg-10 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                <label class=" fs-6 text-gray-800" for="">{{ $text_content}}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-12 mb-4">
                                        <div class="py-3 row rounded-2 bg-light text-dark">
                                            <div
                                                class="pb-1 col-lg-12 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                <u class="fw-bold fs-6 text-gray-800">SERVICE CONTENT (Detail)</u>
                                            </div>

                                            <div class="row">
                                                <div class="py-2 col-lg-2 col-md-6 col-12">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-auto text-lg-start col-md-auto text-md-start col-1 text-start">
                                                            <input class="mt-3 form-check-input" type="checkbox"
                                                                name="detail_motor" value="" id="detail_motor" disabled>
                                                        </div>
                                                        <div
                                                            class="pt-3 col-lg-auto text-lg-start col-md-auto text-md-start col-11 text-start">
                                                            <label class="text-dark" for="">&nbsp;
                                                                Motor: Grease Up
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="py-2 col-lg-2 col-md-6 col-12">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-auto text-lg-start col-md-auto text-md-start col-1 text-start">
                                                            <input class="mt-3 form-check-input" type="checkbox"
                                                                name="detail_cooler" value="" id="detail_cooler" disabled>
                                                        </div>
                                                        <div
                                                            class="pt-3 col-lg-auto text-lg-start col-md-auto text-md-start col-11 text-start">
                                                            <label class="text-dark" for="">&nbsp;
                                                                Cooler Cleaning
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="py-2 col-lg-4 col-md-12 col-12">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-12 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                            <div class="row">
                                                                <div
                                                                    class="col-lg-auto text-lg-start col-md-auto text-md-start col-1 text-start">
                                                                    <input class="mt-3 form-check-input "
                                                                        type="checkbox" name="detail_topup" value=""
                                                                        id="detail_topup" disabled>
                                                                </div>
                                                                <div
                                                                    class="pt-3 col-lg-auto text-lg-start col-md-2 text-md-start col-11 text-start">
                                                                    <label class="text-dark" for="">&nbsp;
                                                                        Oil Top Up
                                                                    </label>
                                                                </div>
                                                                <div
                                                                    class="pt-3 col-lg-auto text-lg-end col-md-3 text-md-start col-auto text-start">
                                                                    (Number of Liters
                                                                </div>
                                                                <div class="col-lg-2 text-lg-center col-md-2 col-3">
                                                                    <label class="pt-3" for="">{{ $key->detail_topup_liters}}</label>
                                                                </div>
                                                                <div
                                                                    class="pt-3 col-lg-auto text-lg-start col-md-1 text-md-start col-auto text-start">
                                                                    Liters)</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="py-2 col-lg-4 col-md-12 col-12">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-12 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                            <div class="row">
                                                                <div
                                                                    class="col-lg-auto text-lg-start col-md-auto text-md-start col-1 text-start">
                                                                    <input class="mt-3 form-check-input"
                                                                        type="checkbox" name="detailReplace" value=""
                                                                        id="detailReplace" disabled>
                                                                </div>
                                                                <div
                                                                    class="pt-3 col-lg-auto text-lg-start col-md-auto text-md-start col-auto text-start">
                                                                    <label class="text-dark" for="">&nbsp;
                                                                        Replace Oil
                                                                    </label>
                                                                </div>
                                                                <div
                                                                    class="pt-3 col-lg-auto text-lg-end col-md-auto text-md-start col-auto text-start">
                                                                    (Brand
                                                                </div>
                                                                <div class="col-lg-3 col-md-2 col-2">
                                                                    <label for=""></label>
                                                                </div>
                                                                <div class="pt-3 col-lg-auto col-md-auto col-auto">)
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="py-2 col-lg-2 col-md-6 col-12">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-auto text-lg-start col-md-auto text-md-start col-1 text-start">
                                                            <input class="mt-3 form-check-input" type="checkbox"
                                                                name="detail_overhaul_air" value="" id="detail_overhaul_air" disabled>
                                                        </div>
                                                        <div
                                                            class="pt-3 col-lg-auto text-lg-start col-md-auto text-md-start col-11 text-start">
                                                            <label class="text-dark" for="">&nbsp;
                                                                Overhaul Air End
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="py-2 col-lg-2 col-md-6 col-12">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-auto text-lg-start col-md-auto text-md-start col-1 text-start">
                                                            <input class="mt-3 form-check-input" type="checkbox"
                                                                name="detail_overhaul_motor" value="" id="detail_overhaul_motor" disabled>
                                                        </div>
                                                        <div
                                                            class="pt-3 col-lg-auto text-lg-start col-md-auto text-md-start col-11 text-start">
                                                            <label class="text-dark" for="">&nbsp;
                                                                Overhaul MainMotor
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="py-2 col-lg-4 col-md-6 col-12">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-auto text-lg-start col-md-auto text-md-start col-1 text-start">
                                                            <input class="mt-3 form-check-input" type="checkbox"
                                                                name="detail_rewind" value="" id="detail_rewind" disabled>
                                                        </div>
                                                        <div
                                                            class="pt-3 col-lg-auto text-lg-start col-md-auto text-md-start col-11 text-start">
                                                            <label class="text-dark" for="">&nbsp;
                                                                Main Motor Coil Rewind/Revarnish
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="py-2 col-lg-2 col-md-6 col-12">
                                                    <div class="row">
                                                        <div
                                                            class="pt-3 col-lg-auto text-lg-start col-md-auto text-md-start col-1 text-start">
                                                            <input class="mt-3 form-check-input" type="checkbox"
                                                                name="detail_3000" value="" id="detail_3000" disabled>
                                                        </div>
                                                        <div
                                                            class="pt-6 col-lg-auto text-lg-start col-md-auto text-md-start col-11 text-start">
                                                            <label class="text-dark" for="">&nbsp;
                                                                3,000 Hrs
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="py-2 col-lg-2 col-md-6 col-12">
                                                    <div class="row">
                                                        <div
                                                            class="pt-3 col-lg-auto text-lg-start col-md-auto text-md-start col-1 text-start">
                                                            <input class="mt-3 form-check-input" type="checkbox"
                                                                name="detail_6000" value="" id="detail_6000" disabled>
                                                        </div>
                                                        <div
                                                            class="pt-6 col-lg-auto text-lg-start col-md-auto text-md-start col-11 text-start">
                                                            <label class="text-dark" for="">&nbsp;
                                                                6,000 Hrs
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="py-2 col-lg-2 col-md-6 col-12">
                                                    <div class="row">
                                                        <div
                                                            class="pt-3 col-lg-auto text-lg-start col-md-auto text-md-start col-1 text-start">
                                                            <input class="mt-3 form-check-input" type="checkbox"
                                                                name="detail_12000" value="" id="detail_12000" disabled>
                                                        </div>
                                                        <div
                                                            class="pt-6 col-lg-auto text-lg-start col-md-auto text-md-start col-11 text-start">
                                                            <label class="text-dark" for="">&nbsp;
                                                                12,000 Hrs
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="py-2 col-lg-6 col-md-6 col-12">
                                                    <div class="row">
                                                        <div
                                                            class="pt-6 col-lg-auto text-lg-start col-md-auto text-md-start col-12 text-start">
                                                            <label class="text-dark" for="">&nbsp;
                                                                Other
                                                            </label>
                                                        </div>
                                                        <div
                                                            class="col-lg-auto text-lg-start col-md-auto text-md-start col-12 text-start">
                                                            <label class="pt-5 fs-6 text-gray-800"
                                                                            for=""> {{ $key->detail_other}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-12 mb-4">
                                        <div class="py-3 row rounded-2 bg-light text-dark">
                                            <div
                                                class="pb-1 col-lg-12 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                <u class="fw-bold fs-6 text-gray-800">RUNNING DATA</u>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="row">
                                                        <span
                                                            class="py-2 col-lg-auto text-lg-start col-md-4 text-md-start col-12 text-start">
                                                            <label class="fw-bold fs-6 text-gray-800" for="">
                                                                Discharge Air Pressure
                                                            </label>
                                                        </span>
                                                        <span class="py-2 col-lg-6 col-md-6 col-12">
                                                            <div class="row">
                                                                <div class="col-lg-2 text-center">
                                                                    <label for="">{{ $key->running_air_pressure_load }}</label>
                                                                </div>
                                                                <div class="col-lg-auto">
                                                                    <label for="">/</label>
                                                                </div>
                                                                <div class="col-lg-2 text-center">
                                                                    <label for="">{{ $key->running_air_pressure_unload }}</label>
                                                                </div>
                                                                <div class="col-lg-auto">
                                                                    <label for="">/</label>
                                                                </div>
                                                                <div class="col-lg-2 text-center">
                                                                    <label for="">{{ $key->running_air_pressure_normal }}</label>
                                                                </div>
                                                                <div class="col-lg-auto">
                                                                    <label for="">(Load/Unload/Normal)</label>
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <span
                                                            class="py-2 col-lg-auto text-lg-end col-md-4 text-md-start col-12">
                                                            <label class="fw-bold fs-6 text-gray-800" for="">
                                                                O/S Pressure
                                                            </label>
                                                        </span>
                                                        <span class="col-lg-2 col-md-7 col-12">
                                                            <div class="py-2 col-lg-12 text-center">
                                                                <label for="">{{ $key->running_os_pressure }}</label>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="row">
                                                        <span
                                                            class="py-3 col-lg-2 text-lg-start col-md-3 text-md-start col-12 text-start">
                                                            <label class="fw-bold fs-6 text-gray-800" for="">
                                                                Load Condition
                                                            </label>
                                                        </span>
                                                        <span
                                                            class="col-lg-2 text-lg-start col-md-7 text-md-start col-12 text-start">
                                                            <div class="py-2 col-lg-12 text-center">
                                                                <label for="">{{ $key->running_load}}</label>
                                                            </div>
                                                        </span>
                                                        <span
                                                            class="py-3 col-lg-2 text-lg-end col-md-3 text-md-start col-12 text-start">
                                                            <label class="fw-bold fs-6 text-gray-800"
                                                                for="">Discharge Air Temp.</label>
                                                        </span>
                                                        <span
                                                            class="py-3 col-lg-3 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                            <div class="row">
                                                                <div class="col-lg-2 text-center">
                                                                    <label for="">{{ $key->running_air_temp_load}}</label>
                                                                </div>
                                                                <div class="col-lg-auto">
                                                                    <label for="">/</label>
                                                                </div>
                                                                <div class="col-lg-2 text-center">
                                                                    <label for="">{{ $key->running_air_temp_unload}}</label>
                                                                </div>
                                                                <div class="col-lg-auto">
                                                                    <label for="">(Load/Unload)</label>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="row">
                                                        <span
                                                            class="py-3 col-lg-2 text-lg-start col-md-3 text-md-start col-12 text-start">
                                                            <label class="fw-bold fs-6 text-gray-800" for="">
                                                                Hourmeter
                                                            </label>
                                                        </span>
                                                        <span
                                                            class="col-lg-2 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                            <div class="py-2 col-lg-12 text-center">
                                                                <label for="">{{ $key->running_hourmeter_check}}</label>
                                                            </div>
                                                        </span>
                                                        <span
                                                            class="col-lg-1 text-lg-start col-md-2 text-md-start col-12 text-start">
                                                            <label class="py-3" for="">--></label>
                                                        </span>
                                                        <span
                                                            class="col-lg-7 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                            <div class="row">
                                                                <div class="py-3 col-lg-1 col-md-1 col-1">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="" id="">
                                                                </div>
                                                                <div
                                                                    class="col-lg-11 text-lg-start col-md-11 text-md-start col-11 text-start">
                                                                    <label class="py-3 fw-bold fs-6 text-gray-800"
                                                                        for="">
                                                                        Check when hour has been reset(e.g. due to
                                                                        Monitor replace, Software upgrade,hour reset)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="row">
                                                        <span
                                                            class="py-3 col-lg-auto text-lg-start col-md-2 text-md-start col-12 text-start">
                                                            <label class="fw-bold fs-6 text-gray-800" for="">
                                                                Current
                                                            </label>
                                                        </span>
                                                        <span
                                                            class="py-3 col-lg-auto text-lg-start col-md-4 text-md-start col-12 text-start">
                                                            <div class="row">
                                                                <div class="col-lg-2 text-center">
                                                                    <label for="">{{ $key->running_current_load}}</label>
                                                                </div>
                                                                <div class="col-lg-auto">
                                                                    <label for="">/</label>
                                                                </div>
                                                                <div class="col-lg-2 text-center">
                                                                    <label for="">{{ $key->running_current_unload}}</label>
                                                                </div>
                                                                <div class="col-lg-auto">
                                                                    <label for="">(Load/Unload)</label>
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <span
                                                            class="col-lg-auto text-lg-end col-md-3 text-md-end col-12 text-start">
                                                            <label class="py-3 fw-bold fs-6 text-gray-800"
                                                                for="">
                                                                After O/S Temp.
                                                            </label>
                                                        </span>
                                                        <span
                                                            class="py-3 col-lg text-lg-start col-md-3 text-md-start col-12 text-start">
                                                            <div class="row">
                                                                <div class="col-lg-2 text-center">
                                                                    <label for="">{{ $key->running_os_temp }}</label>
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <span
                                                            class="col-lg-auto text-lg-end col-md-3 text-md-start col-12 text-start">
                                                            <label class="py-3 fw-bold fs-6 text-gray-800"
                                                                for="">
                                                                Ambient Temp.
                                                            </label>
                                                        </span>
                                                        <span
                                                            class="py-3 col-lg text-lg-start col-md-3 text-md-start col-12 text-start">
                                                            <div class="row">
                                                                <div class="col-lg-2 text-center">
                                                                    <label for="">{{ $key->running_ambient_temp }}</label>
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <span
                                                            class="col-lg-auto text-lg-end col-md-3 text-md-end col-12 text-start">
                                                            <label class="py-3 fw-bold fs-6 text-gray-800"
                                                                for="">
                                                                Tc Temp(Motor Coil)
                                                            </label>
                                                        </span>
                                                        <span
                                                            class="py-3 col-lg text-lg-start col-md-3 text-md-start col-12 text-start">
                                                            <div class="row">
                                                                <div class="col-lg-2 text-center">
                                                                    <label for=""></label>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="row">
                                                        <span
                                                            class="py-3 col-lg-auto text-lg-start col-md-3 text-md-start col-12 text-start">
                                                            <label class="fw-bold fs-6 text-gray-800" for="">
                                                                Load Count
                                                            </label>
                                                        </span>
                                                        <span
                                                            class="py-3 col-lg text-lg-start col-md-3 text-md-start col-12 text-start">
                                                            <div class="row">
                                                                <div class="col-lg-2 text-center">
                                                                    <label for="">{{ $key->running_load_count }}</label>
                                                                </div>
                                                                <div class="col-lg-auto">
                                                                    <label for="">(Load Run Time)</label>
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <span
                                                            class="py-3 col-lg-auto text-lg-end col-md-3 text-md-start col-12 text-start">
                                                            <label class="fw-bold fs-6 text-gray-800" for="">
                                                                Load Hour
                                                            </label>
                                                        </span>
                                                        <span
                                                            class="py-3 col-lg text-lg-start col-md-3 text-md-start col-12 text-start">
                                                            <div class="row">
                                                                <div class="col-lg-2 text-center">
                                                                    <label for="">{{ $key->running_load_hour }}</label>
                                                                </div>
                                                                <div class="col-lg-auto">
                                                                    <label for="">(Load Run Time)</label>
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <span
                                                            class="py-3 col-lg-auto text-lg-end col-md-3 text-md-start col-12 text-start">
                                                            <label class="fw-bold fs-6 text-gray-800" for="">
                                                                Running Count
                                                            </label>
                                                        </span>
                                                        <span
                                                            class="py-3 col-lg text-lg-start col-md-3 text-md-start col-12 text-start">
                                                            <div class="col-lg-2 text-center">
                                                                <label for="">{{ $key->running_count }}</label>
                                                            </div>
                                                        </span>
                                                        <span
                                                            class="py-3 col-lg-auto text-lg-end col-md-3 text-md-start col-12 text-start">
                                                            <label class="fw-bold fs-6 text-gray-800" for="">
                                                                Suction Pressure
                                                            </label>
                                                        </span>
                                                        <span
                                                            class="py-3 col-lg text-lg-start col-md-3 text-md-start col-12 text-start">
                                                            <div class="col-lg-2 text-center">
                                                                <label for="">{{ $key->running_suction_pressure }}</label>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-12 mb-4">
                                        <div class="py-3 row rounded-2 bg-light text-dark">
                                            <div
                                                class="pb-1 pt-3 col-lg-2 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                <u class="fw-bold fs-6 text-gray-800">MACHINE SETTING</u>
                                            </div>
                                            <div
                                                class="col-lg-10 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <span
                                                        class="col-lg-5 text-lg-start col-md-auto text-md-start col-12 text-start">
                                                        <div class="row">
                                                            <div
                                                                class="pt-3 col-lg-1 text-lg-start col-md-auto text-md-start col-auto text-start">
                                                                <input name="setting_operation_local" type="checkbox" class="form-check-input" id="setting_operation_local" disabled/>
                                                            </div>
                                                            <div
                                                                class="pt-3 col-lg-4 text-lg-start col-md-auto text-md-start col-10 text-start">
                                                                <label class="fw-bold fs-7 text-gray-800">Local (Run
                                                                    Mode:</label>
                                                            </div>
                                                            <div
                                                                class="pt-3 col-lg-1 text-lg-start col-md-auto text-md-start col-auto text-start">
                                                                <input name="setting_operation_run_on" type="checkbox" class="form-check-input" id="setting_operation_run_on" disabled/>
                                                            </div>
                                                            <div
                                                                class="pt-3 col-lg-2 text-lg-start col-md-auto text-md-start col-auto text-start">
                                                                <label
                                                                    class="fw-bold fs-7 text-gray-800">On/Off,</label>
                                                            </div>
                                                            <div
                                                                class="pt-3 col-lg-1 text-lg-start col-md-auto text-md-start col-auto text-start">
                                                                <input name="setting_operation_run_load" type="checkbox" class="form-check-input" id="setting_operation_run_load" disabled/>
                                                            </div>
                                                            <div
                                                                class="pt-3 col-lg-2 text-lg-start col-md-auto text-md-start col-auto text-start">
                                                                <label
                                                                    class="fw-bold fs-7 text-gray-800">Load/Unload)&nbsp;&nbsp;/</label>
                                                            </div>
                                                        </div>
                                                    </span>
                                                    <span
                                                        class="pt-3 col-lg-2 text-lg-start col-md-auto text-md-start col-12 text-start">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-2 text-lg-start col-md-auto text-md-start col-auto text-start">
                                                                <input name="setting_group_link" type="checkbox" class="form-check-input"  id="setting_group_link" disabled/>
                                                            </div>
                                                            <div
                                                                class="col-lg-10 text-lg-start col-md-auto text-md-start col-auto text-start">
                                                                <label class="fw-bold fs-7 text-gray-800">&nbsp;Link
                                                                    Operation&nbsp;&nbsp;/</label>
                                                            </div>
                                                        </div>
                                                    </span>
                                                    <span
                                                        class="pt-3 col-lg-5 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-1 text-lg-start col-md-auto text-md-start col-auto text-start">
                                                                <input name="setting_group_panel" type="checkbox" class="form-check-input" id="setting_group_panel" disabled/>
                                                            </div>
                                                            <div
                                                                class="col-lg-11 text-lg-start col-md-auto text-md-start col-auto text-start">
                                                                <label class="fw-bold fs-7 text-gray-800"
                                                                    for="">&nbsp;Group Control Panel</label>
                                                            </div>
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="py-2 col-lg-12 text-lg-start col-md-12 col-12">
                                                    <div class="row">
                                                        <div
                                                            class="py-6 col-lg-2 text-lg-start col-md-2 text-md-start col-12 text-start">
                                                            <label class="fw-bold fs-6 text-gray-800" for="">
                                                                Local/Link Op.
                                                            </label>
                                                        </div>
                                                        <div
                                                            class="pt-3 col-lg-10 text-lg-start col-md-10 text-md-start col-12 text-start">
                                                            <div class="row">
                                                                <div
                                                                    class="pt-3 col-lg-auto text-lg-start col-md-2 text-md-start col-5 text-start">
                                                                    <label class="fw-bold fs-6 text-gray-800"
                                                                        for="">&nbsp;
                                                                        Load
                                                                    </label>
                                                                </div>
                                                                <div
                                                                    class="col-lg-2 text-lg-start col-md-4 text-md-start col-7 text-start">
                                                                    <label class="pt-3" for="">{{$key->setting_op_load}}</label>
                                                                </div>
                                                                <div
                                                                    class="pt-3 col-lg-auto text-lg-start col-md-2 text-md-start col-5 text-start">
                                                                    <label class="fw-bold fs-6 text-gray-800"
                                                                        for="">&nbsp;
                                                                        Unload
                                                                    </label>
                                                                </div>
                                                                <div
                                                                    class="col-lg-2 text-lg-start col-md-4 text-md-start col-7 text-start">
                                                                    <label class="pt-3" for="">{{$key->setting_op_unload}}</label>
                                                                </div>
                                                                <div
                                                                    class="pt-3 col-lg-auto text-lg-start col-md-2 text-md-start col-5 text-start">
                                                                    <label class="fw-bold fs-6 text-gray-800"
                                                                        for="">&nbsp;
                                                                        Auto Start
                                                                    </label>
                                                                </div>
                                                                <div
                                                                    class="col-lg-2 text-lg-start col-md-4 text-md-start col-7 text-start">
                                                                    <label class="pt-3" for="">{{$key->setting_op_auto}}</label>
                                                                </div>
                                                                <div
                                                                    class="pt-3 col-lg-auto text-lg-start col-md-2 text-md-start col-5 text-start">
                                                                    <label class="fw-bold fs-6 text-gray-800"
                                                                        for="">&nbsp;
                                                                        Constant
                                                                    </label>
                                                                </div>
                                                                <div
                                                                    class="col-lg-2 text-lg-start col-md-4 text-md-start col-7 text-start">
                                                                    <label class="pt-3" for="">{{$key->setting_op_constant}}</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-2 text-lg-start col-md-3 text-md-start col-12 text-start">
                                                            <label class="py-3 fw-bold fs-6 text-gray-800"
                                                                for="">
                                                                Group Control Panel
                                                            </label>
                                                        </div>
                                                        <div
                                                            class="col-lg-10 text-lg-start col-md-9 text-md-start col-12 text-start">
                                                            <div class="row">
                                                                <div
                                                                    class="pt-3 col-lg-1 text-lg-start col-md-2 text-md-start col-5 text-start">
                                                                    <label class="fw-bold fs-6 text-gray-800"
                                                                        for="">&nbsp;
                                                                        PHH
                                                                    </label>
                                                                </div>
                                                                <div
                                                                    class="col-lg-2 text-lg-start col-md-4 text-md-start col-7 text-start">
                                                                    <label class="pt-3" for="">{{$key->setting_phh}}</label>
                                                                </div>
                                                                <div
                                                                    class="pt-3 col-lg-1 text-lg-start col-md-2 text-md-start col-5 text-start">
                                                                    <label class="fw-bold fs-6 text-gray-800"
                                                                        for="">&nbsp;
                                                                        PHL
                                                                    </label>
                                                                </div>
                                                                <div
                                                                    class="col-lg-2 text-lg-start col-md-4 text-md-start col-7 text-start">
                                                                    <label class="pt-3" for="">{{$key->setting_phl}}</label>
                                                                </div>
                                                                <div
                                                                    class="pt-3 col-lg-1 text-lg-start col-md-2 text-md-start col-5 text-start">
                                                                    <label class="fw-bold fs-6 text-gray-800"
                                                                        for="">&nbsp;
                                                                        PH
                                                                    </label>
                                                                </div>
                                                                <div
                                                                    class="col-lg-2 text-lg-start col-md-4 text-md-start col-7 text-start">
                                                                    <label class="pt-3" for="">{{$key->setting_ph}}</label>
                                                                </div>
                                                                <div
                                                                    class="pt-3 col-lg-1 text-lg-start col-md-2 text-md-start col-5 text-start">
                                                                    <label class="fw-bold fs-6 text-gray-800"
                                                                        for="">&nbsp;
                                                                        PL
                                                                    </label>
                                                                </div>
                                                                <div
                                                                    class="col-lg-2 text-lg-start col-md-4 text-md-start col-7 text-start">
                                                                    <label class="pt-3" for="">{{$key->setting_pl}}</label>
                                                                </div>
                                                                <div
                                                                    class="pt-3 col-lg-1 text-lg-start col-md-2 text-md-start col-5 text-start">
                                                                    <label class="fw-bold fs-6 text-gray-800"
                                                                        for="">&nbsp;
                                                                        PLL
                                                                    </label>
                                                                </div>
                                                                <div
                                                                    class="col-lg-2 text-lg-start col-md-4 text-md-start col-7 text-start">
                                                                    <label class="pt-3" for="">{{$key->setting_pll}}</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-12 mb-4">
                                        <div class="py-3 row rounded-2 bg-light text-dark">
                                            <div
                                                class="pb-1 col-lg-12 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                <u class="fw-bold fs-6 text-gray-800">MEASUREMENT</u>
                                            </div>

                                            <div class="col-lg-12 text-lg-start col-md-12 text-md-start">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-1 text-lg-start col-md-2 text-md-start col-12 text-start">
                                                                <label class="py-3 fw-bold fs-6 text-gray-800"
                                                                    for="">
                                                                    [Voltage]
                                                                </label>
                                                            </div>
                                                            <div
                                                                class="col-lg-11 text-lg-start col-md-10 text-md-start col-12 text-start">
                                                                <div class="row">
                                                                    <div
                                                                        class="py-4 col-lg-3 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                                        <div class="row">
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label class="fw-bold fs-6 text-gray-800" for="">R-S</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">{{$key->meas_voltage_rs_on }}</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">/</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">{{$key->meas_voltage_rs_off }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="py-4 col-lg-3 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                                        <div class="row">
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label class="fw-bold fs-6 text-gray-800" for="">S-T</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">{{$key->meas_voltage_st_on }}</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">/</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">{{$key->meas_voltage_st_on }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="py-4 col-lg-3 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                                        <div class="row">
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label class="fw-bold fs-6 text-gray-800" for="">T-R</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">{{$key->meas_voltage_tr_on }}</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">/</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">{{$key->meas_voltage_tr_on }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-auto text-lg-start col-md-auto text-md-start col-auto text-start">
                                                                        <label class="py-4 fw-bold fs-8 text-gray-800"
                                                                            for="">
                                                                            (ON/OFF)
                                                                        </label>
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-auto text-lg-start col-md-auto text-md-start col-auto text-start">
                                                                        <label class="py-4 fw-bold fs-8 text-gray-800"
                                                                            for="">
                                                                            [+-10% of rated current]
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-auto text-lg-start col-md-2 text-md-start col-12 text-start">
                                                                <label class="py-3 fw-bold fs-6 text-gray-800"
                                                                    for="">
                                                                    [Input Content]
                                                                </label>
                                                            </div>
                                                            <div
                                                                class="col-lg-10 text-lg-start col-md-10 text-md-start col-12 text-start">
                                                                <div class="row">
                                                                    <div
                                                                        class="py-4 col-lg-3 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                                        <div class="row">
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label class="fw-bold fs-6 text-gray-800" for="">R</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">{{$key->meas_input_r_load }}</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">/</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">{{$key->meas_input_r_unload }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="py-4 col-lg-3 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                                        <div class="row">
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label class="fw-bold fs-6 text-gray-800" for="">S</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">{{$key->meas_input_s_load }}</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">/</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">{{$key->meas_input_s_unload }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="py-4 col-lg-3 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                                        <div class="row">
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label class="fw-bold fs-6 text-gray-800" for="">T</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">{{$key->meas_input_t_load }}</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">/</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">{{$key->meas_input_t_unload }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-auto text-lg-start col-md-auto text-md-start col-auto text-start">
                                                                        <label class="py-4 fw-bold fs-8 text-gray-800"
                                                                            for="">
                                                                            (Load/Unload)
                                                                        </label>
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-auto text-lg-start col-md-auto text-md-start col-auto text-start">
                                                                        <label class="py-4 fw-bold fs-8 text-gray-800"
                                                                            for="">
                                                                            [+-5% of rated current]
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-auto text-lg-start col-md-2 text-md-start col-12 text-start">
                                                                <label class="py-3 fw-bold fs-6 text-gray-800"
                                                                    for="">
                                                                    [Motor Content]
                                                                </label>
                                                            </div>
                                                            <div
                                                                class="col-lg-10 text-lg-start col-md-10 text-md-start col-12 text-start">
                                                                <div class="row">
                                                                    <div
                                                                        class="py-4 col-lg-3 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                                        <div class="row">
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label class="fw-bold fs-6 text-gray-800" for="">U1</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">{{$key->meas_motor_u_load }}</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">/</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">{{$key->meas_motor_u_unload }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="py-4 col-lg-3 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                                        <div class="row">
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label class="fw-bold fs-6 text-gray-800" for="">V1</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">{{$key->meas_motor_v_load }}</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">/</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">{{$key->meas_motor_v_unload }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="py-4 col-lg-3 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                                        <div class="row">
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label class="fw-bold fs-6 text-gray-800" for="">W1</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">{{$key->meas_motor_w_load }}</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">/</label>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-3 col-3 text-center">
                                                                                <label for="">{{$key->meas_motor_w_load }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="py-4 col-lg-3 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                                        <div class="row">
                                                                            <div class="col-lg-auto col-md-auto col-auto text-center">
                                                                                <label class="fw-bold fs-6 text-gray-800" for="">Dis Pipe Temp</label>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-6 text-center">
                                                                                <label for="">{{ $key->meas_pipetemp}}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                      
                                    @php
                                    $statusMap = [
                                        1 => 'OK',
                                        2 => 'NG',
                                        0 => 'N/A',
                                    ];
                                    
                                    $text_monitor       = $statusMap[$key->functions_monitor] ?? 'N/A';
                                    $text_battery       = $statusMap[$key->functions_battery] ?? 'N/A';
                                    $text_sensor        = $statusMap[$key->functions_sensor] ?? 'N/A';
                                    $text_ocr           = $statusMap[$key->functions_ocr] ?? 'N/A';
                                    $text_magnetic      = $statusMap[$key->functions_magnetic] ?? 'N/A';
                                    $text_presssensor   = $statusMap[$key->functions_presssensor] ?? 'N/A';
                                    $text_tempsensor    = $statusMap[$key->functions_tempsensor] ?? 'N/A';
                                    $text_flowswitch    = $statusMap[$key->functions_flowswitch] ?? 'N/A';
                                    $text_discharge     = $statusMap[$key->functions_discharge] ?? 'N/A';
                                    $text_pressswitch   = $statusMap[$key->	functions_pressswitch] ?? 'N/A';
                                    @endphp

                                    <div class="row g-5">
                                        <div class="col-lg-8">
                                            <div class="row g-5">
                                                <div class="col-lg-6">
                                                    <div class="rounded-2 bg-light mb-5">
                                                        <div
                                                            class="ps-2 pb-3 pt-2 col-lg-12 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                            <u class="fw-bold fs-6 text-gray-800">CHECK FUNCTIONS</u>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Monitor/Controller
                                                                </span>
                                                                <span
                                                                    class="py-2 col-lg-6 text-lg-start col-md-7 text-md-start col-12 text-start pb-1">
                                                                    <label for="">{{ $text_monitor}}</label>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Battery
                                                                </span>
                                                                <span
                                                                    class="py-2 col-lg-6 text-lg-start col-md-7 text-md-start col-12 text-start pb-1">
                                                                    <label for="">{{ $text_battery}}</label>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Drain Sensor
                                                                </span>
                                                                <span
                                                                    class="py-2 col-lg-6 text-lg-start col-md-7 text-md-start col-12 text-start pb-1">
                                                                    <label for="">{{ $text_sensor}}</label>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    OCR
                                                                </span>
                                                                <span
                                                                    class="py-2 col-lg-6 text-lg-start col-md-7 text-md-start col-12 text-start pb-1">
                                                                    <label for="">{{ $text_ocr}}</label>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Star-Deita Timer
                                                                </span>
                                                                <span
                                                                    class="col-lg-6 text-lg-end col-md-7 text-md-end col-12 text-start pb-1">
                                                                    <div>
                                                                        <div class="row">
                                                                            <div class="col-lg-4 text-lg-start col-md-6 col-6 ms-2">
                                                                                <label class="py-3" for="">{{$key->functions_timer}}</label>
                                                                            </div>
                                                                            <div
                                                                                class="col-lg-5 text-lg-start col-md-3 text-md-start col-3 text-start">
                                                                                <label
                                                                                    class="py-3 fw-bold fs-8 text-gray-800"
                                                                                    for="">
                                                                                    [5-7 secs]
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Pressure Keep v/v Open
                                                                </span>
                                                                <span
                                                                    class="col-lg-6 text-lg-end col-md-7 text-md-end col-12 text-start pb-1">
                                                                    <div>
                                                                        <div class="row">
                                                                            <div class="col-lg-4 text-lg-start col-md-6 col-6 ms-2">
                                                                                <label class="py-3" for="">{{ $key->functions_valve_open }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Blow Off v/v Blows within
                                                                </span>
                                                                <span
                                                                    class="col-lg-6 text-lg-end col-md-7 text-md-end col-12 text-start pb-1">
                                                                    <div>
                                                                        <div class="row">
                                                                            <div class="col-lg-4 text-lg-start col-md-6 col-6 ms-2">
                                                                                <label class="py-3" for="">{{ $key->functions_valve_blow }}</label>
                                                                            </div>
                                                                            <div
                                                                                class="col-lg-6 text-lg-start col-md-5 text-md-start col-5 text-start">
                                                                                <label
                                                                                    class="py-3 fw-bold fs-8 text-gray-800"
                                                                                    for="">
                                                                                    secs [60 secs]
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Safety Valve Operates at
                                                                </span>
                                                                <span
                                                                    class="col-lg-6 text-lg-end col-md-7 text-md-end col-12 text-start pb-1">
                                                                    <div>
                                                                        <div class="row">
                                                                            <div class="col-lg-4 text-lg-start col-md-6 col-6 ms-2">
                                                                                <label class="py-3" for="">{{$key->functions_valve_operate}}</label>
                                                                            </div>
                                                                            <div
                                                                                class="col-lg-2 text-lg-start col-md-5 text-md-start col-5 text-start">
                                                                                <label
                                                                                    class="py-3 fw-bold fs-8 text-gray-800"
                                                                                    for="">
                                                                                    [specx1.1]
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Termal Relay Trips at
                                                                </span>
                                                                <span
                                                                    class="col-lg-6 text-lg-end col-md-7 text-md-end col-12 text-start pb-5">
                                                                    <div>
                                                                        <div class="row">
                                                                            <div class="col-lg-4 text-lg-start col-md-6 col-6 ms-2">
                                                                                <label class="py-3" for="">{{$key->functions_thermal}}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Magnetic Connector
                                                                </span>
                                                                <span
                                                                    class="py-2 col-lg-6 text-lg-start col-md-7 text-md-start col-12 text-start pb-1">
                                                                    <label for="">{{ $text_magnetic}}</label>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Pressure Sensor
                                                                </span>
                                                                <span
                                                                    class="py-2 col-lg-6 text-lg-start col-md-7 text-md-start col-12 text-start pb-1">
                                                                    <label for="">{{ $text_presssensor}}</label>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Temperature Sensor
                                                                </span>
                                                                <span
                                                                    class="py-2 col-lg-6 text-lg-start col-md-7 text-md-start col-12 text-start pb-1">
                                                                    <label for="">{{ $text_tempsensor}}</label>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Pressure Switch
                                                                </span>
                                                                <span
                                                                    class="py-2 col-lg-6 text-lg-start col-md-7 text-md-start col-12 text-start pb-1">
                                                                    <label for="">{{ $text_pressswitch}}</label>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Flow Switch
                                                                </span>
                                                                <span
                                                                    class="py-2 col-lg-6 text-lg-start col-md-7 text-md-start col-12 text-start pb-1">
                                                                    <label for="">{{ $text_flowswitch}}</label>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Discharge v/v
                                                                </span>
                                                                <span
                                                                    class="py-2 col-lg-6 text-lg-start col-md-7 text-md-start col-12 text-start pb-1">
                                                                    <label for="">{{ $text_discharge}}</label>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="rounded-2 bg-light mb-5 p-3">
                                                        <div
                                                            class="ps-2 pb-3 pt-2 col-lg-12 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                            <u class="fw-bold fs-6 text-gray-800">INSULATION TEST</u>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-12">
                                                            <label class="px-3 fw-bold fs-6 text-gray-800" for="">
                                                                Main Motor Insulation (M &#8486;)
                                                            </label>
                                                            <div class="row mb-2 ps-3">
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-3 fw-bold fs-8 text-gray-800" for="">
                                                                                U1-V1
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <label class="pt-2 pb-4 fs-7 text-gray-800" for="">{{$key->insulation_main_u1v1}}</label>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-3 fw-bold fs-8 text-gray-800" for="">
                                                                                V1-W1
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <label class="pt-2 pb-4 fs-7 text-gray-800" for="">{{$key->insulation_main_u1u2}}</label>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-3 fw-bold fs-8 text-gray-800" for="">
                                                                                W1-U1
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <label class="pt-2 pb-4 fs-7 text-gray-800" for="">{{$key->insulation_main_w1u1}}</label>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row mb-2 ps-3">
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-3 fw-bold fs-8 text-gray-800" for="">
                                                                                U1-U2
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <label class="pt-2 pb-4 fs-7 text-gray-800" for="">{{$key->insulation_main_u1u2}}</label>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-3 fw-bold fs-8 text-gray-800" for="">
                                                                                V1-V2
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <label class="pt-2 pb-4 fs-7 text-gray-800" for="">{{$key->insulation_main_v1v2}}</label>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-3 fw-bold fs-8 text-gray-800" for="">
                                                                                W1-W2
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-8 col-4">
                                                                            <label class="pt-2 pb-4 fs-7 text-gray-800" for="">{{$key->insulation_main_w1w2}}</label>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row mb-2 ps-3">
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-3 fw-bold fs-8 text-gray-800" for="">
                                                                                U1-E
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <label class="pt-2 pb-4 fs-7 text-gray-800" for="">{{$key->insulation_main_u1e}}</label>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-3 fw-bold fs-8 text-gray-800" for="">
                                                                                V1-E
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <label class="pt-2 pb-4 fs-7 text-gray-800" for="">{{$key->insulation_main_v1e}}</label>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-3 fw-bold fs-8 text-gray-800" for="">
                                                                                W1-E
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <label class="pt-2 pb-4 fs-7 text-gray-800" for="">{{$key->insulation_main_w1e}}</label>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-12">
                                                            <label class="px-3 fw-bold fs-6 text-gray-800" for="">
                                                                Fan Motor Insulation (M &#8486;)
                                                            </label>
                                                            <div class="row mb-2 ps-3">
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-3 fw-bold fs-8 text-gray-800" for="">
                                                                                U-V
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <label class="pt-3 pb-2 fs-7 text-gray-800" for="">{{$key->insulation_fan_u1v1}}</label>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-3 fw-bold fs-8 text-gray-800" for="">
                                                                                V-W
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <label class="pt-3 pb-2 fs-7 text-gray-800" for="">{{$key->insulation_fan_v1w1}}</label>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-3 fw-bold fs-8 text-gray-800" for="">
                                                                                W-U
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <label class="pt-3 pb-2 fs-7 text-gray-800" for="">{{$key->insulation_fan_w1u1}}</label>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row mb-2 ps-3">
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-3 fw-bold fs-8 text-gray-800" for="">
                                                                                U-E
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <label class="pt-3 pb-2 fs-7 text-gray-800" for="">{{$key->insulation_fan_u1e}}</label>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-3 fw-bold fs-8 text-gray-800" for="">
                                                                                V-E
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <label class="pt-3 pb-2 fs-7 text-gray-800" for="">{{$key->insulation_fan_v1e}}</label>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-3 fw-bold fs-8 text-gray-800" for="">
                                                                                W-E
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <label class="pt-3 pb-2 fs-7 text-gray-800" for="">{{$key->insulation_fan_w1e}}</label>
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @php
                                                    $text_dryer_type = '';
                                                            @endphp
                                                        {{-- AIR DRYER --}}
                                                        @if ($key->dryer_type == 1)
                                                            @php
                                                                $text_dryer_type = "Refrigerator ";
                                                            @endphp
                                                        @elseif ($key->dryer_type == 2)
                                                            @php
                                                                $text_dryer_type = "Other";
                                                            @endphp
                                                        @elseif ($key->dryer_type == 3)
                                                            @php
                                                                $text_dryer_type = "N/A";
                                                            @endphp
                                                    
                                                        @endif

                                                    <div class="rounded-2 bg-light mb-5 p-3">
                                                        <div
                                                            class="ps-2 pb-3 pt-2 col-lg-12 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                            <u class="fw-bold fs-6 text-gray-800">AIR DRYER</u>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-4 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Type
                                                                </span>
                                                                <span
                                                                    class="col-lg-8 text-lg-end col-md-7 text-md-end col-sm-12 text-sm-start pb-2">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid py-2">
                                                                        <label for="">{{$text_dryer_type}}</label>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-4 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Maker
                                                                </span>
                                                                <span
                                                                    class="col-lg-8 text-lg-start col-md-5 text-md-end col-sm-12 text-sm-start pb-2">
                                                                    <div class="">
                                                                        <label class="py-2"  for="">{{ $key->dryer_maker}}</label>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-4 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Model Number
                                                                </span>
                                                                <span
                                                                    class="col-lg-8 text-lg-start col-md-5 text-md-end col-sm-12 text-sm-start pb-2">
                                                                    <div class="">
                                                                        <label class="py-2"  for="">{{ $key->dryer_model}}</label>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-4 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    S/N
                                                                </span>
                                                                <span
                                                                    class="col-lg-8 text-lg-start col-md-5 text-md-end col-sm-12 text-sm-start pb-2">
                                                                    <div class="">
                                                                        <label class="py-2"  for="">{{ $key->dryer_sn}}</label>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-4 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Dew Point
                                                                </span>
                                                                <span
                                                                    class="col-lg-5 text-lg-start col-md-5 text-md-end col-sm-12 text-sm-start pb-2">
                                                                    <label class="py-2"  for="">{{ $key->dryer_dew}}</label>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-4 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Inlet Pressure
                                                                </span>
                                                                <span
                                                                    class="col-lg-5 text-lg-start col-md-5 text-md-end col-sm-12 text-sm-start pb-2">
                                                                    <label class="py-2"  for="">{{ $key->dryer_inlet}}</label>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="rounded-2 bg-light mb-5 p-3">
                                                        <div class="row">
                                                            <span
                                                                class="ps-2 pb-3 pt-2 col-lg-2 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                                <u class="fw-bold fs-6 text-gray-800">FILTER</u>
                                                            </span>
                                                            <span class="col-lg-4 col-md-5 col-12">
                                                                <div class="row">
                                                                    <span class="py-3 col-lg-3 col-md-3 col-3">
                                                                        <label class="fw-bold fs-6 text-gray-800"
                                                                            for="">
                                                                            Maker
                                                                        </label>
                                                                    </span>
                                                                    <span class="col-lg-9 col-md-9 col-9">
                                                                        <label class="py-4" for="">{{ $key->filter_maker}}</label>
                                                                    </span>
                                                                </div>
                                                            </span>
                                                            <span class="col-lg-6 col-md-7 col-12">
                                                                <div class="row mb-3">
                                                                    <span
                                                                        class="py-3 col-lg-4 text-lg-start col-md-3 text-md-start col-4 text-start">
                                                                        <label for="">
                                                                            Replacement
                                                                        </label>
                                                                    </span>
                                                                    <span
                                                                        class="py-3 col-lg-3 text-lg-center col-md-3 text-md-center col-3 text-center">
                                                                        <label class="fw-bold fs-6 text-gray-800"
                                                                            for="">
                                                                            Element
                                                                        </label>
                                                                    </span>
                                                                    <span
                                                                        class="py-3 col-lg-2 text-lg-center col-md-2 text-md-center col-2 text-center">
                                                                        <label class="fw-bold fs-6 text-gray-800"
                                                                            for="">
                                                                            A'ssy
                                                                        </label>
                                                                    </span>
                                                                    <span
                                                                        class="py-3 col-lg-3 text-lg-center col-md-4 text-md-center col-3 text-center">
                                                                        <label class="fw-bold fs-6 text-gray-800"
                                                                            for="">
                                                                            Auto Drain
                                                                        </label>
                                                                    </span>
                                                                </div>
                                                            </span>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <span class="col-lg-8 col-md-7 col-4">
                                                                <div class="row">
                                                                    <div class="col-lg-1 col-md-1 col-2">
                                                                        <label class="py-3 fw-bold fs-6 text-gray-800"
                                                                            for="">
                                                                            1)
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-lg-11 col-md-11 col-8">
                                                                        <label class="py-3" for="">{{ $key->filter_comment_1}}</label>
                                                                    </div>
                                                                </div>
                                                            </span>
                                                            <span class="col-lg-4 col-md-5 col-8">
                                                                <div class="row">
                                                                    <div
                                                                        class="my-3 d-flex justify-content-center col-lg-4 col-md-4 col-4">
                                                                        <input type="checkbox"
                                                                            class="form-check-input" name="chk_filter_replacment1_1"
                                                                            id="chk_filter_replacment1_1" disabled>
                                                                    </div>
                                                                    <div
                                                                        class="my-3 d-flex justify-content-center col-lg-4 col-md-4 col-4">
                                                                        <input type="checkbox"
                                                                            class="form-check-input" name="chk_filter_replacment1_2"
                                                                            id="chk_filter_replacment1_2" disabled>
                                                                    </div>
                                                                    <div
                                                                        class="my-3 d-flex justify-content-center col-lg-4 col-md-4 col-4">
                                                                        <input type="checkbox"
                                                                            class="form-check-input" name="chk_filter_replacment1_4"
                                                                            id="chk_filter_replacment1_4" disabled>
                                                                    </div>
                                                                </div>
                                                            </span>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <span class="col-lg-8 col-md-7 col-4">
                                                                <div class="row">
                                                                    <div class="col-lg-1 col-md-1 col-2">
                                                                        <label class="py-3 fw-bold fs-6 text-gray-800"
                                                                            for="">
                                                                            2)
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-lg-11 col-md-11 col-8">
                                                                        <label class="py-3" for="">{{ $key->filter_comment_2}}</label>
                                                                    </div>
                                                                </div>
                                                            </span>
                                                            <span class="col-lg-4 col-md-5 col-8">
                                                                <div class="row">
                                                                    <div
                                                                        class="my-3 d-flex justify-content-center col-lg-4 col-md-4 col-4">
                                                                        <input type="checkbox"
                                                                            class="form-check-input" name="chk_filter_replacment2_1"
                                                                            id="chk_filter_replacment2_1" disabled>
                                                                    </div>
                                                                    <div
                                                                        class="my-3 d-flex justify-content-center col-lg-4 col-md-4 col-4">
                                                                        <input type="checkbox"
                                                                            class="form-check-input" name="chk_filter_replacment2_2"
                                                                            id="chk_filter_replacment2_2" disabled>
                                                                    </div>
                                                                    <div
                                                                        class="my-3 d-flex justify-content-center col-lg-4 col-md-4 col-4">
                                                                        <input type="checkbox"
                                                                            class="form-check-input" name="chk_filter_replacment2_4"
                                                                            id="chk_filter_replacment2_4" disabled> 
                                                                    </div>
                                                                </div>
                                                            </span>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <span class="col-lg-8 col-md-7 col-4">
                                                                <div class="row">
                                                                    <div class="col-lg-1 col-md-1 col-2">
                                                                        <label class="py-3 fw-bold fs-6 text-gray-800"
                                                                            for="">
                                                                            3)
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-lg-11 col-md-11 col-8">
                                                                        <label class="py-3" for="">{{ $key->filter_comment_3}}</label>
                                                                    </div>
                                                                </div>
                                                            </span>
                                                            <span class="col-lg-4 col-md-5 col-8">
                                                                <div class="row">
                                                                    <div
                                                                        class="my-3 d-flex justify-content-center col-lg-4 col-md-4 col-4">
                                                                        <input type="checkbox"
                                                                            class="form-check-input" name="chk_filter_replacment3_1"
                                                                            id="chk_filter_replacment3_1" disabled>
                                                                    </div>
                                                                    <div
                                                                        class="my-3 d-flex justify-content-center col-lg-4 col-md-4 col-4">
                                                                        <input type="checkbox"
                                                                            class="form-check-input" name="chk_filter_replacment3_2"
                                                                            id="chk_filter_replacment3_2" disabled>
                                                                    </div>
                                                                    <div
                                                                        class="my-3 d-flex justify-content-center col-lg-4 col-md-4 col-4">
                                                                        <input type="checkbox"
                                                                            class="form-check-input" name="chk_filter_replacment3_4"
                                                                            id="chk_filter_replacment3_4" disabled>
                                                                    </div>
                                                                </div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="rounded-2 bg-light mb-5 p-3">
                                                        <div class="row">
                                                            <span
                                                                class="ps-2 pb-3 pt-2 col-lg-2 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                                <u class="fw-bold fs-6 text-gray-800">COMMENTS</u>
                                                            </span>
                                                            <span class="col-lg-5 col-md-12 col-12">
                                                                <div class="row">
                                                                    <div
                                                                        class="col-lg-6 text-lg-start col-md-3 col-12">
                                                                        <label class="py-3 fw-bold fs-6 text-gray-800"
                                                                            for="">
                                                                            Air Compressor
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-lg-1 col-md-1 col-2">
                                                                        <input type="checkbox"
                                                                            class="my-3 form-check-input"
                                                                            name="comment_compressor_normal" id="comment_compressor_normal" disabled>
                                                                    </div>
                                                                    <div class="col-lg-2 col-md-2 col-3">
                                                                        <label class="py-3 text-lg-start"
                                                                            for="">
                                                                            Normal
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-lg-1 col-md-1 col-2">
                                                                        <input type="checkbox"
                                                                            class="my-3 form-check-input"
                                                                            name="comment_compressor_abnormal" id="comment_compressor_abnormal" disabled> 
                                                                    </div>
                                                                    <div class="col-lg-2 col-md-2 col-3">
                                                                        <label class="py-3 text-lg-start"
                                                                            for="">
                                                                            Abnormal
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                            </span>
                                                            <div class="col-lg-4"></div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-12">
                                                            <label for="">{{ $key->remarks}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="rounded-2 bg-light mb-5 p-3">
                                                <div
                                                    class="ps-2 pb-3 pt-2 col-lg-12 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                    <u class="fw-bold fs-6 text-gray-800">MAINTENANCE</u>
                                                </div>
                                                <div class="row mb-5">
                                                    <span class="col-lg-6 col-md-6 col-4">
                                                        <label class="ps-3 fs-6 text-gray-800" for="">
                                                            Items
                                                        </label>
                                                    </span>
                                                    <span
                                                        class="col-lg-2 text-lg-center col-md-2 text-md-center col-2 text-center">
                                                        <label class="fs-6 text-gray-800" for="">
                                                            Check
                                                        </label>
                                                    </span>
                                                    <span
                                                        class="col-lg-2 text-lg-center col-md-2 text-md-center col-3 text-center">
                                                        <label class="fs-6 text-gray-800" for="">
                                                            Service
                                                        </label>
                                                    </span>
                                                    <span
                                                        class="col-lg-2 text-lg-center col-md-2 text-md-center col-3 text-center">
                                                        <label class="fs-6 text-gray-800" for="">
                                                            Replace
                                                        </label>
                                                    </span>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            Suction Air Filter
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_suction_1" id="maint_suction_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_suction_2" id="maint_suction_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_suction_4" id="maint_suction_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            Oil Filter
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilfiter_1" id="maint_oilfiter_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilfiter_2" id="maint_oilfiter_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilfiter_4" id="maint_oilfiter_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            Oil Separator Elemant
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilseparator_1" id="maint_oilseparator_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilseparator_2" id="maint_oilseparator_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilseparator_4" id="maint_oilseparator_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            Oil
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oil_1" id="maint_oil_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oil_2" id="maint_oil_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oil_4" id="maint_oil_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            Drain Separator
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_drainseparator_1" id="maint_drainseparator_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_drainseparator_2" id="maint_drainseparator_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_drainseparator_4" id="maint_drainseparator_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            Motor Grease
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_motorgrease_1" id="maint_motorgrease_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_motorgrease_2" id="maint_motorgrease_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_motorgrease_4" id="maint_motorgrease_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="border-bottom border-gray-400 mb-5"></div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            *Auto Blow Off System
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_autoblowoff_1" id="maint_autoblowoff_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_autoblowoff_2" id="maint_autoblowoff_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_autoblowoff_4" id="maint_autoblowoff_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            Capacity Cont. v/v
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_capacityvav_1" id="maint_capacityvav_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_capacityvav_2" id="maint_capacityvav_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_capacityvav_4" id="maint_capacityvav_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            Pressure Cont. v/v
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_presscontvav_1" id="maint_presscontvav_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_presscontvav_2" id="maint_presscontvav_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_presscontvav_4" id="maint_presscontvav_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            Pressure Keep v/v
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_presskeepvav_1" id="maint_presskeepvav_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_presskeepvav_2" id="maint_presskeepvav_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_presskeepvav_4" id="maint_presskeepvav_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            Auto Thermo v/v
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_thermovav_1" id="maint_thermovav_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_thermovav_2" id="maint_thermovav_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_thermovav_4" id="maint_thermovav_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            Oil Level Gauges
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oillevel_1" id="maint_oillevel_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oillevel_2" id="maint_oillevel_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oillevel_4" id="maint_oillevel_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            Oil Recovery System
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilrecovery_1" id="maint_oilrecovery_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilrecovery_2" id="maint_oilrecovery_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilrecovery_4" id="maint_oilrecovery_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            Belt/V-Belt
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_belt_1" id="maint_belt_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_belt_2" id="maint_belt_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_belt_4" id="maint_belt_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            **After Cooler
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_aftercooler_1" id="maint_aftercooler_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_aftercooler_2" id="maint_aftercooler_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilcooler_4" id="maint_oilcooler_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            **Oil Cooler
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilcooler_1" id="maint_oilcooler_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilcooler_2" id="maint_oilcooler_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilcooler_4" id="maint_oilcooler_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            Main Motor
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_mainmotor_1" id="maint_mainmotor_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_mainmotor_2" id="maint_mainmotor_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_mainmotor_4" id="maint_mainmotor_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            Mechanical / Oil seal
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilseal_1" id="maint_oilseal_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilseal_2" id="maint_oilseal_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilseal_4" id="maint_oilseal_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            Fan & Fan Motor
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_fanmotor_1" id="maint_fanmotor_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_fanmotor_2" id="maint_fanmotor_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_fanmotor_4" id="maint_fanmotor_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            Air End
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_airend_1" id="maint_airend_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_airend_2" id="maint_airend_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_airend_4" id="maint_airend_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            Bearing(Air End)
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_bearingair_1" id="maint_bearingair_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_bearingair_2" id="maint_bearingair_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_bearingair_4" id="maint_bearingair_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            Bearing(Motor)
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_bearingmotor_1" id="maint_bearingmotor_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_bearingmotor_2" id="maint_bearingmotor_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_bearingmotor_4" id="maint_bearingmotor_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="border-bottom border-gray-400 mb-5"></div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            Gauge, Light, Monitor
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_gauge_1" id="maint_gauge_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_gauge_2" id="maint_gauge_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_gauge_4" id="maint_gauge_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            *Magnetic Contactor
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_magnetic_1" id="maint_magnetic_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_magnetic_2" id="maint_magnetic_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_magnetic_4" id="maint_magnetic_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            Sensor
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_sensor_1" id="maint_sensor_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_sensor_2" id="maint_sensor_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_sensor_4" id="maint_sensor_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            Main Inverter
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_maininv_1" id="maint_maininv_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_maininv_2" id="maint_maininv_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_maininv_4" id="maint_maininv_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            Fan Invertor
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_faninv_1" id="maint_faninv_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_faninv_2" id="maint_faninv_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_faninv_4" id="maint_faninv_4" disabled>
                                                    </div>
                                                </div>
                                                <div class="border-bottom border-gray-400 mb-5"></div>
                                                <div class="row mb-5">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-4 text-start">
                                                        <label class="ps-3 fw-bold fs-6 text-gray-800"
                                                            for="">
                                                            Check For Leakage (Air/Oil/Water)
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-2">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_leakage_1" id="maint_leakage_1" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_leakage_2" id="maint_leakage_2" disabled>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_leakage_4" id="maint_leakage_4" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <label for="">
                                                    * Can be done when machine stops. ** Only for air cooled
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-5">
                                        <div class="col-lg-6">
                                            <div class="rounded-2 bg-light p-3">
                                                <div class="col-lg-12 text-lg-center">
                                                    <label class="fw-bold fs-6 text-gray-800" for="">
                                                        Serviced By
                                                    </label>
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="text" class="form-control" name=""
                                                        id="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="rounded-2 bg-light p-3">
                                                <div class="col-lg-12 text-lg-center">
                                                    <label class="fw-bold fs-6 text-gray-800" for="">
                                                        Accepted By Customer
                                                    </label>
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="text" class="form-control" name=""
                                                        id="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 ">
                <a href="{{ url('/service_show') }}" class="btn btn-primary btn-sm float-start"><i
                        class="fa-solid fa-forward"></i>&nbsp;Back</a>
            </div>


        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

    function printPDF(machineId, id) {

        const url = `/generate-pdf/${machineId}/${id}`;

        // Open a new window or tab with the constructed URL
        window.open(url, '_blank');


    }


    function Checkbox(prefix, value) {
        if (value == 1 ) {
            $(`#${prefix}`).prop("checked", true);
         
        } 
        if (value === null || value === 0) {
            // เพิ่มเงื่อนไขนี้เพื่อปิดใช้งาน checkbox
            $(`#${prefix}`).prop("checked", false);

        }
    }

    function setCheckboxValues(prefix, value) {
        if (value == 1 || value == 2 || value == 4) {
            $(`#${prefix}${value}`).prop("checked", true);
        } 
        if (value == 3 || value == 5) {
            let newvalue = value - 1;
            $(`#${prefix}1, #${prefix}${newvalue}`).prop("checked", true);
        }
        if (value == 6) {
            $(`#${prefix}2, #${prefix}4`).prop("checked", true);
        }
        if (value == 7) {
            $(`#${prefix}1, #${prefix}2, #${prefix}4`).prop("checked", true);
        }
         if (value === null || value === 0) {
            // เพิ่มเงื่อนไขนี้เพื่อปิดใช้งาน checkbox
            $(`#${prefix}1, #${prefix}2, #${prefix}4`).prop("checked", false);
        }
    }
    
        var value1    = '{{$key->filter_replacement_1 ?? ''}}';
        var value2    = '{{$key->filter_replacement_2 ?? ''}}';
        var value3    = '{{$key->filter_replacement_3 ?? ''}}';
        var value4    = '{{$key->maint_suction ?? ''}}';
        var value5    = '{{$key->maint_oilfiter ?? ''}}';
        var value6    = '{{$key->maint_oilseparator ?? ''}}';
        var value7    = '{{$key->maint_oil ?? ''}}';
        var value8    = '{{$key->maint_drainseparator ?? ''}}';
        var value9    = '{{$key->maint_motorgrease ?? ''}}';
        var value10   = '{{$key->maint_autoblowoff ?? ''}}';
        var value11   = '{{$key->maint_capacityvav ?? ''}}';
        var value12   = '{{$key->maint_presscontvav ?? ''}}';
        var value13   = '{{$key->maint_presskeepvav ?? ''}}';
        var value14   = '{{$key->maint_thermovav ?? ''}}';
        var value15   = '{{$key->maint_oillevel ?? ''}}';
        var value16   = '{{$key->maint_oilrecovery ?? ''}}';
        var value17   = '{{$key->maint_belt ?? ''}}';
        var value18   = '{{$key->maint_aftercooler ?? ''}}';
        var value19   = '{{$key->maint_oilcooler ?? ''}}';
        var value20   = '{{$key->maint_mainmotor ?? ''}}';
        var value21   = '{{$key->maint_oilseal ?? ''}}';
        var value22   = '{{$key->maint_fanmotor ?? ''}}';
        var value23   = '{{$key->maint_airend  ?? ''}}';
        var value24   = '{{$key->maint_bearingair ?? ''}}';
        var value25   = '{{$key->maint_bearingmotor ?? ''}}';
        var value26   = '{{$key->maint_gauge ?? ''}}';
        var value27   = '{{$key->maint_magnetic ?? ''}}';
        var value28   = '{{$key->maint_sensor ?? ''}}';
        var value29   = '{{$key->maint_maininv ?? ''}}';
        var value30   = '{{$key->maint_faninv ?? ''}}';
        var value31   = '{{$key->maint_leakage ?? ''}}';
        
   
        var detailMotor         = '{{$key->detail_motor ?? ''}}';
        var detailCooler        = '{{$key->detail_cooler ?? ''}}';
        var detailOil           = '{{$key->detail_topup ?? ''}}';
        var detailReplace       = '{{$key->detail_replace ?? ''}}';
        var detailOverhaulAir   = '{{$key->detail_overhaul_air ?? ''}}';
        var detailOverhaulMain  = '{{$key->detail_overhaul_motor ?? ''}}';
        var detailMainMotor     = '{{$key->detail_rewind ?? ''}}';
        var detail3000Hrs       = '{{$key->detail_3000 ?? ''}}';
        var detail6000Hrs       = '{{$key->detail_6000 ?? ''}}';
        var detail12000Hrs      = '{{$key->detail_12000 ?? ''}}';

        var settingOperationLocal     = '{{$key->setting_operation_local ?? ''}}';
        var settingOperationRunOn     = '{{$key->setting_operation_run_on ?? ''}}';
        var settingOperationRunLoad   = '{{$key->setting_operation_run_load ?? ''}}';
        var settingGroupLink          = '{{$key->setting_group_link ?? ''}}';
        var settingGroupPanel         = '{{$key->setting_group_panel ?? ''}}';
     
        var commentCompressorNormal        = '{{$key->comment_compressor_normal ?? ''}}';
        var commentCompressorAbnormal      = '{{$key->comment_compressor_abnormal ?? ''}}';

    $(document).ready(function() {
        setCheckboxValues("chk_filter_replacment1_", value1);
        setCheckboxValues("chk_filter_replacment2_", value2);
        setCheckboxValues("chk_filter_replacment3_", value3);
    
        setCheckboxValues("maint_suction_", value4);
        setCheckboxValues("maint_oilfiter_", value5);
        setCheckboxValues("maint_oilseparator_", value6);
        setCheckboxValues("maint_oil_", value7);
        setCheckboxValues("maint_drainseparator_", value8);
        setCheckboxValues("maint_motorgrease_", value9);
        setCheckboxValues("maint_autoblowoff_", value10);
        setCheckboxValues("maint_capacityvav_", value11);
        setCheckboxValues("maint_presscontvav_", value12);
        setCheckboxValues("maint_presskeepvav_", value13);
        setCheckboxValues("maint_thermovav_", value14);
        setCheckboxValues("maint_oillevel_", value15);
        setCheckboxValues("maint_oilrecovery_", value16);
        setCheckboxValues("maint_belt_", value17);
        setCheckboxValues("maint_aftercooler_", value18);
        setCheckboxValues("maint_oilcooler_", value19);
        setCheckboxValues("maint_mainmotor_", value20);
        setCheckboxValues("maint_oilseal_", value20);
        setCheckboxValues("maint_fanmotor_", value22);
        setCheckboxValues("maint_airend_", value23);
        setCheckboxValues("maint_bearingair_", value24);
        setCheckboxValues("maint_bearingmotor_", value25);
        setCheckboxValues("maint_gauge_", value26);
        setCheckboxValues("maint_magnetic_", value27);
        setCheckboxValues("maint_sensor_", value28);
        setCheckboxValues("maint_maininv_", value29);
        setCheckboxValues("maint_faninv_", value30);
        setCheckboxValues("maint_leakage_", value31);
   
        Checkbox("detail_motor", detailMotor);
        Checkbox("detail_cooler", detailCooler);
        Checkbox("detail_topup", detailOil);
        Checkbox("detail_replace", detailReplace);
        Checkbox("detail_overhaul_air", detailOverhaulAir);
        Checkbox("detail_overhaul_motor", detailOverhaulMain);
        Checkbox("detail_rewind", detailMainMotor);
        Checkbox("detail_3000", detail3000Hrs);
        Checkbox("detail_6000", detail6000Hrs);
        Checkbox("detail_12000", detail12000Hrs);

        Checkbox("setting_operation_local", settingOperationLocal);
        Checkbox("setting_operation_run_on",settingOperationRunOn);
        Checkbox("setting_operation_run_load", settingOperationRunLoad);
        Checkbox("setting_group_link", settingGroupLink);
        Checkbox("setting_group_panel", settingGroupPanel);

        Checkbox("comment_compressor_normal", commentCompressorNormal);
        Checkbox("comment_compressor_abnormal", commentCompressorAbnormal);

    
          
    });
    
    
    
    </script>
    </x-default-layout>
