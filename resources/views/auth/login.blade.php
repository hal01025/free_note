@extends('layouts.app')

<head>
    <link rel="stylesheet" href="{{ secure_asset('css/auth/login.css') }}">
</head>

@section('content')
@include("commons.error_messages")
<div class="login">
    <div class="login-container">
        <div class="login-wrapper col-sm-6 offset-sm-3">
            <h2 class="text-center">Log_in</h2>
            <div class="login-form">
            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    <p>{!! Form::label('email', 'Email') !!}</p>
                    <p>{!! Form::email('email', old('email'), ['class' => 'form-control']) !!}</p>
                </div>

                <div class="form-group">
                    <p>{!! Form::label('password', 'Password') !!}</p>
                    <p>{!! Form::password('password', ['class' => 'form-control']) !!}</p>
                </div>
                
                <div class="form-group text-center">
                <p>{!! Form::submit('Log in', ['class' => 'btn btn-secondary']) !!}</p>
                </div>
            {!! Form::close() !!}
            <p class="mt-2 text-center mb-2 to-registration">新規登録の方は {!! link_to_route('signup.get', 'sign_up!') !!}</p>
            </div>
        </div>
    </div>
</div>

    
@endsection