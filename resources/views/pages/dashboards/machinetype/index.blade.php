<x-default-layout>
    <style>
        html,
        body {
            height: 100%;
        }
    </style>

    <div class="container">
        <div class="mb-2 fw-bold h1">Machine Type Master - Search</div>
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
                                                <span
                                                    class="fw-bold fs-6 text-gray-800 col-lg-6 text-lg-end col-md-6 text-md-end col-sm-12 text-sm-start py-3">
                                                    Machine Type Name :
                                                </span>
                                                <span class="col-lg-6 text-lg-end col-md-6 text-md-end col-sm-12 text-sm-start">
                                                    <div>
                                                            <select class="form-select" name="keyword" aria-label="Select Machine Type">
                                                                <option value="" {{ Request::get('selecttype') == '' ? 'selected' : '' }}>All</option>
                                                                @foreach ($selecttype as $type)
                                                                    <option value="{{ $type->machinetype1_name }}" {{ Request::get('selecttype') == $type->machinetype1_name ? 'selected' : '' }}>{{ $type->machinetype1_name }}</option>
                                                                @endforeach
                                                            </select>
                                                    </div>
                                                </span>
                                            </div>
                                            <br>
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
                            <a href="{{ route('machinetype.create') }}"><button type="button" class="btn btn-primary mb-2 container"><i
                                    class="fa-solid fa-plus"></i>&nbsp;ADD</button></a>
                        </div>
                        <div class="col-lg-12 col-6 pt-2">
                            <a href="{{ route('machinetype.export', ['keyword' => request('keyword')]) }}"><button type="button" class="btn btn-primary mb-2 container"><i
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
                            <th scope="col">MachineTypeName</th>
                            <th scope="col">Update</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$machinetype->isEmpty())
                            @foreach ($machinetype as $item)
                            @php
                                $updated_at =  '';
                            @endphp
                            @if (!empty($item->updated_at)) 
                                @php
                                    $updated_at =  date('d/m/Y', strtotime($item->updated_at));
                                @endphp
                            @endif
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td><a href="{{ url('/machinetype/' . $item->id) }}">{{ $item->machinetype1_name }}</a></td>
                                    <td>{{ $updated_at }}</td>
                                    <td class="float-end">
                                        <a href="{{ url('/machinetype/' . $item->id . '/edit') }}" title="Edit company"><button class="btn btn-primary"><i
                                                    class="fa-sharp fa-solid fa-pen-to-square"
                                                    aria-hidden="true"></i></button></a>
                                        <a href="{{ url('/machinetype/' . $item->id . '/delete') }}" class="btn btn-danger"><i class="fw-bold fa-solid fa-xmark fa-2xl"></i></a>
                                        {{-- <form method="POST" action="{{ url('/machinetype/' . $item->id) }}" accept-charset="UTF-8"
                                            style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger" title="Delete Student"
                                                onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                    class="fa-sharp fa-solid fa-xmark" aria-hidden="true"></i></button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    {!! $machinetype->links('pagination::bootstrap-5') !!}
                </table>
            </div>
        </div>
    </div>
</x-default-layout>
