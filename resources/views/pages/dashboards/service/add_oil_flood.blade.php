<x-default-layout>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 

    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" > 

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>

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
        
        @media only screen and (max-width: 400px) {
            .kbw-signature {
                width: 180px;
                height: 100px;
            }

            #sig canvas {
                width: 100%;
                height: 100%;
            }

            #sig1 canvas {
                width: 100%;
                height: 100%;
            }
        }

        @media only screen and (min-width: 760px) and (max-width: 770px) {
            .kbw-signature {
                width: 550px;
                /* ใช้ค่านี้สำหรับ iPad */
                height: 150px;
            }

            #sig canvas {
                width: 100%;
                height: 100%;
            }

            #sig1 canvas {
                width: 100%;
                height: 100%;
            }
        }


        @media only screen and (min-width: 1250px) {
            .kbw-signature {
                width: 600px;
                height: 200px;
            }

            #sig canvas {
                width: 100%;
                height: 100%;
            }

            #sig1 canvas {
                width: 100%;
                height: 100%;
            }
        }
    </style>

    <div class="container">
        <div class="text-start">
            <label class="mb-2 h1 fw-bold">Service - Add</label>
        </div>
        <div class="text-end h4">
            <label class="pe-10" style="color: red;z-index: 1040;" for=""><b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>&nbsp;=&nbsp;Mandatory Field</label>
        </div>
        <form action="{{ route('save', ['id' => $Id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
             {{-- @method('PUT') --}}
             @if ($errors->any())
                 <div class="alert alert-danger">
                     <ul>
                         @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                         @endforeach
                     </ul>
                 </div>
             @endif

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
                                    <div class="text-end">
                                        <label class="fw-bold h4" style="color: red;z-index: 1040;" for="">(Date format is "day/month/year")</label>
                                    </div>
                                    <div class="col-lg-12 rounded-2 bg-light text-dark my-4 py-3 px-3">
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-3 text-start">
                                                Index :
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-5 text-md-start col-9 text-start pb-5 pt-1">
                                                <label class="pt-3" for="">(New)</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-3 text-start">
                                                Serial# :
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-5 text-md-start col-9 text-start pb-5">
                                                <label class="pt-3" for="">{{ $Serial }}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                                                Machine Type Code :
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-5 text-md-start col-sm-12 text-sm-start pb-5">
                                                <label class="pt-3" for="">{{ $TypeCode }}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                                                Service Company :
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-5 text-md-start col-sm-12 text-sm-start pb-5">
                                                <label class="pt-3" for="">{{ $Service_com }}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                                                End User :
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-5 text-md-start col-sm-12 text-sm-start pb-5">
                                                <label class="pt-3" for="">{{ $Service_cus }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 rounded-2 bg-light text-dark my-4 py-3 px-3">
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-1 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                                                Service Date :<b class="h1" style="color: red;z-index: 1040;">&#42;</b>
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-5 text-md-start col-sm-12 text-sm-start pb-5">
                                                <input type="date" class="form-control serviceDate" name="service_dt"
                                                    id="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-1 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                                                Service Content :<b class="h1" style="color: red;z-index: 1040;">&#42;</b>
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-5 text-md-start col-sm-12 text-sm-start pb-5">
                                                <select class="form-select " aria-label="Select example" id="service-content-dropdown" name= "service_id_Content">
                                                    <option></option>
                                                    <option value="6">PATROL SERVICE/CLEANUP</option>
                                                    <option value="3">ANNUAL INSPECTION/PARTS CHANGE</option>
                                                    <option value="4">REPAIR</option>
                                                    <option value="2">OVERHAUL</option>
                                                    <option value="1">COMMISSIONING</option>
                                                    <option value="5">WARRANTY CLAIM RELATED</option>
                                                    <option value="8">EMERGENCY CALL/CHCKUP</option>
                                                    <option value="7">OTHERS/ETC</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                                                Service Performer :
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-5 text-md-start col-sm-12 text-sm-start pb-5">
                                                <input type="text" class="form-control servicePerformer" name= "service_performer"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                                                Customer PIC :
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-5 text-md-start col-sm-12 text-sm-start pb-5">
                                                <input type="text" class="form-control customerPIC"  name= "customer_pic" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 rounded-2 bg-light text-dark my-4 py-3 px-3">
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                                                Runing Hours :
                                            </div>
                                            <div
                                                class="col-lg-7 text-lg-start col-md-7 text-md-start col-sm-12 text-sm-start pb-5">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-3 text-lg-start col-md-3 col-md-start col-12 col-start">
                                                        <input type="text" class="form-control" name="running_hours"
                                                            id="">
                                                    </div>
                                                    <div
                                                        class="col-lg-9 text-lg-start col-md-9 col-md-start col-12 col-start">
                                                        <label class="pt-3" for="">[Last Time: 108820
                                                            (17/04/2023)]</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                                                Panel Generation :
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-7 text-md-start col-12 text-start pb-5">
                                                <div class="row">
                                                    <div
                                                        class="pt-4 col-lg-1 text-lg-center col-md-1 text-md-center col-1 text-center">
                                                        <label for="">{{ $panel_version}}</label>
                                                        <input type="hidden" class="form-control" name="panel_version" id="" value="{{ $panel_version }}">
                                                    </div>
                                                    <div
                                                        class="pt-4 col-lg-1 text-lg-center col-md-1 text-md-center col-1 text-center">
                                                        <input type="checkbox" class="form-check-input" name="change_panel"
                                                            id="" value="1">
                                                    </div>
                                                    <div
                                                        class="pt-4 col-lg-8 text-lg-start  col-md-10 text-md-start col-12 text-start">
                                                        <label for="">Click when "Hour Meter" has been
                                                            replaced.</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 rounded-2 bg-light text-dark my-4 py-3 px-3">
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                                                Remarks :
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-5 text-md-start col-sm-12 text-sm-start pb-5">
                                                <input type="text" class="form-control Remarks" name="remarks"
                                                    id="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 rounded-2 bg-light text-dark my-4 py-3 px-3">
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                                                Created :
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-5 text-md-start col-sm-12 text-sm-start pb-5">
                                                <label for=""></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                                                Updated :
                                            </div>
                                            <div
                                                class="col-lg-5 text-lg-start col-md-5 text-md-start col-sm-12 text-sm-start pb-5">
                                                <label for=""></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane " id="kt_tab_pane_2" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-lg-12 text-lg-end col-md-12 text-md-end col-12 text-end">
                                        <label class="fw-bold h4" style="color: red;z-index: 1040;" for="">(Date format is "day/month/year")</label>
                                    </div>

                                    <div class="row pt-5 pb-3">
                                        <div class="col-lg-2 col-md-3 col-12">
                                            <img alt="Logo"
                                                src="{{ image('logos/images/kobelco_100x21_blue.png') }}"
                                                class="h-25px app-sidebar-logo-default" />
                                        </div>
                                        <div class="col-lg-4 text-lg-start col-md-9 text-lg-start col-12 text-start">
                                            <label class="fs-3 fw-bold" for="">OIL FLOODED COMPRESSOR SERVICE REPORT</label>
                                        </div>
                                        <div class="col-lg-2 text-lg-end col-md-2 text-md-end col-12">

                                        </div>
                                        <div class="pt-3 col-lg-4 text-lg-end col-md-12 text-md-end col-12">
                                            <div class="row">
                                                <div
                                                    class="col-lg-4 text-lg-start col-md-3 text-md-start col-12 text-start">
                                                    <label class="fs-5 fw-bold" for="">Unit of
                                                        Pressure</label>
                                                </div>
                                                <div
                                                    class="col-lg-1 text-lg-end col-md-1 text-md-end col-2 text-start">
                                                    <input class="form-check-input" type="radio" value=""
                                                        name="unitofpressure" id="MPa,kPa" />
                                                </div>
                                                <div
                                                    class="col-lg-3 text-lg-end col-md-2 text-md-start col-4 text-start">
                                                    <label class="form-check-label text-gray-800" for="MPa,kPa">
                                                        MPa, kPa
                                                    </label>
                                                </div>
                                                <div
                                                    class="col-lg-1 text-lg-end col-md-1 text-md-end col-2 text-start">
                                                    <input class="form-check-input" type="radio" value=""
                                                        name="unitofpressure" id="bar,mbar" />
                                                </div>
                                                <div
                                                    class="col-lg-3 text-lg-end col-md-2 text-md-start col-4 text-start">
                                                    <label class="form-check-label text-gray-800" for="bar,mbar">
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
                                                        <label for="">{{ $Service_cus }}</label>
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
                                                        <label for="">{{ $Address }}</label>
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
                                                                class="col-lg-6 text-lg-start col-md-4 text-md-start col-12 text-start">
                                                                <label
                                                                    class="pt-6 fw-bold fs-6 text-gray-800">Date<b class="h1" style="color: red;z-index: 1040;">&#42;</b></label>
                                                            </div>
                                                            <div
                                                                class="col-lg-6 text-lg-start col-md-8 text-md-start col-12 text-start my-3">
                                                                <input type="date" class="form-control  serviceDate"
                                                                    name="" id="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-12">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-6 text-lg-start col-md-4 text-md-start col-12 text-start">
                                                                <label class="pt-6 fw-bold fs-6 text-gray-800">Report
                                                                    No.</label>
                                                            </div>
                                                            <div
                                                                class="col-lg-6 text-lg-start col-md-8 text-md-start col-12 text-start my-3">
                                                                <input type="text" class="form-control"
                                                                    name="report_no" id="textInput1" readonly>
                                                                <div class="popup" id="inputPopup1">
                                                                    <div class="numpad">
                                                                        <button type="button"
                                                                            data-value="1">1</button>
                                                                        <button type="button"
                                                                            data-value="2">2</button>
                                                                        <button type="button"
                                                                            data-value="3">3</button>
                                                                        <button type="button"
                                                                            data-value="4">4</button>
                                                                        <button type="button"
                                                                            data-value="5">5</button>
                                                                        <button type="button"
                                                                            data-value="6">6</button>
                                                                        <button type="button"
                                                                            data-value="7">7</button>
                                                                        <button type="button"
                                                                            data-value="8">8</button>
                                                                        <button type="button"
                                                                            data-value="9">9</button>
                                                                        <button type="button"
                                                                            id="clear1">Clear</button>
                                                                        <button type="button"
                                                                            data-value="0">0</button>
                                                                        <button type="button"
                                                                            id="confirmButton1">Yes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12 col-12">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-6 text-lg-start col-md-5 text-md-start col-12 text-start">
                                                                <label class="pt-3 fw-bold fs-6 text-gray-800">Work
                                                                    Start Date <b class="h1" style="color: red;z-index: 1040;">&#42;</b></label>
                                                            </div>
                                                            <div
                                                                class="col-lg-6 text-lg-start col-md-7 text-md-start col-12 text-start my-3">
                                                                <input type="date" class="form-control"
                                                                    name="" id="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-12">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-6 text-lg-start col-md-5 text-md-start col-12 text-start">
                                                                <label class="pt-3 fw-bold fs-6 text-gray-800">Work
                                                                    Finish Date</label>
                                                            </div>
                                                            <div
                                                                class="col-lg-6 text-lg-end col-md-7 text-md-start col-12 text-start my-3">
                                                                <input type="date" class="form-control"
                                                                    name="" id="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-lg-12 text-lg-center col-md-12 text-md-center col-12 text-center">
                                                    <label for=""
                                                        class="fw-bold fs-4 text-gray-800 pt-5">{{ $Service_com }}</label>
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
                                                                <label for="">{{ $TypeCode }}</label>
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
                                                                <label for="">{{ $Serial}}</label>
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
                                                                <label for="">{{ $DataO }}</label>
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
                                                                <label for="">{{ $DataN_MC }}</label>
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
                                                                <label for="">{{ $Comm_Date}}</label>
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
                                                                class="col-lg-2 text-lg-start col-md-3 text-md-start col-12 text-start">
                                                                <label class="py-3 fw-bold fs-6 text-gray-800"
                                                                    for="">Ventilation</label>
                                                            </div>
                                                            <div
                                                                class="py-3 col-lg-10 text-lg-start col-md-9 text-md-start col-12 text-start">
                                                                <input class="form-check-input" type="radio"
                                                                    value="1" name="site_ventilation"
                                                                    id="Good" />
                                                                <label class="text-gray-800 form-check-label"
                                                                    for="Good">
                                                                    Good
                                                                </label>&nbsp;
                                                                <input class="form-check-input" type="radio"
                                                                    value="2" name="site_ventilation"
                                                                    id="Fair" />
                                                                <label class="text-gray-800 form-check-label"
                                                                    for="Fair">
                                                                    Fair
                                                                </label>&nbsp;
                                                                <input class="form-check-input" type="radio"
                                                                    value="3" name="site_ventilation"
                                                                    id="NotGood" />
                                                                <label class="text-gray-800 form-check-label"
                                                                    for="NotGood">
                                                                    Not Good
                                                                </label>&nbsp;
                                                                <input class="form-check-input" type="radio"
                                                                    value="0" name="site_ventilation"
                                                                    id="N/A" />
                                                                <label class="text-gray-800 form-check-label"
                                                                    for="N/A">
                                                                    N/A
                                                                </label>
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
                                                                <div class="input-group mb-5">
                                                                    <input name="site_roomtemp" type="text" class="form-control"
                                                                        aria-label="Recipient's username"
                                                                        aria-describedby="basic-addon2"
                                                                        id="textInput2" readonly />
                                                                    <div class="popup" id="inputPopup2">
                                                                        <div class="numpad">
                                                                            <button type="button"
                                                                                data-value="1">1</button>
                                                                            <button type="button"
                                                                                data-value="2">2</button>
                                                                            <button type="button"
                                                                                data-value="3">3</button>
                                                                            <button type="button"
                                                                                data-value="4">4</button>
                                                                            <button type="button"
                                                                                data-value="5">5</button>
                                                                            <button type="button"
                                                                                data-value="6">6</button>
                                                                            <button type="button"
                                                                                data-value="7">7</button>
                                                                            <button type="button"
                                                                                data-value="8">8</button>
                                                                            <button type="button"
                                                                                data-value="9">9</button>
                                                                            <button type="button"
                                                                                id="clear2">Clear</button>
                                                                            <button type="button"
                                                                                data-value="0">0</button>
                                                                            <button type="button"
                                                                                id="confirmButton2">Yes</button>
                                                                        </div>
                                                                    </div>
                                                                    <span class="input-group-text" id="basic-addon2">
                                                                        <span class="path1"></span><span
                                                                            class="path2">&#8451;</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </span>
                                                </div>
                                                <div class="row">
                                                    <span class="col-lg-5 col-md-6 col-12">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-auto text-lg-start col-md-auto text-md-start col-12 text-start">
                                                                <label class="py-3 fw-bold fs-6 text-gray-800"
                                                                    for="">Cooling Water</label>
                                                            </div>
                                                            <div
                                                                class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                                <div class="input-group mb-5">
                                                                    <span class="input-group-text" id="basic-addon2">
                                                                        <span class="path1"></span><span
                                                                            class="path2 fs-9 text-gray-800">Temp</span>
                                                                    </span>
                                                                    <input name="site_cooling_temp_in" type="text" class="form-control"
                                                                        aria-label="Recipient's username"
                                                                        aria-describedby="basic-addon2"
                                                                        id="textInput3" readonly />
                                                                    <div class="popup" id="inputPopup3">
                                                                        <div class="numpad">
                                                                            <button type="button"
                                                                                data-value="1">1</button>
                                                                            <button type="button"
                                                                                data-value="2">2</button>
                                                                            <button type="button"
                                                                                data-value="3">3</button>
                                                                            <button type="button"
                                                                                data-value="4">4</button>
                                                                            <button type="button"
                                                                                data-value="5">5</button>
                                                                            <button type="button"
                                                                                data-value="6">6</button>
                                                                            <button type="button"
                                                                                data-value="7">7</button>
                                                                            <button type="button"
                                                                                data-value="8">8</button>
                                                                            <button type="button"
                                                                                data-value="9">9</button>
                                                                            <button type="button"
                                                                                id="clear3">Clear</button>
                                                                            <button type="button"
                                                                                data-value="0">0</button>
                                                                            <button type="button"
                                                                                id="confirmButton3">Yes</button>
                                                                        </div>
                                                                    </div>
                                                                    <span class="input-group-text" id="basic-addon2">
                                                                        <span class="path1"></span><span
                                                                            class="path2">&nbsp;/&nbsp;</span>
                                                                    </span>
                                                                    <input type="text" class="form-control"
                                                                    name="site_cooling_temp_out"
                                                                        aria-label="Recipient's username"
                                                                        aria-describedby="basic-addon2"
                                                                        id="textInput4" readonly />
                                                                    <div class="popup" id="inputPopup4">
                                                                        <div class="numpad">
                                                                            <button type="button"
                                                                                data-value="1">1</button>
                                                                            <button type="button"
                                                                                data-value="2">2</button>
                                                                            <button type="button"
                                                                                data-value="3">3</button>
                                                                            <button type="button"
                                                                                data-value="4">4</button>
                                                                            <button type="button"
                                                                                data-value="5">5</button>
                                                                            <button type="button"
                                                                                data-value="6">6</button>
                                                                            <button type="button"
                                                                                data-value="7">7</button>
                                                                            <button type="button"
                                                                                data-value="8">8</button>
                                                                            <button type="button"
                                                                                data-value="9">9</button>
                                                                            <button type="button"
                                                                                id="clear4">Clear</button>
                                                                            <button type="button"
                                                                                data-value="0">0</button>
                                                                            <button type="button"
                                                                                id="confirmButton4">Yes</button>
                                                                        </div>
                                                                    </div>
                                                                    <span class="input-group-text" id="basic-addon2">
                                                                        <span class="path1"></span><span
                                                                            class="path2">&#8451;</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </span>
                                                    <span class="col-lg-7 col-md-6 col-12">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-2 text-lg-start col-md-auto text-md-start col-12 text-start">
                                                                <label class="py-3 fs-9 text-gray-800"
                                                                    for="">Pressure</label>
                                                            </div>
                                                            <div
                                                                class="col-lg-10 text-lg-start col-md-10 text-md-start col-12 text-start">
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-8 col-9">
                                                                        <div class="input-group mb-5">
                                                                            <input type="text" class="form-control"
                                                                                name="site_cooling_pressure_in"
                                                                                aria-label="Recipient's username"
                                                                                aria-describedby="basic-addon2"
                                                                                id="textInput5" readonly />
                                                                            <div class="popup" id="inputPopup5">
                                                                                <div class="numpad">
                                                                                    <button type="button"
                                                                                        data-value="1">1</button>
                                                                                    <button type="button"
                                                                                        data-value="2">2</button>
                                                                                    <button type="button"
                                                                                        data-value="3">3</button>
                                                                                    <button type="button"
                                                                                        data-value="4">4</button>
                                                                                    <button type="button"
                                                                                        data-value="5">5</button>
                                                                                    <button type="button"
                                                                                        data-value="6">6</button>
                                                                                    <button type="button"
                                                                                        data-value="7">7</button>
                                                                                    <button type="button"
                                                                                        data-value="8">8</button>
                                                                                    <button type="button"
                                                                                        data-value="9">9</button>
                                                                                    <button type="button"
                                                                                        id="clear5">Clear</button>
                                                                                    <button type="button"
                                                                                        data-value="0">0</button>
                                                                                    <button type="button"
                                                                                        id="confirmButton5">Yes</button>
                                                                                </div>
                                                                            </div>
                                                                            <span class="input-group-text"
                                                                                id="basic-addon2">
                                                                                <span class="path1"></span><span
                                                                                    class="path2">&nbsp;/&nbsp;</span>
                                                                            </span>
                                                                            <input type="text" class="form-control"
                                                                                name="site_cooling_pressure_out"
                                                                                aria-label="Recipient's username"
                                                                                aria-describedby="basic-addon2"
                                                                                id="textInput6" readonly />
                                                                            <div class="popup" id="inputPopup6">
                                                                                <div class="numpad">
                                                                                    <button type="button"
                                                                                        data-value="1">1</button>
                                                                                    <button type="button"
                                                                                        data-value="2">2</button>
                                                                                    <button type="button"
                                                                                        data-value="3">3</button>
                                                                                    <button type="button"
                                                                                        data-value="4">4</button>
                                                                                    <button type="button"
                                                                                        data-value="5">5</button>
                                                                                    <button type="button"
                                                                                        data-value="6">6</button>
                                                                                    <button type="button"
                                                                                        data-value="7">7</button>
                                                                                    <button type="button"
                                                                                        data-value="8">8</button>
                                                                                    <button type="button"
                                                                                        data-value="9">9</button>
                                                                                    <button type="button"
                                                                                        id="clear6">Clear</button>
                                                                                    <button type="button"
                                                                                        data-value="0">0</button>
                                                                                    <button type="button"
                                                                                        id="confirmButton6">Yes</button>
                                                                                </div>
                                                                            </div>
                                                                            <span class="input-group-text"
                                                                                id="basic-addon2">
                                                                                <span class="path1"></span><span
                                                                                    class="path2 unit_of_pressure unit_of_pressure">bar</span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="py-3 col-lg-3 text-lg-start col-md-auto text-md-start col-3 text-end">
                                                                        <label class=" fs-9 text-gray-800"
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
                                                <div class="row">
                                                    <span class="py-2 col-lg-auto col-md-6 col-12">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-1">
                                                                <input class="form-check-input" type="radio"
                                                                    value="6" name="service_id"
                                                                    id="servicContent_portal" />
                                                            </div>
                                                            <div
                                                                class="col-lg-auto text-lg-start col-md-11 text-md-start col-11 text-start">
                                                                <label class="text-gray-800 form-check-label"
                                                                    for="">&nbsp;
                                                                    PATROL SERVICE/CLEANUP
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </span>
                                                    <span class="py-2 col-lg-auto col-md-6 col-12">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-1">
                                                                <input class="form-check-input" type="radio"
                                                                    value="3" name="service_id"
                                                                    id="servicContent_annual" />
                                                            </div>
                                                            <div
                                                                class="col-lg-auto text-lg-start col-md-11 text-md-start col-11 text-start">
                                                                <label class="text-gray-800 form-check-label"
                                                                    for="">&nbsp;
                                                                    ANNUAL INSPECTION/PARTS CHANGE
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </span>
                                                    <span class="py-2 col-lg-auto col-md-6 col-12">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-1">
                                                                <input class="form-check-input" type="radio"
                                                                    value="4" name="service_id"
                                                                    id="servicContent_repair" />
                                                            </div>
                                                            <div
                                                                class="col-lg-auto text-lg-start col-md-11 text-md-start col-11 text-start">
                                                                <label class="text-gray-800 form-check-label"
                                                                    for="">&nbsp;
                                                                    REPAIR
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </span>
                                                    <span class="py-2 col-lg-auto col-md-6 col-12">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-1">
                                                                <input class="form-check-input" type="radio"
                                                                    value="2" name="service_id"
                                                                    id="servicContent_overhaul" />
                                                            </div>
                                                            <div
                                                                class="col-lg-auto text-lg-start col-md-11 text-md-start col-11 text-start">
                                                                <label class="text-gray-800 form-check-label"
                                                                    for="">&nbsp;
                                                                    OVERHAUL
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </span>
                                                </div>
                                                <div class="row">
                                                    <span class="py-2 col-lg-auto col-md-6 col-12">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-1">
                                                                <input class="form-check-input" type="radio"
                                                                    value="1" name="service_id"
                                                                    id="servicContent_commissioning" />
                                                            </div>
                                                            <div
                                                                class="col-lg-auto text-lg-start col-md-11 text-md-start col-11 text-start">
                                                                <label class="text-gray-800 form-check-label"
                                                                    for="">&nbsp;
                                                                    COMMISSIONING
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </span>
                                                    <span class="py-2 col-lg-auto col-md-6 col-12">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-1">
                                                                <input class="form-check-input" type="radio"
                                                                    value="5" name="service_id"
                                                                    id="servicContent_warranty" />
                                                            </div>
                                                            <div
                                                                class="col-lg-auto text-lg-start col-md-11 text-md-start col-11 text-start">
                                                                <label class="text-gray-800 form-check-label"
                                                                    for="">&nbsp;
                                                                    WARRANTY CLAIM RELATED
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </span>
                                                    <span class="py-2 col-lg-auto col-md-6 col-12">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-1">
                                                                <input class="form-check-input" type="radio"
                                                                    value="8" name="service_id"
                                                                    id="servicContent_emergency" />
                                                            </div>
                                                            <div
                                                                class="col-lg-auto text-lg-start col-md-11 text-md-start col-11 text-start">
                                                                <label class="text-gray-800 form-check-label"
                                                                    for="">&nbsp;
                                                                    EMERGENCY CALL/CHECKUP
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </span>
                                                    <span class="py-2 col-lg-auto col-md-6 col-12">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-1">
                                                                <input class="form-check-input" type="radio"
                                                                    value="7" name="service_id"
                                                                    id="serviceContent_portal" />
                                                            </div>
                                                            <div
                                                                class="col-lg-auto text-lg-start col-md-11 text-md-start col-11 text-start">
                                                                <label class="text-gray-800 form-check-label"
                                                                    for="servicContent_other">&nbsp;
                                                                    OTHERS/ETC
                                                                </label>
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
                                                class="pb-1 col-lg-12 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                <u class="fw-bold fs-6 text-gray-800">SERVICE CONTENT (Detail)</u>
                                            </div>

                                            <div class="row">
                                                <div class="py-2 col-lg-2 col-md-6 col-12">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-auto text-lg-start col-md-auto text-md-start col-1 text-start">
                                                            <input class="mt-3 form-check-input" type="checkbox"
                                                                name="detail_motor" value="0" id="">
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
                                                                name="detail_cooler" value="0" id="">
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
                                                                        type="checkbox" name="detail_topup" value="0"
                                                                        id="">
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
                                                                <div class="col-lg-2 col-md-2 col-2">
                                                                    <input type="text" class="form-control"
                                                                        name="detail_topup_liters" id="textInput7" readonly>
                                                                    <div class="popup" id="inputPopup7">
                                                                        <div class="numpad">
                                                                            <button type="button"
                                                                                data-value="1">1</button>
                                                                            <button type="button"
                                                                                data-value="2">2</button>
                                                                            <button type="button"
                                                                                data-value="3">3</button>
                                                                            <button type="button"
                                                                                data-value="4">4</button>
                                                                            <button type="button"
                                                                                data-value="5">5</button>
                                                                            <button type="button"
                                                                                data-value="6">6</button>
                                                                            <button type="button"
                                                                                data-value="7">7</button>
                                                                            <button type="button"
                                                                                data-value="8">8</button>
                                                                            <button type="button"
                                                                                data-value="9">9</button>
                                                                            <button type="button"
                                                                                id="clear7">Clear</button>
                                                                            <button type="button"
                                                                                data-value="0">0</button>
                                                                            <button type="button"
                                                                                id="confirmButton7">Yes</button>
                                                                        </div>
                                                                    </div>
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
                                                                        type="checkbox" name="detail_replace" value="0"
                                                                        id="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="detail_replace_brand" id="0">
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
                                                                name="detail_overhaul_air" value="" id="0">
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
                                                                name="detail_overhaul_motor" value="0" id="">
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
                                                                name="detail_rewind" value="0" id="">
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
                                                                name="detail_3000" value="0" id="">
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
                                                                name="detail_6000" value="0" id="">
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
                                                                name="detail_12000" value="0" id="">
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
                                                            <input class="mt-3 form-control" type="text"
                                                                name="detail_other" value="" id="">
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
                                                            class="py-2 col-lg-2 text-lg-start col-md-4 text-md-start col-12 text-start">
                                                            <label class="fw-bold fs-6 text-gray-800" for="">
                                                                Discharge Air Pressure
                                                            </label>
                                                        </span>
                                                        <span class="col-lg-4 col-md-7 col-12">
                                                            <div class="row">
                                                                <div class="input-group mb-5"
                                                                    data-bs-placement="bottom"
                                                                    data-bs-toggle="tooltip"
                                                                    title="(Load/Unload/Normal)">
                                                                    <input type="text" class="form-control" name="running_air_pressure_load"/>
                                                                    <span class="input-group-text">/</span>
                                                                    <input type="text" class="form-control" name="running_air_pressure_unload"/>
                                                                    <span class="input-group-text">/</span>
                                                                    <input type="text" class="form-control" name="running_air_pressure_normal"/>
                                                                    <span class="input-group-text unit_of_pressure">bar</span>
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <span
                                                            class="py-2 col-lg-2 text-lg-end col-md-4 text-md-start col-12">
                                                            <label class="fw-bold fs-6 text-gray-800" for="">
                                                                O/S Pressure
                                                            </label>
                                                        </span>
                                                        <span class="col-lg-3 col-md-7 col-12">
                                                            <div class="input-group mb-5">
                                                                <input type="text" class="form-control" name="running_os_pressure"/>
                                                                <span class="input-group-text unit_of_pressure unit_of_pressure">bar</span>
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
                                                            <div class="row">
                                                                <div class="input-group mb-5">
                                                                    <input type="number" class="form-control" name="running_load"/>
                                                                    <span class="input-group-text">%</span>
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <span
                                                            class="py-3 col-lg-2 text-lg-end col-md-3 text-md-start col-12 text-start">
                                                            <label class="fw-bold fs-6 text-gray-800"
                                                                for="">Discharge Air Temp.</label>
                                                        </span>
                                                        <span
                                                            class="col-lg-3 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                            <div class="row">
                                                                <div class="input-group mb-5">
                                                                    <input type="number" class="form-control" name="running_air_temp_load"/>
                                                                    <span class="input-group-text">/</span>
                                                                    <input type="number" class="form-control"  name="running_air_temp_unload"/>
                                                                    <span class="input-group-text">&#8451;</span>
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <span
                                                            class="col-lg-1 text-lg-start col-md-3 text-md-start col-12 text-start">
                                                            <label class="py-3" for="">(Load/Unload)</label>
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
                                                            <div class="row">
                                                                <div class="input-group mb-5">
                                                                    <input type="number" class="form-control" name="running_hourmeter_check"/>
                                                                    <span class="input-group-text">Hrs</span>
                                                                </div>
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
                                                            class="col-lg text-lg-start col-md-4 text-md-start col-12 text-start">
                                                            <div class="row">
                                                                <div class="input-group mb-5"
                                                                    data-bs-placement="bottom"
                                                                    data-bs-toggle="tooltip" title="Load/Unload">
                                                                    <input type="number" class="form-control" name="running_current_load"/>
                                                                    <span class="input-group-text">/</span>
                                                                    <input type="number" class="form-control" name="running_current_unload"/>
                                                                    <span class="input-group-text">A</span>
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
                                                            class="col-lg text-lg-start col-md-3 text-md-start col-12 text-start">
                                                            <div class="row">
                                                                <div class="input-group mb-5">
                                                                    <input type="number" class="form-control" name="running_os_temp"/>
                                                                    <span class="input-group-text">&#8451;</span>
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
                                                            class="col-lg text-lg-start col-md-3 text-md-start col-12 text-start">
                                                            <div class="row">
                                                                <div class="input-group mb-5">
                                                                    <input type="number" class="form-control" name="running_ambient_temp"/>
                                                                    <span class="input-group-text">&#8451;</span>
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
                                                            class="col-lg text-lg-start col-md-3 text-md-start col-12 text-start">
                                                            <div class="row">
                                                                <div class="input-group mb-5">
                                                                    <input type="number" class="form-control" name="running_tc_temp"/>
                                                                    <span class="input-group-text">&#8451;</span>
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
                                                            class="col-lg text-lg-start col-md-3 text-md-start col-12 text-start">
                                                            <input class="form-control" type="number" name="running_load_count"
                                                                id="" data-bs-placement="bottom"
                                                                data-bs-toggle="tooltip" title="Load Run Time">
                                                        </span>
                                                        <span
                                                            class="py-3 col-lg-auto text-lg-end col-md-3 text-md-start col-12 text-start">
                                                            <label class="fw-bold fs-6 text-gray-800" for="">
                                                                Load Hour
                                                            </label>
                                                        </span>
                                                        <span
                                                            class="col-lg text-lg-start col-md-3 text-md-start col-12 text-start">
                                                            <div class="row">
                                                                <div class="input-group mb-5"
                                                                    data-bs-placement="bottom"
                                                                    data-bs-toggle="tooltip" title="(Load Run Time)">
                                                                    <input type="number" class="form-control" name="running_load_hour"/>
                                                                    <span class="input-group-text">Hrs</span>
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
                                                            class="col-lg text-lg-start col-md-3 text-md-start col-12 text-start">
                                                            <input class="form-control" type="number" name="running_count"
                                                                id="" data-bs-placement="bottom"
                                                                data-bs-toggle="tooltip" title="Load Run Time">
                                                        </span>
                                                        <span
                                                            class="py-3 col-lg-auto text-lg-end col-md-3 text-md-start col-12 text-start">
                                                            <label class="fw-bold fs-6 text-gray-800" for="">
                                                                Suction Pressure
                                                            </label>
                                                        </span>
                                                        <span
                                                            class="col-lg text-lg-start col-md-3 text-md-start col-12 text-start">
                                                            <div class="row">
                                                                <div class="input-group mb-5"
                                                                    data-bs-placement="bottom"
                                                                    data-bs-toggle="tooltip" title="(Load Run Time)">
                                                                    <input type="number" class="form-control" name="running_suction_pressure" />
                                                                    <span class="input-group-text unit_of_pressure">mbar</span>
                                                                </div>
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
                                                                <input name="setting_operation_local" type="checkbox" class="form-check-input" value="0"/>
                                                            </div>
                                                            <div
                                                                class="pt-3 col-lg-4 text-lg-start col-md-auto text-md-start col-10 text-start">
                                                                <label class="fw-bold fs-7 text-gray-800">Local (Run
                                                                    Mode:</label>
                                                            </div>
                                                            <div
                                                                class="pt-3 col-lg-1 text-lg-start col-md-auto text-md-start col-auto text-start">
                                                                <input name="setting_operation_run_on" type="checkbox" class="form-check-input" value="0"/>
                                                            </div>
                                                            <div
                                                                class="pt-3 col-lg-2 text-lg-start col-md-auto text-md-start col-auto text-start">
                                                                <label
                                                                    class="fw-bold fs-7 text-gray-800">On/Off,</label>
                                                            </div>
                                                            <div
                                                                class="pt-3 col-lg-1 text-lg-start col-md-auto text-md-start col-auto text-start">
                                                                <input name="setting_operation_run_load" type="checkbox" class="form-check-input" value="0"/>
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
                                                                <input name="setting_group_link" type="checkbox" class="form-check-input" value="0"/>
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
                                                                <input name="setting_group_panel" type="checkbox" class="form-check-input" value="0"/>
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
                                                                    <div class="row">
                                                                        <div class="input-group mb-5">
                                                                            <input name="setting_op_load" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text unit_of_pressure">bar</span>
                                                                        </div>
                                                                    </div>
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
                                                                    <div class="row">
                                                                        <div class="input-group mb-5">
                                                                            <input name="setting_op_unload" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text unit_of_pressure">bar</span>
                                                                        </div>
                                                                    </div>
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
                                                                    <div class="row">
                                                                        <div class="input-group mb-5">
                                                                            <input name="setting_op_auto" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text unit_of_pressure">bar</span>
                                                                        </div>
                                                                    </div>
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
                                                                    <div class="row">
                                                                        <div class="input-group mb-5">
                                                                            <input name="setting_op_constant" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text unit_of_pressure">bar</span>
                                                                        </div>
                                                                    </div>
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
                                                                    <div class="row">
                                                                        <div class="input-group mb-5">
                                                                            <input name="setting_phh" type="number" 
                                                                                class="form-control" />
                                                                            <span class="input-group-text unit_of_pressure" >bar</span>
                                                                        </div>
                                                                    </div>
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
                                                                    <div class="row">
                                                                        <div class="input-group mb-5">
                                                                            <input name="setting_phl" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text unit_of_pressure">bar</span>
                                                                        </div>
                                                                    </div>
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
                                                                    <div class="row">
                                                                        <div class="input-group mb-5">
                                                                            <input name="setting_ph" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text unit_of_pressure">bar</span>
                                                                        </div>
                                                                    </div>
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
                                                                    <div class="row">
                                                                        <div class="input-group mb-5">
                                                                            <input name="setting_pl" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text unit_of_pressure">bar</span>
                                                                        </div>
                                                                    </div>
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
                                                                    <div class="row">
                                                                        <div class="input-group mb-5">
                                                                            <input name="setting_pll" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text unit_of_pressure unit_of_pressure unit_of_pressure">bar</span>
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
                                                                        class="col-lg-3 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                                        <div class="input-group mb-5"
                                                                            data-bs-placement="bottom"
                                                                            data-bs-toggle="tooltip" title="(ON/OFF)">
                                                                            <span class="input-group-text">R-S</span>
                                                                            <input name="meas_voltage_rs_on" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text">/</span>
                                                                            <input name="meas_voltage_rs_off" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text">V</span>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-3 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                                        <div class="input-group mb-5"
                                                                            data-bs-placement="bottom"
                                                                            data-bs-toggle="tooltip" title="(ON/OFF)">
                                                                            <span class="input-group-text">S-T</span>
                                                                            <input name="meas_voltage_st_on" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text">/</span>
                                                                            <input name="meas_voltage_st_off" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text">V</span>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-3 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                                        <div class="input-group mb-5"
                                                                            data-bs-placement="bottom"
                                                                            data-bs-toggle="tooltip" title="(ON/OFF)">
                                                                            <span class="input-group-text">T-R</span>
                                                                            <input name="meas_voltage_tr_on" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text">/</span>
                                                                            <input name="meas_voltage_tr_off" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text">V</span>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-3 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                                        <label class="py-3 fw-bold fs-8 text-gray-800"
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
                                                                        class="col-lg-3 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                                        <div class="input-group mb-5"
                                                                            data-bs-placement="bottom"
                                                                            data-bs-toggle="tooltip"
                                                                            title="(Load/Unload)">
                                                                            <span class="input-group-text">R</span>
                                                                            <input name="meas_input_r_load" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text">/</span>
                                                                            <input name="meas_input_r_unload" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text">A</span>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-3 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                                        <div class="input-group mb-5"
                                                                            data-bs-placement="bottom"
                                                                            data-bs-toggle="tooltip"
                                                                            title="(Load/Unload)">
                                                                            <span class="input-group-text">S</span>
                                                                            <input name="meas_input_s_load" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text">/</span>
                                                                            <input name="meas_input_s_unload" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text">A</span>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-3 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                                        <div class="input-group mb-5"
                                                                            data-bs-placement="bottom"
                                                                            data-bs-toggle="tooltip"
                                                                            title="(Load/Unload)">
                                                                            <span class="input-group-text">T</span>
                                                                            <input name="meas_input_t_load" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text">/</span>
                                                                            <input name="meas_input_t_unload" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text">A</span>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-3 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                                        <label class="py-3 fw-bold fs-8 text-gray-800"
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
                                                                        class="col-lg-3 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                                        <div class="input-group mb-5"
                                                                            data-bs-placement="bottom"
                                                                            data-bs-toggle="tooltip"
                                                                            title="(Load/Unload)">
                                                                            <span class="input-group-text">U1</span>
                                                                            <input name="meas_motor_u_load" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text">/</span>
                                                                            <input name="meas_motor_u_unload" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text">A</span>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-3 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                                        <div class="input-group mb-5"
                                                                            data-bs-placement="bottom"
                                                                            data-bs-toggle="tooltip"
                                                                            title="(Load/Unload)">
                                                                            <span class="input-group-text">V1</span>
                                                                            <input name="meas_motor_v_load" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text">/</span>
                                                                            <input name="meas_motor_v_unload" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text">A</span>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-3 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                                        <div class="input-group mb-5"
                                                                            data-bs-placement="bottom"
                                                                            data-bs-toggle="tooltip"
                                                                            title="(Load/Unload)">
                                                                            <span class="input-group-text">W1</span>
                                                                            <input name="meas_motor_w_load" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text">/</span>
                                                                            <input name="meas_motor_w_unload" type="number"
                                                                                class="form-control" />
                                                                            <span class="input-group-text">A</span>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-3 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                                        <div class="input-group mb-5">
                                                                            <span class="input-group-text">Dis Pipe Temp</span>
                                                                            <input name="meas_pipetemp" type="number"
                                                                                class="form-control" />
                                                                            <span
                                                                                class="input-group-text">&#8451;</span>
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
                                                                    class="col-lg-6 text-lg-end col-md-7 text-md-start col-12 text-start pb-1">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid py-2 px-2">
                                                                        <input name="functions_monitor" class="form-check-input"
                                                                            type="radio" value="1"
                                                                            name="monitor/controller"
                                                                            id="OK" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="OK">
                                                                            OK
                                                                        </label>&nbsp;
                                                                        <input name="functions_monitor" class="form-check-input"
                                                                            type="radio" value="2"
                                                                            name="monitor/controller"
                                                                            id="NG" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="NG">
                                                                            NG
                                                                        </label>&nbsp;
                                                                        <input name="functions_monitor" class="form-check-input"
                                                                            type="radio" value="0"
                                                                            name="monitor/controller"
                                                                            id="N/A" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="N/A">
                                                                            N/A
                                                                        </label>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Battery
                                                                </span>
                                                                <span
                                                                    class="col-lg-6 text-lg-end col-md-7 text-md-start col-12 text-start pb-1">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid py-2 px-2">
                                                                        <input name="functions_battery" class="form-check-input"
                                                                            type="radio" value="1"
                                                                            name="battery" id="OK" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="OK">
                                                                            OK
                                                                        </label>&nbsp;
                                                                        <input name="functions_battery" class="form-check-input"
                                                                            type="radio" value="2"
                                                                            name="battery" id="NG" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="NG">
                                                                            NG
                                                                        </label>&nbsp;
                                                                        <input name="functions_battery" class="form-check-input"
                                                                            type="radio" value="0"
                                                                            name="battery" id="N/A" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="N/A">
                                                                            N/A
                                                                        </label>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Drain Sensor
                                                                </span>
                                                                <span
                                                                    class="col-lg-6 text-lg-end col-md-7 text-md-start col-12 text-start pb-1">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid py-2 px-2">
                                                                        <input name="functions_sensor" class="form-check-input"
                                                                            type="radio" value="1"
                                                                            name="drainsensor" id="OK" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="OK">
                                                                            OK
                                                                        </label>&nbsp;
                                                                        <input name="functions_sensor" class="form-check-input"
                                                                            type="radio" value="2"
                                                                            name="drainsensor" id="NG" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="NG">
                                                                            NG
                                                                        </label>&nbsp;
                                                                        <input name="functions_sensor" class="form-check-input"
                                                                            type="radio" value="0"
                                                                            name="drainsensor" id="N/A" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="N/A">
                                                                            N/A
                                                                        </label>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    OCR
                                                                </span>
                                                                <span
                                                                    class="col-lg-6 text-lg-end col-md-7 text-md-start col-12 text-start pb-1">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid py-2 px-2">
                                                                        <input class="form-check-input"
                                                                            type="radio" value="1"
                                                                            name="OCR" id="OK" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="OK">
                                                                            OK
                                                                        </label>&nbsp;
                                                                        <input class="form-check-input"
                                                                            type="radio" value="2"
                                                                            name="OCR" id="NG" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="NG">
                                                                            NG
                                                                        </label>&nbsp;
                                                                        <input class="form-check-input"
                                                                            type="radio" value="0"
                                                                            name="OCR" id="N/A" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="N/A">
                                                                            N/A
                                                                        </label>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Star-Deita Timer
                                                                </span>
                                                                <span
                                                                    class="col-lg-6 text-lg-end col-md-7 text-md-end col-12 text-start pb-5">
                                                                    <div>
                                                                        <div class="row">
                                                                            <div class="col-lg-4 col-md-6 col-6 ms-2">
                                                                                <input name="functions_timer" class="form-control"
                                                                                    type="number" />
                                                                            </div>
                                                                            <div class="col-lg-2 text-lg-start col-md-2 text-md-start col-2 text-start">
                                                                                <label
                                                                                    class="py-3 fw-bold fs-8 text-gray-800"
                                                                                    for="">
                                                                                    secs
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-lg-5 text-lg-start col-md-3 text-md-start col-3 text-start">
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
                                                                    class="col-lg-6 text-lg-end col-md-7 text-md-end col-12 text-start pb-5">
                                                                    <div>
                                                                        <div class="row">
                                                                            <div class="col-lg-4 col-md-6 col-6 ms-2">
                                                                                <input name="functions_valve_open" class="form-control"
                                                                                    type="number" />
                                                                            </div>
                                                                            <div
                                                                                class="col-lg-2 text-lg-start col-md-5 text-md-start col-5">
                                                                                <label
                                                                                    class="py-3 fw-bold fs-8 text-gray-800"
                                                                                    for="">
                                                                                    bar
                                                                                </label>
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
                                                                    class="col-lg-6 text-lg-end col-md-7 text-md-end col-12 text-start pb-5">
                                                                    <div>
                                                                        <div class="row">
                                                                            <div class="col-lg-4 col-md-6 col-6 ms-2">
                                                                                <input  name="functions_valve_blow" class="form-control"
                                                                                 type="number" />
                                                                            </div>
                                                                            <div
                                                                                class="col-lg-2 text-lg-start col-md-2 text-md-start col-2 text-start">
                                                                                <label
                                                                                    class="py-3 fw-bold fs-8 text-gray-800"
                                                                                    for="">
                                                                                    secs
                                                                                </label>
                                                                            </div>
                                                                            <div
                                                                                class="col-lg-5 text-lg-start col-md-3 text-md-start col-3 text-start">
                                                                                <label
                                                                                    class="py-3 fw-bold fs-8 text-gray-800"
                                                                                    for="">
                                                                                    [60 secs]
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
                                                                    class="col-lg-6 text-lg-end col-md-7 text-md-end col-12 text-start pb-5">
                                                                    <div>
                                                                        <div class="row">
                                                                            <div class="col-lg-4 col-md-6 col-6 ms-2">
                                                                                <input name="functions_valve_operate" class="form-control"
                                                                                    type="number" />
                                                                            </div>
                                                                            <div class="col-lg-2 text-lg-start col-md-5 text-md-start col-5 text-start">
                                                                                <label
                                                                                    class="py-3 fw-bold fs-8 text-gray-800"
                                                                                    for="">
                                                                                    bar
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
                                                                            <div class="col-lg-4 col-md-6 col-6 ms-2">
                                                                                <input name="functions_thermal" class="form-control"
                                                                                    type="number" />
                                                                            </div>
                                                                            <div class="col-lg-2 text-lg-start col-md-5 text-md-start col-5">
                                                                                <label
                                                                                    class="py-3 fw-bold fs-8 text-gray-800"
                                                                                    for="">
                                                                                    A
                                                                                </label>
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
                                                                    class="col-lg-6 text-lg-end col-md-7 text-md-end col-12 text-start pb-1">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid py-2 px-2">
                                                                        <input name="functions_magnetic" class="form-check-input"
                                                                            type="radio" value="1"
                                                                            name="magneticconnector"
                                                                            id="OK" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="OK">
                                                                            OK
                                                                        </label>&nbsp;
                                                                        <input name="functions_magnetic" class="form-check-input"
                                                                            type="radio" value="2"
                                                                            name="magneticconnector"
                                                                            id="NG" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="NG">
                                                                            NG
                                                                        </label>&nbsp;
                                                                        <input name="functions_magnetic" class="form-check-input"
                                                                            type="radio" value="0"
                                                                            name="magneticconnector"
                                                                            id="N/A" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="N/A">
                                                                            N/A
                                                                        </label>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Pressure Sensor
                                                                </span>
                                                                <span
                                                                    class="col-lg-6 text-lg-end col-md-7 text-md-end col-12 text-start pb-1">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid py-2 px-2">
                                                                        <input name="functions_presssensor" class="form-check-input"
                                                                            type="radio" value="1"
                                                                            name="pressuresensor" id="OK" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="OK">
                                                                            OK
                                                                        </label>&nbsp;
                                                                        <input name="functions_presssensor" class="form-check-input"
                                                                            type="radio" value="2"
                                                                            name="pressuresensor" id="NG" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="NG">
                                                                            NG
                                                                        </label>&nbsp;
                                                                        <input name="functions_presssensor" class="form-check-input"
                                                                            type="radio" value="0"
                                                                            name="pressuresensor" id="N/A" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="N/A">
                                                                            N/A
                                                                        </label>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Temperature Sensor
                                                                </span>
                                                                <span
                                                                    class="col-lg-6 text-lg-end col-md-7 text-md-end col-12 text-start pb-1">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid py-2 px-2">
                                                                        <input name="functions_tempsensor" class="form-check-input"
                                                                            type="radio" value="1"
                                                                            name="temperaturesensor"
                                                                            id="OK" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="OK">
                                                                            OK
                                                                        </label>&nbsp;
                                                                        <input name="functions_tempsensor" class="form-check-input"
                                                                            type="radio" value="2"
                                                                            name="temperaturesensor"
                                                                            id="NG" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="NG">
                                                                            NG
                                                                        </label>&nbsp;
                                                                        <input name="functions_tempsensor" class="form-check-input"
                                                                            type="radio" value="0"
                                                                            name="temperaturesensor"
                                                                            id="N/A" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="N/A">
                                                                            N/A
                                                                        </label>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Pressure Switch
                                                                </span>
                                                                <span
                                                                    class="col-lg-6 text-lg-end col-md-7 text-md-end col-12 text-start pb-1">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid py-2 px-2">
                                                                        <input class="form-check-input"
                                                                            type="radio" value=""
                                                                            name="pressureswitch" id="OK" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="OK">
                                                                            OK
                                                                        </label>&nbsp;
                                                                        <input class="form-check-input"
                                                                            type="radio" value=""
                                                                            name="pressureswitch" id="NG" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="NG">
                                                                            NG
                                                                        </label>&nbsp;
                                                                        <input class="form-check-input"
                                                                            type="radio" value=""
                                                                            name="pressureswitch" id="N/A" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="N/A">
                                                                            N/A
                                                                        </label>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Flow Switch
                                                                </span>
                                                                <span
                                                                    class="col-lg-6 text-lg-end col-md-7 text-md-end col-12 text-start pb-1">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid py-2 px-2">
                                                                        <input class="form-check-input"
                                                                            type="radio" value="1"
                                                                            name="functions_flowswitch" id="OK" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="OK">
                                                                            OK
                                                                        </label>&nbsp;
                                                                        <input class="form-check-input"
                                                                            type="radio" value="2"
                                                                            name="functions_flowswitch" id="NG" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="NG">
                                                                            NG
                                                                        </label>&nbsp;
                                                                        <input class="form-check-input"
                                                                            type="radio" value="0"
                                                                            name="functions_flowswitch" id="N/A" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="N/A">
                                                                            N/A
                                                                        </label>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Discharge v/v
                                                                </span>
                                                                <span
                                                                    class="col-lg-6 text-lg-end col-md-7 text-md-end col-12 text-start pb-1">
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid py-2 px-2">
                                                                        <input class="form-check-input"
                                                                            type="radio" value="1"
                                                                            name="functions_discharge" id="OK" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="OK">
                                                                            OK
                                                                        </label>&nbsp;
                                                                        <input class="form-check-input"
                                                                            type="radio" value="2"
                                                                            name="functions_discharge" id="NG" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="NG">
                                                                            NG
                                                                        </label>&nbsp;
                                                                        <input class="form-check-input"
                                                                            type="radio" value="0"
                                                                            name="functions_discharge" id="N/A" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="N/A">
                                                                            N/A
                                                                        </label>
                                                                    </div>
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
                                                            <label class="px-3" for="">
                                                                Main Motor Insulation (M &#8486;)
                                                            </label>
                                                            <div class="row mb-2 ps-3">
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-4 fs-9" for="">
                                                                                U1-V1
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <input type="number"
                                                                                class="form-control" name="insulation_main_u1v1"
                                                                                id="">
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-4 fs-9" for="">
                                                                                V1-W1
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <input type="number"
                                                                                class="form-control" name="insulation_main_v1w1"
                                                                                id="">
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-4 fs-9" for="">
                                                                                W1-U1
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <input type="number"
                                                                                class="form-control" name="insulation_main_w1u1"
                                                                                id="">
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row mb-2 ps-3">
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-4 fs-9" for="">
                                                                                U1-U2
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <input type="number"
                                                                                class="form-control" name="insulation_main_u1u2"
                                                                                id="">
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-4 fs-9" for="">
                                                                                V1-V2
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <input type="number"
                                                                                class="form-control" name="insulation_main_v1v2"
                                                                                id="">
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-4 fs-9" for="">
                                                                                W1-W2
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <input type="number"
                                                                                class="form-control" name="insulation_main_w1w2"
                                                                                id="">
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row mb-2 ps-3">
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-4 fs-9" for="">
                                                                                U1 - E
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <input type="number"
                                                                                class="form-control" name="insulation_main_u1e"
                                                                                id="">
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-4 fs-9" for="">
                                                                                V1 - E 
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <input type="number"
                                                                                class="form-control" name="insulation_main_v1e"
                                                                                id="">
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-4 fs-9" for="">
                                                                                W1 - E 
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <input type="number"
                                                                                class="form-control" name="insulation_main_w1e"
                                                                                id="">
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-12">
                                                            <label class="px-3" for="">
                                                                Fan Motor Insulation (M &#8486;)
                                                            </label>
                                                            <div class="row mb-2 ps-3">
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-4 fs-9" for="">
                                                                                U - V 
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <input type="number"
                                                                                class="form-control" name="insulation_fan_u1v1"
                                                                                id="">
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-4 fs-9" for="">
                                                                                 V - W 
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <input type="number"
                                                                                class="form-control" name="insulation_fan_v1w1"
                                                                                id="">
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-4 fs-9" for="">
                                                                                W - U 
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <input type="number"
                                                                                class="form-control" name="insulation_fan_w1u1"
                                                                                id="">
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row mb-2 ps-3">
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-4 fs-9" for="">
                                                                                U - E 
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <input type="number"
                                                                                class="form-control" name="insulation_fan_u1e"
                                                                                id="">
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-4 fs-9" for="">
                                                                                V - E 
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <input type="number"
                                                                                class="form-control" name="insulation_fan_v1e"
                                                                                id="">
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                                <span class="col-lg-4 col-md-4 col-12">
                                                                    <div class="row py-2">
                                                                        <div class="col-lg-auto col-md-4 col-3">
                                                                            <label class="py-4 fs-9" for="">
                                                                                W - E 
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-lg-7 col-md-8 col-4">
                                                                            <input type="number"
                                                                                class="form-control" name="insulation_fan_w1e"
                                                                                id="">
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

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
                                                                        <input class="form-check-input"
                                                                            type="radio" value="1"
                                                                            name="Type" id="Refrigerator" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="Refrigerator">
                                                                            Refrigerator
                                                                        </label>&nbsp;
                                                                        <input class="form-check-input"
                                                                            type="radio" value="2"
                                                                            name="Type" id="Other" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="Other">
                                                                            Other
                                                                        </label>&nbsp;
                                                                        <input class="form-check-input"
                                                                            type="radio" value="3"
                                                                            name="Type" id="typeN/A" />
                                                                        <label class="form-check-label text-gray-800"
                                                                            for="typeN/A">
                                                                            N/A
                                                                        </label>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-4 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Maker
                                                                </span>
                                                                <span
                                                                    class="col-lg-8 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-2">
                                                                    <div class="">
                                                                        <input name="dryer_maker" class="form-control" type="number"
                                                                             value="" />
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-4 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Model Number
                                                                </span>
                                                                <span
                                                                    class="col-lg-8 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-2">
                                                                    <div class="">
                                                                        <input name="dryer_model" class="form-control" type="text"
                                                                            value="" />
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-4 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    S/N
                                                                </span>
                                                                <span
                                                                    class="col-lg-8 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-2">
                                                                    <div class="">
                                                                        <input name="dryer_sn" class="form-control" type="text"
                                                                            value="" />
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-4 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Dew Point
                                                                </span>
                                                                <span
                                                                    class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-2">
                                                                    <div class="input-group mb-5"
                                                                        data-bs-placement="bottom"
                                                                        data-bs-toggle="tooltip"
                                                                        title="(Load/Unload)">
                                                                        <input name="dryer_dew" type="number"
                                                                            class="form-control" />
                                                                        <span class="input-group-text">&#8451;</span>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="row">
                                                                <span
                                                                    class="py-2 ps-5 fw-bold fs-6 text-gray-800 col-lg-4 text-lg-start col-md-5 text-md-end col-12 text-start">
                                                                    Inlet Pressure
                                                                </span>
                                                                <span
                                                                    class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-2">
                                                                    <div class="input-group mb-5"
                                                                        data-bs-placement="bottom"
                                                                        data-bs-toggle="tooltip"
                                                                        title="(Load/Unload)">
                                                                        <input type="text" name="dryer_inlet"
                                                                            class="form-control" />
                                                                        <span class="input-group-text unit_of_pressure">bar</span>
                                                                    </div>
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
                                                                        <input type="text" class="form-control"
                                                                            name="filter_maker" id="">
                                                                    </span>
                                                                </div>
                                                            </span>
                                                            <span class="col-lg-6 col-md-7 col-12">
                                                                <div class="row mb-3">
                                                                    <span class="py-3 col-lg-4 text-lg-start col-md-3 text-md-start col-4 text-start">
                                                                        <label for="">
                                                                            Replacement
                                                                        </label>
                                                                    </span>
                                                                    <span class="py-3 col-lg-3 text-lg-center col-md-3 text-md-center col-3 text-center">
                                                                        <label class="fw-bold fs-6 text-gray-800"
                                                                            for="">
                                                                            Element
                                                                        </label>
                                                                    </span>
                                                                    <span class="py-3 col-lg-2 text-lg-center col-md-2 text-md-center col-2 text-center">
                                                                        <label class="fw-bold fs-6 text-gray-800"
                                                                            for="">
                                                                            A'ssy
                                                                        </label>
                                                                    </span>
                                                                    <span class="py-3 col-lg-3 text-lg-center col-md-4 text-md-center col-3 text-center">
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
                                                                        <input type="text" class="form-control"
                                                                            name="filter_comment_1" id="">
                                                                    </div>
                                                                </div>
                                                            </span>
                                                            <span class="col-lg-4 col-md-5 col-8">
                                                                <div class="row">
                                                                    <div
                                                                        class="my-3 d-flex justify-content-center col-lg-4 col-md-4 col-4">
                                                                        <input type="checkbox"
                                                                            class="form-check-input" name="chk_filter_replacment"
                                                                            id="">
                                                                    </div>
                                                                    <div
                                                                        class="my-3 d-flex justify-content-center col-lg-4 col-md-4 col-4">
                                                                        <input type="checkbox"
                                                                            class="form-check-input" name="chk_filter_replacment"
                                                                            id="">
                                                                    </div>
                                                                    <div
                                                                        class="my-3 d-flex justify-content-center col-lg-4 col-md-4 col-4">
                                                                        <input type="checkbox"
                                                                            class="form-check-input" name="chk_filter_replacment"
                                                                            id="">
                                                                    </div>
                                                                    <div
                                                                        class="my-3 d-flex justify-content-center col-lg-4 col-md-4 col-4">
                                                                        <input type="hidden"
                                                                            class="form-check-input" name="filter_replacement_1"
                                                                            id="chk_filter_replacment">
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
                                                                        <input type="text" class="form-control"
                                                                            name="filter_comment_2" id="">
                                                                    </div>
                                                                </div>
                                                            </span>
                                                            <span class="col-lg-4 col-md-5 col-8">
                                                                <div class="row">
                                                                    <div
                                                                        class="my-3 d-flex justify-content-center col-lg-4 col-md-4 col-4">
                                                                        <input type="checkbox"
                                                                            class="form-check-input" name="chk_filter_replacment2"
                                                                            id="">
                                                                    </div>
                                                                    <div
                                                                        class="my-3 d-flex justify-content-center col-lg-4 col-md-4 col-4">
                                                                        <input type="checkbox"
                                                                            class="form-check-input" name="chk_filter_replacment2"
                                                                            id="">
                                                                    </div>
                                                                    <div
                                                                        class="my-3 d-flex justify-content-center col-lg-4 col-md-4 col-4">
                                                                        <input type="checkbox"
                                                                            class="form-check-input" name="chk_filter_replacment2"
                                                                            id="">
                                                                    </div>
                                                                    <div
                                                                        class="my-3 d-flex justify-content-center col-lg-4 col-md-4 col-4">
                                                                        <input type="hidden"
                                                                            class="form-check-input" name="filter_replacement_2"
                                                                            id="chk_filter_replacment2">
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
                                                                        <input type="text" class="form-control"
                                                                            name="filter_comment_3" id="">
                                                                    </div>
                                                                </div>
                                                            </span>
                                                            <span class="col-lg-4 col-md-5 col-8">
                                                                <div class="row">
                                                                    <div
                                                                        class="my-3 d-flex justify-content-center col-lg-4 col-md-4 col-4">
                                                                        <input type="checkbox"
                                                                            class="form-check-input" name="chk_filter_replacment3"
                                                                            id="">
                                                                    </div>
                                                                    <div
                                                                        class="my-3 d-flex justify-content-center col-lg-4 col-md-4 col-4">
                                                                        <input type="checkbox"
                                                                            class="form-check-input" name="chk_filter_replacment3"
                                                                            id="">
                                                                    </div>
                                                                    <div
                                                                        class="my-3 d-flex justify-content-center col-lg-4 col-md-4 col-4">
                                                                        <input type="checkbox"
                                                                            class="form-check-input" name="chk_filter_replacment3"
                                                                            id="">
                                                                    </div>
                                                                    <div
                                                                        class="my-3 d-flex justify-content-center col-lg-4 col-md-4 col-4">
                                                                        <input type="hidden"
                                                                            class="form-check-input" name="filter_replacement_3"
                                                                            id="chk_filter_replacment3">
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
                                                                    <div class="col-lg-6 text-lg-start col-md-3 col-12">
                                                                        <label class="py-3 fw-bold fs-6 text-gray-800"
                                                                            for="">
                                                                            Air Compressor
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-lg-1 col-md-1 col-2">
                                                                        <input type="checkbox"
                                                                            class="my-3 form-check-input"
                                                                            name="comment_compressor_normal" id="">
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
                                                                            name="comment_compressor_abnormal" id="">
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
                                                            <textarea class="form-control Remarks" rows="4" maxlength="500"></textarea>
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
                                                            name="maint_suction" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_suction" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_suction" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_suction1" id="maint_suction" >
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
                                                            name="maint_oilfiter" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilfiter" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilfiter" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_oilfiter1" id="maint_oilfiter" >
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
                                                            name="maint_oilseparator" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilseparator" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilseparator" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_oilseparator1" id="maint_oilseparator" >
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
                                                            name="maint_oil" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oil" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oil" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_oil1" id="maint_oil" >
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
                                                            name="maint_drainseparator" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_drainseparator" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_drainseparator" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_drainseparator1" id="maint_drainseparator" >
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
                                                            name="maint_motorgrease" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_motorgrease" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_motorgrease" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_motorgrease1" id="maint_motorgrease" >
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
                                                            name="maint_autoblowoff" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_autoblowoff" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_autoblowoff" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_autoblowoff1" id="maint_autoblowoff" >
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
                                                            name="maint_capacityvav" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_capacityvav" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_capacityvav" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_capacityvav1" id="maint_capacityvav" >
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
                                                            name="maint_presscontvav" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_presscontvav" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_presscontvav" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_presscontvav1" id="maint_presscontvav" >
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
                                                            name="maint_presskeepvav" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_presskeepvav" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_presskeepvav" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_presskeepvav1" id="maint_presskeepvav" >
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
                                                            name="maint_thermovav" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_thermovav" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_thermovav" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_thermovav1" id="maint_thermovav" >
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
                                                            name="maint_oillevel" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oillevel" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oillevel" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_oillevel1" id="maint_oillevel" >
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
                                                            name="maint_oilrecovery" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilrecovery" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilrecovery" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_oilrecovery1" id="maint_oilrecovery" >
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
                                                            name="maint_belt" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_belt" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_belt" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_belt1" id="maint_belt" >
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
                                                            name="maint_aftercooler" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_aftercooler" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_aftercooler" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_aftercooler1" id="maint_aftercooler" >
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
                                                            name="maint_oilcooler" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilcooler" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilcooler" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_oilcooler1" id="maint_oilcooler" >
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
                                                            name="maint_mainmotor" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_mainmotor" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_mainmotor" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_mainmotor1" id="maint_mainmotor" >
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
                                                            name="maint_oilseal" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilseal" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_oilseal" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_oilseal1" id="maint_oilseal" >
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
                                                            name="maint_fanmotor" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_fanmotor" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_fanmotor" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_fanmotor1" id="maint_fanmotor" >
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
                                                            name="maint_airend" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_airend" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_airend" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_airend1" id="maint_airend" >
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
                                                            name="maint_bearingair" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_bearingair" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_bearingair" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_bearingair1" id="maint_bearingair" >
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
                                                            name="maint_bearingmotor" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_bearingmotor" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_bearingmotor" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_bearingmotor1" id="maint_bearingmotor" >
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
                                                            name="maint_gauge" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_gauge" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_gauge" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_gauge1" id="maint_gauge" >
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
                                                            name="maint_magnetic" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_magnetic" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_magnetic" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_magnetic1" id="maint_magnetic" >
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
                                                            name="maint_sensor" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_sensor" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_sensor" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_sensor1" id="maint_sensor" >
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
                                                            name="maint_maininv" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_maininv" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_maininv" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_maininv1" id="maint_maininv" >
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
                                                            name="maint_faninv" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_faninv" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_faninv" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_faninv1" id="maint_faninv" >
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
                                                            name="maint_leakage" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_leakage" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-2 col-md-2 col-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="maint_leakage" id="">
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center col-lg-3 col-md-3 col-2">
                                                        <input type="hidden" class="form-check-input"
                                                            name="maint_leakage1" id="maint_leakage" >
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

                                    <div class="row g-2">
                                        <div class="col-lg-6">
                                            <div class="rounded-2 bg-light p-3">
                                                <div class="col-lg-12 text-lg-center">
                                                    <label class="pb-3 fw-bold fs-6 text-gray-800" for="">
                                                        Serviced By
                                                    </label>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="border border-gray-400" id="sig"></div>
                                                    <br /><br />
                                                    <div style="text-align:right">
                                                        <button id="clear_signature1" class="btn btn-danger btn-sm">Clear
                                                            Signature</button>
                                                    </div>
                                                    <textarea id="signature64" name="signed" style="display: none"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="rounded-2 bg-light p-3">
                                                <div class="col-lg-12 text-lg-center">
                                                    <label class="pb-3 fw-bold fs-6 text-gray-800" for="">
                                                        Accepted By Customer
                                                    </label>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="border border-gray-400" id="sig1"></div>
                                                    <br /><br />
                                                    <div style="text-align:right">
                                                        <button id="clear_signature2" class="btn btn-danger btn-sm">Clear
                                                            Signature</button>
                                                    </div>
                                                    <textarea id="signature641" name="signed" style="display: none"></textarea>
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

            <a href="{{ route('show') }}" class="btn btn-primary btn-sm float-start"><i
                    class="fa-solid fa-backward"></i>&nbsp;Cencle</a>
            <button type="submit" class="btn btn-success btn-sm float-end"><i
                    class="fa-solid fa-floppy-disk"></i>&nbsp;Save</button>
        </form>

    </div>

    <script>
        // Text Input 1
        const textInput1 = document.getElementById('textInput1');
        const inputPopup1 = document.getElementById('inputPopup1');
        const confirmButton1 = document.getElementById('confirmButton1');
        const buttons1 = document.querySelectorAll('#inputPopup1 button[data-value]');
        const clear1 = document.getElementById('clear1');

        textInput1.addEventListener('click', () => {
            inputPopup1.style.display = 'block';
        });

        confirmButton1.addEventListener('click', (event) => {
            event.preventDefault();
            const dataValue = textInput1.value; // หรือดึงค่าจาก popupInput1.value หากคุณมีการเก็บค่าใน popup ไว้

            textInput1.value = dataValue; // นำค่าที่เลือกใน popup มาใส่ในช่อง input

            inputPopup1.style.display = 'none';
        });

        buttons1.forEach(button => {
            button.addEventListener('click', () => {
                const dataValue = button.getAttribute('data-value');
                textInput1.value += dataValue;
            });
        });

        clear1.addEventListener('click', () => {
            textInput1.value = "";
        });

        // Text Input 2
        const textInput2 = document.getElementById('textInput2');
        const inputPopup2 = document.getElementById('inputPopup2');
        const confirmButton2 = document.getElementById('confirmButton2');
        const buttons2 = document.querySelectorAll('#inputPopup2 button[data-value]');
        const clear2 = document.getElementById('clear2');

        textInput2.addEventListener('click', () => {
            inputPopup2.style.display = 'block';
        });

        confirmButton2.addEventListener('click', () => {
            if (textInput2.value) {
                textInput2.value = textInput2.value;
            }
            inputPopup2.style.display = 'none';
        });

        buttons2.forEach(button => {
            button.addEventListener('click', () => {
                const dataValue = button.getAttribute('data-value');
                textInput2.value += dataValue;
            });
        });

        clear2.addEventListener('click', () => {
            textInput2.value = "";
        });

        // Text Input 3
        const textInput3 = document.getElementById('textInput3');
        const inputPopup3 = document.getElementById('inputPopup3');
        const confirmButton3 = document.getElementById('confirmButton3');
        const buttons3 = document.querySelectorAll('#inputPopup3 button[data-value]');
        const clear3 = document.getElementById('clear3');

        textInput3.addEventListener('click', () => {
            inputPopup3.style.display = 'block';
        });

        confirmButton3.addEventListener('click', () => {
            if (textInput3.value) {
                textInput3.value = textInput3.value;
            }
            inputPopup3.style.display = 'none';
        });

        buttons3.forEach(button => {
            button.addEventListener('click', () => {
                const dataValue = button.getAttribute('data-value');
                textInput3.value += dataValue;
            });
        });

        clear3.addEventListener('click', () => {
            textInput3.value = "";
        });

        // Text Input 4
        const textInput4 = document.getElementById('textInput4');
        const inputPopup4 = document.getElementById('inputPopup4');
        const confirmButton4 = document.getElementById('confirmButton4');
        const buttons4 = document.querySelectorAll('#inputPopup4 button[data-value]');
        const clear4 = document.getElementById('clear4');

        textInput4.addEventListener('click', () => {
            inputPopup4.style.display = 'block';
        });

        confirmButton4.addEventListener('click', () => {
            if (textInput4.value) {
                textInput4.value = textInput4.value;
            }
            inputPopup4.style.display = 'none';
        });

        buttons4.forEach(button => {
            button.addEventListener('click', () => {
                const dataValue = button.getAttribute('data-value');
                textInput4.value += dataValue;
            });
        });

        clear4.addEventListener('click', () => {
            textInput4.value = "";
        });

        // Text Input 5
        const textInput5 = document.getElementById('textInput5');
        const inputPopup5 = document.getElementById('inputPopup5');
        const confirmButton5 = document.getElementById('confirmButton5');
        const buttons5 = document.querySelectorAll('#inputPopup5 button[data-value]');
        const clear5 = document.getElementById('clear5');

        textInput5.addEventListener('click', () => {
            inputPopup5.style.display = 'block';
        });

        confirmButton5.addEventListener('click', () => {
            if (textInput5.value) {
                textInput5.value = textInput5.value;
            }
            inputPopup5.style.display = 'none';
        });

        buttons5.forEach(button => {
            button.addEventListener('click', () => {
                const dataValue = button.getAttribute('data-value');
                textInput5.value += dataValue;
            });
        });

        clear5.addEventListener('click', () => {
            textInput5.value = "";
        });

        // Text Input 6
        const textInput6 = document.getElementById('textInput6');
        const inputPopup6 = document.getElementById('inputPopup6');
        const confirmButton6 = document.getElementById('confirmButton6');
        const buttons6 = document.querySelectorAll('#inputPopup6 button[data-value]');
        const clear6 = document.getElementById('clear6');

        textInput6.addEventListener('click', () => {
            inputPopup6.style.display = 'block';
        });

        confirmButton6.addEventListener('click', () => {
            if (textInput6.value) {
                textInput6.value = textInput6.value;
            }
            inputPopup6.style.display = 'none';
        });

        buttons6.forEach(button => {
            button.addEventListener('click', () => {
                const dataValue = button.getAttribute('data-value');
                textInput6.value += dataValue;
            });
        });

        clear6.addEventListener('click', () => {
            textInput6.value = "";
        });

        // Text Input 7
        const textInput7 = document.getElementById('textInput7');
        const inputPopup7 = document.getElementById('inputPopup7');
        const confirmButton7 = document.getElementById('confirmButton7');
        const buttons7 = document.querySelectorAll('#inputPopup7 button[data-value]');
        const clear7 = document.getElementById('clear7');

        textInput7.addEventListener('click', () => {
            inputPopup7.style.display = 'block';
        });

        confirmButton7.addEventListener('click', () => {
            if (textInput7.value) {
                textInput7.value = textInput7.value;
            }
            inputPopup7.style.display = 'none';
        });

        buttons7.forEach(button => {
            button.addEventListener('click', () => {
                const dataValue = button.getAttribute('data-value');
                textInput7.value += dataValue;
            });
        });

        clear7.addEventListener('click', () => {
            textInput7.value = "";
        });
    </script>
    <script type="text/javascript">
        var sig = $('#sig').signature({
            syncField: '#signature64',
            syncFormat: 'PNG'
        });
        $('#clear_signature1').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');

        });

        var sig1 = $('#sig1').signature({
            syncField: '#signature641',
            syncFormat: 'PNG'
        });
        $('#clear_signature2').click(function(e) {
            e.preventDefault();
            sig1.signature('clear');
            $("#signature641").val('');

        });
    </script>
</x-default-layout>
<script src="/assets/js/service_check.js"></script>