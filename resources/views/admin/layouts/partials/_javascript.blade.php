	<!-- COMBINE BOOTSTRAP AND JQUERY JS -->
    <script src="{{ url('backend/js/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/js/admins.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script type="text/javascript">
    	var timeout = {!! json_encode(config('define.timeout')) !!};
    </script>
    @yield('script')