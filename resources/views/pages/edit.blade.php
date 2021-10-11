@extends('layouts.app')


@section('content')

   
    <div class="container mt-5">

        <h1> Edit Froms </h1>
    
    <form method="POST" action="/edit">
        
        @csrf
        <div class="form-group">
            <input type="hidden" class="form-control"  name="id" value=" {{$data['id']}} " >
        </div>    

        <div class="form-group">
          <label for="product"> {{  __('Product') }} </label>
          <input type="text" class="form-control" id="product" aria-describedby="product" placeholder="product" name="product" value=" {{$data['product']}} " >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" placeholder="Name" name="name" value=" {{ $data['name'] }} " >
        </div>

         <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" placeholder="Price" name="price" value=" {{ $data['price'] }} ">
          </div>

          <div class="form-group">
            <label for="price">Quantity</label>
            <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity" value=" {{ $data['quantity'] }} " >
          </div>

        

        <button type="submit" class="btn btn-success">Update</button>
        
      </form> 
      
    </div>


@endsection