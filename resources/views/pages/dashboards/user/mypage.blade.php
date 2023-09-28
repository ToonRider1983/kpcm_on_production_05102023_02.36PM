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
                <div class="text-start">
                    <label class="mb-2 h1 fw-bold">My Page - Modify</label>
                    <div class="fw-bold fs-6 text-gray-600">please update your information and click the save button</div>
                </div>
                <div class="text-end h4">
                    <label class="pe-10" style="color: red;z-index: 1040;" for=""><b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>&nbsp;=&nbsp;Mandatory Field</label>
                </div>
                <form method="POST" action="{{ route('user.update2', $users->id) }}">
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
                                <div class="col-lg-5 text-lg-end col-md-3 text-md-end col-5 text-start">
                                    <label class="py-3 fw-bold fs-6 text-gray-800" for="">
                                        Company :
                                    </label>
                                </div>
                                <div class="col-lg-5 text-lg-start col-md-3 text-md-start col-6 text-start">
                                    <label class="py-3" for="">
                                        {{$userjoin->company_name}}
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 text-lg-end col-md-3 text-md-end col-5 text-start">
                                    <label class="py-3 pb-5 fw-bold fs-6 text-gray-800" for="">
                                        User Name :
                                    </label>
                                </div>
                                <div class="col-lg-5 text-lg-start col-md-3 text-md-start col-6 text-start">
                                    <label class="py-3" for="">
                                        {{$users->user_name}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow my-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5 text-lg-end col-md-3 text-md-end">
                                    <label class="py-3 fw-bold fs-6 text-gray-800" for="">
                                        Email :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                                    </label>
                                </div>
                                <div class="col-lg-5 text-lg-start pb-5 col-md-3 text-md-start">
                                    <input type="email" class="form-control" name="email" id="email" value="{{$users->email}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 text-lg-end col-md-3 text-md-end">
                                    <label class="py-3 pb-5 fw-bold fs-6 text-gray-800" for="">
                                        Language :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                                    </label>
                                </div>
                                <div class="col-lg-3 text-lg-start col-md-3 text-md-start">
                                        <select class="form-select" name="language_type" id="language_type" aria-label="Select example">
                                            <option value="en" {{ $users->language_type === 'en' ? 'selected' : '' }}>English</option>
                                            <option value="th" {{ $users->language_type === 'th' ? 'selected' : '' }}>ไทย (Thai)</option>
                                        </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow my-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5 text-lg-end col-md-3 text-md-end col-4 text-start">
                                    <label class="py-3 fw-bold fs-6 text-gray-800" for="">
                                        Login ID :
                                    </label>
                                </div>
                                <div class="col-lg-5 text-lg-start col-md-6 text-md-start col-6 text-start pb-5">
                                    <label class="py-3" for="">
                                        {{$users->loginid}}
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 text-lg-end col-md-3 text-md-end col-12 text-start">
                                    <label class="py-3 pb-5 fw-bold fs-6 text-gray-800" for="">
                                        Password :
                                    </label>
                                </div>
                                <div class="pb-5 col-lg-3 text-lg-start col-md-3 text-md-start col-12">
                                    <input type="password" name="password" id="password" class="form-control" >
                                </div>
                                <div class="col-lg-4 text-lg-start col-md-6 text-md-start col-12 text-start">
                                    <label class="py-3 fw-bold fs-6 text-gray-800" for="">
                                        (Capital, Small, Number characters needed 8 - 15 length.)
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 text-lg-end col-md-3 text-md-end col-12 text-start">
                                    <label class="py-3 pb-5 fw-bold fs-6 text-gray-800" for="">
                                        Password (Confirm) :
                                    </label>
                                </div>
                                <div class="col-lg-3 text-lg-start col-md-3 text-md-end col-12">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success btn-lg float-end "><i
                                class="fa-solid fa-floppy-disk"></i>&nbsp;Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-default-layout>