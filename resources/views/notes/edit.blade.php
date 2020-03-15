@extends('layouts.app')
@section('content')

<head>
    <link rel="stylesheet" href="{{ secure_asset('css/notes/create.css') }}">
</head>

@include('commons.image-gallery')
@include("commons.error_messages")
<div class="main-container row">
  <div class="main-wrapper col-md-8 offset-md-2">
    <div class="note-container">
      <div class="note">
        <div class="note-wrapper">
          <h2>Genre: {{ $genre->genre }}</h2>
            {!! Form::model($note, ['route' => ['notes.update', $note->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', $note->title, ['class' => 'form-control']) !!}
                </div>
    
                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::text('description', $note->description, ['class' => 'form-control']) !!}
                </div>
    
                <div class="form-group">
                    {!! Form::label('article', 'Article') !!}
                    {!! Form::textarea('article', $note->article, ['class' => 'form-control']) !!}
                </div>
    
                {{ csrf_field() }}    
     
                {!! Form::submit('Update note', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
      </div>
     </div>
    </div>
</div>
@include('commons.scroll_btn')
@endsection