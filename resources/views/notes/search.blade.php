@extends('layouts.app')
@section('content')
@include('commons.image-gallery')
<div class="main-container row">
  <div class="main-wrapper col-md-8 offset-md-2">
    <div class="note-container">
      <div class="note">
        <div class="note-wrapper">
          <div class="container">
            <h2 class="mt-3 mb-3">Search_result</h2>
            @foreach($notes as $key=>$note)
              <h3 class="mt-2 mb-3">Title: {{ $note['title'] }}</h3>
              <p class="mt-2 mb-3">Description: {{ $note['description'] }}</p>
              <a href="{{ route('note_details.show', $note['id']) }}" class=""><div class="link-tag"><p>link</p></div></a>
            @endforeach
            <!--<div class="pagination-wrapper">
              <div class="pagination-box">{{ $notes->links('pagination::bootstrap-4') }}</div>
            </div>-->
          </div>
        </div>
      </div>
     </div>
    </div>
</div>
@include('commons.scroll_btn')
@endsection