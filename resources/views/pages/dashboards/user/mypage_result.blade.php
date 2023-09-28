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
                    <label class="mb-2 h1 fw-bold">My Page - Result</label>
                </div>
                <form method="POST" action="">
                    @csrf
                    @method('PUT')        
                    <div class="card shadow my-4">
                        <div class="card-body">
                            <div class="row">
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
                                        Email :
                                    </label>
                                </div>
                                <div class="py-3 col-lg-5 text-lg-start pb-5 col-md-3 text-md-start">
                                    {{$users->email}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 text-lg-end col-md-3 text-md-end">
                                    <label class="py-3 pb-5 fw-bold fs-6 text-gray-800" for="">
                                        Language :
                                    </label>
                                </div>
                                <div class="py-3 col-lg-3 text-lg-start col-md-3 text-md-start">
                                    <label for="">
                                        @if($users->language_type == 'th')
                                        Thai
                                        @elseif($users->language_type == 'en')
                                        English
                                        @endif</label>
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
                                <div class="py-3 pb-5 col-lg-3 text-lg-start col-md-3 text-md-start col-12">
                                    {{-- (Same as before) --}}
                                    {{ session('password_message') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-default-layout>