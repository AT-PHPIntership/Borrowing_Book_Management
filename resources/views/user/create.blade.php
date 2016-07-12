@extends('mainadmin')

@section('title', 'Create Account')

@section('content')
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Create Account
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Create Account
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
            <form>
                <div class="form-group">
                    <label for="fullname">Full name</label>
                        <input type="text" class="form-control" name="fullName" placeholder="Full name">
                </div>
                <div>
                    <label for="gender">Gender :
                        <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Male"> Male
                        <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Female"> Female   </br>
                </div>
                <div class="form-group">
                    <label for="birthday">Birthday</label>
                        <input type="text" class="form-control" name="birthday" placeholder="Birthday">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Phone">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Address">
                </div>
                <div class="form-group">
                    <label for="username">User Name</label>
                        <input type="text" class="form-control" name="username" placeholder="User name">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Choose Image</label>
                        <input type="file" id="exampleInputFile">                        
                </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
                
                <!-- /.row -->
@endsection