@extends('layouts.app')
@section('content')

@include('commons.image-gallery')

<div class="main-container row">
  <div class="main-wrapper col-md-8 offset-md-2">
    <div class="note-container">
      <div class="note">
        <div class="note-wrapper">
          <h2 class="">Title: {{ $note->title }}</h2>
          <p class="">Description: {{ $note->description }}</p>
          <p class="">Auther: {{ $auther->name }}</p>
          <p class="article">Article: </br>{!! nl2br($note->article) !!}</p>
          <div class="row">
            @if(Auth::id() === $note->user_id)
            <div class="col-md-1">  
              <a href="{{ route('notes.edit', $note->id)}}" class="btn btn-secondary btn-sm mt-3">Edit</a>
            </div>
            <div class="col-md-1 share_protect">
              @include('commons.share_button')
            </div>
            <div class="col-md-1 offset-md-8 delete-button">
              {!! Form::open(['route' => ['notes.destroy', $note->id], 'method' => 'delete']) !!}
                  {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm mt-3 delete-btn']) !!}
              {!! Form::close() !!}
            </div>
            @endif
          </div>
        </div>
      </div>
     </div>
    </div>
</div>
@include('commons.scroll_btn')
@include('commons.responsive_gallery')

@endsection