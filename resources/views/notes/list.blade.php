@extends('layouts.app')
@section('content')

<head>
    <link rel="stylesheet" href="{{ secure_asset('css/notes/list.css') }}">
</head>

@include('commons.image-gallery')
<div class="main-container row">
  <div class="main-wrapper col-md-8 offset-md-2">
    <div class="note-container">
      <div class="note">
        <div class="note-wrapper">
          <div class="container">  
            <h2 class="mt-3 mb-3">{{ $genre->genre }}</h2>
            @foreach($notes as $note)
              <h3 class="mt-2">
                Title: {{ $note->title }}
                @if(Auth::user()->is_shared($note->id))
                <span class="badge badge-info shared">shared</span>
                @else
                <span class="badge badge-dark protected">protected</span>
                @endif
              </h3>
              <p class="mb-3">description: {{ $note->description }}</p>
              <a href="{{ route('note_details.show', $note->id) }}" class=""><div class="link-tag"><p>link</p></div></a>
            @endforeach
          </div>
          <div class="pagination-wrapper">
            <div class="pagination-box">{{ $notes->links('pagination::bootstrap-4') }}</div>
          </div>
        </div>
      </div>
     </div>
    </div>
</div>
@include('commons.scroll_btn')
@endsection