<x-default-layout>
    <style>
        html,
        body {
            height: 100%;
        }
    </style>

    <div class="container">
        <div class="h2 p-4">User Master - Browse</div>

        <form method="get" action="">
            @csrf
            @method('PUT')

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-2 text-start">
                            ID :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-10 text-start pb-5">
                            <label for="">{{ $user->id }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Company :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start">
                            <label for="">{{ $user->companyname }}</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-4 text-start">
                            User Scope :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-8 text-start pb-5">
                            <label for="">@if($user->user_scope == 1)
                                            Local User
                                          @elseif($user->user_scope == 2)
                                            Own Distributor
                                          @elseif($user->user_scope == 3)
                                            Own Country
                                         @elseif($user->user_scope == 4)
                                            World Wide
                                         @endif</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-4 text-start">
                            Privilege :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-8 text-start">
                              @if ($user->user_privilege_project)
                                <span style="background-color: #2295EB; border-radius: 5px;">Project</span>
                            @endif
                            @if ($user->user_privilege_service)
                                <span style="background-color: #34B913; border-radius: 5px;">Customer Service</span>
                            @endif
                            @if ($user->user_privilege_maintain)
                                <span style="background-color: #9D22B3; border-radius: 5px;">Maintenance</span>
                            @endif
                            @if ($user->user_privilege_judge)
                                <span style="background-color: #F53E32; border-radius: 5px;">Judge</span>
                            @endif
                            @if ($user->user_privilege_editall)
                                <span style="background-color: #FCC005; border-radius: 5px;">Edit All</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-4 text-start">
                            Login ID :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-8 text-start pb-5">
                            <label for="">{{ $user -> loginid }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-4 text-start">
                            Language :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-8 text-start">
                            <label for="">
                                @if ($user->language_type === 'en')
                                    English
                                @elseif ($user->language_type === 'th')
                                    ไทย (Thai)
                                @endif
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-4 text-start">
                            Username :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-8 text-start pb-5">
                            <label for="">{{ $user -> user_name }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Email :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for="">{{ $user->email }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Reference :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start">
                            <label for="">{{ $user -> reference }}</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Created :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for=""><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}&nbsp;{{ \Carbon\Carbon::parse($user->created_at)->format('H:i') }}&nbsp;
                                <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $user->created_by }}
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Updated :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start">
                            <label for=""><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y') }}&nbsp;{{ \Carbon\Carbon::parse($user->updated_at)->format('H:i') }}&nbsp;
                                <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $user->updated_by }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{ url('/user') }}" class="btn btn-primary btn-sm float-start"
                style="box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);"><i class="fa-solid fa-backward"></i>&nbsp;Back</a>
        </form>
    </div>
</x-default-layout>
