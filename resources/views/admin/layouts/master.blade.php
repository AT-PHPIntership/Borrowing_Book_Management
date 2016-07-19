<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layouts.partials._header')
</head>
<body>
    <div id="wrapper">

        <!-- Navigation -->
        @include('admin.layouts.partials._navbar')

        <div id="page-wrapper">
            <div class="container-fluid">
                @if (Session::has('message'))
                    <div class="note note-info">
                        <p>{{ Session::get('message') }}</p>
                    </div>
                @endif
                @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- COMBINE BOOTSTRAP AND JQUERY JS -->
    @include('admin.layouts.partials._javascript')
</body>
</html>
