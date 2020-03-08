@extends('layouts.app')
@section('content')

@foreach($notes as $note)
    <p>{{ $note->title }}</p>
    <p>{{ $note->description }}</p>
@endforeach 

@endsection