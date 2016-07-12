@extends('mainuser')

@section('title', 'Profile')

@section('navbar')
  @include('partials.user._navuser')
@endsection

@section('model_hidden')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Edit Your Profile</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Fullname:<span id="bb">(*)</span></label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Image input</label>
            <input type="file" id="exampleInputFile">
            </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Gender:<span id="bb">(*)</span></label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Birthday:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Phone:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Address:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
  </div>
@endsection

@section('content')
<div class="col col-md-12">
            <hr class="featurette-divider">

        <!-- First Featurette -->
        
            <div class="col col-md-4">
                <img class="img-circle img-responsive pull-left" src="http://placehold.it/200x200"></img>
            </div>
            <h2 class="featurette-heading">My profile</h2>
            <div class="col col-md-8" style="line-height:2.0">
                    <label>Fullname: Nguyen Van A</label>
                    <br>
                    <label>Gender: Male</label>
                    <br>
                    <label>Birthday: 10/3/1992</label>
                    <br>
                    <label>Phone number: (+84) 123 456 8784</label>
                    <br>
                    <label>Address: Da Nang</label>
                    <br>
                    <label>Expiretime: 2/12/2016</label><br>  
                    <div class="text-right"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Edit information</button></div>  
            </div>
@endsection