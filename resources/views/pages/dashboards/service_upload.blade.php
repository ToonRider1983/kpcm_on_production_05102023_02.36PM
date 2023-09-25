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
        <label class="h1 mb-5 fw-bold">Service Upload</label>

        <form method="POST" action="">
            @csrf
            @method('PUT')

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-6 col-lg-2 text-lg-start col-md-2 text-md-start col-12 text-start">
                            Service File :<b class="h1 pt-4" style="color: red;z-index: 1040;">&#42;</b>
                        </div>
                        <div class="col-lg-10 text-lg-start py-3 col-md-10 text-md-start col-12 text-start">
                            <div class="row">
                                <span class="col-lg-8 text-lg-end col-md-8 text-md-end col-12 pb-2">
                                    <input type="file" class="form-control" aria-label="file example" required>
                                </span>
                                <span class="col-lg-1 col-md-1 col-1"></span>
                                <span class="col-lg-3 text-lg-end col-md-3 text-md-end col-12 container">
                                    <a href=""><button type="button" class="btn btn-primary mb-2 container"><i
                                            class="fa-solid fa-floppy-disk"></i>&nbsp;Upload</button></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</x-default-layout>
