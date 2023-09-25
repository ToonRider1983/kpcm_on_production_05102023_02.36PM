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
        <div class="text-start">
            <label class="mb-2 h1 fw-bold">Industrial Zone - Modify</label>
        </div>
        <div class="text-end h4">
            <label class="pe-10" style="color: red;z-index: 1040;" for=""><b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>&nbsp;=&nbsp;Mandatory Field</label>
        </div>
        <form method="POST" action="{{ route('industrialzone.update', $industrialzone->id) }}">
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
                            <label class="pt-3" for="">{{ $industrialzone->id }}</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Country :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <select class="form-select" name="country_id" id="country">
                                <option value=""></option>
                                    @foreach ($country as $country)
                                        <option value="{{ $country->id }}" @if ($country->id == $industrialzone->country_id) selected @endif>
                                            {{ $country->country_name }}
                                        </option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Industrial Zone Name :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <input class="form-control" name="industrialzone_name" id="industrialZone" value="{{ $industrialzone->industrialzone_name }}">
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
                            <label class="pt-3" for=""><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ \Carbon\Carbon::parse($industrialzone->created_at)->format('d/m/Y') }}&nbsp;{{ \Carbon\Carbon::parse($industrialzone->created_at)->format('H:i') }}&nbsp;
                                <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $industrialzone->created_by }}
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start py-3">
                            Updated :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label class="pt-3" for=""><i class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ \Carbon\Carbon::parse($industrialzone->updated_at)->format('d/m/Y') }}&nbsp;{{ \Carbon\Carbon::parse($industrialzone->updated_at)->format('H:i') }}&nbsp;
                                <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $industrialzone->updated_by }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <a href="{{ url('/industrialzone') }}" class="btn btn-primary btn-sm float-start"><i
                        class="fa-solid fa-backward"></i>&nbsp;Cencle</a>
                <button type="submit" class="btn btn-success btn-sm float-end "><i
                        class="fa-solid fa-floppy-disk"></i>&nbsp;Save</button>
            </div>
        </form>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @csrf
</x-default-layout>
