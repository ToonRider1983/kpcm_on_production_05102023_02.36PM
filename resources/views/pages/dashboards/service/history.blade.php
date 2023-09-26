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
                <label class="h1 mb-5 fw-bold">Service - History</label>
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
                                        <h1 class="fs-1 fw-semibold mb-0 ms-4">Machine Information</h1>
                                    </div>
                                    <div id="kt_accordion_2_item_1" class="fs-6 collapse show ps-10"
                                        data-bs-parent="#kt_accordion_2">
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-2 text-lg-end col-md-4 text-md-end col-4 text-start">
                                                Serial# :
                                            </div>
                                            <div class="col-lg-3 text-lg-start col-md-8 text-md-start col-8 text-start">
                                                <label class="pt-3" for="">{{ $data->serial}}</label>
                                            </div>
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-3 text-lg-end col-md-4 text-md-end col-7 text-start">
                                                Machine Type Code :
                                            </div>
                                            <div class="col-lg-3 text-lg-start col-md-8 text-md-start col-5 text-start">
                                                <label class="pt-3" for="">{{ $data->machine_cd}}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-2 text-lg-end col-md-4 text-md-end col-12 text-start">
                                                Service Company :
                                            </div>
                                            <div
                                                class="col-lg-10 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                <label class="pt-3" for="">{{ $data->company_name}}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="fw-bold fs-6 text-gray-800 py-3 col-lg-2 text-lg-end col-md-4 text-md-end col-12 text-start">
                                                End User :
                                            </div>
                                            <div
                                                class="col-lg-10 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                <label class="pt-3" for="">{{ $data->customer_name1}}}</label>
                                            </div>
                                        </div>
                                        <div class="col-12 text-end mt-3">
                                           <button class="btn btn-success" disabled><i class="fa-solid fa-print"></i>&nbsp;Print All Report</button> 
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
                            
                            @if($data->compressor_type == 1)
                            <a href="{{ route('add_oil_flood', [
                                'Id' => $id,
                                'Serial' => $data->serial,
                                'Type' => $data->machine_cd,
                                'Service_cus' => $data->customer_name1,
                                'Service_com' => $data->company_name,
                                'machines_id' => $data->id,
                                'url' => 'History'
                                    ]) }}" title="add company"><button type="button" class="btn btn-primary mb-2 container"><i
                                class="fa-solid fa-plus"></i>&nbsp;ADD</button></a>
                               
                            </a>
                            @elseif($data->compressor_type == 2)
                                <a href="{{ route('add', [
                                    'Id' => $id,
                                    'Serial' => $data->serial,
                                    'Type' => $data->machine_cd,
                                    'Service_cus' => $data->customer_name1,
                                    'Service_com' => $data->company_name,
                                    'machines_id' => $data->id,
                                    'url' => 'History'
                                        ]) }}" title=""><button type="button" class="btn btn-primary mb-2 container"><i
                                class="fa-solid fa-plus"></i>&nbsp;ADD</button></a>
                            @endif
                        </div>
                        <div class="col-lg-12 col-6 pt-2">
                            <button type="button" class="btn btn-primary mb-2 container"><i
                                    class="fa-solid fa-download"></i>&nbsp;Download CSV</button>
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
                            <th scope="col">Index</th>
                            <th scope="col">Service Date</th>
                            <th scope="col">Service Content</th>
                            <th scope="col">Running Hours</th>
                            <th scope="col">Service Company</th>
                            <th scope="col">Remarks</th>
                            <th scope="col">Print</th>
                            <th scope="col">[Modify]</th>
                            <th scope="col">[Delete]</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                   
                     
                        @foreach ($key as $val) 
                    
                      
                            @if ($val->service_id == 1)
                                @php
                                    $txt = 'COMMISSIONING';
                                @endphp
                            @elseif ($val->service_id == 2)
                                @php
                                    $txt = 'OVERHAUL';
                                @endphp
                            @elseif ($val->service_id == 3)
                                @php
                                    $txt = 'ANNUAL INSPECTION/PARTS CHANGE';
                                @endphp
                            @elseif ($val->service_id == 4)
                                @php
                                    $txt = 'REPAIR';
                                @endphp
                            @elseif ($val->service_id == 5)
                                @php
                                    $txt = 'WARRANTY CLAIM RELATED';
                                @endphp
                            @elseif ($val->service_id == 6)
                                @php
                                    $txt = 'PATROL SERVICE/CLEANUP';
                                @endphp
                            @elseif ($val->service_id == 7)
                                @php
                                    $txt = 'EMERGENCY CALL/CHCKUP';
                                @endphp
                            @elseif ($val->service_id == 8)
                                @php
                                    $txt = 'OTHERS/ETC';
                                @endphp
                            @endif

                            
                          

                            <tr>
                                <td><a href="{{ route('browse_history', ['id' => $val->id ,'machine_id' => $val->machine_id  ]) }}">{{ $val->service_idx }}</a></td>
                                <td>{{ $val->service_dt}}</td>
                                <td>{{ $txt}}</td>
                                <td>{{ $val->running_hours }}</td>
                                <td>{{ $val->company_name}}</td>
                                <td>{{ $val->remarks }}</td>
                                <td><button class="btn btn-success"  onclick="printPDF(<?php echo $val->machine_id ?>, <?php echo $val->id ?>)" ><i class="fa-solid fa-print"
                                    aria-hidden="true"></i></button></td>
                               
                                @if($data->compressor_type == 1)
                                    <td><a href="{{ route('edit_oil_flood', ['machine_id' => $val->machine_id, 'id' => $val->id]) }}" title="" >
                                        <button class="btn btn-primary" >
                                            <i class="fa-sharp fa-solid fa-pen-to-square" aria-hidden="true"></i>
                                        </button></a>
                                    </td>
                                @elseif($data->compressor_type == 2)
                                    <td><a href="{{ route('edit_oil_free', ['machine_id' => $val->machine_id, 'id' => $val->id]) }}" title="" >
                                        <button class="btn btn-primary" >
                                            <i class="fa-sharp fa-solid fa-pen-to-square" aria-hidden="true"></i>
                                        </button></a>
                                    </td>
                                @endif
                                    <input type="hidden" name="key" value="{{$val->id }}">
                                <td>
                                    <form method="POST" action="" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger" title="Delete Student"
                                            onclick="return confirm(&quot;Confirm delete?&quot;)" disabled><i
                                                class="fa-sharp fa-solid fa-xmark" aria-hidden="true" ></i></button>
                                    </form>
                                </td>
                            

                            
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                 {{-- {!! $key->links('pagination::bootstrap-5')!!} --}}
            </div>
        </div>
    </div>

</x-default-layout>
<script>
    function printPDF(machineId, id) {

        const url = `/generate-pdf/${machineId}/${id}`;
  
        // Open a new window or tab with the constructed URL
        window.open(url, '_blank');


    }
  

</script>