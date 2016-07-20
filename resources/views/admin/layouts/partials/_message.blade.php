@if (Session::has('success'))
	<div class="alert alert-success" role="alert">
		<strong>Success:</strong> {{ Session::get('success') }}
	</div>
@endif
@if (Session::has('danger'))
	<div class="alert alert-danger" role="alert">
		<strong>Fail:</strong> {{ Session::get('danger') }}
	</div>
@endif
@if (Session::has('error'))
	<div class="alert alert-error" role="alert">
		<strong>Fail:</strong> {{ Session::get('error') }}
	</div>
@endif