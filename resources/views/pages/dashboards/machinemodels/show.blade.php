<x-default-layout>
    <style>
        html,
        body {
            height: 100%;
        }
    </style>

    <div class="container">
        <div class="h2 p-4">Machine Models Master - Browse</div>

        <form method="get" action="">
            @csrf
            @method('PUT')

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-2 text-start">
                            ID :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-10 text-start pb-5">
                            <label for="">{{ $machinemodels -> id }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-5 text-start">
                            Machine Type :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-7 text-start pb-5">
                            <label for="">{{ $machinemodels -> mtypename }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-7 text-start">
                            Machine Model Name :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-5 text-start">
                            <label for="">{{ $machinemodels-> machinemodel_name }}</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-3 text-start">
                            Active :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-9 text-start pb-5">
                            <label for="">
                                @if($machinemodels->latest_flg_name == '1')
                                Yes
                                @elseif($machinemodels->latest_flg_name == '0')
                                No
                                @endif</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-6 text-start">
                            Country Of Origin :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-6 text-start pb-5">
                            <label for="">
                                @if($machinemodels->origin_country_name == '1')
                                Japan
                                @elseif($machinemodels->origin_country_name == '2')
                                China
                                @endif</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-6 text-start">
                            Oil Flooded/Free :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-6 text-start pb-5">
                            <label for="">
                                @if($machinemodels->oil_type_name == '1')
                                Oil Free 
                                @elseif($machinemodels->oil_type_name == '2')
                                Oil Flooded
                                @endif</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-6 text-start">
                            Cooling Method :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-6 text-start pb-5">
                            <label for="">
                                @if($machinemodels->cooler_type_name == '1')
                                Air Cooled 
                                @elseif($machinemodels->cooler_type_name == '2')
                                Water Cooled
                                @endif</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-3 text-start">
                            Inverter :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-9 text-start pb-5">
                            <label for="">
                                @if($machinemodels->inverter_flg_name == '1')
                                Yes
                                @elseif($machinemodels->inverter_flg_name == '0')
                                No
                                @endif</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-3 text-start">
                            Power :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-9 text-start">
                            <span for="">{{ $machinemodels->power }}</span>
                            <span>KW</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-3 text-start">
                            Remark :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-9 text-start">
                            <label for="">{{ $machinemodels-> remarks }}</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Created :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for=""><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ \Carbon\Carbon::parse($machinemodels->created_at)->format('d/m/Y') }}&nbsp;{{ \Carbon\Carbon::parse($machinemodels->created_at)->format('H:i') }}&nbsp;
                                <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $machinemodels->created_by }}
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Updated :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for=""><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ \Carbon\Carbon::parse($machinemodels->updated_at)->format('d/m/Y') }}&nbsp;{{ \Carbon\Carbon::parse($machinemodels->updated_at)->format('H:i') }}&nbsp;
                                <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $machinemodels->updated_by }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{ url('/machinemodels') }}" class="btn btn-primary btn-sm float-start"
                style="box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);"><i class="fa-solid fa-backward"></i>&nbsp;Back</a>
        </form>

    </div>
</x-default-layout>