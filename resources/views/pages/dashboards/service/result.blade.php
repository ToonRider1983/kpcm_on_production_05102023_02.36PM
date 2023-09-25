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
                <label class="h1 mb-5 fw-bold">Service - Result</label>
                <div class="col-lg-9 col-12">
                    <div class="card shadow">
                        <form action="">
                            <div class="accordion accordion-icon-toggle p-8" id="kt_accordion_2">
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
                                        <div class="row mb-4">
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 fw-bold fs-5 vertical-center text-gray-800">
                                                        User Name :
                                                    </div>
                                                    <div class="col-lg-8 text-lg-start col-md-8 text-md-start col-12">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 fw-bold fs-5 vertical-center text-gray-800">
                                                        User Code :
                                                    </div>
                                                    <div class="col-lg-8 text-lg-start col-md-8 text-md-start col-12">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 fw-bold fs-5 vertical-center text-gray-800">
                                                        Country :
                                                    </div>
                                                    <div class="col-lg-8 text-lg-start col-md-8 text-md-start col-12">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 fw-bold fs-5 vertical-center text-gray-800">
                                                        Province :
                                                    </div>
                                                    <div class="col-lg-8 text-lg-start col-md-8 text-md-start col-12">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-5 text-md-start col-12 fw-bold fs-5 vertical-center text-gray-800">
                                                        Industrial Zone :
                                                    </div>
                                                    <div class="col-lg-8 text-lg-start col-md-7 text-md-start col-12">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-5 text-md-start col-12 fw-bold fs-5 vertical-center text-gray-800">
                                                        User address :
                                                    </div>
                                                    <div class="col-lg-8 text-lg-start col-md-7 text-md-start col-12">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 fw-bold fs-5 vertical-center text-gray-800">
                                                        Type Code :
                                                    </div>
                                                    <div class="col-lg-8 text-lg-start col-md-8 text-md-start col-12">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 fw-bold fs-5 vertical-center text-gray-800">
                                                        Serial# :
                                                    </div>
                                                    <div class="col-lg-8 text-lg-start col-md-8 text-md-start col-12">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="fw-bold fs-5 vertical-center text-gray-800 col-lg-4 text-lg-start col-md-4 text-md-end col-12 text-start">
                                                        Motor :
                                                    </div>
                                                    <div
                                                        class="col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                        <label for=""> </label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-1 text-lg-start col-md-1 text-md-start col-12 fw-bold fs-1 vertical-center text-gray-800">
                                                        ~
                                                    </div>
                                                    <div class="col-lg-11 text-lg-start col-md-11 text-md-start col-12">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-5 text-md-start col-12 fw-bold fs-5 vertical-center text-gray-800">
                                                        Running Hours :
                                                    </div>
                                                    <div class="col-lg-8 text-lg-start col-md-7 text-md-start col-12">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-1 text-lg-start col-md-1 text-md-start col-12 fw-bold fs-1 vertical-center text-gray-800">
                                                        ~
                                                    </div>
                                                    <div class="col-lg-11 text-lg-start col-md-11 text-md-start col-12">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-5 text-md-start col-12 fw-bold fs-5 vertical-center text-gray-800">
                                                        Service Date :
                                                    </div>
                                                    <div class="col-lg-8 text-lg-start col-md-7 text-md-start col-12">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-1 text-lg-start col-md-1 text-md-start col-12 fw-bold fs-1 vertical-center text-gray-800">
                                                        ~
                                                    </div>
                                                    <div class="col-lg-11 text-lg-start col-md-11 text-md-start col-12">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 fw-bold fs-5 vertical-center text-gray-800">
                                                        Comm'Date :
                                                    </div>
                                                    <div class="col-lg-8 text-lg-start col-md-8 text-md-start col-12">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-1 text-lg-start col-md-1 text-md-start col-12 fw-bold fs-1 vertical-center text-gray-800">
                                                        ~
                                                    </div>
                                                    <div
                                                        class="col-lg-11 text-lg-start col-md-11 text-md-start col-12">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 fw-bold fs-5 vertical-center text-gray-800">
                                                        Distributor :
                                                    </div>
                                                    <div class="col-lg-8 text-lg-start col-md-8 text-md-start col-12">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-7 text-md-start col-12 fw-bold fs-5 vertical-center text-gray-800">
                                                        Maintenance Contract :
                                                    </div>
                                                    <div class="col-lg-6 text-lg-start col-md-5 text-md-start col-12">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-6 text-md-start col-12 fw-bold fs-5 vertical-center text-gray-800">
                                                        Operation Status :
                                                    </div>
                                                    <div class="col-lg-8 text-lg-start col-md-6 text-md-start col-12">
                                                        <label for=""></label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-5 text-md-start col-12 fw-bold fs-5 vertical-center text-gray-800">
                                                        Customer PIC :
                                                    </div>
                                                    <div class="col-lg-8 text-lg-start col-md-7 text-md-start col-12">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-5 text-lg-start col-md-6 text-md-start col-12 fw-bold fs-5 vertical-center text-gray-800">
                                                        Service Performer :
                                                    </div>
                                                    <div class="col-lg-7 text-lg-start col-md-6 text-md-start col-12">
                                                        <label for=""></label>
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
                <div class="col-lg-3 col-12 bg-transparent">
                    <div class="row">
                        <div class="col-lg-12 col-6 pt-2">
                            <button type="button" class="btn btn-primary mb-2 container"><i
                                    class="fa-solid fa-download"></i>&nbsp;Download CSV</button>
                        </div>
                        <div class="col-lg-12 col-6 pt-2">
                            <button type="button" class="btn btn-primary mb-2 container"><i
                                    class="fa-solid fa-download"></i>&nbsp;Download CSV<br>(with service
                                history)</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="card my-5 shadow ">
            <div class="card-body overflow-auto table-responsive">
                <table class="table">
                    <thead class="thead-light">
                        <tr class="fw-bold fs-6 text-gray-800">
                            <th scope="col">SeriaL#</th>
                            <th scope="col">Type Code</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Service</th>
                            <th scope="col">Comm'Date</th>
                            <th scope="col">Last Service</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        @foreach ($Data as $val )
                            @php
                                $txt_status ='';
                                $date_testrun  ='';
                                $date_last_service = '';
                                $Status = $val->operate_status;
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
                  
                     
                        @if (!empty($val->testrun_dt)) 
                            @php
                                $date_testrun =  date('d/m/Y', strtotime($val->testrun_dt));
                            @endphp
                        @endif  
                        
                        @if (!empty($val->last_service_dt)) 
                            @php
                                $date_last_service =  date('d/m/Y', strtotime($val->last_service_dt));
                            @endphp
                        @endif

                  
                        <tr>
                            <td><a href="{{ route('history', ['machine_id' => $val->id]) }}"  target="_blank" >{{ $val->serial }}</a></td>
                            <td>{{ $val->machine_cd }}</td>
                            <td>{{ $val->customer_name1}}</td>
                            <td>{{ $val->company_short_name}}</td>
                            <td>{{ $date_testrun }}</td>
                            <td>{{ $date_last_service }}</td>
                            <td>{{ $txt_status}}</td>
                            <th class="float-end">
                                
                                <a href="{{ route('edit', ['Id' => $val->id,
                                    'Serial' => $val->serial,
                                    'Type' => $val->machine_cd,
                                    'cm_m' =>$val->customer_machine_no,
                                    'mainten_con' =>$val->maintenance_contract,
                                    'remarks_1'=>$val->remarks_distributor1,
                                    'remarks_2'=>$val->remarks_distributor2,
                                    'created_by'=>$val->created_by,
                                    'updated_by'=>$val->updated_by,
                                    'Service_cus' => $val->customer_name1,
                                    'Service_com' => $val->company_name])}}"  title="">
                                    <button class="btn btn-primary"  ><i class="fa-sharp fa-solid fa-pen-to-square"aria-hidden="true"></i>edit</button>
                                </a>
                               

                                @if($val->compressor_type == 2)
                                    <a href="{{ route('add', [
                                        'Id' => $val->id,
                                        'Serial' => $val->serial,
                                        'Type' => $val->machine_cd,
                                        'Service_cus' => $val->customer_name1,
                                        'Service_com' => $val->company_name
                                            ]) }}" title="">
                                        <button type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i>&nbsp;ADD</button>
                                    </a>
                                @elseif($val->compressor_type == 1)
                                    <a href="{{ route('add_oil_flood', [
                                        'Id' => $val->id,
                                        'Serial' => $val->serial,
                                        'Type' => $val->machine_cd,
                                        'Service_cus' => $val->customer_name1,
                                        'Service_com' => $val->company_name
                                            ]) }}" title="">
                                        <button type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i>&nbsp;ADD</button>
                                    </a>
                                @endif
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $Data->links('pagination::bootstrap-5')!!}
            </div>
        </div>
    </div>

</x-default-layout>