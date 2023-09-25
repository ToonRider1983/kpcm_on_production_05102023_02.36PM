{{-- <x-auth-layout>

    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form" data-kt-redirect-url="/reset-password" action="#">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">
                Forgot Password ?
            </h1>
            <!--end::Title-->

            <!--begin::Link-->
            <div class="text-gray-500 fw-semibold fs-6">
                Enter your email to reset your password.
            </div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->

        <!--begin::Input group--->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent"/>
            <!--end::Email-->
        </div>

        <!--begin::Actions-->
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            <button type="button" id="kt_password_reset_submit" class="btn btn-primary me-4">
                @include('partials/general/_button-indicator', ['label' => 'Submit'])
            </button>

            <a href="/login" class="btn btn-light">Cancel</a>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->

</x-auth-layout> --}}


<x-auth-layout>
    <div class="card border border-1 shadow">
        <div class="card-body">
            <!--begin::Form-->
            <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form"
                data-kt-redirect-url="/reset-password" action="#">
                @csrf
                <!--begin::Heading-->
                <div class="text-start mb-10">
                    <!--begin::Title-->
                    <h1 class="text-dark fw-bolder mb-3">
                        Password Reset
                    </h1>
                    <!--end::Title-->
    
                    <!--begin::Link-->
                    <div class="text-gray-800 fw-semibold fs-5">
                        It will send URL to change your login password. <br>
                        Please input your registered email address and click send button.
                    </div>
                    <!--end::Link-->
                </div>
                <!--begin::Heading-->

                <!--begin::Input group--->
                <div class="fv-row mb-8">
                    <!--begin::Email-->
                    <input type="text" placeholder="Email" name="email" autocomplete="off"
                        class="form-control bg-transparent" />
                    <!--end::Email-->
                </div>

                <!--begin::Actions-->
                <div class="d-flex flex-wrap justify-content-end pb-lg-0">
                    <a href="/login" class="btn btn-info"><i class="fa-solid fa-backward"></i>&nbsp;Cancel</a>
                    &nbsp;&nbsp;
                    <button type="button" id="kt_password_reset_submit" class="btn btn-info me-4">
                        <i class="fa-solid fa-envelope"></i> @include('partials/general/_button-indicator', ['label' => 'Send'])
                    </button>

                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</x-auth-layout>
