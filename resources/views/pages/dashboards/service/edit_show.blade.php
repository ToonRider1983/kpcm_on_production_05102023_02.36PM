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
        @php
            $txt_status = '';
            $Status = $data->operate_status;
        @endphp


        @if($Status == 1)

            @php
                $txt_status = 'In Operation';
            @endphp

        @elseif($Status == 2)

            @php
                $txt_status = 'Stopped';
            @endphp

        @elseif($Status == 3)

            @php
                $txt_status = 'Discarded';
            @endphp

        @endif
    <div class="container">
        <div class="card" style="background-color: #F7F7F7">
            <div class="row mt-5">
                <label class="h1 mb-5 fw-bold">Service - Modify - Machine</label>
                <form action="">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-lg-4 text-lg-end col-md-4 text-md-end col-2 text-start fw-bold fs-5 text-gray-800 pt-3">
                                    ID :
                                </div>
                                <div class="col-lg-6 text-lg-start col-md-6 text-md-start col-10 text-start">
                                    <label class="py-3" for="">{{ $data->id}}</label>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-4 text-lg-end col-md-4 text-md-end col-3 text-start fw-bold fs-5 text-gray-800 pt-3">
                                    Seria# :
                                </div>
                                <div class="col-lg-6 text-lg-start col-md-6 text-md-start col-9 text-start">
                                    <label class="py-3" for="">{{$data->serial}}</label>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-4 text-lg-end col-md-4 text-md-end col-12 text-start fw-bold fs-5 text-gray-800 pt-3">
                                    Customer Machine# :
                                </div>
                                <div class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                    <label class="py-3" for="">{{ $data->customer_machine_no}}</label>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-4 text-lg-end col-md-4 text-md-end col-12 text-start fw-bold fs-5 text-gray-800 pt-3">
                                    Operation Status :
                                </div>
                                <div class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <label class="py-3" for="">{{ $txt_status}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-4 text-lg-end col-md-4 text-md-end col-12 text-start fw-bold fs-5 text-gray-800 pt-3">
                                    Maintenance Conteact :
                                </div>
                                <div class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                    <label class="py-3" for="">{{ $data->maintenance_contract}}</label>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-4 text-lg-end col-md-4 text-md-end col-12 text-start fw-bold fs-5 text-gray-800 pt-3">
                                    Remarks1 :
                                </div>
                                <div class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                    <label class="py-3" for="">{{ $data->remarks_distributor1}}</label>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-4 text-lg-end col-md-4 text-md-end col-12 text-start fw-bold fs-5 text-gray-800 pt-3">
                                    Remarks2 :
                                </div>
                                <div class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                    <label class="py-3" for="">{{ $data->remarks_distributor2}}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-lg-4 text-lg-end col-md-4 text-md-end col-12 text-start fw-bold fs-5 text-gray-800 pt-3">
                                    Created :
                                </div>
                                <div class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                    <label class="py-4" ><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y') }}&nbsp;{{ \Carbon\Carbon::parse($data->created_at)->format('H:i') }}&nbsp;
                                        <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $data->user_name }}
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-4 text-lg-end col-md-4 text-md-end col-12 text-start fw-bold fs-5 text-gray-800 pt-3">
                                    Updated :
                                </div>
                                <div class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                    <label class="py-4" ><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ \Carbon\Carbon::parse($data->updated_at)->format('d/m/Y') }}&nbsp;{{ \Carbon\Carbon::parse($data->updated_at)->format('H:i') }}&nbsp;
                                        <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $data->updated_by_user_name }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <a href="{{ url('/service_show') }}" class="btn btn-primary btn-sm float-start"><i
                                class="fa-solid fa-backward"></i>&nbsp;Back To List</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-default-layout>