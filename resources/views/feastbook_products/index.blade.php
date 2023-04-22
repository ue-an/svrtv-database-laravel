@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <header class="p-3 bg-dark text-white">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-start mb-md-0">
                <li><a href="/feastbook-transactions" class="nav-link px-2 text-white">Feast Book Transactions</a></li>
                <li><a class="nav-link px-2 text-white">|</a></li>
                <li><a href="/feastbook-products" class="nav-link px-2 text-white">Feast Book Products</a></li>
                <li><a class="nav-link px-2 text-white">|</a></li>
                <li><a href="/feastbook-orders" class="nav-link px-2 text-white">Feast Book Orders</a></li>
            </ul>
        </header>
        <br>
        <h2>Manage Feast Book Products</h2>
        <a href="/feastbook-products/create" class="btn btn-primary btn-sm float-end">Add Feast Book Product</a>
            <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="fbproductList">
             <thead>
                 <tr>
                     {{-- <th scope="col">#</th> --}}
                     <th scope="col" style="width: 90px">Product ID</th>
                     <th scope="col">Product Name</th>
                     <th scope="col">Cost</th>
                     <th scope="col">Variation</th>
                     <th scope="col">Category</th>
                     <th scope="col">Actions</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($fbproducts as $fbprod)
                     <tr>
                         <th scope="row"> {{$fbprod->product_id}} </th>
                         <th scope="row"> {{$fbprod->product_name}} </th>
                         <th scope="row"> {{$fbprod->cost}} </th>
                         <th scope="row"> {{$fbprod->variation}} </th>
                         <th scope="row"> {{$fbprod->category}} </th>
                         <td style="padding-left: 3rem">
                             <a style="padding-left: 21px; padding-right: 21px" href="/feastbook-products/{{$fbprod->product_id}}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                             <form method="POST" action="/feastbook-products/{{ $fbprod->product_id }}">
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
                 $('#fbproductList').DataTable({
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