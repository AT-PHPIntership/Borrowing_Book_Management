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
                                <a href="{{ route('home.admin') }}">{!!trans('book_manage_lang.dashboard' )!!} </a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> {!!trans('book_manage_lang.manage_book' )!!} 
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <div class="col col-md-12">
                        <h2 class="text-left">{!!trans('book_manage_lang.book_list' )!!}</h2>
                        <div class="text-right">    
                            <a href="{!! route('admin.book.create')!!}" class="btn btn-lg btn-primary">{!!trans('book_manage_lang.create_book' )!!}</a>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table id="list_books" class="display text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">{!!trans('book_manage_lang.no' )!!}</th>
                                        <th class="text-center">{!!trans('book_manage_lang.name' )!!}</th>
                                        <th class="text-center">{!!trans('book_manage_lang.category' )!!}</th>
                                        <th class="text-center">{!!trans('book_manage_lang.author' )!!}</th>
                                        <th class="text-center">{!!trans('book_manage_lang.quantity' )!!}</th>
                                        <th class="text-center">{!!trans('book_manage_lang.publish_year' )!!}</th>
                                        <th class="text-center">{!!trans('book_manage_lang.number_of_page' )!!}</th>
                                        <th class="text-center">{!!trans('book_manage_lang.edit' )!!}</th>
                                        <th class="text-center">{!!trans('book_manage_lang.delete' )!!}</th>
                                        <th class="text-center">{!!trans('book_manage_lang.add_book' )!!}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $index=1;?>
                                    @foreach($list as $item)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td><a href="{{ route('admin.book.show',$item->id) }}">{{ $item->name }}</a></td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->author }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <th>{{ $item->publish_year }}</th>
                                        <td>{{ $item->number_of_page }}</td>
                                        <td>
                                            <a href="{{ route('admin.book.edit',$item->id) }}"><button class="btn btn-info">{!!trans('book_manage_lang.edit' )!!}</button></a>
                                        </td>
                                        <td> 
                                            {!! Form::open(['route' => ['admin.book.destroy', $item->id], 'method' => 'DELETE', 'class' => 'form-inline']) !!}
                                            {!! Form::button(trans('book_manage_lang.delete'), ['class' => 'btn btn-danger',
                                                'data-toggle' => 'modal','data-target' => '#confirmDelete',
                                                'data-title' => trans('book_manage_lang.title_model_confirm'),
                                                'data-message' => trans('book_manage_lang.question_confirm')]) !!}
                                            {!! Form::close() !!}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.addbook.edit',$item->id) }}"><button class="btn btn-primary">{!!trans('book_manage_lang.add_book' )!!}</button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>    
                </div>
@endsection