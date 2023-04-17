@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        {{-- <h1>Dashboard</h1> --}}
        {{-- <p class="lead">Only authenticated users can access this section.</p>
        <a class="btn btn-lg btn-primary" href="https://codeanddeploy.com" role="button">View more tutorials here &raquo;</a> --}}
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search" name="search">
        </form>

        {{-- <h1>Tickets</h1>
        <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="ticketList">
            <thead>
                <tr>
                    <th scope="col" style="width: 90px">Order No</th>
                    <th scope="col">Ticket ID</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ticketRecords as $tck)
                    <tr>
                        <th scope="row"> {{$tck->order_no}} </th>
                        <th scope="row"> {{$tck->ticket_id}} </th>
                        <th scope="row"> {{$tck->user_id}} </th>
                        <th scope="row"> {{$tck->quantity}} </th>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}
        <br>

        <h3>Feast App</h3>
        <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="feastappList">
            <thead>
                <tr>
                    {{-- <th scope="col">#</th> --}}
                    <th scope="col" style="width: 90px">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Date Downloaded</th>
                </tr>
                
            </thead>
            <tbody>
                @foreach ($feastappRecords as $feastapp)
                    <tr>
                        {{-- <th scope="row"> {{$anime->id}} </th> --}}
                        <th scope="row"> {{$feastapp->feastapp_id}} </th>
                        <th scope="row"> {{$feastapp->first_name}} </th>
                        <th scope="row"> {{$feastapp->last_name}} </th>
                        <th scope="row"> {{$feastapp->date_downloaded}} </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        
        <h3>Feast PH</h3>
        <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="fphList">
            <thead>
                <tr>
                    <th scope="col" style="width: 90px">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">File Name</th>
                    <th scope="col">Download Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fphRecords as $fph)
                    <tr>
                        <th scope="row"> {{$fph->feastph_id}} </th>
                        <th scope="row"> {{$fph->first_name}} </th>
                        <th scope="row">{{$fph->last_name}}</th>
                        <th scope="row"> {{$fph->file_name}} </th>
                        <th scope="row"> {{$fph->file_download_date}} </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>

        {{-- <h1>Feast Media</h1>
        <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="fmediaList">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" style="width: 90px">ID</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Event Name</th>
                    <th scope="col">Ticket Type</th>
                    <th scope="col">Event Type</th>
                    <th scope="col">Event Date</th>
                    <th scope="col">Ticket Cost</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fmediaRecords as $fmed)
                    <tr>
                        <th scope="row"> {{$fmed->feast_media_event_id}} </th>
                        <th scope="row"> {{$fmed->user_id}} </th>
                        <th scope="row"> {{$fmed->event_name}} </th>
                        <th scope="row">{{$fmed->ticket_type}}</th>
                        <th scope="row">{{$fmed->event_type}}</th>
                        <th scope="row">{{$fmed->event_date}}</th>
                        <th scope="row">{{$fmed->ticket_cost}}</th>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}

{{-- DATATABLE SCRIPTS --}}
           <script>
            // $(document).ready(function() {
            //     $('#ticketList').DataTable({
            //         lengthMenu: [
            //             [10, 25, 50, -1],
            //             ['10', '25', '50', 'All']
            //         ],
            //         dom:
            //             // "<'row'<'col-md-6'B><'col-md-6'f>>" +
            //             // "<'row'<'col-sm-12'tr>>" +
            //             "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            //         buttons: [
            //             // {
            //             //     extend: 'print',
            //             //     text: '<i class="fas fa-print fa-1x"></i> Print',
            //             // },
            //             // {
            //             //     extend: 'pdf',
            //             //     text: '<i class="fas fa-file-pdf fa-1x" aria-hidden="true"></i> PDF',
            //             // },
            //             // {
            //             //     extend: 'excel',
            //             //     text: '<i class="fas fa-file-excel" aria-hidden="true"></i> Excel',
            //             // },
            //             'pageLength'
            //         ],
            //         responsive: true,
            //     });
            // });
            $(document).ready(function() {
                $('#feastappList').DataTable({
                    lengthMenu: [
                        [10, 25, 50, -1],
                        ['10', '25', '50', 'All']
                    ],
                    dom:
                        // "<'row'<'col-md-6'B><'col-md-6'f>>" +
                        // "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: [
                        // {
                        //     extend: 'print',
                        //     text: '<i class="fas fa-print fa-1x"></i> Print',
                        // },
                        // {
                        //     extend: 'pdf',
                        //     text: '<i class="fas fa-file-pdf fa-1x" aria-hidden="true"></i> PDF',
                        // },
                        // {
                        //     extend: 'excel',
                        //     text: '<i class="fas fa-file-excel" aria-hidden="true"></i> Excel',
                        // },
                        'pageLength'
                    ],
                    responsive: true,
                });
            });
            $(document).ready(function() {
                $('#fphList').DataTable({
                    lengthMenu: [
                        [10, 25, 50, -1],
                        ['10', '25', '50', 'All']
                    ],
                    dom:
                        // "<'row'<'col-md-6'B><'col-md-6'f>>" +
                        // "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: [
                        // {
                        //     extend: 'print',
                        //     text: '<i class="fas fa-print fa-1x"></i> Print',
                        // },
                        // {
                        //     extend: 'pdf',
                        //     text: '<i class="fas fa-file-pdf fa-1x" aria-hidden="true"></i> PDF',
                        // },
                        // {
                        //     extend: 'excel',
                        //     text: '<i class="fas fa-file-excel" aria-hidden="true"></i> Excel',
                        // },
                        'pageLength'
                    ],
                    responsive: true,
                });
            });
            $(document).ready(function() {
                $('#fmediaList').DataTable({
                    lengthMenu: [
                        [10, 25, 50, -1],
                        ['10', '25', '50', 'All']
                    ],
                    dom:
                        // "<'row'<'col-md-6'B><'col-md-6'f>>" +
                        // "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: [
                        // {
                        //     extend: 'print',
                        //     text: '<i class="fas fa-print fa-1x"></i> Print',
                        // },
                        // {
                        //     extend: 'pdf',
                        //     text: '<i class="fas fa-file-pdf fa-1x" aria-hidden="true"></i> PDF',
                        // },
                        // {
                        //     extend: 'excel',
                        //     text: '<i class="fas fa-file-excel" aria-hidden="true"></i> Excel',
                        // },
                        'pageLength'
                    ],
                    responsive: true,
                });
            });
            $(document).ready(function() {
                $('#fmmList').DataTable({
                    lengthMenu: [
                        [10, 25, 50, -1],
                        ['10', '25', '50', 'All']
                    ],
                    dom:
                        // "<'row'<'col-md-6'B><'col-md-6'f>>" +
                        // "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: [
                        // {
                        //     extend: 'print',
                        //     text: '<i class="fas fa-print fa-1x"></i> Print',
                        // },
                        // {
                        //     extend: 'pdf',
                        //     text: '<i class="fas fa-file-pdf fa-1x" aria-hidden="true"></i> PDF',
                        // },
                        // {
                        //     extend: 'excel',
                        //     text: '<i class="fas fa-file-excel" aria-hidden="true"></i> Excel',
                        // },
                        'pageLength'
                    ],
                    responsive: true,
                });
            });
            $(document).ready(function() {
                $('#fbtransactionList').DataTable({
                    lengthMenu: [
                        [10, 25, 50, -1],
                        ['10', '25', '50', 'All']
                    ],
                    dom:
                        // "<'row'<'col-md-6'B><'col-md-6'f>>" +
                        // "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: [
                        // {
                        //     extend: 'print',
                        //     text: '<i class="fas fa-print fa-1x"></i> Print',
                        // },
                        // {
                        //     extend: 'pdf',
                        //     text: '<i class="fas fa-file-pdf fa-1x" aria-hidden="true"></i> PDF',
                        // },
                        // {
                        //     extend: 'excel',
                        //     text: '<i class="fas fa-file-excel" aria-hidden="true"></i> Excel',
                        // },
                        'pageLength'
                    ],
                    responsive: true,
                });
            });
            $(document).ready(function() {
                $('#hwrList').DataTable({
                    lengthMenu: [
                        [10, 25, 50, -1],
                        ['10', '25', '50', 'All']
                    ],
                    dom:
                        // "<'row'<'col-md-6'B><'col-md-6'f>>" +
                        // "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: [
                        // {
                        //     extend: 'print',
                        //     text: '<i class="fas fa-print fa-1x"></i> Print',
                        // },
                        // {
                        //     extend: 'pdf',
                        //     text: '<i class="fas fa-file-pdf fa-1x" aria-hidden="true"></i> PDF',
                        // },
                        // {
                        //     extend: 'excel',
                        //     text: '<i class="fas fa-file-excel" aria-hidden="true"></i> Excel',
                        // },
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