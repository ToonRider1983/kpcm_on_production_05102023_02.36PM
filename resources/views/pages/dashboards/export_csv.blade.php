<x-default-layout>
    <style>
        .card {
            background-color: #fff;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
        }

        .col-add {
            display: flex;
        }

        .center {
            display: flex;
            justify-content: center;
        }
    </style>

    <div class="container">
        <label class="h1 mb-5 fw-bold">CSV Export</label>

        <form method="POST" action="">
            @csrf
            @method('PUT')

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-2 text-lg-start col-md-2 text-md-start col-4">
                            Machine :
                        </div>
                        <div class="col-lg-10 text-lg-end col-md-10 text-md-end col-8">
                            <div class="d-flex align-content-center flex-wrap row">
                                <span class="col-lg-9 text-lg-end col-md-8">

                                </span>
                                <span class="col-lg-3 text-lg-end col-md-4 col-12">
                                    <div>
                                        <button type="button" class="btn btn-primary mb-2 container"><i
                                            class="fa-solid fa-download"></i>&nbsp;Download CSV</button>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-2 text-lg-start col-md-2 text-md-start col-4">
                            End User :
                        </div>
                        <div class="col-lg-10 text-lg-end col-md-10 text-md-end col-8">
                            <div class="d-flex align-content-center flex-wrap row">
                                <span class="col-lg-9 text-lg-end col-md-8">

                                </span>
                                <span class="col-lg-3 text-lg-end col-md-4 col-12">
                                    <div>
                                        <button type="button" class="btn btn-primary mb-2 container"><i
                                            class="fa-solid fa-download"></i>&nbsp;Download CSV</button>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-2 text-lg-start col-md-2 text-md-start col-12">
                             Service :
                        </div>
                        <div class="col-lg-10 text-lg-end col-md-10 text-md-end col-12">
                            <div class="d-flex align-content-center flex-wrap row">
                                <span class="col-lg-3 text-lg-start col-md-2 col-5">
                                    <div>
                                        <input type="date" class="form-control" name="keyword"
                                            aria-label="company" aria-describedby="basic-addon1" />
                                    </div>
                                </span>
                                <span class="col-lg-1 text-lg-end col-md-1 col-1">

                                </span>
                                <span class="col-lg-1 text-lg-start col-md-1 col-1 text-start date-position"
                                    style="font-size: 25px">
                                    ~
                                </span>
                                <span class="col-lg-3 text-lg-end col-md-2 col-5 text-start">
                                    <div>
                                        <input type="date" class="form-control" name="keyword"
                                            aria-label="company" aria-describedby="basic-addon1" />
                                    </div>
                                </span>
                                <span class="col-lg-1 text-lg-end col-md-2 col-12 pb-2">

                                </span>
                                <span class="col-lg-3 text-lg-end col-md-4 col-sm-12 text-sm-start">
                                    <div>
                                        <button type="button" class="btn btn-primary mb-2 container"><i
                                            class="fa-solid fa-download"></i>&nbsp;Download CSV</button>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <a href="" class="btn btn-primary btn-sm float-start"><i
                    class="fa-solid fa-backward"></i>&nbsp;Cencle</a>
        </form>

    </div>
</x-default-layout>
