<!DOCTYPE html>
<html lang="en">
    <head>
        @include('frontend.layouts.partials._header')
    </head>
    <body>
        <div id="header">
            <!-- Navigation -->
            @yield('navbar')
        </div>
        <!-- Page Content -->
        <div class="container container-main main-center">
            @include('admin.layouts.partials._message')
            @yield('content')
        </div>
        <!-- /.container -->
        <div class="col-lg-12 main-footer">
            <!-- Footer -->
            @include('frontend.layouts.partials._footer')
        </div>
        <!-- /.container -->
        <!-- COMBINE BOOTSTRAP AND JQUERY JS -->
        @include('frontend.layouts.partials._javascript')
    </body>
</html>