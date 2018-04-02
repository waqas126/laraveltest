@extends('layouts.main')
@section('title','Add Product')
@section('content')


    <div class="container">
        <div class="col-sm-offset-3 col-sm-6">
            <h2>Add Product</h2>
            <form method="post" action="{{ url('/user/submit_product') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Product Title:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter Product Title" name="product_title">
                </div>
                <div class="form-group">
                    <label for="pwd">Product Price:</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Enter Product Price" name="product_price">
                </div>
                <div class="form-group">
                    <label for="pwd">Product Description:</label>
                    <textarea type="text" id="editor" class="form-control" placeholder="Enter password" name="product_description"></textarea>
                </div>
                <div class="form-group">
                    <label for="pwd">Product Image:</label>
                        <input type="file" class="form-control" name="file">
                </div>
                <button type="submit" class="btn btn-success">Add Product</button>
            </form>
        </div>
    </div>




@endsection
@push('scripts')
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
@endpush