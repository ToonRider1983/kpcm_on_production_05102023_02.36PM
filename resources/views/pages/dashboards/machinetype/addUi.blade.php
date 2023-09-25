<x-default-layout>
    <style>
        .card {
            background-color: #fff;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
        }

        .col-add {
            display: flex;
        }
    </style>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Create Data</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Machinetype Add </h2>
                </div>
                <div>
                    <a href="{{ route('machinetype.index') }}" class="btn btn-primary">Back</a>
                </div>
                <div class="row">
                    <div class="col-lg-md12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('machinetype.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                    <div class="form-group">
                                        <label for="id">Id:</label>
                                        <span id="id">{{ $newId }}</span>
                                    </div>

                                <div class="col-lg-md12">
                                    <div class="form-group my-3">
                                        <strong>Machine Type1 Name</strong>
                                        <input type="text" name="machinetype1_name" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-md12">
                                    <div class="form-group my-3">
                                        <strong>Created</strong>                          
                                    </div>
                                </div>
                                <div class="col-lg-md12">
                                    <div class="form-group my-3">
                                        <strong>Updated</strong>                          
                                    </div>
                                </div>
                                   
                                <div class="col-md-12">
                                    <button type="submit" class="mt-3 btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
    </html>
</x-default-layout>
