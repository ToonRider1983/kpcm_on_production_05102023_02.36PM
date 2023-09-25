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
                <label class="h1 mb-5 fw-bold">Service Summary - List</label>
                <form action="">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="accordion accordion-icon-toggle" id="kt_accordion_2">
                                <div>
                                    <div class="accordion-header py-8 d-flex" data-bs-toggle="collapse"
                                        data-bs-target="#kt_accordion_2_item_1">
                                        <span class="accordion-icon">
                                            <i class="ki-duotone bi bi-caret-right-fill fs-1"><span
                                                    class="path1"></span><span class="path2"></span></i>
                                        </span>
                                        <h1 class="fs-1 fw-semibold mb-0 ms-4">Search Condition</h1>
                                    </div>
                                    <div id="kt_accordion_2_item_1" class="fs-6 collapse show ps-10"
                                        data-bs-parent="#kt_accordion_2">
                                        <div class="row mb-4">
                                            <div
                                                class="col-lg-12 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                <u class="fw-bold fs-3 text-gray-700">
                                                    Scope
                                                </u>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-lg-3 text-lg-end col-md-3 text-md-start col-12 text-start">
                                                    <label class="py-3 fw-bold fs-6 text-gray-800" for="">
                                                        Country :
                                                    </label>
                                                </div>
                                                <div class="pb-5 col-lg-3 col-md-6 text-md-start col-12 text-start">
                                                    <input type="text" class="form-control" name=""
                                                        id="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-lg-3 text-lg-end col-md-3 text-md-start col-12 text-start">
                                                    <label class="py-3 fw-bold fs-6 text-gray-800" for="">
                                                        Distributor :
                                                    </label>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-12 mb-3">
                                                    <input type="text" class="form-control" name=""
                                                        id="">
                                                </div>
                                                <div class="col-lg-6 text-lg-end col-md-3 text-md-end">
                                                    <button class="btn btn-success"><i
                                                            class="fs-3 bi bi-globe-americas"></i>&nbsp;Show
                                                        Web</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div
                                                class="col-lg-12 text-lg-start col-md-12 text-md-start col-12 text-start">
                                                <u class="fw-bold fs-3 text-gray-700">
                                                    Print Setting
                                                </u>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3 text-lg-end col-md-3 text-md-start col-12">
                                                    <label class="py-3 fw-bold fs-6 text-gray-800" for="">
                                                        Timeline :
                                                    </label>
                                                </div>
                                                <div class="pb-5 col-lg-9 col-md-9 col-12">
                                                    <div
                                                        class="check_radio form-check form-check-custom form-check-solid py-3 px-2">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-auto">
                                                                <input class="form-check-input" type="radio"
                                                                    value="" name="Timeline" id="Week" />
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-auto">
                                                                <label class="form-check-label fw-bold fs-6 text-gray-800" for="Week">
                                                                    Week
                                                                </label>
                                                            </div>
                                                        </div>
                                                        &nbsp;
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-auto">
                                                                <input class="form-check-input" type="radio" value=""
                                                            name="Timeline" id="Month" />
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-auto">
                                                                <label class="form-check-label fw-bold fs-6 text-gray-800" for="Month">
                                                                    Month
                                                                </label>
                                                            </div>
                                                        </div>
                                                        &nbsp;
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-auto">
                                                                <input class="form-check-input" type="radio" value=""
                                                            name="Timeline" id="Half-Year" />
                                                            </div>
                                                            <div class="col-lg-auto col-md-auto col-auto">
                                                                <label class="form-check-label fw-bold fs-6 text-gray-800" for="Half-Year">
                                                                    Half-Year
                                                                </label>
                                                            </div>
                                                        </div>
                                                        &nbsp;
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-auto">
                                                                <input class="form-check-input" type="radio" value=""
                                                            name="Timeline" id="Year" />
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-auto">
                                                                <label class="form-check-label fw-bold fs-6 text-gray-800" for="Year">
                                                                    Year
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3 text-lg-end col-md-3 text-md-start">
                                                    <label class="py-3 fw-bold fs-6 text-gray-800" for="">
                                                        Service Date :
                                                    </label>
                                                </div>
                                                <div class="col-lg-2 col-md-2">
                                                    <select class="form-select" name="" id="">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                                <div class="ps-13 col-lg-1 text-lg-start col-md-1 text-md-start">
                                                    <label class="fw-bold fs-1 text-gray-800" for="">
                                                        ~
                                                    </label>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-12 mb-3">
                                                    <select class="form-select" name="" id="">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 text-lg-end col-md-4 text-md-end col-12">
                                                    <button class="btn btn-primary"><i
                                                            class="fs-3 bi bi-file-earmark-fill"></i>&nbsp;Download
                                                        Excel</button>
                                                </div>
                                                <div class="pt-3 col-lg-12 text-lg-center col-md-12 text-md-center">
                                                    (Maximun period is 2 years for Week summary, 10 years for the other
                                                    summaries)
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-default-layout>
