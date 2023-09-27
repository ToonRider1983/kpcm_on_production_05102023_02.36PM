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
    </style>

    <div class="container">
        <div class="h2 p-4">End User Master - Modify</div>
        <form method="POST" action="{{ route('enduser.update', $customer->id) }}">
            @csrf
            @method('PUT')

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            ID :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-sm-12 text-sm-start pb-5">
                            <label class="pt-3" for="">{{ $customer->id }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            User Code :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" class="form-control" id="customer_cd" name="customer_cd" value="{{ $customer->customer_cd }}">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Company Full Name :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" class="form-control"  id="customer_name1" name="customer_name1" value="{{ $customer->customer_name1 }}">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Branch/Factory/Etc :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" class="form-control" id="customer_name2" name="customer_name2" value="{{ $customer->customer_name2 }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Country :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <select class="form-select country_id" name="country_id" id="country_id" aria-label="Select example">
                                <option value="0">Select country</option>
                                @foreach ($country as $companyItem)
                                    <option value="{{ $companyItem->id }}" @if ($companyItem->id == $customer->country_id) selected @endif>
                                            {{ $companyItem->country_name }}
                                    </option>
                                 @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Province/Prefecture :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <select class="form-select provinces" name="province_id" id="provinces_id" aria-label="Select example">
                                <option value="{{ $customer->province_id }}">{{ $customer->pv_name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Industrial Zone :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <select class="form-select industrialzones" name="industrialzone_id" id="industrialzone_id"  aria-label="Select example" >
                                <option value="{{ $customer->industrialzone_id }}">{{ $customer->indust }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Zip Code :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" class="form-control" id="zip" name="zip" value="{{ $customer->zip}}">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Address1 :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" class="form-control" id="address1" name="address1" value="{{ $customer->address1}}">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Address2 :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" class="form-control" id="address2" name="address2" value="{{ $customer->address2}}">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Telephone :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $customer->telephone}}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Remarks  :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start">
                            <input type="text" class="form-control" id="remarks" name="remarks"  value="{{ $customer->remarks }}">
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
                            <label class="py-3" for=""><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ \Carbon\Carbon::parse($customer->created_at)->format('d/m/Y') }}&nbsp;{{ \Carbon\Carbon::parse($customer->created_at)->format('H:i') }}&nbsp;
                                <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $customer->created_by }}
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start py-3">
                            Updated :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start">
                            <label class="py-3" for=""><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ \Carbon\Carbon::parse($customer->updated_at)->format('d/m/Y') }}&nbsp;{{ \Carbon\Carbon::parse($customer->updated_at)->format('H:i') }}&nbsp;
                                <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $customer->updated_by }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <a href="{{ url('/enduser') }}" class="btn btn-primary btn-sm float-start"><i
                        class="fa-solid fa-backward"></i>&nbsp;Cencle</a>
                <button type="submit" class="btn btn-success btn-sm float-end "><i
                        class="fa-solid fa-floppy-disk"></i>&nbsp;Save</button>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dropdown.js') }}"></script>
    @csrf
</x-default-layout>