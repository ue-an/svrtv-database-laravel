@extends('layouts.app-master')

@section('content')
    <div class="row justify-content-center">
     <div class="col-md-8">
      @if (session()->has('success'))
          <div class="alert alert-success">
           <i class="fas fa-trash mr-2"></i>
           {{ session()->get('success') }}
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
           <a href="/attendees" class="float-right"></a>
          </div>
      @endif

      <div class="card">
       <div class="card-header">
        Update Attendee
       </div>
       <div class="card-body">
        <form action="{{ route('attendees.update', $attendee) }}" method="POST">
         @csrf
         {{ method_field('PUT') }}
         <div class="form-group">
          <label for="">Email</label>
          <input type="text" class="form-control" name="email" required value="{{ $attendee->email }}">
         </div>
         <br>
         <div class="form-group">
          <label for="">Last Name</label>
          <input type="text" class="form-control" name="last_name" required value="{{ $attendee->last_name }}">
         </div>
         <br>
         <div class="form-group">
          <label for="">First Name</label>
          <input type="text" class="form-control" name="first_name" required value="{{ $attendee->first_name }}">
         </div>
         <br>
         <div class="form-group">
          <label for="">Mobile No.</label>
          <input type="number" class="form-control" name="mobile_no" value="{{ $attendee->mobile_no }}">
         </div>
         <br>
         <div class="form-group">
          <label for="">Is Bonafied?</label>
          <select name="is_bonafied">
           @if ($attendee->is_bonafied == 0)
           <option value="{{ $attendee->is_bonafied }}"></option>
           <option value="FALSE">FALSE</option>
           @endif
           @if ($attendee->is_bonafied == 1)
           <option value="TRUE">TRUE</option>
           <option value="{{ $attendee->is_bonafied }}"></option>
           @endif
          </select>
         </div>
         <br>
         <div class="form-group">
          <label for="">Is Feast Attendee?</label>
          <select name="is_feast_attendee" class="form-control">
           @if ($attendee->is_feast_attendee == 0)
           <option value="{{ $attendee->is_feast_attendee }}"></option>
           <option value="FALSE">FALSE</option>
           @endif
           @if ($attendee->is_feast_attendee == 1)
           <option value="TRUE">TRUE</option>
           <option value="{{ $attendee->is_feast_attendee }}"></option>
           @endif
          </select>
         </div>
         <br>
         <div class="form-group">
          <label for="">Feast Name</label>
          <input type="text" class="form-control" name="feast_name" value="{{ $attendee->feast_name }}">
         </div>
         <br>
         <div class="form-group">
          <label for="">Feast District</label>
          <input type="text" class="form-control" name="feast_district" value="{{ $attendee->feast_district }}">
         </div>
         <br>
         <div class="form-group">
          <label for="">Address</label>
          <input type="text" class="form-control" name="address" value="{{ $attendee->address }}">
         </div>
         <div class="form-group">
          <label for="">City</label>
          <input type="text" class="form-control" name="city" value="{{ $attendee->city }}">
         </div>
         <br>
         <div class="form-group">
          <label for="">Country</label>
          <input type="text" class="form-control" name="country" value="{{ $attendee->country }}">
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