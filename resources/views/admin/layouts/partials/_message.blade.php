@if (Session::has('success'))
	<div class="alert alert-success" role="alert">
		<strong>{!!trans('book_manage_lang.title_success' )!!}</strong> {{ Session::get('success') }}
	</div>
@endif
@if (Session::has('danger'))
	<div class="alert alert-danger" role="alert">
		<strong>{!!trans('book_manage_lang.title_warning' )!!}</strong> {{ Session::get('danger') }}
	</div>
@endif
