<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.user._header')
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
    <div class="container">
        <hr>
        <!-- Footer -->
        @include('partials.user._footer')
    </div>
    <!-- /.container -->
    <!-- COMBINE BOOTSTRAP AND JQUERY JS -->
    @include('partials.user._javascript')
</body>
</html>
