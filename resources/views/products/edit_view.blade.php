@extends('layouts.main')
@section('title','Add Product')
@section('content')


    <div class="container">
        <div class="col-sm-offset-3 col-sm-6">
            <h2>Edit Product</h2>
            <form method="post" action="{{ url('/user/update_product') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Product Title:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter Product Title" value="{{ $product->product_title }}" name="product_title">
                </div>
                <div class="form-group">
                    <label for="pwd">Product Price:</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Enter Product Price" name="product_price" value="{{ $product->product_price }}">
                </div>
                <div class="form-group">
                    <label for="pwd">Product Description:</label>
                    <textarea type="text" id="editor" class="form-control" placeholder="Enter password" name="product_description">{{ $product->product_description }}</textarea>
                </div>
                <input type="hidden" name="id" value="{{ Request::segment(3) }}" >
                <div class="form-group">
                    <label for="pwd">Product Image:</label>
                    <input type="file" class="form-control" name="file">
                    <img src="{{ url('/products') }}/{{ $product->product_image }}" height="100px" />
                </div>
                <button type="submit" class="btn btn-success">Update Product</button>
            </form>
        </div>
    </div>




@endsection
@push('scripts')
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
@endpush