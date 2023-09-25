<x-default-layout>
    <style>
        html,
        body {
            height: 100%;
        }
    </style>

    <div class="container">
        <div class="h2 p-4">Machine Type Master - Delete</div>

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
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-10 text-start">
                            {{-- <label for="">{{ $machinetype->id }}</label> --}}
                            <label for="">text</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-6 text-start">
                            Machine type name :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-6 text-start ">
                            {{-- <label for="">{{ $machinetype->machinetype1_name }}</label> --}}
                            <label for="">text</label>
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
                            {{-- <label for=""><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ $machinetype->created_at }}&nbsp;
                                <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $machinetype->created_by }}</label> --}}
                                <label for="">text</label>
                            </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Updated :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            {{-- <label for=""><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ $machinetype->updated_at }}&nbsp;
                                <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $machinetype->updated_by }}</label> --}}
                                <label for="">text</label>
                            </div>
                    </div>
                </div>
            </div>

                <a href="{{ url('/machinetype') }}" class="h6 btn btn-primary btn-sm float-start"><i
                    class="fa-solid fa-backward"></i>&nbsp;Back</a>
            <button type="submit" class="h6 btn btn-danger btn-sm float-end"><i
                    class="fa-solid fa-circle-xmark"></i>&nbsp;Delete</button>
        </form>

    </div>
</x-default-layout>
