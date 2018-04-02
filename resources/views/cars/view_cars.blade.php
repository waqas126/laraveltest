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
                    <th>Car Model</th>
                    <th>Car Make</th>
                    <th>Car Color</th>
                    <th>Car Price</th>
                    <th>Car Description</th>
                    <th>Car Image</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cars as $car)
                <tr>
                    <td>{{ $car->car_model }}</td>
                    <td>{{ $car->car_maker }}</td>
                    <td>{{ $car->color }}</td>

                    <td>{{ $car->car_price }}</td>
                    <td>{!!  $car->car_description !!} </td>
                    <td><img src="{{ url('/cars') }}/{{ $car->car_image }}" alt="" height="100px"></td>
                    <td>{{ $car->created_at}}</td>
                    <td><a href="{{ url('/user/edit_car/') }}/{{ $car->id }}">Edit </a> | <a href="{{ url('/user/delete_car') }}/{{ $car->id }}">Delete</a></td>
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