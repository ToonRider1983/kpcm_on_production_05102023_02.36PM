
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
    </style>

    <div class="container">
        <div class="text-start">
            <label class="mb-2 h1 fw-bold">Company Master - Add</label>
        </div>
        <div class="text-end h4">
            <label class="pe-10" style="color: red;z-index: 1040;" for=""><b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>&nbsp;=&nbsp;Mandatory Field</label>
        </div>
        <form action="{{ route('companies.store') }}" method="POST">
            @csrf
            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row" >
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
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Type : <b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5 pt-1">
                            <div class="form-check form-check-custom form-check-solid py-2">
                                <input class="form-check-input" type="radio" name="company_type" value="1" id="company_type"/>
                                <label class="form-check-label text-gray-800" for="Distributor">Distributor</label>&nbsp;&nbsp;
                                <input class="form-check-input" type="radio" name="company_type" value="2" id="company_type"/>
                                <label class="form-check-label text-gray-800" for="Administrator">Administrator</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Country :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <select class="form-select" name="country_id" id="country_id" aria-label="Select example">
                                <option value="">Select </option>
                                @foreach ($country as $try)
                                    <option value="{{ $try->id }}">{{ $try->country_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Belong to :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <select class="form-select" name="belongto_id" id="belongto_id" aria-label="Select example">
                                <option value="">Select </option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->Belongto_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Company Name:<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" class="form-control" name="company_name" id="company_name">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Company Short Name:
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" class="form-control" name="company_short_name" id="company_short_name">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            SMAP Code:
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" class="form-control" name="smap_cd" id="smap_cd" maxlength="7">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Address1:
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" class="form-control" name="address1" id="address1">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Address2:
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" class="form-control" name="address2" id="address2">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Telephone:
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" class="form-control" name="telephone" id="telephone">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="accordion accordion-icon-toggle" id="kt_accordion_2">
                        <div>
                            <div class="accordion-header py-8 d-flex" data-bs-toggle="collapse"
                                data-bs-target="#kt_accordion_2_item_1">
                                <span class="accordion-icon">
                                    <i class="ki-duotone bi bi-caret-right-fill fs-1"><span
                                            class="path1"></span><span class="path2"></span></i>
                                </span>
                                <h1 class="fs-1 fw-semibold mb-0 ms-4">Email Notifications</h1>
                            </div>
                            <div id="kt_accordion_2_item_1" class="fs-6 collapse show ps-10"
                                data-bs-parent="#kt_accordion_2">
                                <div class="row mb-4">
                                    <div class="col-lg-12 text-lg-start col-md-12 text-md-start col-12 text-start">
                                        <div class="row mb-4">
                                            <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-5 text-start">
                                                <label class="pe-8 fw-bold fs-4 text-gray-800 mb-3"><u>A.Approved/Unapproved</u></label>
                                            </div>
                                            <div class="col-lg-7"></div>
                                            <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-4 text-start">
                                                <label class="py-3 pe-8 fw-bold fs-6 text-gray-800">Email :</label> 
                                            </div>
                                            <div class="m-0 col-lg-7 text-lg-start col-md-5 text-md-start col-6 text-end">
                                                <a href="">
                                                    <button type="button" class="btn btn-primary m-0"><i class="fw-bold fs-3 bi bi-plus"></i>
                                                        More
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-5 text-start">
                                                <label class="pe-8 fw-bold fs-4 text-gray-800 mb-3"><u>B.Time&nbsp;out&nbsp;alert</u></label>
                                            </div>
                                            <div class="col-lg-7"></div>
                                            <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-4 text-start">
                                                <label class="py-3 pe-8 fw-bold fs-6 text-gray-800">Email :</label> 
                                            </div>
                                            <div class="m-0 col-lg-7 text-lg-start col-md-5 text-md-start col-6 text-end">
                                                <a href="">
                                                    <button type="button" class="btn btn-primary m-0"><i class="fw-bold fs-3 bi bi-plus"></i>
                                                        More
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-5 text-start">
                                                <label class="pe-8 fw-bold fs-4 text-gray-800 mb-3"><u>C.Free&nbsp;notice</u></label>
                                            </div>
                                            <div class="col-lg-7"></div>
                                            <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-4 text-start">
                                                <label class="py-3 pe-8 fw-bold fs-6 text-gray-800">Email :</label> 
                                            </div>
                                            <div class="m-0 col-lg-7 text-lg-start col-md-5 text-md-start col-6 text-end">
                                                <a href="">
                                                    <button type="button" class="btn btn-primary m-0"><i class="fw-bold fs-3 bi bi-plus"></i>
                                                        More
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
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
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Created :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Updated :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{ url('/companies') }}" class="btn btn-primary btn-sm float-start"><i
                    class="fa-solid fa-backward"></i>&nbsp;Cencle</a>
            <button type="submit" class="btn btn-success btn-sm float-end"><i
                    class="fa-solid fa-floppy-disk"></i>&nbsp;Save</button>
        </form>

    </div>
</x-default-layout>
