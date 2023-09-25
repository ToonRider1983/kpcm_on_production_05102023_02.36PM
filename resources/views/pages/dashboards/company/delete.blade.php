<x-default-layout>
    <div class="row" style="margin:20px;">
        <div class="col-12">
            <br>
            <h2>DELETE</h2>
            <br>
            <br>
            <form action="" method="get">
                
                <input type="text" name="keyword" value="{{ $companycodee -> company_name}}" >
    
            </from>
    
    
    
    
    
        </div>
    </div>
    
    
    <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Companyname</th>
                        <th scope="col">Shot Name</th>
                        <th scope="col">Country</th>
                        <th scope="col">Company Type</th>
                        <th scope="col">Updated</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @if (!@empty($querycom))
                @foreach ($querycom as $querys)
                
                
                <tr>
                    <th>{{ $querys -> id }}</th>
                    <th>{{ $querys -> company_name }}</th>
                    <th>{{ $querys -> company_short_name }}</th>
                    <th>{{ $querys -> country_id }}</th>
                    <th>{{ $querys -> company_type }}</th>
                    <th>{{ $querys -> updated_at }}</th>
                    <th>
                                         
                       
                       <!-- <td><a href="{{ url('/companies/'.$querys -> companycode) }}" class="btn btn-success" >Edit</a></td> -->
                       <!--  <td><a href="{{ url('/companies/'.$querys -> companycode ) }}" class="btn btn-danger" >Delete</a></td> -->
                        <td>
                            <a href="{{ url('/companies/'.$querys -> id) }}" title="View company"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                            <a href="{{ url('/companies/'.$querys -> id . '/edit') }}" title="Edit company"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                            <form method="POST" action="{{ url('/companies' . '/' . $querys -> id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            </form>
                        </td>
                 
                    </th>
                </tr>
                @endforeach
                
              {{--  <tbody>
                    @foreach ($companys as $company)
                    <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>{{ $company -> companycode }}</td>
                        <td>{{ $company -> companyname }}</td>
                        <td>{{ $company -> countrys -> countryname }} </td>  
                    </tr>
                        
                    @endforeach
                </tbody>
    
                --}}            
                @endif
            </tbody>
                </table>
</x-default-layout>
