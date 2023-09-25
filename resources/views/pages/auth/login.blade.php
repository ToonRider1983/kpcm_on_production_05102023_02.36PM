<x-auth-layout>
    <div class="card border border-1 shadow">
        <div class="card-body">
            <!--begin::Form-->
            <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="/" action="login">
                @csrf
                <!--begin::Heading-->
                <div class="text-center mb-11">
                    <!--begin::Title-->
                    <h1 class="text-dark fw-bolder mb-3">
                        Please Sign In
                    </h1>
                    <!--end::Title-->

                    <!--begin::Subtitle-->

                    <!--end::Subtitle--->
                </div>
                <!--begin::Heading-->

                <!--begin::Login options-->

                <!--end::Login options-->

                <!--begin::Separator-->

                <!--end::Separator-->

                <!--begin::Input group--->
                <div class="fv-row mb-5">
                    <!--begin::Email-->
                    <div class="row">
                        <div class="col-lg-3 text-lg-start col-md-3 text-md-start">
                            <label class="py-3 fw-bold fs-6 text-gray-900" for="">Login ID:</label>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <input type="text" placeholder="Username" name="input_type" id="input_type" autocomplete="off"
                        class="form-control bg-transparent" value="" />
                        </div>
                    </div>
                    
                    <!--end::Email-->
                </div>

                <!--end::Input group--->
                <div class="fv-row mb-5">
                    <!--begin::Password-->
                    <div class="row">
                        <div class="col-lg-3 text-lg-start col-md-3 text-md-start">
                            <label class="py-3 fw-bold fs-6 text-gray-900" for="">Password:</label>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <input type="password" placeholder="Password" name="password" autocomplete="off"
                        class="form-control bg-transparent" value="" />
                        </div>
                    </div>
                    <!--end::Password-->
                </div>
                <!--end::Input group--->
                
                <!--begin::Submit button-->
                <div class="col mb-5 text-center">
                    <button type="submit" id="kt_sign_in_submit" class="btn btn-info " style="width: 25%">
                        <i class="fa-solid fa-right-to-bracket" ></i> @include('partials/general/_button-indicator', ['label' => 'Login'])
                    </button>
                </div>
                <!--end::Submit button-->

                <!--begin::Wrapper-->
                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold">
                    <div></div>

                    <!--begin::Link-->
                    <a href="/forgot-password" class="link-primary">
                        Forgot Password ?
                    </a>
                    <!--end::Link-->
                </div>
                <!--end::Wrapper-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</x-auth-layout>