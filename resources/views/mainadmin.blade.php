<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.admin._header')
</head>
<body>
    <div id="wrapper">

        <!-- Navigation -->
        @include('partials.admin._nav')

        <div id="page-wrapper">
            <div class="container-fluid">
            @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- COMBINE BOOTSTRAP AND JQUERY JS -->
    @include('partials.admin._javascript')
</body>
</html>
