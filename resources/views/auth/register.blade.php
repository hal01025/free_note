@extends('layouts.app')

<head>
    <link rel="stylesheet" href="{{ secure_asset('css/auth/register.css') }}">
</head>

@section('content')
@include("commons.error_messages")
<div class="register">
    <div class="register-container">
        <div class="register-wrapper col-sm-6 offset-sm-3">
            <h2 class="text-center">Registration</h2>
            <div class="register-form">
            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    <p>{!! Form::label('name', 'Name') !!}</p>
                    <p>{!! Form::text('name', old('name'), ['class' => 'form-control']) !!}</p>
                </div>

                <div class="form-group">
                    <p>{!! Form::label('email', 'Email') !!}</p>
                    <p>{!! Form::email('email', old('email'), ['class' => 'form-control']) !!}</p>
                </div>

                <div class="form-group">
                    <p>{!! Form::label('password', 'Password') !!}</p>
                    <p>{!! Form::password('password', ['class' => 'form-control']) !!}</p>
                </div>

                <div class="form-group">
                    <p>{!! Form::label('password_confirmation', 'Confirmation') !!}</p>
                    <p>{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}</p>
                </div>
                
                <div class="text-center">
                <p>{!! Form::submit('Sign up', ['class' => 'btn btn-secondary']) !!}</p>
                </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection