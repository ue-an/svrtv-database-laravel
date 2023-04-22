@extends('layouts.app-master')

@section('content')
    <div class="container">
     <div class="row justify-content-center">
      <div class="col-md-8">
       <div class="card">
        <div class="card-header">
         Add Attendee
         @if ($errors->any())
             <div class="alert alert-danger">
              <ul>
               @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
               @endforeach
              </ul>
             </div>
         @endif

         @if (session()->has('message'))
             <div class="alert alert-success">
              <i class="fas fa-check-circle mr-2"></i>
              {{ session()->get('message') }}
              <a class="float-right" href="/attendees">Back to Attendees List</a>
             </div>
         @endif
        </div>
        <div class="card-body">
         <form action="{{ route('attendees.store' )}}" method="POST">
          @csrf
          <div class="form-group">
           <label for="">Email</label>
           <input type="email" class="form-control" name="email">
          </div>
          <br>
          <div class="form-group">
           <label for="">Last Name</label>
           <input type="text" class="form-control" name="last_name">
          </div>
          <br>
          <div class="form-group">
           <label for="">First Name</label>
           <input type="text" class="form-control" name="first_name">
          </div>
          <br>
          <div class="form-group">
           <label for="">Mobile No.</label>
           <input type="number" class="form-control" name="mobile_no">
          </div>
          <br>
          <div class="form-group">
           <label for="">Is Bonafied?</label>
           <select name="is_bonafied">
            <option value="TRUE">TRUE</option>
            <option value="FALSE">FALSE</option>    
           </select>
          </div>
          <br>
          <div class="form-group">
           <label for="">Is Feast Attendee?</label>
           <select name="is_feast_attendee" class="form-control">
            <option value="TRUE">TRUE</option>
            <option value="FALSE">FALSE</option>
           </select>
          </div>
          <br>
          <div class="form-group">
           <label for="">Feast Name</label>
           <input type="text" class="form-control" name="feast_name">
          </div>
          <br>
          <div class="form-group">
           <label for="">Feast District</label>
           <input type="text" class="form-control" name="feast_district">
          </div>
          <br>
          <div class="form-group">
           <label for="">Address</label>
           <input type="text" class="form-control" name="address">
          </div>
          <div class="form-group">
           <label for="">City</label>
           <input type="text" class="form-control" name="city">
          </div>
          <br>
          <div class="form-group">
           <label for="">Country</label>
           <input type="text" class="form-control" name="country">
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