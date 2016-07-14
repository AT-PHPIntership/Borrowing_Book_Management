<link href="backend/css/login.css" rel="stylesheet">
<div class="container" style="margin-top:200px;">
	<section id="content">
		<form action="{{ route('admin.login') }}" class="form-horizontal" role="form" method="POST">
			{{ csrf_field() }}
			<h1>Login Form</h1>
			<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <div class="col-md-6">
                    
                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username">

                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
			<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" placeholder="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->
<script src="backend/js/login.js"></script>
