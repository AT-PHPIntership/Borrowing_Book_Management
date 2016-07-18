<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Laravel 5</title>
</head>
<body>
    <h1>Ma so: {!! $users -> id !!}</h1>
    {!! Form::model($users,['method' => 'PATCH','action' => ['UserController@update',$users -> id] ]) !!}
    {!! Form::label('username','User Name:') !!}
    {!! Form::text('username') !!}<br>
    {!! Form::label('fullname','Full Name:') !!}
    {!! Form::text('fullname') !!}<br>
    {!! Form::label('created_at','Created Date:') !!}
    {!! Form::input('date', 'created_at', date("Y-m-d")) !!} <br />
    {!! Form::submit('Cap nhat')!!}
    {!! Form::close() !!}
    @if ( $errors->any() )
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>   
    @endif
</body>
</html>