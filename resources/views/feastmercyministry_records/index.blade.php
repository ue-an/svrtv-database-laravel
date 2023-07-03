@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h2>Manage Feast Mercy Ministry</h2>
        <a href="/feast-mercyministry/create" class="btn btn-primary btn-sm float-end">Add Feast Mercy Ministry</a>
            <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="fmmList">
             <thead>
                 <tr>
                     {{-- <th scope="col">#</th> --}}
                     <th scope="col" style="width: 90px">FMM ID</th>
                     <th scope="col">User ID</th>
                     <th scope="col">Donor Type</th>
                     <th scope="col">Donation Start Date</th>
                     <th scope="col">Donation End Date</th>
                     <th scope="col">Amount</th>
                     <th scope="col">Pay Method</th>
                     <th scope="col">Actions</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($fmm_records as $fmm)
                     <tr>
                         <th scope="row"> {{$fmm->fmm_id}} </th>
                         <th scope="row"> {{$fmm->user_id}} </th>
                         <th scope="row"> {{$fmm->donor_type}} </th>
                         <th scope="row"> {{$fmm->donation_start_date}} </th>
                         <th scope="row"> {{$fmm->donation_end_date}} </th>
                         <th scope="row"> {{$fmm->amount}} </th>
                         <th scope="row"> {{$fmm->pay_method}} </th>
                         <td style="padding-left: 3rem">
                             <a style="padding-left: 21px; padding-right: 21px" href="/feast-mercyministry/{{$fmm->fmm_id}}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                             <form method="POST" action="/feast-mercyministry/{{ $fmm->fmm_id }}">
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
                 $('#fmmList').DataTable({
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