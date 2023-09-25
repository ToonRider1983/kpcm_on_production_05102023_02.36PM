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
        <div class="h2 p-4">Company Master - Modify</div>

        <form method="POST" action="{{ route('companies.update', $company->id) }}">
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
                                <label class="pt-3">{{ $company->id }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Type :
                        </div>
                        <div class="col-lg-7 text-lg-start col-md-5 text-md-end col-12 text-start pb-5">
                            <div class="form-check form-check-custom form-check-solid py-2">
                                <input class="form-check-input" type="radio" name="company_type" value="1" id="company_type" {{ $company->company_type == 1 ? 'checked' : '' }} />
                                <label class="form-check-label text-gray-800" for="Distributor">Distributor</label>&nbsp;&nbsp;
                                <input class="form-check-input" type="radio" name="company_type" value="2" id="company_type" {{ $company->company_type == 2 ? 'checked' : '' }} />
                                <label class="form-check-label text-gray-800" for="Administrator">Administrator</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Country :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <select name="country_id" id="country_id" class="form-select">
                                @if (!@empty($countries))
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            @if ($country->id == $company->country_id) selected @endif>
                                            {{ $country->country_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Belong To :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <select name="belongto_id" id="belongto_id" class="form-select" aria-label="Select example">
                                @if (!@empty($companies))
                                    @foreach ($companies as $companys)
                                        <option value="{{ $companys->id }}"
                                            @if ($companys->id == $company->belongto_id) selected @endif>
                                            {{ $companys->company_name }}</option>
                                    @endforeach
                                @endif
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
                            Company Name :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input class="form-control" type="text" id="company_name" name="company_name"
                                value="{{ $company->company_name }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Company shot name :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" class="form-control" id="company_short_name" name="company_short_name"
                                value="{{ $company->company_short_name }}">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            SMAP Code :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" class="form-control" id="smap_cd" name="smap_cd"
                                value="{{ $company->smap_cd }}">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Address1 :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" class="form-control" id="address1" name="address1"
                                value="{{ $company->address1 }}">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Address2 :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" class="form-control" id="address2" name="address2"
                                value="{{ $company->address2 }}">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Telephone :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" class="form-control" id="telephone" name="telephone"
                                value="{{ $company->telephone }}">
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
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-sm-12 text-sm-start pb-5">
                            <label class="py-3" for=""><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ \Carbon\Carbon::parse($company->created_at)->format('d/m/Y') }}&nbsp;{{ \Carbon\Carbon::parse($company->created_at)->format('H:i') }}&nbsp;
                                <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $company->created_by }}
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Updated :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label class="py-3" for=""><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ \Carbon\Carbon::parse($company->updated_at)->format('d/m/Y') }}&nbsp;{{ \Carbon\Carbon::parse($company->updated_at)->format('H:i') }}&nbsp;
                                <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $company->updated_by }}
                            </label>
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
