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
        <form action="{{ action('NotesController@store', $id) }}" method="post" enctype="multipart/form-data">
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
            
            <div class="form-group">
                <p>画像を複数保存する場合は、shiftを押しながらファイルを選択してください</p>
                <div class="photoform-container mt-3 mb-2 text-center">
                    <label for="photos[][file]" onClick="$('#file').click();">Photos: select image files</label>
                    <input type="file" name="photos[][file]" multiple="multiple" class="photo-form" id="file">
                </div>
            </div>

            {{ csrf_field() }}    
 
            {!! Form::submit('Create note', ['class' => 'btn btn-primary btn-block']) !!}
        </form>
        </div>
      </div>
     </div>
    </div>
</div>

@endsection