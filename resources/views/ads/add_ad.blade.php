@extends('layouts.main')
@section('title','Add Product')
@section('content')


    <div class="container">
        <div class="col-sm-offset-3 col-sm-6">
            <h2>Publish Ad</h2>
            <form method="post" action="{{ url('/user/submit_ad') }}" >
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Ad Title:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter Ad Title" name="ad_title">
                </div>
                <div class="form-group">
                    <label for="pwd">Ad City:</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Enter City" name="ad_city">
                </div>
                <div class="form-group">
                    <label for="pwd">Company name:</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Company Name" name="company_name">
                </div>
                <div class="form-group">
                    <label for="pwd">Ad Description:</label>
                    <textarea type="text" id="editor" class="form-control" placeholder="Enter Description" name="ad_description"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Publish Ad</button>
            </form>
        </div>
    </div>




@endsection
@push('scripts')
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
@endpush