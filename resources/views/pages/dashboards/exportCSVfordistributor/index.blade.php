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
                <h1 class="mb-7">Export CSV for distributor</h1>
                <form action="">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 text-lg-end col-md-3 text-md-end col-4 text-start">
                                    <label class="py-3 fw-bold fs-6 text-gray-800" for="">
                                        Distributor :
                                    </label>
                                </div>
                                <div class="mb-5 col-lg-4 text-lg-start col-md-4 text-md-start col-8 text-start">
                                    <label class="py-3" for="">
                                        text
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 text-lg-end col-md-3 text-md-end">
                                    <label class="py-3 fw-bold fs-6 text-gray-800" for="">
                                        Date :
                                    </label>
                                </div>
                                <div class="col-lg-2 col-md-2">
                                    <input type="date" class="form-control" name="" id="">
                                </div>
                                <div class="ps-13 col-lg-1 text-lg-start col-md-1 text-md-start">
                                    <label class="fw-bold fs-1 text-gray-800" for="">
                                        ~
                                    </label>
                                </div>
                                <div class="col-lg-2 col-md-2 col-12 mb-3">
                                    <input type="date" class="form-control" name="" id="">
                                </div>
                                <div class="col-lg-4 text-lg-end col-md-4 text-md-end col-12">
                                    <button class="btn btn-primary"><i class="fs-3 bi bi-download"></i>&nbsp;Download
                                        CSV</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-default-layout>
