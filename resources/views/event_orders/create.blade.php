@extends('layouts.app-master')

@section('content')
    <div class="container">
     <div class="row justify-content-center">
      <div class="col-md-8">
       <div class="card">
        <div class="card-header">
         Add Event Order
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
              <a class="float-right" href="/event-orders">Back to Event Orders List</a>
             </div>
         @endif
        </div>
        <div class="card-body">
         <form action="{{ route('event-orders.store') }}" method="POST">
          @csrf
          <div class="form-group">
           <label for="">Order Status</label>
           <input type="text" class="form-control" name="order_status">
          </div>
          <br>
          <div class="form-group">
           <label for="">Order Created Date</label>
           <input type="date" class="form-control" name="order_created_date">
          </div>
          <br>
          <div class="form-group">
           <label for="">Order Completed Date</label>
           <input type="date" class="form-control" name="order_completed_date">
          </div>
          <br>
           <div class="form-group">
            <label for="">Pay Method</label>
            <input type="text" class="form-control" name="pay_method">
           </div>
           <br>
           <button type="submit" class="btn btn-primary">Add to Database</button>
         </form>
        </div>
       </div>
      </div>
     </div>
    </div>
    <script src="../js/loading.js "></script>
@endsection