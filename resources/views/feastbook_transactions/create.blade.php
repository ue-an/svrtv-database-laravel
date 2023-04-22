@extends('layouts.app-master')

@section('content')
    <div class="container">
     <div class="row justify-content-center">
      <div class="col-md-8">
       <div class="card">
        <div class="card-header">
         Add Feast Book Transaction
         @if ($errors->any())
             <div class="alert alert-danger">
              <ul>
               @foreach ($errors->all() as $error)
                   <li> {{ $error }} </li>
               @endforeach
              </ul>
             </div>
         @endif

         @if (session()->has('message'))
             <div class="alert alert-success">
              <i class="fas fa-check-circle mr-2"></i>
              {{ session()->get('message') }}
              <a class="float-right" href="/feastbook_transactions">Back to Feast Book Transaction List</a>
             </div>
         @endif
        </div>
        <div class="card-body">
         <form action="{{ route('feastbook-transactions.store') }}" method="POST">
          <div class="form-group">
           <label for="">Order ID</label>
           <input type="text" class="form-control" name="order_id">
          </div>
          <br>
          <div class="form-group">
           <label for="">Product ID</label>
           <input type="text" class="form-control" name="product_id">
          </div>
          <br>
          <div class="form-group">
           <label for="">User ID</label>
           <input type="text" class="form-control" name="user_id">
          </div>
          <br>
          <div class="form-group">
           <label for="">Quantity</label>
           <input type="number" class="form-control" name="quantity">
          </div>
          <br>
          <div class="form-control">
           <button type="submit" class="btn btn-primary">Add to Database</button>
          </div>
         </form>
        </div>
       </div>
      </div>
     </div>
    </div>
    <script src="../js/loading.js "></script>
@endsection