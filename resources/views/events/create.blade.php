@extends('layouts.app-master')

@section('content')
    <div class="container">
     <div class="row justify-content-center">
      <div class="col-md-8">
       <div class="card">
        <div class="card-header">
         Add Event Data
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
              <a class="float-right" href="/events">Back to Events List</a>
             </div>
         @endif
        </div>
        <div class="card-body">
         <form action="{{ route('events.store') }}" method="POST">
          @csrf
          <div class="form-group">
           <label for="">Event Name</label>
           <input type="text" class="form-control" name="event_name">
          </div>
          <br>
          <div class="form-group">
           <label for="">Event Type</label>
           <input type="text" class="form-control" name="event_type">
          </div>
          <br>
          <div class="form-group">
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