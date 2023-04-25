@extends('layouts.app-master')

@section('content')
    <div>
        @auth
        <div class="row">
            <div class="col-md-10">
                <div>
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
                    
                    <div class="card"></div>
                    <br>
                    <h2>Manage End Users</h2>
                    <a href="/attendees/create" class="btn btn-primary btn-sm float-end">Add User</a>            
                        {{-- <th scope="col">#</th> --}}
                        {{-- <th scope="row"> {{$anime->id}} </th> --}}
                            <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="attendeeList">
                            <thead>
                                <tr>
                                    
                                    <th scope="col" style="width: 90px">UserID</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($chk_attendees  == null)
                                    @foreach ($attendees as $attendee)
                                        <tr>
                                            <th scope="row"> {{$attendee->user_id}} </th>
                                            <th scope="row"> {{$attendee->email}} </th>
                                            <th scope="row"> {{ ucfirst($attendee->last_name)}} </th>
                                            <th scope="row"> {{ ucfirst($attendee->first_name)}} </th>
                                            <th scope="row"> {{$attendee->mobile_no}} </th>
                                            <th scope="row"> {{$attendee->address}} </th>
                                            <th scope="row"> {{$attendee->city}} </th>
                                            <th scope="row"> {{$attendee->country}} </th>
                                            <td style="padding-left: 3rem">
                                                <br>
                                                <a style="padding-left: 21px; padding-right: 21px" href="/attendees/{{$attendee->user_id}}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                <form method="POST" action="/attendees/{{ $attendee->user_id }}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <div class="form-group">
                                                    <br>
                                                        <button type="submit" class="btn btn-danger delete-user">
                                                            <i style="padding-left: 10px; padding-right: 10px" class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                        @foreach ($attendees as $att)
                                            @foreach ($chk_attendees as $filter)
                                                @if ($att->user_id == $filter->user_id)
                                                    <tr>
                                                        <th scope="row"> {{$att->user_id}} </th>
                                                        <th scope="row"> {{$att->email}} </th>
                                                        <th scope="row"> {{ ucfirst($att->last_name)}} </th>
                                                        <th scope="row"> {{ ucfirst($att->first_name)}} </th>
                                                        <th scope="row"> {{$att->mobile_no}} </th>
                                                        <th scope="row"> {{$strVal =  $att->is_bonafied == "0"? "true" : "false"}} </th>
                                                        <td style="padding-left: 3rem">
                                                            <a style="padding-left: 21px; padding-right: 21px" href="/attendees/{{$att->user_id}}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                            <form method="POST" action="/attendees/{{ $att->user_id }}">
                                                                @csrf
                                                                {{ method_field('DELETE') }}
                                                                <div class="form-group">
                                                                <br>
                                                                    <button type="submit" class="btn btn-danger delete-user">
                                                                        <i style="padding-left: 10px; padding-right: 10px" class="fas fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            
                                        @endforeach
                                @endif
                                
                            </tbody>
                        </table>
            
                        <script>
                         $(document).ready(function() {
                             $('#attendeeList').DataTable({
                                 lengthMenu: [
                                     [10, 25, 50, -1],
                                     ['10', '25', '50', 'All']
                                 ],
                                 dom:"<'row'<'col-md-6'B><'col-md-6'f>>" +
                                     "<'row'<'col-sm-12'tr>>" +
                                     "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                                 buttons: [
                                    {
                                         extend: 'print',
                                         text: '<i class="fas fa-print fa-1x"></i> Print'                             
                                     },
                                     {
                                         extend: 'pdf',
                                         text: '<i class="fas fa-file-pdf fa-1x" aria-hidden="true"></i> PDF',
                                     },
                                     {
                                         extend: 'excel',
                                         text: '<i class="fas fa-file-excel" aria-hidden="true"></i> Excel',
                                     },
                                     'pageLength'
                                 ],
                                 responsive: true,
                             });
                         });
                     </script>
                </div>
            </div>
            <div class="col-md-2 p-3">
                        <div class="row">
                            <div class="card ">
                                <div class="card-header">
                                    Total End Users: {{ count($all_count) }}
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    Unique Emails: {{ $unique_emails }}
                                </div>
                            </div>
                        </div>
                        <form>
                            <div class="checkbox checkbox-success py-3">
                                <input type="hidden" name="chk_feastapp_name" value="chk_feastapp">
                                <input name="chk_feastapp" id="checkbox" type="checkbox" : {{ $chk_feastapp == "on" ? "checked" : "unchecked" }}  >
                                <label for="test" style="padding-left: 15px!important;">Feast App</label>
                            </div>
                            <div class="checkbox checkbox-success py-3">
                                <input name="chk_feastbook" id="checkbox" type="checkbox" : {{ $chk_feastbook == "on" ? "checked" : "unchecked" }}>
                                <label for="test" style="padding-left: 15px!important;">Feast Books</label>
                            </div>
                            <div class="checkbox checkbox-success py-3">
                                <input name="chk_feastmedia" id="checkbox" type="checkbox" : {{ $chk_feastmedia == "on" ? "checked" : "unchecked" }}>
                                <label for="test" style="padding-left: 15px!important;">Feast Media</label>
                            </div>
                            <div class="checkbox checkbox-success py-3">
                                <input name="chk_fmm" id="checkbox" type="checkbox" : {{ $chk_fmm == "on" ? "checked" : "unchecked" }}>
                                <label for="test" style="padding-left: 15px!important;">Feast Mercy Ministry</label>
                            </div>
                            <div class="checkbox checkbox-success py-3">
                                <input name="chk_feastph" id="checkbox" type="checkbox" : {{ $chk_feastph == "on" ? "checked" : "unchecked" }}>
                                <label for="test" style="padding-left: 15px!important;">Feast PH</label>
                            </div>
                            <div class="checkbox checkbox-success py-3">
                                <input name="chk_hwr" id="checkbox" type="checkbox" : {{ $chk_hwr == "on" ? "checked" : "unchecked" }}>
                                <label for="test" style="padding-left: 15px!important;">Holy Week Retreat</label>
                            </div>
                            <div class="checkbox checkbox-success py-3">
                                <input name="chk_events_ticket" id="checkbox" type="checkbox" : {{ $chk_events_ticket == "on" ? "checked" : "unchecked" }}>
                                <label for="test" style="padding-left: 15px!important;">Event Tickets</label>
                            </div>
                            {{-- {{ csrf_field() }} --}}
                            <div class="form-group">
                                <button class="btn btn-danger"><a href="/attendees" class="text-white text-decoration-none">Reset</a></button>
                                <button type="submit" class="btn btn-success">Filter</button>
                            </div>
                            {{-- <input type="checkbox" name="checkbox" id="checkbox"> --}}
                            
                            {{-- <div class="form-group">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div> --}}
                        </form>
                        </div>
                        
                        
                    {{-- </div> --}}
                {{-- </div> --}}
            </div>
        </div>
        @endauth

        {{--  --}}
        @guest
        <div class="bg-light p-5 rounded">
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        </div>
    @endguest
    </div>
    
    
@endsection