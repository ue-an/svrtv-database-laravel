@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h2>Feast App</h2>
        {{-- <form action="{{ route('feast-app.upload') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="col-lg-12 py-3">
                <label for="users">Upload Users File</label>
                <input type="file" class="form-control" style="padding: 3px;" name="file" required />
            </div>
            <button type="submit" class="btn btn-success" name="upload">Upload</button>
        </form> --}}
        <form action="{{ route('feast-app.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
                {{-- <label for="customFile">Choose file</label>
                    <input type="file" name="file"  id="customFile"> --}}
                    <div class="col-lg-12 py-3">
                        {{-- <label for="users">Upload Users File</label> --}}
                        <label for="customFile">Upload Feast App Records</label>
                        {{-- <input type="file" class="form-control" style="padding: 3px;" name="file" required /> --}}
                        <input type="file" class="form-control" style="padding: 3px;" name="file"  id="customFile">
                    </div>
            <button class="btn btn-primary">Import data</button>
        </form>
        <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="feastappList">
             <thead>
                 <tr>
                     {{-- <th scope="col">#</th> --}}
                     <th scope="col" style="width: 90px">Feast App ID</th>
                     <th scope="col">User ID</th>
                     <th scope="col">Date Downloaded</th>
                     <th scope="col">Actions</th>
                 </tr>
             </thead>
             <tbody>
                @foreach ($feastapp_records as $feastapp)
                <tr>
                    <th scope="row"> {{$feastapp->feastapp_id}} </th>
                    <th scope="row"> {{$feastapp->user_id}} </th>
                    <th scope="row"> {{$feastapp->date_downloaded}} </th>
                    <td style="padding-left: 3rem">
                        <a style="padding-left: 21px; padding-right: 21px" href="/feast-app/{{$feastapp->feastapp_id}}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                        <form method="POST" action="/feast-app/{{ $feastapp->feastapp_id }}">
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
                 $('#feastappList').DataTable({
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