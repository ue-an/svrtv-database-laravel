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
           <a href="/event-ticket-items" class="float-right"></a>
          </div>
      @endif

      <div class="card">
       <div class="card-header">
        UPdate Event Ticket Item
       </div>
       <div class="card-body">
        <form action="{{ route('event-ticket-items.update') }}" method="POST">
         @csrf
         {{ method_field('PUT') }}
         <div class="form-group">
          <label for="">Quantity</label>
          <input type="text" class="form-control" name="quantity" required value="{{ $event_ticket_item->quantity }}">
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