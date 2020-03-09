@extends('layouts.app')
@section('content')


<div class="container">
    <h2 class="mt-3 mb-3">{{ $genre->genre }}</h2>
    @foreach($notes as $note)
    <div class="">
        <h3 class="mt-2">Title: {{ $note->title }}</h3>
        <p class="mb-3">description: {{ $note->description }}</p>
        <div height="150" width="150"><a href="{{ route('note_details.show', $note->id) }}" class="">link</a></div>
    </div>    
    @endforeach
</div>

@endsection