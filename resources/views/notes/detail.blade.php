@extends('layouts.app')
@section('content')

<div class="container">
    <h2 class="">Title: {{ $note->title }}</h2>
    <p class="">Description: {{ $note->description }}</p>
    <p class="">Article: {{ $note->article }}</p>
    @foreach($photos as $key => $photo)
        <div class="">
            <img src="{{ $photo->photos_url }}" alt="image{{ $key }}">
        </div>
    @endforeach
    
    {!! Form::open(['route' => ['notes.destroy', $note->id], 'method' => 'delete']) !!}
        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
    {!! Form::close() !!}
</div>

@endsection