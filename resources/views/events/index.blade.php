@extends('layouts.app-master')

@section('content')
    <div class="">
        @auth
            <div class="row">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="eventInterpretList">
                            <thead>
                                <tr>
                                    
                                    <th scope="col" style="width: 90px">Email</th>
                                    <th scope="col">Number of Transactions Made</th>
                                    {{-- <th scope="col">Bought Ticket Years</th>
                                    <th scope="col">Total Tickets Bought</th>
                                    <th scope="col">Bought Last Year?</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($event_emails as $user)
                                    <tr>
                                        <th scope="row"> {{$user}} </th>
                                        {{-- interpreted data --}}
                                    <th scope="row"> {{ count($total_transactions)}} </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
        
                            <script>
                            $(document).ready(function() {
                                $('#eventInterpretList').DataTable({
                                    lengthMenu: [
                                        [3, 12, -1],
                                        ['3', '12', 'All']
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
                    </div>
                </div>
            </div>
            <br>
                <div class="card" ></div>
            <br>
            <div class="col-md-12">
                <h2>Manage Events</h2>
                <a href="/events/create" class="btn btn-primary btn-sm float-end">Add Event</a>
                    <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="eventList">
                    <thead>
                        <tr>
                            
                            <th scope="col" style="width: 90px">Email</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Mobile No</th>
                            <th scope="col">Country</th>
                            <th scope="col">Receipt No</th>
                            {{-- <th scope="col">Number of Transactions Made</th> --}}
                            {{-- <th scope="col">Bought Ticket Years</th>
                            <th scope="col">Total Tickets Bought</th>
                            <th scope="col">Bought Last Year?</th> --}}
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <th scope="row"> {{$event->email}} </th>
                                <th scope="row"> {{ucfirst($event->user)}} </th>
                                <th scope="row"> {{ucfirst($event->last_name)}} </th>
                                <th scope="row"> {{$event->mobile_no}} </th>
                                <th scope="row"> {{$event->country}} </th>
                                <th scope="row"> {{$event->receipt_no}} </th>
                                {{-- interpreted data --}}
                            {{-- <th scope="row"> {{ count($total_transactions)}} </th> --}}
                                <td style="padding-left: 3rem">
                                    <a style="padding-left: 21px; padding-right: 21px" href="/events/{{$event->event_id}}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                    <form method="POST" action="/events/{{ $event->event_id }}">
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
                        $('#eventList').DataTable({
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
            </div>
        </div>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection