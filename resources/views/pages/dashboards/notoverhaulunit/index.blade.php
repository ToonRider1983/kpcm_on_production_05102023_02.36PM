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

            .check_radio {
                display: block;
                width: 100%;

            }
        }
    </style>

    <div class="container">
        <div class="card" style="background-color: #F7F7F7">
            <div class="row mt-5">
                <label class="h1 mb-5 fw-bold">Not Overhaul Unit</label>
                <form action="{{ route('notoverhaulunit.export')}}" method="GET">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 text-lg-end col-md-3 text-md-end">
                                    <label class="py-3 fw-bold fs-6 text-gray-800" for="">
                                        Period :
                                    </label>
                                </div>
                                <div class="col-lg-2 col-md-2">
                                    <input type="date" class="form-control" name="start_date"
                                    value="{{ $request->has('start_date') ? $request->input('start_date') : old('start_date') }}"
                                    placeholder="Start Date" aria-label="start_date"
                                    aria-describedby="basic-addon1" />
                                </div>
                                <div class="ps-13 col-lg-1 text-lg-start col-md-1 text-md-start">
                                    <label class="fw-bold fs-1 text-gray-800" for="">
                                        ~
                                    </label>
                                </div>
                                <div class="col-lg-2 col-md-2 col-12 mb-3">
                                    <input type="date" class="form-control" name="end_date"
                                    value="{{ $request->has('end_date') ? $request->input('end_date') : old('end_date') }}"
                                    placeholder="End Date" aria-label="end_date"
                                    aria-describedby="basic-addon1" />
                                </div>
                                <div class="col-lg-4 text-lg-end col-md-4 text-md-end col-12">
                                    <a href="{{ route('notoverhaulunit.export', [
                                        'start_date' => request('start_date'),
                                        'end_date' => request('end_date'),
                                         ]) }}"><button type="submit" class="btn btn-primary"><i class="fs-3 bi bi-download"></i>&nbsp;Download
                                        CSV</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-default-layout>
