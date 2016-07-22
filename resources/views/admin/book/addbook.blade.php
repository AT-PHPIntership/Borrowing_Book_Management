@extends('admin.layouts.master')

@section('title', trans('book_manage_lang.title_add_book'))

@section('content')
<!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                {!!trans('book_manage_lang.add_quantity_book')!!}
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>
                    <a href="{{ route('home.admin') }}">{!!trans('book_manage_lang.dashboard' )!!} </a>
                </li>
                <li>
                    <i class="fa fa-pencil fa-fw"></i>
                    <a href="{{ route('admin.book.index') }}">{!!trans('book_manage_lang.manage_book' )!!} </a>
                </li>
                <li class="active">
                    <i class="fa fa-plus-square fa-fw"></i> {!!trans('book_manage_lang.add_quantity_book' )!!}  
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="row" id="formaddbook">
        <div class="col-lg-offset-2 col-lg-8 thumbnail" >
            <h2 class="text-center">{!!trans('book_manage_lang.add_quantity_book' )!!}</h2>
                    {!! Form::model($book, ['route' => ['admin.addbook.update', $book->id], 'method' => 'PUT']) !!}
                    <div class="form-group{{ $errors->has('quantity_additional') ? ' has-error' : '' }}">
                    {{ Form::label('quantity_additional', trans('book_manage_lang.quantity_additional')) }}
                    {{ Form::number('quantity_additional', null, ['class' => 'form-control input-lg'])}}
                        @if ($errors->has('quantity_additional'))
                            <span class="help-block">
                                <strong>{{ $errors->first('quantity_additional') }}</strong>
                            </span>
                        @endif
                        </div>
                    {{ Form::submit(trans('book_manage_lang.add_quantity_book'), ['class' => 'btn btn-success btn-block btn-lg '])}}
                    {!! Form::close() !!}
        </div>    
    </div>
@endsection