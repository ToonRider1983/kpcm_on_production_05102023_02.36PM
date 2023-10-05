<x-default-layout>
    <style>
        html,
        body {
            height: 100%;
        }

        .date-position {
            left: 0;
        }

        .vertical-center {
            display: flex;
            align-items: center;
            height: 40px;
        }
        @media screen and (max-width: 768px) {
            .date-position {
                left: 0px;
            }
        }

        @media screen and (max-width: 576px) {
            .date-position {
                left: 5px;
            }
        }
    </style>

    <div class="container">
        <div class="row" style="margin:20px">
            <div class="col-12">
                <label class="h1 mb-5 fw-bold">Project - Search</label>
                <div class="row">
                    <div class="col-lg-10 col-md-12 col-12">
                        <div class="card mb-2">
                            <div class="card-body object">
                                <form action="{{ route('result') }}" method="get">
                                    <div class="row">
                                        <div class="col-lg-10 col-md-8 col-4"></div>
                                        <div class="col-lg-2 col-md-4 col-8 ">
                                            <button  target="_blank" type="submit"
                                                class="btn btn-primary ">
                                                <i class="fa-solid fa-magnifying-glass"></i>&nbsp;Search
                                            </button >
                                        </div>
                                    </div>
                            </div>
                            <div class="p-4 accordion accordion-icon-toggle" id="kt_accordion_2">
                                <div>
                                    <div class="accordion-header pb-8 pt-3 d-flex" data-bs-toggle="collapse"
                                        data-bs-target="#kt_accordion_2_item_1">
                                        <span class="accordion-icon">
                                            <i class="ki-duotone bi bi-caret-right-fill fs-1"><span
                                                    class="path1"></span><span class="path2"></span></i>
                                        </span>
                                        <h1 class="fs-1 fw-semibold mb-0 ms-4">Search Condition</h1>
                                    </div>
                                    <div id="kt_accordion_2_item_1" class="fs-6 collapse show ps-10"
                                        data-bs-parent="#kt_accordion_2">

                                        <div class="border-bottom border-gray-400">
                                            <div class="row mb-4">
                                                <div
                                                    class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-4 text-lg-start col-md-5 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                            Distributor :
                                                        </div>
                                                        <div
                                                            class="col-lg-8 text-lg-start col-md-7 text-md-start col-12 text-start">
                                                            <select class="form-select companies" name="company" id="company"
                                                                placeholder="company">
                                                                <option value=""></option>
                                                                @if (!@empty($company))
                                                                    @foreach ($company as $company)
                                                                        <option
                                                                            value="{{ $company->id }}">
                                                                            {{ $company->company_short_name }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                            PIC :
                                                        </div>
                                                        <div
                                                            class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                            <select class="form-select users" name="pic_id" id="pic_id"
                                                                placeholder="">
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div
                                                    class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-4 text-lg-start col-md-5 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                            Country :
                                                        </div>
                                                        <div
                                                            class="col-lg-8 text-lg-start col-md-7 text-md-start col-12 text-start">
                                                            <select class="form-select" name="country" id="country"
                                                                placeholder="country">
                                                                <option value=""></option>
                                                                @if (!@empty($country))
                                                                    @foreach ($country as $country)
                                                                        <option value="{{ $country->country_name }}">
                                                                            {{ $country->country_name }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                            Route :
                                                        </div>
                                                        <div
                                                            class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                            <input type="text" class="form-control" name="route"
                                                                value="{{ old('route', session('selected_route', $request->route)) }}"
                                                                placeholder="route" aria-label=""
                                                                aria-describedby="basic-addon1" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="border-bottom border-gray-400 pt-4">
                                            <div class="row mb-4">
                                                <div
                                                    class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-4 text-lg-start col-md-5 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                            User Name :
                                                        </div>
                                                        <div
                                                            class="col-lg-8 text-lg-start col-md-7 text-md-start col-12 text-start">
                                                            <input type="text" class="form-control" name="username"
                                                                value="{{ old('username', session('selected_username', $request->username)) }}"
                                                                placeholder="Username" aria-label="username"
                                                                aria-describedby="basic-addon1" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                            User Code :
                                                        </div>
                                                        <div
                                                            class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                            <input type="text" class="form-control" name="user_cd"
                                                                value="{{ old('user_cd', session('selected_user_cd', $request->user_cd)) }}"
                                                                placeholder="User Code" aria-label=""
                                                                aria-describedby="basic-addon1" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div
                                                    class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-4 text-lg-start col-md-5 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                            Project ID :
                                                        </div>
                                                        <div
                                                            class="col-lg-8 text-lg-start col-md-7 text-md-start col-12 text-start">
                                                            <input type="text" class="form-control" name="pro_id"
                                                                value="{{ old('pro_id', session('selected_pro_id', $request->pro_id)) }}"
                                                                placeholder="Project ID" aria-label=""
                                                                aria-describedby="basic-addon1" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                            Ref.ID :
                                                        </div>
                                                        <div
                                                            class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                            <input type="text" class="form-control" name="ref_id"
                                                                value="{{ old('ref_id', session('selected_ref_id', $request->ref_id)) }}"
                                                                placeholder="Ref. ID" aria-label=""
                                                                aria-describedby="basic-addon1" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="border-bottom border-gray-400 pt-4">
                                            <div class="row mb-4">
                                                <div
                                                    class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-4 text-lg-start col-md-7 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                            Country Of Origin :
                                                        </div>
                                                        <div
                                                            class="col-lg-8 text-lg-start col-md-5 text-md-start col-12 text-start">
                                                            <select class="form-select" name="orc_id" id="orc_id" aria-label="">
                                                                <option></option>
                                                                <option value="1">Japan</option>
                                                                <option value="2">China</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-4 text-lg-start col-md-6 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                            Oil Flooded/Free :
                                                        </div>
                                                        <div
                                                            class="col-lg-8 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                            <select class="form-select" name="oil_id" id="oil_id" aria-label="">
                                                                <option></option>
                                                                <option value="1">Oil Free</option>
                                                                <option value="2">Oil Flooded</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div
                                                    class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                    <div class="row">
                                                        <div
                                                            class="fw-bold fs-5 vertical-center text-gray-800 col-lg-4 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                            Machine Type1 :
                                                        </div>
                                                        <div
                                                            class="col-lg-8 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                            {{-- <select class="form-select" name="machinetype"
                                                                id="machinetype" placeholder="machinetype">
                                                                <option value=""></option>
                                                                @if (!@empty($machinetype))
                                                                    @foreach ($machinetype as $machinetypes)
                                                                        <option
                                                                            value="{{ $machinetypes->machinetype1_name }}"
                                                                            {{ $request->old('machinetype', session('selected_machinetype')) == $machinetypes->machinetype1_name ? 'selected' : '' }}>
                                                                            {{ $machinetypes->machinetype1_name }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select> --}}
                                                            <select class="form-select" name="machinetype" id="machinetype"
                                                                placeholder="machinetype">
                                                                <option value=""></option>
                                                                @if (!@empty($machinetype))
                                                                    @foreach ($machinetype as $machinetypes)
                                                                        <option value="{{ $machinetypes->machinetype1_name }}">
                                                                            {{ $machinetypes->machinetype1_name }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div
                                                    class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                    <div class="row">
                                                        <div
                                                            class="fw-bold fs-5 vertical-center text-gray-800 col-lg-4 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                            Machine Model :
                                                        </div>
                                                        <div
                                                            class="col-lg-8 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                            <input type="text" class="form-control"
                                                                name="machinemodel"
                                                                value="{{ old('machinemodel', session('selected_machinemodel', $request->machinemodel)) }}"
                                                                placeholder="Machine Model" aria-label=""
                                                                aria-describedby="basic-addon1" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="border-bottom border-gray-400 pt-4">
                                            <div class="row mb-4">
                                                <div
                                                    class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                            Status :
                                                        </div>
                                                        <div
                                                            class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">                                                
                                                            <select class="form-select" name="status" id="status" aria-label="Status">
                                                                <option></option>
                                                                <option value="1">Registered</option>
                                                                <option value="2">OK</option>
                                                                <option value="3">FREE</option>
                                                                <option value="4">NG</option>
                                                                <option value="5">Time Out</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                            Result :
                                                        </div>
                                                        <div
                                                            class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                            <select class="form-select" name="result" id="result" aria-label="result">
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
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div
                                                    class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                            Possibility :
                                                        </div>
                                                        <div
                                                            class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                            <select class="form-select " name="possibility" id="possibility" aria-label="possibility" >
                                                                <option></option>
                                                                    <option value="4">A</option>
                                                                    <option value="3">B</option>
                                                                    <option value="2">C</option>
                                                                    <option value="1">D</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="border-bottom pt-4">
                                            <div class="row mb-4">
                                                <div
                                                    class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                            Created :
                                                        </div>
                                                        <div
                                                            class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    name="from_datec" id="from_datec"
                                                                    value="{{ $request->input('from_datec') }}"
                                                                    placeholder="" aria-label=""
                                                                    aria-describedby="basic-addon1" />
                                                                    <span class="input-group-text">
                                                                        <i class="bi bi-calendar"></i>
                                                                    </span>
                                                            </div>   
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-1 text-lg-start col-md-1 text-md-start col-12 text-start fw-bold fs-1 vertical-center text-gray-800">
                                                            ~
                                                        </div>
                                                        <div
                                                            class="col-lg-11 text-lg-start col-md-11 text-md-start col-12 text-start">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                        name="to_datec" id="to_datec"
                                                                        value="{{ $request->input('to_datec') }}"
                                                                        placeholder="" aria-label=""
                                                                        aria-describedby="basic-addon1" />
                                                                        <span class="input-group-text">
                                                                            <i class="bi bi-calendar"></i>
                                                                        </span>
                                                                </div>  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div
                                                    class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                            Updated :
                                                        </div>
                                                        <div
                                                            class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                        name="from_dateu" id="from_dateu"
                                                                        value="{{ $request->input('from_dateu') }}"
                                                                        placeholder="" aria-label=""
                                                                        aria-describedby="basic-addon1" />
                                                                        <span class="input-group-text">
                                                                            <i class="bi bi-calendar"></i>
                                                                        </span>
                                                                </div>  
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-1 text-lg-start col-md-1 text-md-start col-12 text-start fw-bold fs-1 vertical-center text-gray-800">
                                                            ~
                                                        </div>
                                                        <div
                                                            class="col-lg-11 text-lg-start col-md-11 text-md-start col-12 text-start">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                        name="to_dateu" id="to_dateu"
                                                                        value="{{ $request->input('to_dateu') }}"
                                                                        placeholder="" aria-label=""
                                                                        aria-describedby="basic-addon1" />
                                                                        <span class="input-group-text">
                                                                            <i class="bi bi-calendar"></i>
                                                                        </span>
                                                                </div>  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12 col-12">
                        <a href="{{ route('project.create') }}" title=""><button type="button"
                                class="btn btn-primary mb-2 container"><i
                                    class="fa-solid fa-plus"></i>&nbsp;ADD</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dropdown3.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script type="text/javascript" src="{{ asset('assets/js/date.js') }}"></script>
    {{-- เรียก include --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    
    @csrf
</x-default-layout>