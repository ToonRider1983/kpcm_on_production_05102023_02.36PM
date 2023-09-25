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
            <label class="h1 mb-5 fw-bold">Project - Result</label>
            <div class="col-lg-7 col-12">
                <div class="card shadow">
                    <form action="get">
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
                                    <div class="border-bottom border-gray-400">
                                        <div class="row mb-4">
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                        Distributor :
                                                    </div>
                                                    <div
                                                        class="py-3 col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                        PIC :
                                                    </div>
                                                    <div
                                                        class="py-3 col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
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
                                                        class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                        Country :
                                                    </div>
                                                    <div
                                                        class="py-3 col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                        Route :
                                                    </div>
                                                    <div
                                                        class="py-3 col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border-bottom border-gray-400 pt-4">
                                        <div class="row mb-4">
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                        User Name :
                                                    </div>
                                                    <div
                                                        class="py-3 col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                        <label for=""></label>
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
                                                        class="py-3 col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
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
                                                        class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                        Project ID :
                                                    </div>
                                                    <div
                                                        class="py-3 col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                        Ref.ID :
                                                    </div>
                                                    <div
                                                        class="py-3 col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border-bottom border-gray-400 pt-4">
                                        <div class="row mb-4">
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                        Country Of Origin :
                                                    </div>
                                                    <div
                                                        class="py-3 col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                        Oil Flooded/Free :
                                                    </div>
                                                    <div
                                                        class="py-3 col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
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
                                                        class="fw-bold fs-5 vertical-center text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-start col-12 text-start">
                                                        Machine Type1 :
                                                    </div>
                                                    <div
                                                        class="py-3 col-lg-6 text-lg-start col-md-7 text-md-start col-12 text-start">
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
                                                        class="fw-bold fs-5 vertical-center text-gray-800 col-lg-6 text-lg-start col-md-5 text-md-start col-12 text-start">
                                                        Machine Model :
                                                    </div>
                                                    <div
                                                        class="py-3 col-lg-6 text-lg-start col-md-7 text-md-start col-12 text-start">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border-bottom border-gray-400 pt-4">
                                        <div class="row mb-4">
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                        Status :
                                                    </div>
                                                    <div
                                                        class="py-3 col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                        Result :
                                                    </div>
                                                    <div
                                                        class="py-3 col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
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
                                                        class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                        Possibility :
                                                    </div>
                                                    <div
                                                        class="py-3 col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                        <label for=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-bottom pt-4">
                                        <div class="row mb-4">
                                            <div
                                            class="col-lg-6 text-lg-start col-md-6 text-md-start col-12 text-start">
                                            <div class="row">
                                                <div
                                                    class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                    Create :
                                                </div>
                                                <div
                                                    class="py-3 col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                    <label for=""></label>
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
                                                    class="py-3 col-lg-11 text-lg-start col-md-11 text-md-start col-12 text-start">
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
                                                    class="col-lg-4 text-lg-start col-md-4 text-md-start col-12 text-start fw-bold fs-5 vertical-center text-gray-800">
                                                    Updated :
                                                </div>
                                                <div
                                                    class="py-3 col-lg-8 text-lg-start col-md-8 text-md-start col-12 text-start">
                                                    <label for=""></label>
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
                                                    class="py-3 col-lg-11 text-lg-start col-md-11 text-md-start col-12 text-start">
                                                    <label for=""></label>
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
            <div class="col-lg-5 col-12 bg-transparent">
                <div class="row">
                    <div class="col-lg-6 col-6 pt-2">
                        <button type="button" class="btn btn-primary mb-2 container"><i
                            class="fa-solid fa-download"></i>&nbsp;Download CSV<br>(By Project)</button>
                    </div>
                    <div class="col-lg-6 col-6 pt-2">
                        <button type="button" class="btn btn-primary mb-2 container"><i
                                class="fa-solid fa-download"></i>&nbsp;Download CSV<br>(By Project) Only MainID</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-6 pt-2">
                        <button type="button" class="btn btn-primary mb-2 container"><i
                            class="fa-solid fa-download"></i>&nbsp;Download CSV<br>(By Machine)</button>
                    </div>
                    <div class="col-lg-6 col-6 pt-2">
                        <button type="button" class="btn btn-primary mb-2 container"><i
                                class="fa-solid fa-download"></i>&nbsp;Download CSV<br>(By Machine) Only MainID</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card my-5 shadow ">
        <div class="row ms-5 me-5 mt-5">
            <div class="col-lg-2 col-md-4 col-6">
                <a href="" target="_blank" title="show sevice"><button
                    type="button" class="btn btn-success mb-2 container"><i
                        class="fa-sharp fa-solid fa-pen-to-square"></i>&nbsp;Input Result</button></a>
            </div>
            <div class="col-lg-10 col-md-8 col-6"></div>
        </div>
        <div class="card-body overflow-auto table-responsive">
            <table class="table">
                <thead class="thead-light">
                    <tr class="fw-bold fs-6 text-gray-800">
                        <th scope="col">ID</th>
                        <th scope="col">Ref.ID</th>
                        <th scope="col">Status</th>
                        <th scope="col">Distributor</th>
                        <th scope="col">E/U Name</th>
                        <th scope="col">Machine Model - Qty</th>
                        <th scope="col">Route</th>
                        <th scope="col">Poss.</th>
                        <th scope="col">Result</th>
                        <th scope="col">Updated</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @if (!@empty($projects))
                    @foreach ($projects as $pro)
                            <tr>
                                <td>{{ $pro->id }}</td>
                                <td>{{ $pro->parent_id }}</td>
                                <td>@if($pro->status_name == 1)
                                    <span class="fw-bold fs-6" style="color: #FF9800;">Registered</span>
                                @elseif($pro->status_name == 2)
                                    <span class="fw-bold fs-6" style="color: #4CAF50;">OK</span>
                                @elseif($pro->status_name == 3)
                                    <span class="fw-bold fs-6" style="color: #2196F3;">FREE</span>
                                @elseif($pro->status_name == 4)
                                    <span class="fw-bold fs-6" style="color: #F44336;">NG</span>
                                @elseif($pro->status_name == 5)
                                    <span class="fw-bold fs-6" style="color: #9C27b0;">Time Out</span>
                                @endif</td>
                                <td>{{ $pro->Cpns_name }}</td>
                                <td><a href=""></a>{{ $pro->customer_name }}</td>
                                <td>
                                    {{ $pro->Mc_name1 ? $pro->Mc_name1 . ' - ' . $pro->machinemodel1_qty : '' }}<br>
                                    {{ $pro->Mc_name2 ? $pro->Mc_name2 . ' - ' . $pro->machinemodel2_qty : '' }}<br>
                                    {{ $pro->Mc_name3 ? $pro->Mc_name3 . ' - ' . $pro->machinemodel3_qty : '' }}<br>
                                </td>
                                <td>{{ $pro->routename1 }}<br>
                                    {{ $pro->routename2 }}<br>
                                    {{ $pro->routename3 }}<br>
                                </td>
                                <td>@if($pro->possibility == 1)
                                    D
                                @elseif($pro->possibility == 2)
                                    C
                                @elseif($pro->possibility == 3)
                                    B
                                @elseif($pro->possibility == 4)
                                    A
                                @endif</td>
                                <td>@if($pro->result_name == 1)
                                    <span class="fw-bold text-white" style="background-color: #FFC107; border-radius: 4px; padding: 3px;">None</span>
                                @elseif($pro->result_name == 2)
                                <span class="fw-bold text-white" style="background-color: #3CB521; border-radius: 4px; padding: 3px;">Success</span>
                                @elseif($pro->result_name == 3)
                                <span class="fw-bold text-white" style="background-color: #F44336; border-radius: 4px; padding: 3px;">Fail</span>
                                @elseif($pro->result_name == 4)
                                <span class="fw-bold text-white" style="background-color: #04519b; border-radius: 4px; padding: 3px;">Postpone</span>
                                @elseif($pro->result_name == 5)
                                <span class="fw-bold text-white" style="background-color: #9C27B0; border-radius: 4px; padding: 3px;">Time Out</span>
                                @elseif($pro->result_name == 6)
                                <span class="fw-bold text-white" style="background-color: #C0C0C0; border-radius: 4px; padding: 3px;">Selected Others</span>
                                @endif</td>
                                <td>{{ \Carbon\Carbon::parse($pro->updated_at)->format('d/m/Y') }}</td>
                                <td class="float-end">
                                    <a href="{{ url('/project/' . $pro->id . '/edit') }}"
                                        title=""><button class="btn btn-primary"><i
                                                class="fa-sharp fa-solid fa-pen-to-square"
                                                aria-hidden="true"></i></button></a>

                                    <form method="POST"
                                        action=""
                                        accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger" title="Delete Student"
                                            onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                class="fa-sharp fa-solid fa-xmark"
                                                aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

</x-default-layout>