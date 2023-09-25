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
        <div class="h2 p-4">Emails Master - Edit</div>
        <form method="POST" action="{{ route('emails.update', $emails ->id) }}">
            @csrf
            @method('PUT')
            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            ID :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <input type="text" class="form-control" value="{{ $emails -> id }}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Country :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <select name="country_id" id="country_id" class="form-select">
                                @if (!@empty($countries))
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            @if ($country->id == $emails->country_id) selected @endif>
                                            {{ $country->country_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Mail Type :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <div class="form-check form-check-custom py-2">
                            <input class="form-check-input" type="radio" name="email_type" value="1" id="email_type" {{ $emails->email_type == 1 ? 'checked' : '' }} />
                            <label class="form-check-label" for="Kobelco Judge">Kobelco Judge</label>
                            </div>
                            <div class="form-check form-check-custom py-2">
                            <input class="form-check-input" type="radio" name="email_type" value="2" id="email_type" {{ $emails->email_type == 2 ? 'checked' : '' }} />
                            <label class="form-check-label" for="Project Time out">Project Time out</label>
                            </div>
                            <div class="form-check form-check-custom py-2">
                            <input class="form-check-input" type="radio" name="email_type" value="3" id="email_type" {{ $emails->email_type == 3 ? 'checked' : '' }} />
                            <label class="form-check-label" for="Free Project">Free Project</label>
                            </div>
                            <label for="" class="">
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
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Subject : (Free)
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <textarea type="text" name="email_subject1" value="" class="form-control">{{ $emails -> email_subject1 }}</textarea>
                        </div>
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            (OK) :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <textarea type="text" name="email_subject2" value="" class="form-control">{{ $emails -> email_subject2 }}</textarea>
                        </div>  
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            (NG) :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <textarea type="text" name="email_subject3" value="" class="form-control">{{ $emails -> email_subject3 }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Body : (Free)
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <textarea type="text" name="email_body1" class="form-control">{{ $emails -> email_body1 }}</textarea>
                        </div>
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            (OK) :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <textarea type="text" name="email_body2" class="form-control">{{ $emails -> email_body2 }}</textarea>
                        </div>  
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            (NG) :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <textarea type="text" name="email_body3" class="form-control">{{ $emails -> email_body3 }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Footer :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <input type="text"  name="email_footer" class="form-control"value="{{ $emails -> email_footer }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Day Count :
                        </div>
                        <div class="col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start pb-5">
                            <input type="number" class="form-control" name="days" value="{{ $emails -> days}}">
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
                            <label for=""> {{ $emails->created_at }}
                                           {{ $emails->created_by }} </label>       
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start py-3">
                            Updated :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for="">{{ $emails->updated_at }}
                                          {{ $emails->updated_by }}</label>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <a href="{{ url('/emails') }}" class="btn btn-primary btn-sm float-start"><i
                        class="fa-solid fa-backward"></i>&nbsp;Cancel</a>
                <button type="submit" class="btn btn-success btn-sm float-end "><i
                        class="fa-solid fa-floppy-disk"></i>&nbsp;Save</button>
            </div>
        </form>
    </div>
</x-default-layout>