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
                    <th>Add Title</th>
                    <th>Add Description</th>
                    <th>City</th>
                    <th>Company</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ads as $ad)
                    <tr>
                        <td>{{ $ad->ad_title }}</td>
                        <td>{!!  $ad->ad_description  !!} </td>
                        <td>{{ $ad->city }}</td>
                        <td>{{ $ad->company_name }}</td>
                        <td>{{ $ad->created_at}}</td>
                        <td><a href="{{ url('/user/edit_ad/') }}/{{ $ad->id }}">Edit </a> | <a href="{{ url('/user/delete_ad') }}/{{ $ad->id }}">Delete</a></td>
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