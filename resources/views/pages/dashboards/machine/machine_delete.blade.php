<x-default-layout>
    <style>
        html,
        body {
            height: 100%;
        }
    </style>

    <div class="container">
        <div class="h2 p-4">Machine Master - Delete</div>

        <form method="get" action="">
            @csrf
            @method('PUT')

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            ID :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for="">{{ $machine->id }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Serial# :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for="">{{ $machine->serial }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Factory :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for="">
                                @if($machine->factory_type_name == '1')
                                KCMS
                                @elseif($machine->factory_type_name == '2')
                                KSL
                                @elseif($machine->factory_type_name == '3')
                                ETC
                                @endif
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Compressor Type :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for="">
                                @if($machine->compressor_type_name == '1')
                                    Oil Flooded
                                @elseif($machine->compressor_type_name == '2')
                                    Oil Free
                                @endif
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Machine Type Code :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for="">{{ ($machine->machine_cd) }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Customer Machine# :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for="">{{ ($machine->customer_machine_no) }}</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Kobelco# :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for="">{{ ($machine->kcth_order_cd) }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            KSL/KCMS# :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for="">{{ ($machine->ksl_order_cd) }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            KMA# :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for="">{{ ($machine->kma_order_cd) }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Service Company :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for="">{{ ($machine->com_name) }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            End User :
                        </div>  
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label class="pt-3" for="">@if($machine->cus_name1 && $machine->cus_name2)
                                {{ $machine->cus_name1 }} / {{ $machine->cus_name2 }}
                            @elseif($machine->cus_name1)
                                {{ $machine->cus_name1 }}
                            @elseif($machine->cus_name2)
                                {{ $machine->cus_name2 }}
                            @endif</label>
                        </div>
                    </div>
                    <div class="row pb-5">
                        <div class="fw-bold fs-6 text-gray-800 col-md-5 text-md-end col-5 text-start">
                            [Customer CD] :
                        </div>
                        <div class="col-md-5 text-md-start col-7 text-start">
                            <span id="customer_cd">{{ ($machine->cus_code) }}</span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-5 text-md-end col-5 text-start">
                            [Country] :
                        </div>
                        <div class="col-lg-2 text-lg-start col-md-5 text-md-start col-7 text-start pb-5">
                            <span id="country"> {{ ($machine->country_cus) }}</span>
                        </div>
                        <div class="fw-bold fs-6 text-gray-800 col-lg-2 text-lg-end col-md-5 text-md-end col-6 text-start">
                            [Industrial Zone] :
                        </div>
                        <div class="col-lg-2 text-lg-start col-md-5 text-md-start col-6 text-start pb-5">
                            <span id="industrialzone"> {{ ($machine->industrialzone_id) }}</span>
                        </div>
                    </div>
                    
                    <div class="row pt-5">
                        <div class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-5 text-md-end col-4 text-start">
                            [Address] :
                        </div>
                        <div class="col-lg-7 text-lg-start col-md-7 text-md-start col-8 text-start">
                            <span id="address1">{{ ($machine->address1) }}</span>
                            <br>
                            <span id="address2">{{ ($machine->address2) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Commisioning Date :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for="">{{ ($machine->testrun_dt) }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Factory C/R Date :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for="">{{ ($machine->dispatch_dt) }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Operation Status :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for="">
                                @if($machine->operstat_name == '1')
                                    In Operation
                                @elseif($machine->operstat_name == '2')
                                    Stopped
                                @elseif($machine->operstat_name == '3')
                                    Discarded
                                @endif
                                
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Motor :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <span>{{ $machine->motor }}</span>
                            <span>KW</span>
                        </div>                        
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Remark(Kobelco) :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for="">{{ ($machine->remarks) }}</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div class="h3 col-lg-2 text-lg-end col-md-3 text-md-start col-6 text-start">
                            <u>For Distributor</u>
                        </div>
                    </div>
                    <div class="row">
                        <div class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Remarks1 :
                        </div>
                             <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                                <label for="remarks_distributor1">{{ ($machine->remarks_distributor1) }}</label>
                            </div>
                    </div>
                    <div class="row">
                        <div class="fw-bold fs-6 text-gray-800 py-3 col-lg-5 text-lg-end col-md-5 text-md-end col-12 text-start">
                            Remarks2 :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start">
                            <label for="remarks_distributor2">{{ ($machine->remarks_distributor2) }}</label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card shadow my-4">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Created :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for=""><i
                                class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ \Carbon\Carbon::parse($machine->created_at)->format('d/m/Y') }}&nbsp;{{ \Carbon\Carbon::parse($machine->created_at)->format('H:i') }}&nbsp;
                            <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $machine->created_by }}
                        </label>
                        </div>
                    </div>
                    <div class="row">
                        <div
                            class="fw-bold fs-6 text-gray-800 col-lg-5 text-lg-end col-md-6 text-md-end col-12 text-start">
                            Updated :
                        </div>
                        <div class="col-lg-5 text-lg-start col-md-5 text-md-start col-12 text-start pb-5">
                            <label for=""><i
                                class="fw-bold text-gray-800 fa-solid fa-calendar-days"></i>&nbsp;{{ \Carbon\Carbon::parse($machine->updated_at)->format('d/m/Y') }}&nbsp;{{ \Carbon\Carbon::parse($machine->updated_at)->format('H:i') }}&nbsp;
                            <i class="fw-bold text-gray-800 fa-solid fa-user"></i>&nbsp;{{ $machine->updated_by }}
                        </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ url('/machine') }}" class="h6 btn btn-primary btn-sm float-start"><i
                        class="fa-solid fa-backward"></i>&nbsp;Back</a>
                <form method="POST" action="" accept-charset="UTF-8" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn-sm btn btn-danger" title="Delete Student"
                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa-sharp fa-solid fa-xmark"
                            aria-hidden="true"></i>Delete</button>
                </form>
            </div>
                    {{-- <a href="{{ url('/machine') }}" class="h6 btn btn-primary btn-sm float-start"><i
                        class="fa-solid fa-backward"></i>&nbsp;Back</a>
                <button type="submit" class="h6 btn btn-danger btn-sm float-end"><i
                        class="fa-solid fa-circle-xmark"></i>&nbsp;Delete</button> --}}
        </form>

    </div> 
</x-default-layout>