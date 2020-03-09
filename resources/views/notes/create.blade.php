@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-sm-6 offset-sm-3">
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
                <div class="fall-back">
                    <label for="photos[][file]">Photos</label>
                    <input type="file" name="photos[][file]" multiple="multiple">
                </div>
            </div>

            {{ csrf_field() }}    
 
            {!! Form::submit('Create note', ['class' => 'btn btn-primary btn-block']) !!}
        </form>
        
        
        
        
        
        
    </div>
</div>



@endsection