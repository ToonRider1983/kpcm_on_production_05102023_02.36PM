<x-default-layout>
    <title> Signature Pad </title>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 

    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" > 

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
  
    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">

    <style>
        .kbw-signature { width: 100%; height: 200px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
        }
    </style>
    <div class="container">

        <div class="row" style="padding-top:9px" >
     
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <label class="h1 mb-5 fw-bold">Service </label>
                    </div>
                    <div class="card-body">
                         @if ($message = Session::get('success'))
                             <div class="alert alert-success  alert-dismissible">
                                 <button type="button" class="close" data-dismiss="alert">×</button>  
                                 <strong>{{ $message }}</strong>
                             </div>
                         @endif
     
                         <form  action="">
                             @csrf
                             <div class="col-md-12">
                                 <label class="" for="">Signature:</label>
                                 <br/>
                                 <div id="sig" ></div>
                                 <br/><br/>
                                 <div style="text-align:right">
                                     <button id="clear" class="btn btn-danger btn-sm">Clear Signature</button>
                                 </div>
                                 <textarea id="signature64" name="signed" style="display: none"></textarea>
                             </div>
                             
                             <br/>
                             <div style="display:none"> <button class="btn btn-success">Save</button></div>
     
                         </form>
                    </div>             
                </div>
          </div>
     
             <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Customer </h5>
                    </div>
                    <div class="card-body">
                         @if ($message = Session::get('success'))
                             <div class="alert alert-success  alert-dismissible">
                                 <button type="button" class="close" data-dismiss="alert">×</button>  
                                 <strong>{{ $message }}</strong>
                             </div>
                         @endif
     
                         <form  action="">
                             @csrf
                             <div class="col-md-12">
                                 <label class="" for="">Signature:</label>
                                 <br/>
                                 <div id="sig1" ></div>
                                 <br/><br/>
                                 <div style="text-align:right">
                                     <button id="clear1" class="btn btn-danger btn-sm">Clear Signature</button>
                                 </div>
                                 <textarea id="signature641" name="signed" style="display: none"></textarea>
                             </div>
                             
                             <br/>
                             <div style="display:none"> <button class="btn btn-success">Save</button></div>
     
                         </form>
                    </div>             
                </div>
            </div>
     
        </div>
       
      
     </div>
     
     
     <script type="text/javascript">
         var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
         $('#clear').click(function(e) {
             e.preventDefault();
             sig.signature('clear');
             $("#signature64").val('');
     
         });
     
         var sig1 = $('#sig1').signature({syncField: '#signature641', syncFormat: 'PNG'});
         $('#clear1').click(function(e) {
             e.preventDefault();
             sig1.signature('clear');
             $("#signature641").val('');
     
         });
     </script>
</x-default-layout>
