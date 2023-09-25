<x-default-layout>
    <style>
        html,
        body {
            height: 100%;
        }
    </style>

<div class="container">
    <div class="mb-2 fw-bold h1">Machine Models Master - Search</div>
    <div class="card" style="background-color: #F7F7F7">
        <div class="row mt-5">
            <div class="col-lg-9 col-12">
                <div class="card shadow">
                    <form action="">
                        <div class="card-body">
                            <div class="accordion accordion-icon-toggle" id="kt_accordion_2">
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
                                        <div class="d-flex align-content-center flex-wrap row">
                                            <span class="col-lg-6 col-md-6 col-sm-12 py-3">
                                                <select class="form-select" name="origin_country_id" id="origin_country_id" placeholder="Country Of Origin">
                                                    <option value="">Country Of Origin</option>
                                                    <option value="1">Japan</option>
                                                    <option value="2">China</option>
                                                </select>
                                            </span>
                                            <span class="col-lg-6 col-md-6 col-sm-12 py-3">
                                                <select class="form-select" name="oil_type" id="oil_type" placeholder="Oil Flooded / Free">
                                                    <option value="">Oil Flooded / Free</option>
                                                    <option value="1">Oil Free</option>
                                                    <option value="2">Oil Flooded</option>
                                                </select>
                                            </span>
                                        </div>
                                        <div class="d-flex align-content-center flex-wrap row">
                                            <span class="col-lg-6 col-md-6 col-sm-12 py-3">
                                                <select class="form-select" name="last_flag" id="last_flag" placeholder="Active">
                                                    <option value="">Active</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </span>
                                            <span class="col-lg-6 col-md-6 col-sm-12 py-3">
                                                <select class="form-select" name="cooler_type" id="cooler_type" placeholder="Cooling Method">
                                                    <option value="">Cooling Method</option>
                                                    <option value="1">Air Cooled</option>>
                                                    <option value="2">Water Cooled</option>
                                                </select>
                                            </span>
                                        </div>
                                        <div class="d-flex align-content-center flex-wrap row">
                                            <span class="col-lg-6 col-md-6 col-sm-12 py-3">
                                                <input type="text" name="power" id="power" class="form-control" placeholder="Power" value="{{ Request::get('power') }}">
                                            </span>
                                            <span class="col-lg-6 col-md-6 col-sm-12 py-3">
                                                <select class="form-select" name="inverter_flg" id="inverter_flg" placeholder="Cooling Method">
                                                    <option value="">Inverter</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </span>
                                        </div>
                                        <div class="d-flex align-content-center flex-wrap row">
                                            <span class="col-lg-6 col-md-6 col-sm-12 py-3">
                                                <input type="text" name="machinemodel_name" id="machinemodel_name" class="form-control" placeholder="Machine Model" value="{{ Request::get('machinemodel_name') }}">
                                            </span>
                                            <span class="col-lg-6 col-md-6   col-sm-12 py-3">
                                                <select class="form-select" name="machinetype1" id="machinetype1" placeholder="country">
                                                    <option value="">machinetype1</option>
                                                    @if (!empty($machinetype))
                                                        @foreach ($machinetype as $row)
                                                            <option value="{{ $row->machinetype1_name }}"{{ Request::get('machinetype1') == $row->machinetype1_name ? 'selected' : '' }}> {{ $row->machinetype1_name }}            
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </span>
                                        </div>
                                        <div class="text-end">
                                            <button type="submit"  class="btn btn-primary"><i
                                                  class="fa-solid fa-magnifying-glass"></i>&nbsp;Search</button>  
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
                        <a href="{{ route('machinemodels.create')}}"><button type="button" class="btn btn-primary mb-2 container"><i
                                class="fa-solid fa-plus"></i>&nbsp;ADD</button></a>
                    </div>
                    <div class="col-lg-12 col-6 pt-2">
                        <a href="{{ route('machinemodels.export', [
                                'origin_country_id' => request('origin_country_id'),
                                'oil_type' => request('oil_type'),
                                'last_flag' => request('last_flag'),
                                'cooler_type' => request('cooler_type'),
                                'power' => request('power'),
                                'inverter_flg' => request('inverter_flg'),
                                'machinemodel_name' => request('machinemodel_name'),
                                'machinetype1' => request('machinetype1'),
                                 ]) }}"><button type="button" class="btn btn-primary mb-2 container"><i
                                class="fa-solid fa-download"></i>&nbsp;Download CSV</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card my-5 shadow">
        <div class="card-body overflow-auto table-responsive">
            <table class="table">
                <thead class="thead-light">
                    <tr class="fw-bold fs-6 text-gray-800">
                        <th scope="col">ID</th>
                        <th scope="col">Machine Type</th>
                        <th scope="col">Machine Model Name</th>
                        <th scope="col">Active</th>
                        <th scope="col">Country Of Origin</th>
                        <th scope="col">Oil Flooded/Free</th>
                        <th scope="col">Cooling Method</th>
                        <th scope="col">Inverter</th>
                        <th scope="col">Power</th>
                        <th scope="col">Updated</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @if (!@empty($machinemodels))
                                @foreach ($machinemodels as $item)
                                @php
                                $updated_at =  '';
                            @endphp
                            @if (!empty($item->updated_at)) 
                                @php
                                    $updated_at =  date('d/m/Y', strtotime($item->updated_at));
                                @endphp
                            @endif
                                    <tr>
                                        <th>{{ $item-> id }}</th>
                                        <th>{{ $item -> mtypename }}</th>
                                        <th><a href="{{ url('/machinemodels/' . $item->id) }}">{{ $item -> machinemodel_name }}</a></th>
                                        <th>@if($item->latest_flg_name == 1)Yes @elseif($item->latest_flg_name == 0)No @endif</th>
                                        <th>@if($item->origin_country_name == 1)Japan @elseif($item->origin_country_name == 2)China @endif</th>
                                        <th>@if($item->oil_type_name == 1)Oil Free @elseif($item->oil_type_name == 2)Oil Flooded @endif</th>
                                        <th>@if($item->cooler_type_name == 1)Air Cooled @elseif($item->cooler_type_name == 2)Water Cooled @endif</th>
                                        <th>@if($item->inverter_flg_name == 1)Yes @elseif($item->inverter_flg_name == 0)No @endif</th>
                                        <th>{{ $item -> power}}</th>                 
                                        <th>{{ $updated_at }}</th>
                            <th>
                                <a href="{{ url('/machinemodels/' . $item->id . '/edit') }}"
                                    title="Edit machinemodels"><button class="btn btn-primary"><i
                                            class="fa-sharp fa-solid fa-pen-to-square"
                                            aria-hidden="true"></i></button></a>

                                <form method="POST"
                                    action="{{ url('/machinemodels' . '/' . $item->id) }}"
                                    accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger" title="Delete Student"
                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                            class="fa-sharp fa-solid fa-xmark"
                                            aria-hidden="true"></i></button>
                                </form>



                            </th>
                        </tr>
                    @endforeach
                @endif
                </tbody>
                {!! $machinemodels->links('pagination::bootstrap-5') !!}
            </table>
        </div>
    </div>
</div>

</x-default-layout>
