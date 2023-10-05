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
        <label class="h1 mb-5 fw-bold">User Master - Modify</label>
        <form method="POST" action="{{ route('user.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        @if ($errors->has('password'))
                        <div class="alert alert-danger">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                    
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            ID :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label class="pt-3" for="">{{ $user->id }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Company :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <select class="form-select" name="company_id" id="company_id" aria-label="Select example">
                                @foreach ($company as $company)
                                <option value="{{ $company->id }}" {{ $user->company_id == $company->id ? 'selected' : '' }}>
                                    {{ $company->company_name }}
                                </option>
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
                                <div class="fw-bold fs-6 text-gray-800 col-lg-6 text-lg-end col-md-4 text-md-start pt-2">
                                    User Scope :
                                </div>
                                <div class="col-lg-6 text-lg-start col-md-8 text-md-start">
                                    <div class="form-check form-check-custom form-check-solid py-2">
                                        <input class="form-check-input" type="radio" name="user_scope" value="1" id="user_scope" {{ $user->user_scope == 1 ? 'checked' : '' }}>
                                        <br>
                                        <label  class="form-check-label text-gray-800" for="user_scope">
                                            Local User
                                        </label>        
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid py-2">
                                        <input class="form-check-input" type="radio" name="user_scope" value="2" id="user_scope" {{ $user->user_scope == 2 ? 'checked' : '' }}>
                                        <br>
                                        <label  class="form-check-label text-gray-800" for="user_scope">
                                            Own Distributor
                                        </label>      
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid py-2">
                                        <input class="form-check-input" type="radio" name="user_scope" value="3" id="user_scope" {{ $user->user_scope == 3 ? 'checked' : '' }}>
                                        <br>
                                        <label  class="form-check-label text-gray-800" for="user_scope">
                                            Own Country
                                        </label>  
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid py-2">
                                        <input class="form-check-input" type="radio" name="user_scope" value="4" id="user_scope" {{ $user->user_scope == 4 ? 'checked' : '' }}>
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
                                <div class="fw-bold fs-6 text-gray-800 col-lg-6 text-lg-end col-md-4 text-md-start pt-2">
                                    Privilege :
                                </div>
                                <div class="col-lg-6 text-lg-start col-md-8 text-md-start">
                                    <div class="form-check form-check-custom form-check-solid py-2">
                                        <input class="form-check-input" type="checkbox" name="user_privilege_project" value="1" id="user_privilege_project"
                                            {{ $user->user_privilege_project ? 'checked' : '' }}>
                                        <label class="form-check-label text-gray-800" for="user_privilege_project">Project</label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid py-2">
                                        <input class="form-check-input" type="checkbox" name="user_privilege_service" value="1" id="user_privilege_service"
                                            {{ $user->user_privilege_service ? 'checked' : '' }}>
                                        <label class="form-check-label text-gray-800" for="user_privilege_service">Customer Service</label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid py-2">
                                        <input class="form-check-input" type="checkbox" name="user_privilege_maintain" value="1" id="user_privilege_maintain"
                                            {{ $user->user_privilege_maintain ? 'checked' : '' }}>
                                        <label class="form-check-label text-gray-800" for="user_privilege_maintain">Maintenance</label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid py-2">
                                        <input class="form-check-input" type="checkbox" name="user_privilege_judge" value="1" id="user_privilege_judge"
                                            {{ $user->user_privilege_judge ? 'checked' : '' }}>
                                        <label class="form-check-label text-gray-800" for="user_privilege_judge">Judge</label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid py-2">
                                        <input class="form-check-input" type="checkbox" name="user_privilege_editall" value="1" id="user_privilege_editall"
                                            {{ $user->user_privilege_editall ? 'checked' : '' }}>
                                        <label class="form-check-label text-gray-800" for="user_privilege_editall">Edit All</label>
                                    </div>
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
                            Login ID :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" class="form-control" value="{{ $user->loginid }}">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Password :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="password" name="password" id="password" class="form-control" >
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Comfirm Password :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Language :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <select class="form-select" name="language_type" aria-label="Select example">
                                <option value="en" {{ $user->language_type === 'en' ? 'selected' : '' }}>English</option>
                                <option value="th" {{ $user->language_type === 'th' ? 'selected' : '' }}>ไทย (Thai)</option>
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
                            Username :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" class="form-control" name="user_name" value="{{ $user->user_name }}">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Email :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start">
                            Reference :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-sm-12 text-sm-start pb-5">
                            <input type="text" class="form-control" name="reference" value="{{ $user->reference }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start py-3">
                            Created :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label class="py-3" for=""><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}&nbsp;{{ \Carbon\Carbon::parse($user->created_at)->format('H:i') }}&nbsp;
                                <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $user->created_by }}
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start py-3">
                            Updated :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label class="py-3" for=""><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y') }}&nbsp;{{ \Carbon\Carbon::parse($user->updated_at)->format('H:i') }}&nbsp;
                                <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $user->updated_by }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <a href="{{ url('/user') }}" class="btn btn-primary btn-sm float-start"><i
                        class="fa-solid fa-backward"></i>&nbsp;Cancle</a>
                <button type="submit" class="btn btn-success btn-sm float-end "><i
                        class="fa-solid fa-floppy-disk"></i>&nbsp;Save</button>
            </div>
        </form>


    </div>

</x-default-layout>
