<x-default-layout>
    <style>
        html,
        body {
            height: 100%;
        }

        .date-position {
            left: 0;
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
        <label class="mb-2 h1 fw-bold">Machine Master - Search</label>
        <div class="card" style="background-color: #F7F7F7">
            <div class="row mt-5">
                <div class="col-lg-9 col-12">
                    <div class="card shadow">
                        <form action="">
                            <div class="card-body">
                                <div class="accordion accordion-icon-toggle" id="kt_accordion_2">
                                    <div>
                                        <div class="accordion-header pb-8 d-flex" data-bs-toggle="collapse"
                                            data-bs-target="#kt_accordion_2_item_1">
                                            <span class="accordion-icon">
                                                <i class="ki-duotone bi bi-caret-right-fill fs-1"><span
                                                        class="path1"></span><span class="path2"></span></i>
                                            </span>
                                            <h1 class="fs-1 fw-semibold mb-0 ms-4">Search Condition</h1>
                                        </div>
                                        <div id="kt_accordion_2_item_1" class="fs-6 collapse show ps-10"
                                            data-bs-parent="#kt_accordion_2">
                                            <div class="d-flex align-content-center flex-wrap row">
                                                <span class="col-lg-6 col-md-6 col-sm-12 py-3">
                                                    <input type="text" class="form-control" name="customer_cd" value="{{ Request::get('customer_cd') }}" placeholder="UserCode">
                                                </span>
                                                <span class="col-lg-6 col-md-6 col-sm-12 py-3">
                                                    <input type="text" class="form-control" name="customer_name" value="{{ Request::get('customer_name') }}" placeholder="UserName">
                                                </span>
            
                                                {{-- <div class="form-group">
                                                    <label for="customer_name">Customer Name:</label>
                                                    <input type="text" class="form-control" name="customer_name" value="{{ request('customer_name') }}" placeholder="Customer Name">
                                                </div> --}}                                    
                                            </div>
                                            <div class="d-flex align-content-center flex-wrap row">
                                                <span class="col-lg-6 col-md-6 col-sm-12 py-3">
                                                    <input type="text" class="form-control" name="typecode" value="{{ Request::get('typecode') }}" placeholder="TypeCode">
            
                                                </span>
                                                <span class="col-lg-6 col-md-6 col-sm-12 py-3">
                                                    <input type="text" class="form-control" name="serial" value="{{ Request::get('serial') }}" placeholder="Serial">
                                                </span>
                                            </div>
                                            <div class="d-flex align-content-center flex-wrap row">
                                                <span class="col-lg-6 col-md-6 col-sm-12 py-3">
                                                    {{-- <select class="form-select" aria-label="factory_type" name="factory_type" >
                                                        <option  placeholder="Type Code" value="" >Factory type</option >
                                                        @if (!empty($type))
                                                            @foreach ($type as $com)
                                                                @if ($com->grouptype === 'factory_type')
                                                                    <option value="{{ $com->code }}">{{ $com->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </select> --}}
                                                    <select class="form-select" name="factory_type" id="factory_type" placeholder="Factory type">
                                                        <option value="">Factory type</option>
                                                        <option value="1" >KCMS</option>
                                                        <option value="2" >KSL</option>
                                                        <option value="3" >ETC</option>
                                                    </select>
            
                                                </span>
                                                <span class="col-lg-6 col-md-6 col-sm-12 py-3">
                                                   <select class="form-select" name="compressor_type" id="compressor_type" placeholder="Compressor Type">
                                                        <option value="">Compressor Type</option>
                                                        <option value="1" >Oil Flooded</option>
                                                        <option value="2" >Oil Free</option>
                                                    </select>
                                                                              
                                                </span>
                                            </div>
                                            <div class="d-flex align-content-center flex-wrap row">
                                                <span class="col-lg-6 col-md-6 col-sm-12 py-3">
                                                    <select class="form-select" name="country" id="country" placeholder="country">
                                                        <option value="">Country</option>
                                                        @if (!empty($country))
                                                            @foreach ($country as $c)
                                                                <option value="{{ $c->country_name }}"{{ Request::get('country') == $c->country_name ? 'selected' : '' }}> {{ $c->country_name }}            
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </span>
                                                <span class="col-lg-6 col-md-6 col-sm-12 py-3">
                                                    <select class="form-select" name="company" id="company">
                                                        <option value="{{ Request::get('company_short_name') }}">Select IndustrialZone</option>
                                                    </select>
                                                </span>
                                            </div>
                                            <div class="d-flex align-content-center flex-wrap row">
                                                <div class="col-lg-6 col-md-6 col-12 py-3">
                                                    <div class="row">
                                                        <span
                                                            class="col-lg-3 text-lg-start col-md-4 col-4 text-start py-3 date-position">
                                                            Comm' Date :
                                                        </span>
                                                        <span class="col-lg-9 text-lg-end col-md-8 col-8 text-start">
                                                            <div>
                                                                <input type="date" class="form-control" name="start_date"
                                                                    value="{{ $request->has('start_date') ? $request->input('start_date') : old('start_date') }}"
                                                                    placeholder="Start Date" aria-label="start_date"
                                                                    aria-describedby="basic-addon1" />
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-12 py-3">
                                                    <div class="row">
                                                        <span
                                                            class="col-lg-1 text-lg-end col-md-1 col-1 text-start date-position"
                                                            style="font-size: 25px">
                                                            ~
                                                        </span>
                                                        <span class="col-lg-11 text-lg-end col-md-11 col-11 text-start">
                                                            <div>
                                                                <input type="date" class="form-control" name="end_date"
                                                                    value="{{ $request->has('end_date') ? $request->input('end_date') : old('end_date') }}"
                                                                    placeholder="End Date" aria-label="end_date"
                                                                    aria-describedby="basic-addon1" />
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-content-center flex-wrap row">
                                                <div class="col-lg-6 col-md-6 col-12 py-3">
                                                    <div class="row">
                                                        <span
                                                    class="col-lg-3 text-lg-start col-md-4 col-3 text-start py-3 date-position">
                                                    Remarks :
                                                </span>
                                                <span class="col-lg-9 col-md-8 col-9">
                                                    <input type="text" class="form-control" name="remarks"
                                                        value="{{ Request::get('remarks') }}" placeholder="Remarks">
                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                               <button type="submit" class="btn btn-primary" id="search-button"><i
                                                    class="fa-solid fa-magnifying-glass"></i>&nbsp;Search</button> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-12 bg-transparent">
                    <div class="row">
                        <div class="col-lg-12 col-6 pt-2">
                            <a href="{{ route('machine.create') }}"
                                title="add company"><button type="button" class="btn btn-primary mb-2 container"><i
                                    class="fa-solid fa-plus"></i>&nbsp;ADD</button></a>
                        </div>
                        <div class="col-lg-12 col-6 pt-2">
                            <a href="{{ route('machine.export', [
                                'customer_cd' => request('customer_cd'),
                                'customer_name' => request('customer_name'),
                                'typecode' => request('typecode'),
                                'serial' => request('serial'),
                                'factory_type' => request('factory_type'),
                                'compressor_type' => request('compressor_type'),
                                'country' => request('country'),
                                'company' => request('company'),
                                'start_date' => request('start_date'),
                                'end_date' => request('end_date'),
                                 ]) }}"><button type="button" class="btn btn-primary mb-2 container"><i
                                    class="fa-solid fa-download"></i>&nbsp;Download CSV</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card my-5 shadow">
            <div class="card-body overflow-auto table-responsive">
                <table class="table">
                    <thead class="thead-light">
                        <tr class="fw-bold fs-6 text-gray-800">
                            <th scope="col">ID</th>
                            <th scope="col">Serial#</th>
                            <th scope="col">Typecode</th>
                            <th scope="col">Customer Machine#</th>
                            <th scope="col">UserCode</th>
                            <th scope="col">UserName</th>
                            <th scope="col">Service</th>
                            <th scope="col">Factory</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($machine))
                            @foreach ($machine as $machines)
                                <tr>
                                    <td>{{ $machines->id }}</td>
                                    <td><a href="{{ url('/machine/' . $machines->id) }}">{{ $machines->serial }}</a></td>
                                    <td>{{ $machines->machine_cd }}</td>
                                    <td>{{ $machines->customer_machine_no }}</td>
                                    <td>{{ $machines->cus_code }}</td>
                                    <td>{{ $machines->cus_name1 }}</td>
                                    <td>{{ $machines->com_shot_name }}</td>
                                    <td>@if($machines->factory_type_name == 1)
                                        KCMS
                                    @elseif($machines->factory_type_name == 2)
                                        KSL
                                    @elseif($machines->factory_type_name == 3)
                                        ETC
                                    @endif</td>
                                    
                                    <td class="float-end">
                                        <a href="{{ url('/machine/' . $machines->id . '/edit') }}" title="Edit company">
                                            <button class="btn btn-primary">
                                                <i class="fa-sharp fa-solid fa-pen-to-square" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <a href="{{ url('/machine/' . $machines->id . '/delete') }}" class="btn btn-danger"><i class="fw-bold fa-solid fa-xmark fa-2xl"></i></a>
                                        {{-- <form method="POST" action="{{ url('/machine/' . $machines->id) }}" accept-charset="UTF-8" style="display:inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" title="Delete Machine" onclick="return confirm('Confirm delete?')">
                                                <i class="fa-sharp fa-solid fa-xmark" aria-hidden="true"></i>
                                            </button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9"></td>
                            </tr>
                        @endif
                    </tbody>
                    {!! $machine->links('pagination::bootstrap-5') !!}
                </table>
            </div>
            
        </div>
        
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dropdowncompa.js') }}"></script>
    @csrf
</x-default-layout>

