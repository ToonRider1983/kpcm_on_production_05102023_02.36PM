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
        <div class="card" style="background-color: #F7F7F7">
            <div class="row mt-5">
                <label class="h1 mb-5 fw-bold">Service - Search</label>
                <form action="{{ route('show') }}" >
                    @csrf
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-10 col-md-8 col-6"></div>
                                <div class="col-lg-2 col-md-4 col-6">
                                    {{-- <a href="{{ url('/service_show') }}"  title="show sevice"><button type="button"
                                            class="btn btn-primary mb-2 container"><i
                                                class="fa-solid fa-magnifying-glass"></i>&nbsp;Search</button></a> --}}
                                                <button type="submit" class="btn btn-primary mb-2 container"><i
                                                    class="fa-solid fa-magnifying-glass"></i>&nbsp;Search</button> 
                                </div>
                            </div>
                            <div class="accordion accordion-icon-toggle" id="kt_accordion_2">
                                <div>
                                    <div class="accordion-header py-8 d-flex" data-bs-toggle="collapse"
                                        data-bs-target="#kt_accordion_2_item_1">
                                        <span class="accordion-icon">
                                            <i class="ki-duotone bi bi-caret-right-fill fs-1"><span
                                                    class="path1"></span><span class="path2"></span></i>
                                        </span>
                                        <h1 class="fs-1 fw-semibold mb-0 ms-4">Search Condition</h1>
                                    </div>
                                    <div id="kt_accordion_2_item_1" class="fs-6 collapse show ps-10"
                                        data-bs-parent="#kt_accordion_2">
                                        <div class="row mb-4">
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                        User Name :
                                                    </div>
                                                    <div
                                                        class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                        <input type="text" class="form-control"
                                                            placeholder="User Name" />
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
                                                        <input type="text" class="form-control"
                                                            placeholder="User Code" />
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
                                                        Country :
                                                    </div>
                                                    <div
                                                    class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                    <select class="form-select" name="country" id="country" placeholder="country">
                                                        <option value=""></option>
                                                        @if (!empty($country))
                                                            @foreach ($country as $c)
                                                                <option value="{{ $c->country_name }}" {{ $request->old('country', session('selected_country')) == $c->country_name ? 'selected' : '' }}>
                                                                    {{ $c->country_name }}            
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
                                                        Province :
                                                    </div>
                                                    <div
                                                        class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                        <select class="form-select" aria-label="Select example">
                                                            <option>Province</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
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
                                                        Industrial Zone :
                                                    </div>
                                                    <div
                                                        class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                        <input type="text" class="form-control" name=""
                                                            id="" placeholder="Industrial Zone">
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                        User address :
                                                    </div>
                                                    <div
                                                        class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                        <input type="text" class="form-control" name=""
                                                            id="" placeholder="User address">
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
                                                        Type Code :
                                                    </div>
                                                    <div
                                                        class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                        <input type="text" class="form-control" name="Type_Code"
                                                            id="" placeholder="Type Code">
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                        Serial# :
                                                    </div>
                                                    <div
                                                        class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                        <input type="text" class="form-control" name="serial"
                                                        value="{{ old('serial', session('selected_serial', $request->serial)) }}" placeholder="Serial" aria-label="Serial"
                                                        aria-describedby="basic-addon1" />

                                                            {{-- <input type="text" class="form-control" name="username"
                                                        value="{{ old('username', session('selected_username', $request->username)) }}" placeholder="Username" aria-label="username"
                                                            aria-describedby="basic-addon1" /> --}}

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="fw-bold fs-5 vertical-center text-gray-800 col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start">
                                                        Motor :
                                                    </div>
                                                    <div
                                                        class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                aria-label="Recipient's username"
                                                                aria-describedby="basic-addon2" placeholder="Motor" />
                                                            <span class="input-group-text" id="basic-addon2">
                                                                <span class="path1"></span><span
                                                                    class="path2">KW</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="fw-bold fs-1 vertical-center text-gray-800 col-lg-1 text-lg-start col-md-1 text-md-start col-12 text-start">
                                                        ~
                                                    </div>
                                                    <div
                                                        class="col-lg-11 text-lg-start col-md-11 text-md-start col-12 text-start">
                                                        <input type="text" class="form-control" name=""
                                                            id="" placeholder="Motor">
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
                                                        Running Hours :
                                                    </div>
                                                    <div
                                                        class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                        <input type="text" class="form-control" name=""
                                                            id="" placeholder="Running Hours">
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
                                                        <input type="text" class="form-control" name=""
                                                            id="" placeholder="Running Hours">
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
                                                        Service Date :
                                                    </div>
                                                    <div
                                                        class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                        <input type="date" class="form-control" name=""
                                                            id="" placeholder="Service Date">
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
                                                        <input type="date" class="form-control" name=""
                                                            id="" placeholder="Service Date">
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
                                                        Comm'Date :
                                                    </div>
                                                    <div
                                                        class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                        <input type="date" class="form-control" name=""
                                                            id="" placeholder="Comm'Date">
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
                                                        <input type="date" class="form-control" name=""
                                                            id="" placeholder="Comm'Date">
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
                                                        Distributor :
                                                    </div>
                                                    <div
                                                        class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                        <input type="text" class="form-control" name=""
                                                            id="" placeholder="Distributor">
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
                                                        Maintenance Contract :
                                                    </div>
                                                    <div
                                                        class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                        <input type="text" class="form-control" name=""
                                                            id="" placeholder="Maintenance Contract">
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
                                                        Operation Status :
                                                    </div>
                                                    <div
                                                        class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                        <select class="form-select" aria-label="Select example">
                                                            <option>Operation Status</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
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
                                                        Customer PIC :
                                                    </div>
                                                    <div
                                                        class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                        <input type="text" class="form-control" name=""
                                                            id="" placeholder="Customer PIC" data-bs-placement="bottom" data-bs-toggle="tooltip" title='(Date format is "day/month/year")'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                        Service Performer :
                                                    </div>
                                                    <div
                                                        class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                        <input type="text" class="form-control" name=""
                                                            id="" placeholder="Service Performer">
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
    </div>

</x-default-layout>