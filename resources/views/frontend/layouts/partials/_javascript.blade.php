<!-- COMBINE BOOTSTRAP AND JQUERY JS -->
    <script src="{{ url('backend/js/vendor.js') }}"></script>  
    <script src="{{ url('frontend/js/upload.js') }}"></script>
    <script type="text/javascript">
    	var pathjsonsearch = {!! json_encode(config('path.pathjsonsearch')) !!};
    	var timeout = {!! json_encode(config('define.timeout')) !!};
    </script>
    <script src="{{ url('frontend/js/search.js') }}"></script>
    
    @yield('script')