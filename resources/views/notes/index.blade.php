@extends('layouts.app')
@section('content')

@foreach($notes as $note)
    <div class="container">
        <p>{{ $note->title }}</p>
        <p>{{ $note->description }}</p>
        @foreach($note->photos() as $photo)
            <p><img src="{{ $photo->get()->photos_url }}">画像</p>
        @endforeach
    </div>
@endforeach 

@endsection