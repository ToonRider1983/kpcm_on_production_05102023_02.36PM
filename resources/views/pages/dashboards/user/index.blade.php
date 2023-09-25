<x-default-layout>
    <style>
        html,
        body {
            height: 100%;
        }
    </style>

    <div class="container">
        <label class="mb-2 fw-bold h1">User Master - Search</label>
        <div class="card" style="background-color: #F7F7F7">
            <div class="row mt-5">
                <div class="col-lg-9 col-12">
                    <div class="card shadow">
                        <form action="" >
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
                                                <span class="fw-bold fs-6 text-gray-800 col-lg-4 text-lg-end col-md-3 text-md-end col-sm-12 text-sm-start py-3">
                                                    Username :
                                                </span>
                                                <span class="col-lg-8 text-lg-end col-md-9 text-md-end col-sm-12 text-sm-start">
                                                    <div>
                                                    <input type="text" class="form-control" name="keyword" value="{{ Request::get('keyword') }}" placeholder="Username"  aria-label="user_name" aria-describedby="basic-addon1" /> 
                                                    </div>
                                                </span>
                                            </div>
                                            <br>
                                            <div class="d-flex align-content-center flex-wrap row">
                                                <span class="fw-bold fs-6 text-gray-800 col-lg-4 text-lg-end col-md-3 text-md-end col-sm-12 text-sm-start py-3">
                                                    Company :
                                                </span>
                                                <span class="col-lg-8 text-lg-end col-md-9 text-md-end col-sm-12 text-sm-start">
                                                    <select class="form-select" name="companys" id="companys"
                                                            placeholder="Country">
                                                            <option value="" ></option>
                                                            @if (!@empty($company))
                                                                @foreach ($company as $company)
                                                                    <option value="{{ $company->company_name }}">
                                                                        {{ $company->company_name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                    </select>
                                                </span>
                                            </div>
                                            <br>
                                            <div class="d-flex align-content-center flex-wrap row">
                                                <span class="fw-bold fs-6 text-gray-800 col-lg-4 text-lg-end col-md-3 text-md-end col-4 text-start ">
                                                    User Scope :
                                                </span>
                                                <span class="col-lg-8 text-lg-end col-md-9 text-md-end col-6 text-start d-flex flex-wrap">
                                                    <div class="form-check form-check-inline pb-2">
                                                        <input class="form-check-input" type="checkbox" name="user_scope[]" value="1"
                                                            id="user_scope">
                                                        <label  for="user_scope">
                                                            Local User
                                                        </label>
                                                    </div>
            
                                                    <div class="form-check form-check-inline pb-2">
                                                        <input class="form-check-input" type="checkbox" name="user_scope[]" value="2"
                                                            id="user_scope">
                                                        <label  for="user_scope">
                                                            Own Distributor
                                                        </label>
                                                    </div>
            
                                                    <div class="form-check form-check-inline pb-2">
                                                        <input class="form-check-input" type="checkbox" name="user_scope[]" value="3"
                                                            id="user_scope">
                                                        <label  for="user_scope">
                                                            Own Country
                                                        </label>
                                                    </div>
            
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="user_scope[]" value="4"
                                                            id="flexRadioLg">
                                                        <label  for="flexRadioLg">
                                                            World Wide
                                                        </label>
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
                            <a href="{{ route('user.create')}}"><button type="button" class="btn btn-primary mb-2 container"><i
                                    class="fa-solid fa-plus"></i>&nbsp;ADD</button></a>
                        </div>
                        <div class="col-lg-12 col-6 pt-2">
                            <a href="{{ route('user.export', [
                                'keyword' => request('keyword'),
                                'companys' => request('companys'),
                                'user_scope' => request('user_scope'),
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
                            <th scope="col">Usercode</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">User Scope</th>
                            <th scope="col">Updated</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!@empty($user))
                        @foreach ($user as $users)
                        @php
                                $updated_at =  '';
                            @endphp
                            @if (!empty($users->updated_at)) 
                                @php
                                    $updated_at =  date('d/m/Y', strtotime($users->updated_at));
                                @endphp
                            @endif
                                <tr>
                                    <th>{{ $users->id }}</th>
                                    <th>{{ $users->companyname }}</th>
                                    <th><a href="{{ url('/user/' . $users->id) }}">{{ $users->user_name }}</a></th>
                                    <th>@if($users->user_scope == 1)
                                        Local User
                                    @elseif($users->user_scope == 2)
                                        Own Distributor
                                    @elseif($users->user_scope == 3)
                                        Own Country
                                    @elseif($users->user_scope == 4)
                                        World Wide
                                    @endif</th>
                                    <th>{{ $updated_at }}</th>
                                    <th class="float-end">
                                        <a href="{{ url('/user/' . $users->id . '/edit') }}"
                                            title="Edit company"><button class="btn btn-primary"><i
                                                    class="fa-sharp fa-solid fa-pen-to-square"
                                                    aria-hidden="true"></i></button></a>

                                        <form method="POST"
                                            action="{{ url('/user' . '/' . $users->id) }}"
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
                    {!! $user->links('pagination::bootstrap-5') !!}
                </table>
            </div>
        </div>
    </div>
</x-default-layout>
