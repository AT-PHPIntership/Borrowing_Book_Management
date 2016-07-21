@extends('admin.layouts.master')

@section('title', trans('user.manage_user'))

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            {!! trans('user.manage_user') !!}
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>
                <a href="{!! route('home.admin') !!}">{!! trans('labels.dashboard') !!}</a>
            </li>
            <li class="active">
                <i class="fa fa-table"></i> {!! trans('user.manage_user') !!}
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col col-md-12">
        <div class="table-responsive">
            <table id="list_users" class="text-center display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">{!! trans('user.no') !!}</th>
                        <th class="text-center">{!! trans('user.full_name') !!}</th>
                        <th class="text-center">{!! trans('user.birthday') !!}</th>
                        <th class="text-center">{!! trans('user.gender') !!}</th>
                        <th class="text-center">{!! trans('user.phone') !!}</th>
                        <th class="text-center">{!! trans('user.address') !!}</th>
                        <th class="text-center">{!! trans('labels.edit') !!}</th>
                        <th class="text-center">{!! trans('labels.delete') !!}</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index=1; ?>
                    @foreach($users as $user)
                    <tr>
                        <td>{!! $index++ !!}</td>
                        <td><a href="{!! route('admin.user.show', $user ->id) !!}">{!! $user->fullname !!}</a></td>
                        <td>{!! $user->birthday !!}</td>
                        <td>{!! $user->gender !!}</td>
                        <td>{!! $user->phone !!}</td>
                        <td>{!! $user->address !!}</td>
                        <td>
                            <a href="{{ route('admin.user.edit',$user ->id)}}"><button class="btn btn-info">{!!trans('labels.edit' )!!}</button></a>
                        </td>
                        <td>
                            {!! Form::open(['route' => ['admin.user.destroy', $user->id], 'method' => 'DELETE', 'class' => 'form-inline']) !!}
                            {!! Form::button(trans('labels.delete'), ['class' => 'btn btn-danger',
                            'data-toggle' => 'modal','data-target' => '#confirmDelete',
                            'data-title' => trans('user.title_delete'),
                            'data-message' => trans('user.confirm')]) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>                       
</div>
@endsection