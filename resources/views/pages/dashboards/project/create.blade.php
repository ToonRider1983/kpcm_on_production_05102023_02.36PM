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
        .bg-sli {
            background-color: #fff;
        }
        #panel1, #panel2, #panel3,
        #flip1, #flip2, #flip3 {
            text-align: center;
        }
        #panel1, #panel2, #panel3 {
            padding: 25px 0px 0px 0px;
            display: none;
        }
        /* เช่น ตัวอย่างนี้ z*/
        p:hover {
        color: blue; /* เปลี่ยนสีตัวอักษรเมื่อ hover */
        cursor: pointer; /* เปลี่ยน cursor เป็น pointer เมื่อ hover */
        }
    </style>
    <div class="container">
        <div class="text-start">
            <label class="mb-2 h1 fw-bold">Project - Add</label>
        </div>
        <div class="text-end h4">
            <label class="pe-10" style="color: red;z-index: 1040;" for=""><b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>&nbsp;=&nbsp;Mandatory Field</label>
        </div>
        <form action="{{ route('project.store') }}" method="POST">
            @csrf

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-2 text-start">
                            ID :
                        </div>
                        <div class="col-lg-5 text-lg-start py-3 col-md-5 text-md-start col-10 text-start pb-5">
                            <label id="id">{{ $newId }}</label>
                        </div>
                        <input type="hidden" name="newId" value="{{ $newId }}">
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-5 text-start">
                            Reference ID :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-6 text-start">

                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-3 text-start">
                            Status :
                        </div>
                        <div class="col-lg-5 text-lg-start py-3 col-md-5 text-md-start col-9 text-start pb-5">
                            <label for="">Registered</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Distributor:<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <select class="form-select companies" name="distributor_id" id="distributor_id" aria-label="Select example">
                                <option value="">System Company</option>
                                @foreach ($list as $company)
                                    <option value="{{ $company->id }}">{{ $company->company_short_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            PIC:<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <select class="form-select users" name="pic_id" id="pic_id" aria-label="Select example">
                                <option value="">System Admin</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            End User :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start">
                            <div class="input-group mb-5">
                                <span class="input-group-text bg-success" id="basic-addon2">
                                    <span class="path1"></span><span class="path2">NEW</span>
                                </span>
                                <input type="number" class="form-control" name="customer_id"  id="customer_id"  aria-label="Recipient's username"
                                    aria-describedby="basic-addon2" />
                            </div>
                        </div>
                    </div>
                                        <!-- แสดงช่องที่ซ่อนไว้ -->
                    <div class="row" style="display: none;">
                        <div class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Customer Name :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start">
                            <div class="input-group mb-5">
                                <input type="text" class="form-control" name="customers_id" id="customers_id" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Country :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5 pt-1">
                            <select class="form-select country_id" name="country_id"  id="country_id" aria-label="Select example">
                                <option value="0">Select Country</option>
                                @foreach ($country as $coun)
                                <option value="{{ $coun->id}}">{{ $coun->country_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-5 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Industrial Zone :
                        </div>
                        <div class="col-lg-5 text-lg-start py-3 col-md-5 text-md-start col-12 text-start pb-5">
                            <select class="form-select industrialzones" name="industrialzone_id"  id="industrialzone_id" aria-label="Select example">
                                <option value="">Select IndustrialZone</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Address1 :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <input type="text" name="address1"  id="address1"  class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Address2 :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <input type="text" name="address2"  id="address2" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="h2 col-lg-3 text-lg-start">
                                < Your Company>
                            </div>
                            <div class="col-lg-6"></div>
                        </div>
                        <div class="row pb-2">
                            <span class="py-3 col-lg-4 text-lg-end col-md-3 text-md-end col-2 text-end"><i
                                    class="fa-solid fa-down-long fw-bold fs-2 text-gray-800 "></i></span>
                            <span
                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-2 text-lg-start col-md-2 text-md-start col-5 text-start">Distributor1:</span>
                            <span class="col-lg-4 col-md-5 col-12">
                                <input type="text" name="route1"  id="route1" class="form-control"></span>
                        </div>
                        <div class="row pb-2">
                            <span class="py-3 col-lg-4 text-lg-end col-md-3 text-md-end col-2 text-end"><i
                                    class="fa-solid fa-down-long fw-bold fs-2 text-gray-800 "></i></span>
                            <span
                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-2 text-lg-start col-md-2 text-md-start col-5 text-start">Distributor2:</span>
                            <span class="col-lg-4 col-md-5 col-12">
                                <input type="text" name="route2"  id="route2" class="form-control"></span>
                        </div>
                        <div class="row pb-2">
                            <span class="py-3 col-lg-4 text-lg-end col-md-3 text-md-end col-2 text-end"><i
                                    class="fa-solid fa-down-long fw-bold fs-2 text-gray-800 "></i></span>
                            <span
                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-2 text-lg-start col-md-2 text-md-start col-5 text-start">Distributor3:</span>
                            <span class="col-lg-4 col-md-5 col-12">
                                <input type="text" name="route3"  id="route3" class="form-control"></span>
                        </div>
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="h2 col-lg-3 text-lg-start">
                                < End User>
                            </div>
                            <div class="col-lg-6"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow my-4">
                <div class="card-body">
                    @for($i = 1; $i <= 3; $i++)
                    <div class="row pb-3">
                        <div class="fw-bold fs-6 text-gray-800 py-8 col-lg-4 text-lg-end col-md-4 text-md-end col-12 text-start">
                            Machine Model{{ $i }} :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="border border-gray-400 rounded col-lg-8 text-lg-end col-md-8 text-md-end col-12 text-start pb-5">
                            <div class="row">
                                <div class="col-lg-4 text-lg-start col-md-3 text-md-start col-12 text-start">
                                    <label id="machinemodel{{ $i }}_label" class="pt-8"></label>
                                </div>
                                <input type="hidden" name="machinemodel{{ $i }}_id" id="machinemodel{{ $i }}_id">
                    
                                <div class="col-lg-1 col-md-1 col-2 pt-5 container">
                                    <button class="btn btn-primary bg-sli" type="button" id="flip{{ $i }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </div>
                                <div class="col-lg-0 col-md-0 col-1"></div>
                                <div class="col-lg-1 col-md-1 col-2 pt-5 container">
                                    <button class="btn btn-primary" type="button" id="clearButton{{ $i }}"><i class="fa-solid fa-eraser"></i></button>
                                </div>                                  
                                <div class="col-lg-0 col-md-1 col-1"></div>
                                <div class="col-lg-2 col-md-2 col-2 pt-8">Qty:</div>
                                <div class="col-lg-2 col-md-3 col-4 pt-5">
                                    <input type="number" name="machinemodel{{ $i }}_qty" id="machinemodel{{ $i }}_qty" class="form-control">
                                </div>
                            </div>
                            <div class="row" id="panel{{ $i }}">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-9 col-md-7 col-7"></div>
                                        <div class="col-lg-3 text-lg-end col-md-5 text-md-end col-5 text-end">
                                            <button class="btn btn-primary" id="searchButton{{ $i }}" type="button" ><i class="bi bi-search"></i>Search</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div
                                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                                            Country Of Origin :
                                        </div>
                                        <div
                                            class="py-3 col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                                            <input class="form-check-input" type="radio" name="origin_country_id{{ $i }}" value="1" id="origin_country_id{{ $i }}" />
                                            <label class="form-check-label text-gray-800" for="Japan">Japan</label>
                                            <input class="form-check-input" type="radio" name="origin_country_id{{ $i }}" value="2" id="origin_country_id{{ $i }}" />
                                            <label class="form-check-label text-gray-800" for="China">China</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div
                                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                                            Oil Flooded/Free :
                                        </div>
                                        <div
                                            class="py-3 col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                                            <input class="form-check-input" type="radio" name="oil_type{{ $i }}" value="1" id="oil_type{{ $i }}" />
                                            <label class="form-check-label text-gray-800" for="Oil Free">Oil Free</label>
                                            <input class="form-check-input" type="radio" name="oil_type{{ $i }}" value="2" id="oil_type{{ $i }}" />
                                            <label class="form-check-label text-gray-800" for="Oil Flooded">Oil Flooded</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div
                                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                                            Cooling Method :
                                        </div>
                                        <div
                                            class="py-3 col-lg-5 text-lg-start col-md-7 text-md-start col-12 text-start pb-5">
                                            <input class="form-check-input" type="radio" name="cooler_type{{ $i }}" value="1" id="cooler_type{{ $i }}" />
                                            <label class="form-check-label text-gray-800" for="Air Cooled">Air Cooled</label>
                                            <input class="form-check-input" type="radio" name="cooler_type{{ $i }}" value="2" id="cooler_type{{ $i }}" />
                                            <label class="form-check-label text-gray-800" for="Water Cooled">Water Cooled</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div
                                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                                            Invester :
                                        </div>
                                        <div  class="py-3 col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                                            <input class="form-check-input" type="radio" name="inverter_flg{{ $i }}" value="1" id="inverter_flg{{ $i }}" />
                                            <label class="form-check-label text-gray-800" for="Yes">Yes</label>
                                            <input class="form-check-input" type="radio" name="inverter_flg{{ $i }}" value="0" id="inverter_flg{{ $i }}" />
                                            <label class="form-check-label text-gray-800" for="No">No</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div
                                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                                            Power :
                                        </div>
                                        <div class="col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                                            <div class="input-group mb-5">
                                                <input type="text" class="form-control" name="power{{ $i }}" aria-label="Recipient's username" aria-describedby="basic-addon2" />
                                                <span class="input-group-text" id="basic-addon2">
                                                    <span class="path1"></span><span class="path2">KW</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="your-custom-class" id="selectedDataContainer{{ $i }}" style="max-height: 200px; overflow-y: auto;">
                                        </div>                                        
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-9 col-md-7 col-7"></div>
                                        <div class="col-lg-3 text-lg-end col-md-5 text-md-end col-5 text-end">
                                            <button class="btn btn-primary close-btn" type="button" id="close{{ $i }}">
                                                <i class="bi bi-x-lg"></i>Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
            

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-lg-6 py-md-3 pb-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Possibility :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-7 text-lg-start py-lg-3 col-md-5 text-md-start col-12 text-start pb-5">
                            <div class="row">
                                <div class="col-lg-5 col-md-12 col-12">
                                    {{-- <select class="form-select " name="" id="" aria-label="Select example" >
                                    <option></option>
                                    @foreach ($possibility as $possi)
                                        <option value="{{$possi->code}}"> {{$possi->name}}</option>
                                    @endforeach
                                     </select>  --}}
                                    <select class="form-select " name="possibility" id="possibility" aria-label="Select example" >
                                        <option></option>
                                            <option value="4">A</option>
                                            <option value="3">B</option>
                                            <option value="2">C</option>
                                            <option value="1">D</option>
                                    </select>
                                </div>
                                <div class="py-3 col-lg-7 col-md-12 col-12">
                                    <label for="">(A-over 80%,B-more than 50%,C-more than 30%,D-less than
                                        29%)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-lg-6 py-md-3 pb-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Progress :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-7 text-lg-start py-lg-3 col-md-5 text-md-start col-12 text-start pb-5">
                            <div class="row">
                                <div class="col-lg-5 col-md-12 col-12">
                                    <select class="form-select" name="progress" id="progress" aria-label="Select example" >
                                             <option></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                    </select>
                                </div>
                                <div class="py-3 col-lg-7 col-md-12 col-12">
                                    <label for="">(1-Budget secured,2-Budget uncertain)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Compatition1 :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <select class="form-select" name="compatitor1" id="compatitor1" aria-label="Select example">
                                <option></option>
                                <option value="HITACHI">HITACHI</option>
                                <option value="ATLAS COPCO">ATLAS COPCO</option>
                                <option value="MITSUI SEIKI">MITSUI SEIKI</option>
                                <option value="INGERSOLL RAND">INGERSOLL RAND</option>
                                <option value="IHI">IHI</option>
                                <option value="ANEST IWATA">ANEST IWATA</option>
                                <option value="HOKUETSU">HOKUETSU</option>
                                <option value="DENYO">DENYO</option> 
                                <option value="Others">Others</option>                      
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Compatition2 :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <select class="form-select" name="compatitor2" id="compatitor2" aria-label="Select example">
                                <option></option>
                                <option value="HITACHI">HITACHI</option>
                                <option value="ATLAS COPCO">ATLAS COPCO</option>
                                <option value="MITSUI SEIKI">MITSUI SEIKI</option>
                                <option value="INGERSOLL RAND">INGERSOLL RAND</option>
                                <option value="IHI">IHI</option>
                                <option value="ANEST IWATA">ANEST IWATA</option>
                                <option value="HOKUETSU">HOKUETSU</option>
                                <option value="DENYO">DENYO</option> 
                                <option value="Others">Others</option>  
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Expected Order Date :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-6 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="input-group">
                                        <!-- Input วัน/เดือน/ปี ซ่อนไว้ -->
                                        <input type="text" id="expected_order_dt" name="expected_order_dt" class="form-control">
                                        <!-- Icon ที่ต้องการแสดง -->
                                        <span class="input-group-text">
                                            <i class="bi bi-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="py-3 col-lg-6 text-lg-start col-md-12 text-md-start col-12 text-start">
                                    (Date format is "day/month/year")
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Delivery Due Date :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-6 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="input-group">
                                        <!-- Input วัน/เดือน/ปี ซ่อนไว้ -->
                                        <input type="text" id="delivery_due_dt" name="delivery_due_dt" class="form-control">
                                        <!-- Icon ที่ต้องการแสดง -->
                                        <span class="input-group-text">
                                            <i class="bi bi-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="py-3 col-lg-6 text-lg-start col-md-12 text-md-start col-12 text-start">
                                    (Date format is "day/month/year")
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Result :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                                     <select class="form-select" name="result" id="result" aria-label="Select example">
                                        <option></option>
                                        <option value="1">None</option>
                                        <option value="2">Success</option>
                                        <option value="3">Fail</option>
                                        <option value="4">Postpone</option>
                                        <option value="5">Time Out</option>
                                        <option value="6">Selected Others</option> 
                                    </select>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Reason :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <input type="text" name="reason" id="reason"  class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Remarks1 :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <input type="text" name="remarks1" id="remarks1" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Remarks2 :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <input type="text" name="remarks2" id="remarks2" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Status :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                                 <select class="form-select" name="status" id="status" aria-label="Select example">
                                    <option></option>
                                    <option value="1">Registered</option>
                                    <option value="2">OK</option>
                                    <option value="3">FREE</option>
                                    <option value="4">NG</option>
                                    <option value="5">Time Out</option>
                                </select>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Admin Remarks1 :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <input type="text" name="admin_remarks1" id="admin_remarks1" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Admin Remarks2 :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <input type="text" name="admin_remarks2" id="admin_remarks2" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{ url('/project') }}" class="btn btn-primary btn-sm float-start"><i
                    class="fa-solid fa-backward"></i>&nbsp;Cencle</a>
            <button type="submit" class="btn btn-success btn-sm float-end"><i
                    class="fa-solid fa-floppy-disk"></i>&nbsp;Save</button>
        </form>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dropdown2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/customerpro.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/searchproject.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/date.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    {{-- -------UI/UX------------ --}}
    <script type="text/javascript" src="{{ asset('assets/js/Uiflip.js') }}"></script>
    @csrf
</x-default-layout>
