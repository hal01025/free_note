@extends('layouts.app')
@section('content')

<head>
    <link rel="stylesheet" href="{{ secure_asset('css/notes/index.css') }}">
</head>

@include('commons.image-gallery')
<div class="main-container row">
  <div class="main-wrapper col-md-8 offset-md-2">
    <div class="note-container">
      <div class="note">
        <div class="note-wrapper">
          <div class="container">
            <h2 class="mt-3 mb-3">Public_note</h2>
            @include('commons.search_form')
            @foreach($notes as $note)
              <a href="{{ route('note_details.show', $note['id']) }}" class=""><h3 class="mt-2 mb-2">Title: {{ $note['title'] }}</h3></a>
              <p class="">Description: {{ $note['description'] }}</p>
            @endforeach
            <div class="pagination-wrapper">
              <div class="pagination-box">{{ $notes->links('pagination::bootstrap-4') }}</div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
</div>
@include('commons.scroll_btn')
@endsection