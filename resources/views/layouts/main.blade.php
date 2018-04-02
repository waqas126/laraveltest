<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title> @yield('title')</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ url('/style.css')  }}">
@stack('styles')
</head>
<body>



<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Laravel Test</h3>
        </div>

        <ul class="list-unstyled components">

            <li class="">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Products</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li><a href="{{ url('/user/add_product') }}">Add Product</a></li>
                    <li><a href="{{ url('/user/view_products') }}">View Products</a></li>

                </ul>
            </li>
            <li class="">
                <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false">Ads</a>
                <ul class="collapse list-unstyled" id="homeSubmenu1">
                    <li><a href="{{ url('/user/publish_ad') }}">Publish Add</a></li>
                    <li><a href="{{ url('/user/view_ads') }}">View Ads</a></li>

                </ul>
            </li>

            <li class="">
                <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false">Cars</a>
                <ul class="collapse list-unstyled" id="homeSubmenu2">
                    <li><a href="{{ url('/user/add_car') }}">Add car</a></li>
                    <li><a href="{{ url('/user/view_cars') }}">View Cars</a></li>

                </ul>
            </li>


            <li>
                <a href="{{ url('/logout') }}">Logout</a>
            </li>
        </ul>


    </nav>

    <!-- Page Content Holder -->
    <div id="content">

        <nav class="navbar navbar-default">
            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                        <i class="glyphicon glyphicon-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">

                        <li><a href="#">
                                {{ Auth::user()->name }}
                            </a></li>
                    </ul>
                </div>
            </div>
        </nav>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('success'))

            <div class="alert alert-success"> {{ session('success')  }}</div>
@endif
        @if(session('fail'))

            <div class="alert alert-danger"> {{ session('fail')  }}</div>
        @endif

  @yield('content')
</div>





<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
@stack('scripts')
</body>
</html>
