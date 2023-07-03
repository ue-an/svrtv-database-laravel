@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        {{-- <p class="lead">Only authenticated users can access this section.</p>
        <a class="btn btn-lg btn-primary" href="https://codeanddeploy.com" role="button">View more tutorials here &raquo;</a> --}}
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search" name="search">
        </form>
        
        @if (count($feastappRecords) >= 1 || count($fphRecords) >= 1 || count($fmediaRecords) >= 1)
            <br>
            <h3>Record/s in Tables Found:</h3>
        @else
            <br>
            <h3>Displays Searched Attendee from Tables</h3>
        @endif

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

        @if (count($feastappRecords) >= 1)
        <h3>Feast App</h3>
        <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="feastappList">
            <thead>
                <tr>
                    {{-- <th scope="col">#</th> --}}
                    <th scope="col" style="width: 90px">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date Downloaded</th>
                    <th scope="col">Actions</th>
                </tr>
                
            </thead>
            <tbody>
                @foreach ($feastappRecords as $feastapp)
                    <tr>
                        {{-- <th scope="row"> {{$anime->id}} </th> --}}
                        <th scope="row"> {{$feastapp->feastapp_id}} </th>
                        <th scope="row"> {{ucfirst($feastapp->first_name).' '.ucfirst($feastapp->last_name)}} </th>
                        <th scope="row"> {{$feastapp->date_downloaded}} </th>
                        <td style="align-items: center">
                             <a style="padding-left: 21px; padding-right: 21px" href="/attendees/{{$records_userID->user_id}}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                             <form method="POST" action="/attendees/{{ $records_userID->user_id }}">
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
        <br>
        @endif

        @if (count($fphRecords) >= 1)
        <h3>Feast PH</h3>
        <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="fphList">
            <thead>
                <tr>
                    <th scope="col" style="width: 90px">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">File Name</th>
                    <th scope="col">Download Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fphRecords as $fph)
                    <tr>
                        <th scope="row"> {{$fph->feastph_id}} </th>
                        <th scope="row"> {{ucfirst($fph->first_name).' '.ucfirst($fph->last_name)}} </th>
                        <th scope="row"> {{$fph->file_name}} </th>
                        <th scope="row"> {{$fph->file_download_date}} </th>
                        <td style="align-items: center">
                            <a style="padding-left: 21px; padding-right: 21px" href="/attendees/{{$records_userID->user_id}}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                            <form method="POST" action="/attendees/{{ $records_userID->user_id }}">
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
        <br>
        @endif

        @if (count($fmediaRecords) >= 1)
        <h3>Feast Media</h3>
        <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="fmediaList">
            <thead>
                <tr>
                    <th scope="col" style="width: 90px">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Event Name</th>
                    <th scope="col">Ticket Type</th>
                    <th scope="col">Event Type</th>
                    <th scope="col">Event Date</th>
                    <th scope="col">Ticket Cost</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fmediaRecords as $fmed)
                    <tr>
                        <th scope="row"> {{$fmed->feast_media_event_id}} </th>
                        <th scope="row"> {{ucfirst($fmed->first_name).' '.ucfirst($fmed->last_name)}} </th>
                        <th scope="row"> {{$fmed->event_name}} </th>
                        <th scope="row">{{$fmed->ticket_type}}</th>
                        <th scope="row">{{$fmed->event_type}}</th>
                        <th scope="row">{{$fmed->event_date}}</th>
                        <th scope="row">{{$fmed->ticket_cost}}</th>
                        <td style="align-items: center">
                            <a style="padding-left: 21px; padding-right: 21px" href="/attendees/{{$records_userID->user_id}}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                            <form method="POST" action="/attendees/{{ $records_userID->user_id }}">
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
        <br>
        @endif

        @if (count($fmmRecords) >= 1)
        <h3>Feast Mercy Ministry</h3>
        <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="fmmList">
            <thead>
                <tr>
                    <th scope="col" style="width: 90px">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Donor Type</th>
                    <th scope="col">Donation Start</th>
                    <th scope="col">Donation End</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Pay Method</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fmmRecords as $fmm)
                    <tr>
                        <th scope="row"> {{$fmm->fmm_id}} </th>
                        <th scope="row"> {{ucfirst($fmm->first_name).' '.ucfirst($fmm->last_name)}} </th>
                        <th scope="row"> {{$fmm->donor_type}} </th>
                        <th scope="row">{{$fmm->donation_start_date}}</th>
                        <th scope="row">{{$fmm->donation_end_date}}</th>
                        <th scope="row">{{$fmm->amount}}</th>
                        <th scope="row">{{$fmm->pay_method}}</th>
                        <td style="align-items: center">
                            <a style="padding-left: 21px; padding-right: 21px" href="/attendees/{{$$records_userID->user_id}}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                            <form method="POST" action="/attendees/{{ $records_userID->user_id }}">
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
        <br>
        @endif

        @if (count($ticketRecords) >= 1)
            <h3>Ticket Items</h3>
            <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="ticketList">
            <thead>
                <tr>
                    <th scope="col" style="width: 90px">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Order No</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ticketRecords as $tck)
                    <tr>
                        <th scope="row"> {{$tck->ticket_id}} </th>
                        <th scope="row"> {{ucfirst($tck->first_name).' '.ucfirst($tck->last_name)}} </th>
                        <th scope="row"> {{$tck->order_no}} </th>
                        <th scope="row">{{$tck->quantity}}</th>
                        <td style="align-items: center">
                            <a style="padding-left: 21px; padding-right: 21px" href="/attendees/{{$records_userID->user_id}}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                            <form method="POST" action="/attendees/{{ $records_userID->user_id }}">
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
        <br>
        @endif

        @if (count($fbtransactions) >= 1)
            <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="fbtransactionList">
            <thead>
                <tr>
                    <th scope="col" style="width: 90px">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Product ID</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fbtransactions as $fb)
                    <tr>
                        <th scope="row"> {{$fb->feastbook_id}} </th>
                        <th scope="row"> {{ucfirst($fb->first_name).' '.ucfirst($fb->last_name)}} </th>
                        <th scope="row"> {{$fb->order_id}} </th>
                        <th scope="row">{{$fb->product_id}}</th>
                        <th scope="row">{{$fb->quantity}}</th>
                        <td style="align-items: center">
                            <a style="padding-left: 21px; padding-right: 21px" href="/attendees/{{$records_userID->user_id}}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                            <form method="POST" action="/attendees/{{ $records_userID->user_id }}">
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
        <br>
        @endif

        @if (count($hwrRecords) >= 1)
            <h3>Holy Week Retreat</h3>
            <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="hwrList">
            <thead>
                <tr>
                    <th scope="col" style="width: 90px">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Event Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hwrRecords as $hwr)
                    <tr>
                        <th scope="row"> {{$hwr->hwr_id}} </th>
                        <th scope="row"> {{ucfirst($hwr->first_name).' '.ucfirst($hwr->last_name)}} </th>
                        <th scope="row"> {{$hwr->event_date}} </th>
                        <td style="align-items: center">
                            <a style="padding-left: 21px; padding-right: 21px" href="/attendees/{{$records_userID->user_id}}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                            <form method="POST" action="/attendees/{{ $records_userID->user_id }}">
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
        <br>
        @endif

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
                    buttons: [
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
                    buttons: [
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
                    buttons: [
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
                    buttons: [
                        'pageLength'
                    ],
                    responsive: true,
                });
            });
            $(document).ready(function() {
                $('#ticketList').DataTable({
                    lengthMenu: [
                        [10, 25, 50, -1],
                        ['10', '25', '50', 'All']
                    ],
                    dom:
                    buttons: [
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
                    buttons: [
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
                    buttons: [
                        'pageLength'
                    ],
                    responsive: true,
                });
            });
        </script>

        @endauth

        @guest
        <h1>Authorization Required</h1>
        <p class="lead">Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection