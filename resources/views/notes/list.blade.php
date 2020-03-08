@extends('layouts.app')
@section('content')


<div class="container">
    @foreach($notes as $note)
        <p>{{ $note->article }}</p>
    @endforeach
</div>

@endsection