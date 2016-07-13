<!DOCTYPE html>
<html lang="en">
<head>
    @include('partial.admin._header')
</head>
<body>
    <div id="wrapper">

        <!-- Navigation -->
        @include('partial.admin._nav')

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
    @include('partial.admin._javascript')
</body>
</html>
