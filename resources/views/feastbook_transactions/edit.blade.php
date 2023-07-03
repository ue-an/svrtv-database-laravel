@extends('layouts.app-master')

@section('content')
    <div class="row justify-content-center">
     <div class="col-md-8">
      @if (session()->has('success'))
          <div class="alert alert-success">
           <i class="fas fa-trash mr-2"></i>
           {{ session()->get('message') }}
          </div>
      @endif
      @if (session()->has('error'))
          <div class="alert alert-success">
           <i class="fas fa-trash mr-2"></i>
           {{ session()->get('error') }}
          </div>
      @endif
      @if (session()->has('message'))
          <div class="alert alert-success">
           <i class="fas fa-check-circle mr-2"></i>
           {{ session()->get('message') }}
           <a href="/feastbook_transactions" class="float-right"></a>
          </div>
      @endif

      <div class="card">
       <div class="card-header">
        Update Feast Book Transaction
       </div>
       <div class="card-body">
        <form action="{{ route('feastbook-transactions.update'), $fbtransaction }}" method="POST">
         @csrf
         {{ method_field('PUT') }}
         <div class="form-group">
          <label for="">Order ID</label>
          <input type="text" class="form-control" name="order_id" required value="{{ $fbtransaction->order_id }}">
         </div>
         <br>
         <div class="form-group">
          <label for="">Product ID</label>
          <input type="text" class="form-control" name="product_id" required value="{{ $fbtransaction->product_id }}">
         </div>
         <br>
         <div class="form-group">
          <label for="">User ID</label>
          <input type="text" class="form-control" name="user_id" required value="{{ $fbtransaction->user_id }}">
         </div>
         <br>
         <div class="form-group">
          <label for="">Quantity</label>
          <input type="number" class="form-control" name="quantity" required value="{{ $fbtransaction->quantity }}">
         </div>
         <br>
         <div class="form-control">
          <button type="submit" class="btn btn-primary">Save</button>
         </div>
        </form>
       </div>
      </div>
     </div>
    </div>
@endsection