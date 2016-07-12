@extends('mainadmin')

@section('title', 'History Borrow')

@section('content')
<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Tables
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Tables
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <h2>Borrow history</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Username</th>
                                        <th>Book</th>
                                        <th>Quantity</th>
                                        <th>Start at</th>
                                        <th>Expire time</th>
                                        <th>Notice</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Quang</td>
                                        <td>JAVA</td>
                                        <td>2</td>
                                        <td>12/6/2016</td>
                                        <td>12/8/2016</td>
                                        <td>ok</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Quang</td>
                                        <td>PHP</td>
                                        <td>3</td>
                                        <td>15/6/2016</td>
                                        <td>15/8/2016</td>
                                        <td>ok</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Tuan</td>
                                        <td>MySQL</td>
                                        <td>2</td>
                                        <td>12/6/2016</td>
                                        <td>12/8/2016</td>
                                        <td>ok</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Tuan</td>
                                        <td>JavaScript</td>
                                        <td>1</td>
                                        <td>14/6/2016</td>
                                        <td>14/8/2016</td>
                                        <td>ok</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Quang</td>
                                        <td>JAVA</td>
                                        <td>2</td>
                                        <td>12/6/2016</td>
                                        <td>12/8/2016</td>
                                        <td>ok</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Quang</td>
                                        <td>JAVA</td>
                                        <td>2</td>
                                        <td>12/6/2016</td>
                                        <td>12/8/2016</td>
                                        <td>ok</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Quang</td>
                                        <td>JAVA</td>
                                        <td>2</td>
                                        <td>12/6/2016</td>
                                        <td>12/8/2016</td>
                                        <td>ok</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
@endsection