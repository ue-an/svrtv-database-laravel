@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <header class="p-3 bg-dark text-white">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-start mb-md-0">
                <li><a href="/events" class="nav-link px-2 text-white">Events</a></li>
                <li><a class="nav-link px-2 text-white">|</a></li>
                <li><a href="/event-orders" class="nav-link px-2 text-white">Event Orders</a></li>
                <li><a class="nav-link px-2 text-white">|</a></li>
                <li><a href="/event-tickets" class="nav-link px-2 text-white">Event Tickets</a></li>
                <li><a class="nav-link px-2 text-white">|</a></li>
                <li><a href="/event-ticket-items" class="nav-link px-2 text-white">Ticket Items</a></li>
            </ul>
        </header>
        <br>
        <h2>Manage Event Ticket Items</h2>
        <a href="/event-ticket-items/create" class="btn btn-primary btn-sm float-end">Add Event Ticket Item</a>
            <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="eventTicketItemList">
             <thead>
                 <tr>
                     {{-- <th scope="col">#</th> --}}
                     <th scope="col" style="width: 90px">Order No</th>
                     <th scope="col">Ticket ID</th>
                     <th scope="col">Name</th>
                     <th scope="col">Event Name</th>
                     <th scope="col">Ticket Name</th>
                     <th scope="col">Ticket Type</th>
                     <th scope="col">Quantity</th>
                     <th scope="col">Actions</th>
                 </tr>
             </thead>
             <tbody>
                @foreach ($event_ticket_items as $eti)
                <tr>
                    <th scope="row"> {{$eti->order_no}} </th>
                    <th scope="row"> {{$eti->ticket_id}} </th>
                    <th scope="row"> {{ucfirst($eti->first_name).' '.ucfirst($eti->last_name)}} </th>
                    <th scope="row"> {{$eti->event_name}} </th>
                    <th scope="row"> {{$eti->ticket_name}} </th>
                    <th scope="row"> {{$eti->ticket_type}} </th>
                    <th scope="row"> {{$eti->quantity}} </th>
                    <td style="padding-left: 3rem">
                        <a style="padding-left: 21px; padding-right: 21px" href="/events/{{$eti->order_no}}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                        <form method="POST" action="/events/{{ $eti->order_no }}">
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
                 $('#eventTicketItemList').DataTable({
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