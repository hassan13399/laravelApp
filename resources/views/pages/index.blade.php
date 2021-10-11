


@extends('layouts.app')

@section('content')

            
<div class="container mt-5">

    @if (session('msg'))

        <div class="alert alert-secondary"> {{session('msg')}} </div>
        
    @endif

      <form method="POST" action= "{{route('import')}}" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
          <label for="product"> {{  __('Import File') }} </label>
          <input type="file" class="form-control" aria-describedby="file" placeholder="File" name="file" >
          
          @error('file')
          <span class="aelrt alert-warning">          
              <strong>{{ $message }}</strong>
          </span>
          @enderror

        </div>

        
        <button type="submit" class="btn btn-primary">Submit</button>
        
      </form> 
      
      <form action="{{route('generate')}}"> <button type="submit" class="btn btn-success float-lg-right">Generate file to Download</button> </form>

      

      @if (session('updateMsg'))

      <div class="alert alert-success"> {{session('updateMsg')}} </div>
      
  @endif


<table class="table table-hover mt-5 border-1">

    <thead>
        <th>ID</th>
        <th>SKU</th>
        <th>Stock</th>

        
    </thead>

    
        
        @foreach ($for as $mem)
            <tr>
            <td> {{$mem['stock_id']}} </td>
            <td> {{$mem['varient']}} </td>
            <td> {{$mem['stock_num']}} </td>
            
        </tr>
        @endforeach

    


</table>




<form action="{{route('export')}}"> <button type="submit" class="btn btn-success float-lg-right">Downlaod</button> </form>

<br><br>


    

</div>

@endsection

