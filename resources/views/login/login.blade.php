@extends('app')
@section('content')
<h1>Login</h1>

    {!! Form::open(['route'=>'login']) !!}
    {!! csrf_field() !!}

        <div class="form-group">
            {!! Form::label('email', 'email:') !!}
            {!! Form::email('email', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Password', 'Password:') !!}
            {!! Form::Password('Password', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('remember', 'Remember Me:') !!}
            {!! Form::checkbox('remember', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Login', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}   
@endsection
