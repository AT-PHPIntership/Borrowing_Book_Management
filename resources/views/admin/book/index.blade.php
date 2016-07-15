@extends('admin.layouts.master')

@section('title', trans('book_manage_lang.title'))

@section('content')
<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            {!!trans('book_manage_lang.manage_book')!!}
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>
                                <a href="index.html">{!!trans('book_manage_lang.dashboard' )!!} </a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> {!!trans('book_manage_lang.book_list' )!!} 
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col col-md-12">
                        <h2 class="text-left">{!!trans('book_manage_lang.book_list' )!!}</h2>
                        <div class="text-right">    
                            <a href="/Createbook" class="btn btn-lg btn-primary">{!!trans('book_manage_lang.create_book' )!!}</a>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table id="myTable" class="display text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">{!!trans('book_manage_lang.no' )!!}</th>
                                        <th class="text-center">{!!trans('book_manage_lang.name' )!!}</th>
                                        <th class="text-center">{!!trans('book_manage_lang.category' )!!}</th>
                                        <th class="text-center">{!!trans('book_manage_lang.author' )!!}</th>
                                        <th class="text-center">{!!trans('book_manage_lang.quantity' )!!}</th>
                                        <th class="text-center">{!!trans('book_manage_lang.publish_year' )!!}</th>
                                        <th class="text-center">{!!trans('book_manage_lang.number_of_page' )!!}</th>
                                        <th class="text-center">{!!trans('book_manage_lang.more' )!!}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;?>
                                    @foreach($list as $item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td><a href="{{url('book/'.$item->id.'/edit')}}">{{ $item->name }}</a></td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->author }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <!-- <td>{{ $item->publish_year }}</td> -->
                                        <th>{{ date('d/m/Y', strtotime($item->publish_year)) }}</th>
                                        <td>{{ $item->number_of_page }}</td>
                                        <td> <a href="/Editbook"><i class="fa fa-pencil fa-fw"></i></a> 
                                             <a href=""><i class="fa fa-times-circle fa-fw"></i></a>
                                             <a href=""><i class="fa fa-wrench fa-fw"></i></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>    
                </div>
@endsection