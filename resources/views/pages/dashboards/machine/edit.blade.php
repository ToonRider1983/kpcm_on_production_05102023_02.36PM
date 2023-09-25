<x-default-layout>
    <style>
        html,
        body {
            height: 100%;
        }

        .input-responsive {
            width: 72%;
        }

        @media screen and (max-width: 500px) {
            .input-responsive {
                width: 100%;
            }
        }
        .autocomplete-suggestions {
            max-height: 200px; /* กำหนดสูงสุดของกล่องเสนอคำ */
            overflow-y: auto; /* เปิดใช้งานการเลื่อนแนวตั้งเมื่อข้อมูลเกินขนาดสูงสุด */
            border-top: none;
            background-color: #f5f5f5;
            border-radius: 5px; /* กำหนดขอบโค้งส่วนนอกของกล่อง */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); /* เพิ่มเงาให้กับกล่อง */
        }

        .autocomplete-suggestion {
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #ccc;
            text-align: left; /* จัดข้อความให้ชิดซ้าย */
        }

        .autocomplete-suggestion:last-child {
            border-bottom: none;
            border-bottom-left-radius: 5px; /* กำหนดขอบโค้งส่วนล่างซ้ายของรายการสุดท้าย */
            border-bottom-right-radius: 5px; /* กำหนดขอบโค้งส่วนล่างขวาของรายการสุดท้าย */
        }

        .autocomplete-suggestion:hover {
            background-color: #f0f0f0;
        }


        #customer-search {
            position: relative;
        }

        #customer-search:focus::before {
            content: "";
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            border: 2px solid #82c4e0; /* เปลี่ยนสีตามที่คุณต้องการ */
            border-radius: 8px;
        }

        .autocomplete-suggestion {
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #ccc;
            border-radius: 5px;
            text-align: left;
        }
        .highlighted {
            background-color: #f0f0f0; /* เปลี่ยนสีตามที่คุณต้องการ */
        }
        .highlighted-text {
            font-weight: bold; /* ตัวหนา */
            padding: 2px;
            color: rgb(0, 0, 0); /* เปลี่ยนสีข้อความตามที่คุณต้องการ */
        }
    </style>

    <div class="container">
        <div class="h2 p-4">Machine Master - Modify</div>
        <form method="POST" action="{{ route('machine.update', $machine->id) }}">
            @csrf
            @method('PUT')

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            ID :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label class="pt-3" for="">{{ $machine->id }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Serial# :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text"  name="serial" id="serial" class="form-control" value="{{ $machine->serial }}">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Factory :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <div class="form-check form-check-custom form-check-solid py-2">
                                <div class="col-lg-3 col-md-4 col-12 text-start ps-0 py-1">
                                    <input class="form-check-input" type="radio" name="factory_type" value="1" id="kcms" {{ $machine->factory_type == 1 ? 'checked' : '' }} />
                                    <label class="form-check-label text-gray-800" for="kcms">KCMS</label>
                                </div>
                                <div class="col-lg-3 col-md-4 col-12 text-start ps-0 py-1">
                                    <input class="form-check-input" type="radio" name="factory_type" value="2" id="ksl" {{ $machine->factory_type == 2 ? 'checked' : '' }} />
                                    <label class="form-check-label text-gray-800" for="ksl">KSL</label>
                                </div>
                                <div class="col-lg-3 col-md-4 col-12 text-start ps-0 py-1">
                                    <input class="form-check-input" type="radio" name="factory_type" value="3" id="etc" {{ $machine->factory_type == 3 ? 'checked' : '' }} />
                                    <label class="form-check-label text-gray-800" for="etc">ETC</label>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Compressor Type :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <div class="form-check form-check-custom form-check-solid py-2">
                                <div class="col-lg-3 col-md-4 col-12 text-start ps-0 py-1">
                                    <input class="form-check-input" type="radio" name="compressor_type" value="1" id="oil_flooded" {{ $machine->compressor_type == 1 ? 'checked' : '' }} />
                                    <label class="form-check-label text-gray-800" for="oil_flooded">Oil Flooded</label>
                                </div>
                                <div class="col-lg-3 col-md-4 col-12 text-start ps-0 py-1">
                                    <input class="form-check-input" type="radio" name="compressor_type" value="2" id="oil_free" {{ $machine->compressor_type == 2 ? 'checked' : '' }} />
                                    <label class="form-check-label text-gray-800" for="oil_free">Oil Free</label>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Machine Type Code :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" name="machine_cd" id="machine_cd" class="form-control" value="{{ $machine->machine_cd }}">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Customer Machine# :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" name="customer_machine_no" id="customer_machine_no" class="form-control" value="{{ $machine->customer_machine_no }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Kobelco# :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text"  name="kcth_order_cd" id="kcth_order_cd" class="form-control" value="{{ $machine->kcth_order_cd }}">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            KSL/KCMS# :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" name="ksl_order_cd" id="ksl_order_cd" class="form-control" value="{{ $machine->ksl_order_cd }}">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            KMA# :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" name="kma_order_cd" id="kma_order_cd" class="form-control" value="{{ $machine->kma_order_cd }}">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Service Company :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <select name="service_factory_id" class="form-control" id="service_factory_id">
                                <option value="">Select</option>
                                @foreach ($company as $company)
                                    <option value="{{ $company->id }}" @if ($company->id == $machine->service_factory_id) selected @endif>{{ $company->company_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            End User :
                        </div>  
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" name="customer_id" id="customer-search" class="form-control" autocomplete="off" value="@if($machine->cus_code){{ $machine->cus_code }} : @endif @if($machine->cus_name1 && $machine->cus_name2){{ $machine->cus_name1 }} / {{ $machine->cus_name2 }}
                            @elseif($machine->cus_name1){{ $machine->cus_name1 }}
                            @elseif($machine->cus_name2){{ $machine->cus_name2 }}
                            @endif">


                            <!-- เพิ่มฟิลด์สำหรับเก็บ ID ของลูกค้า -->
                            <input type="hidden" name="customer_id" id="customer-id" value="{{$machine->customer_id}}" >
                            <div id="autocomplete-suggestions" class="autocomplete-suggestions"></div>
                        </div>
                    </div>
                    <div class="row pb-5">
                        <div class="fw-bold fs-6 text-gray-800 col-md-5 text-md-end col-5 text-start">
                            [Customer CD] :
                        </div>
                        <div class="col-md-5 text-md-start col-7 text-start">
                            <span id="customer_cd">{{ $machine->cus_code }}</span>
                        </div>
                    </div>                   
                    <div class="row">
                        <div class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-5 text-md-end col-5 text-start">
                            [Country] :
                        </div>
                        <div class="col-lg-2 text-lg-start col-md-5 text-md-start col-7 text-start pb-5">
                            <span id="country">{{ $machine->country_cus }}</span>
                        </div>
                        <div class="fw-bold fs-6 text-gray-800 col-lg-2 text-lg-end col-md-5 text-md-end col-6 text-start">
                            [Industrial Zone] :
                        </div>
                        <div class="col-lg-2 text-lg-start col-md-5 text-md-start col-6 text-start pb-5">
                            <span id="industrialzone">{{ $machine->industrialzone_id }}</span>
                        </div>
                    </div>
                    
                    <div class="row pt-5">
                        <div class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-5 text-md-end col-4 text-start">
                            [Address] :
                        </div>
                        <div class="col-lg-7 text-lg-start col-md-7 text-md-start col-8 text-start">
                            <span id="address1">{{ $machine->address1 }}</span>
                            <span id="address2">{{ $machine->address2 }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Commisioning Date :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <div class="input-group">
                                <!-- Input วัน/เดือน/ปี ซ่อนไว้ -->
                                <input type="text" id="testrun_dt" name="testrun_dt"  class="form-control" value="{{ $machine->testrun_dt }}">
                                <!-- Icon ที่ต้องการแสดง -->
                                <span class="input-group-text">
                                    <i class="bi bi-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Factory C/R Date :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <div class="input-group">
                                <!-- Input วัน/เดือน/ปี ซ่อนไว้ -->
                                <input type="text" name="dispatch_dt" id="dispatch_dt"  class="form-control" value="{{ $machine->dispatch_dt }}">
                                <!-- Icon ที่ต้องการแสดง -->
                                <span class="input-group-text">
                                    <i class="bi bi-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Operation Status :
                        </div>
                        <div class="py-3 col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <input class="form-check-input" type="radio" value="1" name="operate_status" id="operate_status_1"
                                @if ($machine->operate_status == 1) checked @endif />
                            <label class="form-check-label text-gray-800" for="operate_status_1">
                                In Operation
                            </label>&nbsp;
                        
                            <input class="form-check-input" type="radio" value="2" name="operate_status" id="operate_status_2"
                                @if ($machine->operate_status == 2) checked @endif />
                            <label class="form-check-label text-gray-800" for="operate_status_2">
                                Stopped
                            </label>
                        
                            <input class="form-check-input" type="radio" value="3" name="operate_status" id="operate_status_3"
                                @if ($machine->operate_status == 3) checked @endif />
                            <label class="form-check-label text-gray-800" for="operate_status_3">
                                Discarded
                            </label>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Motor :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <div class="input-group mb-5">
                                <input type="number" name="motor" id="motor" class="form-control" step="0.1" min="0" max="99999.9" aria-label="Recipient's username"
                                    aria-describedby="basic-addon2" value="{{ $machine->motor }}" />
                                <span class="input-group-text" id="basic-addon2">
                                    <span class="path1"></span><span class="path2">KW</span>
                                </span>
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
                            Remarks(Kobelco) :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start">
                            <input type="text" name="remarks" id="remarks"  class="form-control" value="{{ $machine->remarks }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2 col-md-2"></div>
                        <div class="h3 col-lg-2 text-lg-end col-md-3 text-md-start col-6 text-start"><u>For
                                Distributor</u></div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Remarks1 :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <input type="text" name="remarks_distributor1" id="remarks_distributor1"  class="form-control" value="{{ $machine->remarks_distributor1 }}">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Remarks2 :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start">
                            <input type="text" name="remarks_distributor2" id="remarks_distributor1"  class="form-control" value="{{ $machine->remarks_distributor1 }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start py-3">
                            Created :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label class="py-3" for=""><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ \Carbon\Carbon::parse($machine->created_at)->format('d/m/Y') }}&nbsp;{{ \Carbon\Carbon::parse($machine->created_at)->format('H:i') }}&nbsp;
                                <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $machine->created_by }}
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start py-3">
                            Updated :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start">
                            <label class="py-3" for=""><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ \Carbon\Carbon::parse($machine->updated_at)->format('d/m/Y') }}&nbsp;{{ \Carbon\Carbon::parse($machine->updated_at)->format('H:i') }}&nbsp;
                                <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $machine->updated_by }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div>
                <a href="{{ url('/machine') }}" class="btn btn-primary btn-sm float-start"><i
                        class="fa-solid fa-backward"></i>&nbsp;Cencle</a>
                <button type="submit" class="btn btn-success btn-sm float-end "><i
                        class="fa-solid fa-floppy-disk"></i>&nbsp;Save</button>
            </div>
        </form>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Include jQuery and jQuery UI JavaScript -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    {{-- -------Javascripte------------ --}}
    <script type="text/javascript" src="{{ asset('assets/js/date.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/searchManchine.js') }}"></script>
    {{-- -------UI/UX------------ --}}
    @csrf
</x-default-layout>