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
        <div class="text-start">
            <label class="mb-2 h1 fw-bold">Machine Models Master- Add</label>
        </div>
        <div class="text-end h4">
            <label class="pe-10" style="color: red;z-index: 1040;" for=""><b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>&nbsp;=&nbsp;Mandatory Field</label>
        </div>
        <form action="{{ route('machinemodels.store') }}" method="POST">
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
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Machine Type1 :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <select class="form-select" name="machinetype1_id"  id="machinetype" aria-label="Select example">
                                <option>Select Machine Type</option>
                                    @foreach ($machinetype1s as $machinetype)
                                        <option value="{{ $machinetype->id }}">{{ $machinetype->machinetype1_name }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Machine Model :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <input type="text" name="machinemodel_name" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pt-2 pb-1">
                            Active :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-7 text-lg-start col-md-7 text-md-start col-12 text-start">
                            <div class="row form-check form-check-custom form-check-solid py-2">
                                <div class="col-lg-2 col-md-3 col-12 text-start ps-0 py-1">
                                    <input class="form-check-input" type="radio" name="latest_flg" value="1" id="latest_flg"/>
                                    <label class="form-check-label text-gray-800" for="Yes">Yes</label>
                                </div>
                                <div class="col-lg-2 col-md-3 col-12 text-start ps-0 py-1">
                                    <input class="form-check-input" type="radio" name="latest_flg" value="0" id="latest_flg"/>
                                    <label class="form-check-label text-gray-800" for="No">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pt-3">
                            Country Of Origin :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-7 text-lg-start col-md-7 text-md-start col-12 text-start">
                            <div class="row form-check form-check-custom form-check-solid py-2">
                                <div class="col-lg-3 col-md-3 col-12 text-start ps-0 py-1">
                                    <input class="form-check-input" type="radio" name="origin_country_id" value="1" id="origin_country_id" />
                                    <label class="form-check-label text-gray-800" for="Japan">Japan</label>
                                </div>
                                <div class="col-lg-3 col-md-3 col-12 text-start ps-0 py-1">
                                    <input class="form-check-input" type="radio" name="origin_country_id" value="2" id="origin_country_id" />
                                    <label class="form-check-label text-gray-800" for="China">China</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pt-3">
                            Oil Flooded/Free :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-7 text-lg-start col-md-7 text-md-start col-12 text-start">
                            <div class="row form-check form-check-custom form-check-solid py-2">
                                <div class="col-lg-3 col-md-4 col-12 text-start ps-0 py-1">
                                    <input class="form-check-input" type="radio" name="oil_type" value="1" id="oil_type" />
                                    <label class="form-check-label text-gray-800" for="Oil Free">Oil Free</label>
                                </div>
                                <div class="col-lg-3 col-md-3 col-12 text-start ps-0 py-1">
                                    <input class="form-check-input" type="radio" name="oil_type" value="2" id="oil_type" />
                                    <label class="form-check-label text-gray-800" for="Oil Flooded">Oil Flooded</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pt-3">
                            Cooling Method :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-7 text-lg-start col-md-7 text-md-start col-12 text-start">
                            <div class="row form-check form-check-custom form-check-solid py-2">
                                <div class="col-lg-3 col-md-4 col-12 text-start ps-0 py-1">
                                    <input class="form-check-input" type="radio" name="cooler_type" value="1" id="cooler_type" />
                                    <label class="form-check-label text-gray-800" for="Air Cooled">Air Cooled</label>
                                </div>
                                <div class="col-lg-3 col-md-3 col-12 text-start ps-0 py-1">
                                    <input class="form-check-input" type="radio" name="cooler_type" value="2" id="cooler_type" />
                                    <label class="form-check-label text-gray-800" for="Water Cooled">Water Cooled</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pt-3">
                            Inverter :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-7 text-lg-start col-md-7 text-md-start col-12 text-start">
                            <div class="row form-check form-check-custom form-check-solid py-2">
                                <div class="col-lg-2 col-md-3 col-12 text-start ps-0 py-1">
                                    <input class="form-check-input" type="radio" name="inverter_flg" value="1" id="inverter_flg" />
                                    <label class="form-check-label text-gray-800" for="Yes">Yes</label>
                                </div>
                                <div class="col-lg-3 col-md-3 col-12 text-start ps-0 py-1"> 
                                    <input class="form-check-input" type="radio" name="inverter_flg" value="0" id="inverter_flg" />
                                    <label class="form-check-label text-gray-800" for="No">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Power :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <div class="input-group mb-5">
                                <input type="number" name="power" class="form-control" min="0" max="99999999999" aria-label="Recipient's username"
                                    aria-describedby="basic-addon2" />
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
                            Remarks :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start">
                            <input type="text" name="remarks" id="remarks" class="form-control" >
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start py-3">
                            Created :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for=""></label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start py-3">
                            Updated :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for=""></label>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <a href="{{ url('/machinemodels') }}" class="btn btn-primary btn-sm float-start"><i
                        class="fa-solid fa-backward"></i>&nbsp;Cencle</a>
                <button type="submit" class="btn btn-success btn-sm float-end "><i
                        class="fa-solid fa-floppy-disk"></i>&nbsp;Save</button>
            </div>
        </form>
    </div>
</x-default-layout>