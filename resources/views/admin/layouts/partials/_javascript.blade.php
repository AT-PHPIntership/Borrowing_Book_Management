	<!-- COMBINE BOOTSTRAP AND JQUERY JS -->
    <script src="backend/js/vendor.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#myTable').DataTable();
        });
    </script>
    @yield('script')