@extends('app')
@section('content')
    {!! Form::open(array('url' => 'login')) !!}
        <h1>Login</h1>
        @if(Session::has('error'))
            <div class="alert-box success">
              <h2>{!! Session::get('error') !!}</h2>
            </div>
        @endif
        <div class="form-group">
            {!! Form::text('email','',array('id'=>'','class'=>'form-control span6','placeholder' => 'Please Enter your Email')) !!}
            <p class="errors">{!!$errors->first('email')!!}</p>
        </div>
        <div class="form-group">
            {!! Form::password('password',array('class'=>'form-control span6', 'placeholder' => 'Please Enter your Password')) !!}
            <p class="errors">{!!$errors->first('password')!!}</p>
        </div>
        <p>{!! Form::submit('Login', array('class'=>'send-btn')) !!}</p>
    {!! Form::close() !!}
@endsection
