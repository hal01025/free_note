@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-sm-6 offset-sm-3">

        {!! Form::open(['route' => ['notes.store', $id]]) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Description') !!}
                {!! Form::text('description', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('article', 'Article') !!}
                {!! Form::textarea('article', null, ['class' => 'form-control']) !!}
            </div>


            {!! Form::submit('Create note', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    </div>
</div>
    

@endsection