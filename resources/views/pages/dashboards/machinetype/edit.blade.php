<x-default-layout>
    <style>
        html,
        body {
            height: 100%;
        }

        .input-responsive {
            width: 72%;
        }

        @media screen and (max-width: 500px) {
            .input-responsive {
                width: 100%;
            }
        }
    </style>

    <div class="container">
        <div class="h2 p-4">Machine Type Master - Modify</div>
        <form method="POST" action="{{ route('machinetype.update', $machinetype->id) }}">
            @csrf
            @method('PUT')

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            ID :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label class="pt-3" for="">{{ $machinetype->id }}</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Machine Type1 Name :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <input type="text" name="machinetype1_name" class="form-control" value="{{ $machinetype->machinetype1_name }}">
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
                            <label class="py-3" for=""><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ \Carbon\Carbon::parse($machinetype->created_at)->format('d/m/Y') }}&nbsp;{{ \Carbon\Carbon::parse($machinetype->created_at)->format('H:i') }}&nbsp;
                                <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $machinetype->created_by }}
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start py-3">
                            Updated :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label class="py-3" for=""><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ \Carbon\Carbon::parse($machinetype->updated_at)->format('d/m/Y') }}&nbsp;{{ \Carbon\Carbon::parse($machinetype->updated_at)->format('H:i') }}&nbsp;
                                <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $machinetype->updated_by }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <a href="{{ url('/machinetype') }}" class="btn btn-primary btn-sm float-start"><i
                        class="fa-solid fa-backward"></i>&nbsp;Cencle</a>
                <button type="submit" class="btn btn-success btn-sm float-end "><i
                        class="fa-solid fa-floppy-disk"></i>&nbsp;Save</button>
            </div>
        </form>
    </div>
</x-default-layout>
