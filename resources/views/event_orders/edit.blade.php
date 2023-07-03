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
           <a href="/event-orders" class="float-right"></a>
          </div>
      @endif

      <div class="card">
       <div class="card-header">
        Update Event Order
       </div>
       <div class="card-body">
        <form action="{{ route('event-orders.update', $event_order) }}">
         @csrf
         {{ method_field('PUT') }}
         <div class="form-group">
          <label for="">Order Status</label>
          <input type="text" class="form-control" name="order_status" required value="{{ $event_order->order_status }}">
         </div>
         <br>
         <div class="form-group">
          <label for="">Order Created Date</label>
          <input type="date" class="form-control" name="order_created_date" required value="{{ $event_order->order_created_date }}">
         </div>
         <br>
         <div class="form-group">
          <label for="">Order Completed Date</label>
          <input type="date" class="form-control" name="order_completed_date" required value="{{ $event_order->order_completed_date }}">
         </div>
         <br>
         <div class="form-group">
          <label for="">Pay Method</label>
          <input type="text" class="form-control" name="pay_method" required value="{{ $event_order->pay_method }}">
         </div>
         <br>
         <div class="form-group">
          <button type="submit" class="btn btn-primary">Save</button>
         </div>
        </form>
       </div>
      </div>
     </div>
    </div>
@endsection