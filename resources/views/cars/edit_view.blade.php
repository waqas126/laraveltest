@extends('layouts.main')
@section('title','Add Product')
@section('content')


    <div class="container">
        <div class="col-sm-offset-3 col-sm-6">
            <h2>Edit Car</h2>
            <form method="post" action="{{ url('/user/update_car') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Car Model:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter Car Model" value="{{ $car->car_model }}" name="car_model">
                </div>
                <div class="form-group">
                    <label for="pwd">Car Make:</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Enter Car Maker" value="{{ $car->car_maker }}" name="car_maker">
                </div>
                <div class="form-group">
                    <label for="pwd">Car Color:</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Enter Car Color" value="{{ $car->color }}" name="car_color">
                </div>
                <div class="form-group">
                    <label for="pwd">Car Price:</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Enter Car Price" value="{{ $car->car_price }}" name="car_price" >
                </div>
<input type="hidden" name="id" value="{{ Request::segment(3) }}" >
                <div class="form-group">
                    <label for="pwd">Car Description:</label>
                    <textarea type="text" id="editor" class="form-control" placeholder="Car Description" name="car_description">{{ $car->car_description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="pwd">Car Image:</label>
                    <input type="file" class="form-control" name="file">
                    <img src="{{ url('/cars') }}/{{ $car->car_image }}" height="100">
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