	<!-- COMBINE BOOTSTRAP AND JQUERY JS -->
    <script src="{{ url('backend/js/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/js/admins.js') }}"></script>
    <script type="text/javascript">
    	var timeout = {!! json_encode(config('define.timeout')) !!};
    </script>
    @yield('script')