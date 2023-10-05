{{-- @extends('layout.master') --}}
@extends(config('app.env') === 'local' ? 'layout.local' : 'layout.production')



@section('content')

    <style>
        .header_auth {
         
            width: 100%;
            height: fit-content;
        }

        .header_auth .size {
            margin-left: 10%;
            padding-top: 2%;
            padding-bottom: 2%;
            width: 12%;
        }

        .footer_auth {
          
            width: 100%;
            height: fit-content;
        }

        .footer_auth label {
            padding-left: 10%; 
            padding-top: 1%;
            padding-bottom: 1%;
        }
    </style>

    @if(config('app.env') === 'local')
        <div class="header_auth row" style="background-color: #808000;">
            <span class="col-3 text-end">
                <img class="p-5" style="height: 70px;" src="{{ image('logos/images/kobelco_100x21.png') }}" alt="">
            </span>
            <span class="col-6 env py-6">
                <label class="rounded px-3 py-2  text-white" style="background-color:red">Test</label>
            </span>
            
        </div>
        <div class="d-flex flex-column flex-root app-root bg-light" id="kt_app_root">
            <div class="d-flex flex-column flex-lg-row flex-md-row flex-row flex-column-fluid">
                <div class="d-flex flex-column flex-lg-row-fluid flex-md-row-fluid flex-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                    <div class="d-flex flex-center flex-column flex-lg-row-fluid flex-md-row-fluid flex-row-fluid">
                        <div class="w-lg-600px w-md-500px w-400px p-10">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer_auth" style="background-color: #808000;">
            <label for="" class="text-white fs-3 fw-bold">Copyright &copy; 2016, Kobelcp Compressors (Thailand) Limited. ALL RIGHT RESERVED.</label>
        </div>

       
    @else
    
    <div class="header_auth row" style="background-color: #033c73;">
        <span class="col-3 text-end">
            <img class="p-5" style="height: 70px;" src="{{ image('logos/images/kobelco_100x21.png') }}" alt="">
        </span>
   
        
    </div>
        <div class="d-flex flex-column flex-root app-root bg-light" id="kt_app_root">
            <div class="d-flex flex-column flex-lg-row flex-md-row flex-row flex-column-fluid">
                <div class="d-flex flex-column flex-lg-row-fluid flex-md-row-fluid flex-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                    <div class="d-flex flex-center flex-column flex-lg-row-fluid flex-md-row-fluid flex-row-fluid">
                        <div class="w-lg-600px w-md-500px w-400px p-10">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer_auth" style="background-color: #033c73;">
            <label for="" class="text-white fs-3 fw-bold">Copyright &copy; 2016, Kobelco Compressors (Thailand) Limited. ALL RIGHT RESERVED.</label>
        </div>

       
    @endif
@endsection