@extends('layout.master')

@section('content')

    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="d-flex flex-column flex-center flex-column-fluid">
            <div class="d-flex flex-column flex-center text-center p-10">
                <div class="card card-flush w-lg-650px py-5">
                    <div class="card-body py-15 py-lg-20">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
