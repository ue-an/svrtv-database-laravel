@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Attendees</h1>
        
            {{-- <div class="container mx-auto text-center m-5 p-2">
                <div class="row">
                <div class="col-md-12 mx-auto">
                        <table class="table table-striped table-hover border rounded">
                            <thead>
                                <tr>
                                <th scope="col"><h3>UserID</h3></th>
                                <th scope="col"><h3>E-Mail</h3></th>
                                <th scope="col"><h3>Last Name</h3></th>
                                <th scope="col"><h3>First Name</h3></th>
                                <th scope="col"><h3>Mobile</h3></th>
                                <th scope="col"><h3>Deliverable</h3></th>
                                <th scope="col"><h3>Action</h3></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($attendees as $attendee)
                                <tr>
                                <td>{{ $attendee['user_id']}}</td>
                                <td>{{ $attendee['email']}}</td>
                                <td>{{ $attendee['last_name']}}</td>
                                <td>{{ $attendee['first_name']}}</td>
                                <td>{{ $attendee['mobile_no']}}</td>
                                <td>{{ $attendee['is_bonafied']}}</td>          
                                </tr>
                                @endforeach
                            </tbody>
                    </table>

                    <div>{{$attendees->links("pagination::bootstrap-5")}}</div>
                    </div>
                </div>
            </div> --}}
            <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="attendeeList">
             <thead>
                 <tr>
                     {{-- <th scope="col">#</th> --}}
                     <th scope="col" style="width: 90px">UserID</th>
                     <th scope="col">Email</th>
                     <th scope="col">Last Name</th>
                     <th scope="col">First Name</th>
                     <th scope="col">Mobile</th>
                     <th scope="col">Deliverable</th>
                     <th scope="col">Actions</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($attendees as $attendee)
                     <tr>
                         {{-- <th scope="row"> {{$anime->id}} </th> --}}
                         <th scope="row"> {{$attendee->user_id}} </th>
                         <th scope="row"> {{$attendee->email}} </th>
                         <th scope="row"> {{ ucfirst($attendee->last_name)}} </th>
                         <th scope="row"> {{ ucfirst($attendee->first_name)}} </th>
                         <th scope="row"> {{$attendee->mobile_no}} </th>
                         <th scope="row"> {{$attendee->is_bonafied}} </th>
                         <td style="padding-left: 3rem">
                             <a style="padding-left: 21px; padding-right: 21px" href="/attendees/{{$attendee->id}}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                             <form method="POST" action="/attendees/{{ $attendee->id }}">
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
             </tbody>
         </table>

            <script>
             $(document).ready(function() {
                 $('#attendeeList').DataTable({
                     lengthMenu: [
                         [10, 25, 50, -1],
                         ['10', '25', '50', 'All']
                     ],
                     dom: "<'row'<'col-md-6'B><'col-md-6'f>>" +
                         "<'row'<'col-sm-12'tr>>" +
                         "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                     buttons: [{
                             extend: 'print',
                             text: '<i class="fas fa-print fa-1x"></i> Print',
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
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection