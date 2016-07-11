@extends('mainuser')

@section('title', 'Change Password')

@section('navbar')
  @include('partials._navuser')
@endsection

@section('content')
        <h2 class="text-center">Password Change</h2>
        <hr>
        <div class="col col-md-8 col-md-offset-2">
            <form class="form-horizontal">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Old password:</label>
        <div class="col-sm-9">
          <input type="password" class="form-control" id="inputEmail3" placeholder="Old password">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">New password</label>
        <div class="col-sm-9">
          <input type="password" class="form-control" id="inputPassword3" placeholder="new password">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Renew password</label>
        <div class="col-sm-9">
          <input type="password" class="form-control" id="inputPassword3" placeholder="renew password">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
@endsection