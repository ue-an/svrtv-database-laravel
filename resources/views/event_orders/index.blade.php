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
                <li><a href="/event-ticket-items" class="nav-link px-2 text-white">Event Ticket Items</a></li>
            </ul>
        </header>
        <br>
        <h2>Manage Event Orders</h2>
        <a href="/event-orders/create" class="btn btn-primary btn-sm float-end">Add Event Order</a>
            <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="eventOrderList">
             <thead>
                 <tr>
                     {{-- <th scope="col">#</th> --}}
                     <th scope="col" style="width: 90px">Order No</th>
                     <th scope="col">Receipt No</th>
                     <th scope="col">Order Status</th>
                     <th scope="col">Order Created Date</th>
                     <th scope="col">Order Completed Date</th>
                     <th scope="col">Pay Method</th>
                     <th scope="col">Actions</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($event_orders as $eo)
                     <tr>
                         <th scope="row"> {{$eo->order_no}} </th>
                         <th scope="row"> {{$eo->receipt_no}} </th>
                         <th scope="row"> {{$eo->order_status}} </th>
                         <th scope="row"> {{$eo->order_created_date}} </th>
                         <th scope="row"> {{$eo->order_completed_date}} </th>
                         <th scope="row"> {{$eo->pay_method}} </th>
                         <td style="padding-left: 3rem">
                             <a style="padding-left: 21px; padding-right: 21px" href="/event-orders/{{$eo->order_no}}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                             <form method="POST" action="/events/{{ $eo->order_no }}">
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
                 $('#eventOrderList').DataTable({
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