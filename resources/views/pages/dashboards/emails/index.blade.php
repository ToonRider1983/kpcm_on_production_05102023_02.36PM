<x-default-layout>
    <style>
        html,
        body {
            height: 100%;
        }
    </style>

    <div class="container">
        <div class="mb-2 h1 fw-bold">Mails Master - Search</div>
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
                                                    Country :
                                                </span>
                                                <span class="col-lg-6 text-lg-end col-md-6 text-md-end col-sm-12 text-sm-start">
                                                    <div>
                                                        <select class="form-select" name="country" id="country">
                                                            <option value=""></option>
                                                            @if (!@empty($country))
                                                                @foreach ($country as $country)
                                                                    <option value="{{ $country->country_name }}">
                                                                        {{ $country->country_name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
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
                            <a href="{{ route('emails.create') }}"><button type="button" class="btn btn-primary mb-2 container"><i
                                    class="fa-solid fa-plus"></i>&nbsp;ADD</button></a>
                        </div>
                        <div class="col-lg-12 col-6 pt-2">
                            <button type="button" class="btn btn-primary mb-2 container"><i
                                    class="fa-solid fa-download"></i>&nbsp;Download CSV</button>
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
                            <th scope="col">Country</th>
                            <th scope="col">Email Type</th>
                            <th scope="col">Updated</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!@empty($emails))
                            @foreach ($emails as $emailss)
                            @php
                                $updated_at =  '';
                            @endphp
                            @if (!empty($emailss->updated_at)) 
                                @php
                                    $updated_at =  date('d/m/Y', strtotime($emailss->updated_at));
                                @endphp
                            @endif
                                <tr>
                                    <th>{{ $emailss->id }}</th>
                                    <th>{{ $emailss->ContryName }}</th>
                                    <th><a href="{{ url('/emails/' . $emailss->id) }}">@if($emailss->typename == 1)
                                        Kobelco Judge
                                    @elseif($emailss->typename == 2)
                                        Project Time out
                                    @elseif($emailss->typename == 3)
                                        Free Project
                                    @endif</a></th>
                                    <th>{{ $updated_at }}</th>
                                    <th class="float-end">
                                        <a href="{{ url('/emails/' . $emailss->id . '/edit') }}"
                                            title="Edit company"><button class="btn btn-primary"><i
                                                    class="fa-sharp fa-solid fa-pen-to-square"
                                                    aria-hidden="true"></i></button></a>

                                        <form method="POST" action="{{ url('/emails' . '/' . $emailss->id) }}"
                                            accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger" title="Delete Student"
                                                onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                    class="fa-sharp fa-solid fa-xmark" aria-hidden="true"></i></button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    {!! $emails->links('pagination::bootstrap-5') !!}
                </table>
            </div>
        </div>
    </div>
</x-default-layout>
