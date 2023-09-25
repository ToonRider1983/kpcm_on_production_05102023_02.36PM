

<x-default-layout>
    <style>
        .card {
            background-color: #fff;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
        }

        .col-add {
            display: flex;
        }
    </style>

    <div class="container">
        <div class="text-start">
            <label class="mb-2 h1 fw-bold">User Master - Add</label>
        </div>
        <div class="text-end h4">
            <label class="pe-10" style="color: red;z-index: 1040;" for=""><b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>&nbsp;=&nbsp;Mandatory Field</label>
        </div>
        <form action="{{ route('user.store') }}" method="POST">
            @csrf

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div> 
                        @endif
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-2 text-start">
                            ID :
                        </div>
                        <div class="col-lg-5 text-lg-start py-3 col-md-5 text-md-start col-10 text-start pb-5">
                            <label id="id">{{ $newId }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Company :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <select class="form-select" name="company_id" id="company_id" aria-label="Select example">
                                @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="row">
                                <div
                                    class="fw-bold fs-6 text-gray-800 col-lg-6 text-lg-end col-md-4 text-md-start pt-2">
                                    User Scope :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                                </div>
                                <div class="col-lg-6 text-lg-start col-md-8 text-md-start">
                                    <div class="form-check form-check-custom form-check-solid py-2">
                                        <input class="form-check-input" type="radio" name="user_scope" value="1" id="user_scope" >
                                        <br>
                                        <label  class="form-check-label text-gray-800" for="user_scope">
                                            Local User
                                        </label>        
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid py-2">
                                        <input class="form-check-input" type="radio" name="user_scope" value="2" id="user_scope">
                                        <br>
                                        <label  class="form-check-label text-gray-800" for="user_scope">
                                            Own Distributor
                                        </label>      
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid py-2">
                                        <input class="form-check-input" type="radio" name="user_scope" value="3" id="user_scope">
                                        <br>
                                        <label  class="form-check-label text-gray-800" for="user_scope">
                                            Own Country
                                        </label>  
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid py-2">
                                        <input class="form-check-input" type="radio" name="user_scope" value="4" id="user_scope">
                                        <br>
                                        <label class="form-check-label text-gray-800"  for="user_scope">
                                            World Wide
                                        </label>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="row">
                                <div
                                    class="fw-bold fs-6 text-gray-800 col-lg-6 text-lg-end col-md-4 text-md-start pt-2">
                                    Privilege :
                                </div>
                                <div class="col-lg-6 text-lg-start col-md-8 text-md-start">
                                    @foreach(['user_privilege_project' => 'Project', 'user_privilege_service' => 'Customer Service', 'user_privilege_maintain' => 'Maintenance', 'user_privilege_judge' => 'Judge', 'user_privilege_editall' => 'Edit All'] as $field => $label)
                                    <div class="form-check form-check-custom form-check-solid py-2">
                                        <input type="hidden" name="{{ $field }}" value="0">
                                        <input class="form-check-input" type="checkbox" name="{{ $field }}" value="1" id="{{ $field }}" {{ $request->input($field) ? 'checked' : '' }}>
                                        <label class="text-gray-800 form-check-label" for="{{ $field }}"> {{ $label }}</label>
                                    </div>
                                    @endforeach
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Login ID :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" name="loginid" id="loginid" maxlength="15" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Password :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Comfirm Password :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <div class="row">
                                <div class="col-lg-7 text-lg-start col-md-6 text-md-start col-12 text-start">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                </div>
                                <div class="col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-end">
                                    <button type="button" class="btn btn-primary" onclick="togglePasswordVisibility()"><i class="bi bi-eye"></i></button>
                                    <button type="button" class="btn btn-primary" onclick="generatePassword()"><i class="bi bi-asterisk"></i>Random</button>
                                </div>
                            </div>

                            
                            

                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Language :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <select class="form-select" name="language_type" aria-label="Select example">
                                <option>Select Language</option>
                                <option value="en">English</option>
                                <option value="th">ไทย (Thai)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Username :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" name="user_name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Email :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Reference :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" name="reference" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Created :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <label for=""></label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Updated :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <label for=""></label>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <a href="{{ url('/user') }}" class="btn btn-primary btn-sm float-start"><i
                        class="fa-solid fa-backward"></i>&nbsp;Cencle</a>
                <button type="submit" class="btn btn-success btn-sm float-end "><i
                        class="fa-solid fa-floppy-disk"></i>&nbsp;Save</button>
            </div>
        </form>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/randomPassword.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/password-toggle.js') }}"></script>
    @csrf
</x-default-layout>
