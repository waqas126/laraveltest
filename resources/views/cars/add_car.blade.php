@extends('layouts.main')
@section('title','Add Product')
@section('content')


    <div class="container">
        <div class="col-sm-offset-3 col-sm-6">
            <h2>Add Car</h2>
            <form method="post" action="{{ url('/user/submit_car') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Car Model:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter Car Model" name="car_model">
                </div>
                <div class="form-group">
                    <label for="pwd">Car Make:</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Enter Car Maker" name="car_maker">
                </div>
                <div class="form-group">
                    <label for="pwd">Car Color:</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Enter Car Color" name="car_color">
                </div>
                <div class="form-group">
                    <label for="pwd">Car Price:</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Enter Car Price" name="car_price">
                </div>

                <div class="form-group">
                    <label for="pwd">Car Description:</label>
                    <textarea type="text" id="editor" class="form-control" placeholder="Car Description" name="car_description"></textarea>
                </div>
                <div class="form-group">
                    <label for="pwd">Car Image:</label>
                        <input type="file" class="form-control" name="file">
                </div>
                <button type="submit" class="btn btn-success">Add Car</button>
            </form>
        </div>
    </div>




@endsection
@push('scripts')
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
@endpush