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
           <a href="/event-tickets" class="float-right"></a>
          </div>
      @endif

      <div class="card">
       <div class="card-header">
        Update Event Ticket
       </div>
       <div class="card-body">
        <form action="{{ route('event_tickets.update') }}" method="POST">
         @csrf
         {{ method_field('PUT') }}
         <div class="form-group">
          <label for="">Event Name</label>
          <input type="text" class="form-control" name="event_name" required value="{{ $event_ticket->event_name }}">
         </div>
         <br>
         <div class="form-group">
          <label for="">Ticket Type</label>
          <input type="text" class="form-control" name="ticket_type" required value="{{ $event_ticket->ticket_type }}">
         </div>
         <br>
         <div class="form-group">
          <label for="">Ticket Name</label>
          <input type="text" class="form-control" name="ticket_name" required value="{{ $event_ticket->ticket_name }}">
         </div>
         <br>
         <div class="form-group">
          <label for="">Ticket Cost</label>
          <input type="text" class="form-control" name="ticket_cost" required value="{{ $event_ticket->ticket_cost }}">
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