@extends('layouts.main')
@section('title','Add Product')
@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css
">
@endpush
@section('content')

    <div class="container">
        <div class="col-sm-12">

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Description</th>
                    <th>Price</th>
                    <th>Product Image</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->product_title }}</td>
                    <td>{!!  $product->product_description  !!} </td>
                    <td>{{ $product->product_price }}</td>
                    <td><img src="{{ url('/products') }}/{{ $product->product_image }}" alt="" height="100px"></td>
                    <td>{{ $product->created_at}}</td>
                    <td><a href="{{ url('/user/edit_product/') }}/{{ $product->id }}">Edit </a> | <a href="{{ url('/user/delete_product') }}/{{ $product->id }}">Delete</a></td>
                </tr>
              @endforeach
                </tbody>
            </table>
        </div>
    </div>




@endsection
@push('scripts')
 <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endpush