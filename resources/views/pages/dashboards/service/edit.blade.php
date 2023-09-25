
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

    @if (!empty($created_at)) 
        @php
            $date_created =   \Carbon\Carbon::parse($created_at)->format('d/m/Y');
            $time_created =  \Carbon\Carbon::parse($created_at)->format('H:i');
        @endphp
    @endif  

    @if (!empty($updated_at)) 
        @php
            $date_updated_at =  \Carbon\Carbon::parse($updated_at)->format('d/m/Y');
            $time_updated =  \Carbon\Carbon::parse($updated_at)->format('H:i');
        @endphp
    @endif
<head>
    <title>PDF Template</title>
</head>
    <div class="container">
        <div class="card" style="background-color: #F7F7F7">
            <div class="row mt-5">
                <div class="text-start">
                    <label class="mb-2 h1 fw-bold">Service - Modify - Machine</label>
                </div>
                <div class="text-end h4">
                    <label class="pe-10" style="color: red;z-index: 1040;" for=""><b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>&nbsp;=&nbsp;Mandatory Field</label>
                </div>
                <form action="{{ route('service.update', ['id' => $Id, 'Serial' => $Serial]) }}" method="POST">
                    {{-- <form action="{{ route('generatePDF') }}" method="POST">  --}}
                    @csrf
                    
                    <div class="card shadow mb-4">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-lg-4 text-lg-end col-md-4 text-md-end col-2 text-start fw-bold fs-5 text-gray-800 pt-3">
                                    ID :
                                </div>
                                <div class="pt-3 col-lg-6 text-lg-start col-md-6 text-md-start col-10 text-start">
                                    <label for="">{{ $Id }}</label>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-4 text-lg-end col-md-4 text-md-end col-3 text-start fw-bold fs-5 text-gray-800 pt-3">
                                    Seria# :
                                </div>
                                <div class="pt-3 col-lg-6 text-lg-start col-md-6 text-md-start col-9 text-start">
                                    <label for="">{{$Serial}}</label>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-4 text-lg-end col-md-4 text-md-end col-12 text-start fw-bold fs-5 text-gray-800 pt-3">
                                    Customer Machine# :
                                </div>
                                <div class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                    <input type="text" class="form-control"  id="cm_m" name="cm_m" value="">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-4 text-lg-end col-md-4 text-md-end col-12 text-start fw-bold fs-5 text-gray-800 pt-1">
                                    Operation Status :<b class="h1" style="color: red;z-index: 1040;">&#42;</b>
                                </div>
                                <div class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                    <div class="form-check form-check-custom form-check-solid py-2" >
                                        <input class="form-check-input" type="radio" value="1" name="operate_status"
                                            id="InOperation" required/>
                                        <label class="form-check-label text-gray-800" for="In Operation">
                                            In Operation
                                        </label>&nbsp;
                                        <input class="form-check-input" type="radio" value="2" name="operate_status"
                                            id="Stopped" required/>
                                        <label class="form-check-label text-gray-800" for="Stopped">
                                            Stopped
                                        </label>&nbsp;
                                        <input class="form-check-input" type="radio" value="3" name="operate_status"
                                            id="Discarded" required/>
                                        <label class="form-check-label text-gray-800" for="Discarded">
                                            Discarded
                                        </label>&nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-4 text-lg-end col-md-4 text-md-end col-12 text-start fw-bold fs-5 text-gray-800 pt-3">
                                    Maintenance Conteact :
                                </div>
                                <div class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                    <input type="text" class="form-control" name="mainten_con" id="mainten_con" value="">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-4 text-lg-end col-md-4 text-md-end col-12 text-start fw-bold fs-5 text-gray-800 pt-3">
                                    Remarks1 :
                                </div>
                                <div class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                    <input type="text" class="form-control" name="remarks_1" id=""    value="" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-4 text-lg-end col-md-4 text-md-end col-12 text-start fw-bold fs-5 text-gray-800 pt-3">
                                    Remarks2 :
                                </div>
                                <div class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                    <input type="text" class="form-control" name="remarks_2" id=""  value="" />
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
                                    <label class="py-3" for=""><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ $date_created.' '.$time_created }} &nbsp;<i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $created_by }}</label>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-4 text-lg-end col-md-4 text-md-end col-12 text-start fw-bold fs-5 text-gray-800 pt-3">
                                    Updated :
                                </div>
                                <div class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                    <label class="py-3" for=""><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ $date_updated_at.' '.$time_updated }} &nbsp;<i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $updated_by }}</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <a href="{{ url('/service_show') }}" class="btn btn-primary btn-sm float-start"><i
                                class="fa-solid fa-backward"></i>&nbsp;Cencle</a>
                        <button type="submit" class="btn btn-success btn-sm float-end "><i
                                class="fa-solid fa-floppy-disk"></i>&nbsp;Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-default-layout>