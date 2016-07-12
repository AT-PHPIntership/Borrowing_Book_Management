<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._header')
</head>
<body>
    <div id="header">
        <!-- Navigation -->
        @yield('navbar')
    </div>
    <!-- Page Content -->
    <div class="container">
    <!-- log in -->
        @yield('model_hidden')
        @yield('content')
    </div>
    <!-- /.container -->
    <div class="col-lg-12" style="padding:0px;">
        <!-- Footer -->
        @include('partials._footer')
    </div>
    <!-- /.container -->
    <!-- COMBINE BOOTSTRAP AND JQUERY JS -->
    @include('partials._javascript')
</body>
</html>
