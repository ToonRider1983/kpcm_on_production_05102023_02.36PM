<x-default-layout>
    <style>
        html,
        body {
            height: 100%;
        }
    </style>

    <div class="container">
        <label class="mb-2 fw-bold h1">End User Master - Search</label>
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
                                                <span class="col-lg-6 col-md-5 col-sm-12 py-3">
                                                    <input type="text" class="form-control" name="ccode" value="{{ request('ccode') }}" placeholder="UserCode">
                                                                                    </span>
                                                <span class="col-lg-6 col-md-5 col-sm-12 py-3">
                                                    <input type="text" class="form-control" name="cname" value="{{ request('cname') }}" placeholder="UserName">                                    
                                                </span>
                                            </div>
                                            <div class="d-flex align-content-center flex-wrap row">
                                                <span class="col-lg-6 text-lg-end col-md-6 text-md-end col-sm-12 text-sm-start">
                                                    <div>
                                                        <select class="form-select country_id " name="country" id="country" aria-label="Select example" >
                                                            <option value="{{ Request::get('country_name') }}">Select Country</option>
                                                            @foreach ($country as $row)
                                                                <option value="{{$row->id}}"  @if(Request::get('country_name') == $row->id) selected @endif> {{$row->country_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </span>
                                                <span class="col-lg-6 col-md-5 col-sm-12">
                                                    <select class="form-select provinces" name="provinces" id="provinces" aria-label="Select example">
                                                        <option value="{{ Request::get('provinces') }}">Select Province/Prefecture</option>
                                                    </select>
                                                </span>
                                            </div>
                                            <div class="d-flex align-content-center flex-wrap row">
                                                <span class="col-lg-6 col-md-5 col-sm-12 py-3">
                                                    <select class="form-select industrialzones" name="industrialzones" id="industrialzones"  aria-label="Select example" >
                                                        <option value="{{ Request::get('industrialzones') }}">Select IndustrialZone</option>
                                                    </select>
                                                </span>
                                                <span class="col-lg-6 col-md-5 col-sm-12 py-3">
                                                    <input type="text" class="form-control" name="remarks" value="{{ request('remarks') }}" placeholder="Remarks">                                    
                                                </span>
                                            </div>
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary"><i
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
                            <a href="{{ route('enduser.create')}}"><button type="button" class="btn btn-primary mb-2 container"><i
                                    class="fa-solid fa-plus"></i>&nbsp;ADD</button></a>
                        </div>
                        <div class="col-lg-12 col-6 pt-2">
                            <a href="{{ route('enduser.export', [
                                'ccode' => request('ccode'),
                                'cname' => request('cname'),
                                'country_name' => request('country_name'),
                                'provinces' => request('provinces'),
                                'industrialzones' => request('industrialzones'),
                                'remarks' => request('remarks'),
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
                            <th scope="col">@sortablelink('customer_cd', 'User Code')</th>
                            <th scope="col">@sortablelink('customer_name1', 'User Name')</th>
                            <th scope="col">Country</th>
                            <th scope="col">Province</th>
                            <th scope="col">I.E</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!@empty($customer))
                        @foreach ($customer as $enduser)
                            <tr>
                                <th>{{ $enduser->customer_cd }}</th>
                                <th><a href="{{ url('/customer/'.'browse'.'/'. $enduser->id) }}">{{ $enduser->customer_name1 }} @if($enduser->customer_name2) / {{ $enduser->customer_name2 }}@endif</a></th>
                                <th>{{ $enduser->ct_name }}</th>
                                <th>{{ $enduser->pv_name }}</th>
                                <th>{{ $enduser->indust }}</th>
                            <th class="float-end">
                                <a href="{{ url('/customer/'.'modify'.'/'. $enduser->id) }}" title="Edit company"><button class="btn btn-primary"><i
                                            class="fa-sharp fa-solid fa-pen-to-square"
                                            aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/enduser/' . $enduser->id . '/delete') }}" class="btn btn-danger"><i class="fw-bold fa-solid fa-xmark fa-2xl"></i></a>
                            </th>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    {{-- {!! $customer->links('pagination::bootstrap-5') !!} --}}
                    {{  $customer->withQueryString()->links('pagination::bootstrap-5') }}
                </table>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dropdown.js') }}"></script>
    @csrf

</x-default-layout>