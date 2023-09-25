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
        <label class="h1 mb-5 fw-bold">Updated projects</label>

        <form method="POST" action="">
            @csrf
            @method('PUT')

            <div class="card my-5 shadow ">
                <div class="card-body overflow-auto table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr class="fw-bold fs-6 text-gray-800">
                                <th scope="col">Updated</th>
                                <th scope="col"></th>
                                <th scope="col">Status</th>
                                <th scope="col">Distributor</th>
                                <th scope="col">E/U Name</th>
                                <th scope="col">Machine Model - Qty</th>
                                <th scope="col">Poss.</th>
                                <th scope="col">Result</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!@empty($projects))
                            @foreach ($projects as $pro)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($pro->updated_at)->format('d/m/Y') }}</td>  
                                        <td>{{ \Carbon\Carbon::parse($pro->updated_at)->format('H:i') }}</td>  
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
                                        <td></td>
                                        <td class="float-end">
                                            <a href=""
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
        </form>

    </div>
</x-default-layout>
