<x-default-layout>
    <style>
        html,
        body {
            height: 100%;
        }
    </style>

    <div class="container">
        <div class="h2 p-4">Mail Master - Result</div>

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
                            <label for="">{{ $emails -> id }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-4 text-start">
                            Country :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-8 text-start pb-5">
                            <label for="">{{ $emails -> ContryName}}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-4 text-start">
                            Mail Type :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-8 text-start pb-5">
                            <label for="">
                                @if($emails->typename == '1')
                                Kobelco Judge
                                @elseif($emails->typename == '2')
                                Project Time out
                                @elseif($emails->typename == '3')
                                Free Project
                                @endif</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Subject :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for="">{{ $emails -> email_subject1 }}</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Body :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for="">{{ $emails ->  email_body1 }}</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Footer :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for="">{{ $emails -> email_footer }}</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-4 text-start">
                            Day Count :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-8 text-start pb-5">
                            <label for="">{{ $emails -> days }}</label>
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
                            <label for=""><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ \Carbon\Carbon::parse($emails->created_at)->format('d/m/Y') }}&nbsp;{{ \Carbon\Carbon::parse($emails->created_at)->format('H:i') }}&nbsp;
                                <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $emails->created_by }}
                            </label>
                 </label>       
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Updated :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for=""><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ \Carbon\Carbon::parse($emails->updated_at)->format('d/m/Y') }}&nbsp;{{ \Carbon\Carbon::parse($emails->updated_at)->format('H:i') }}&nbsp;
                                <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $emails->updated_by }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{ url('/emails') }}" class="btn btn-primary btn-sm float-start"
                style="box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);"><i class="fa-solid fa-forward"></i>&nbsp;Back To List</a>
        </form>

    </div>

</x-default-layout>