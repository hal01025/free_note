@extends('layouts.app')

<head>
    <link rel="stylesheet" href="{{ secure_asset('css/auth/register.css') }}">
</head>

@section('content')
    <div class="text-center">
        <h2 class="pt-3">Registration</h2>
    </div>

    <div class="row pb-3">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirmation') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
                
                <div class="text-center">
                {!! Form::submit('Sign up', ['class' => 'btn btn-secondary mt-5']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection