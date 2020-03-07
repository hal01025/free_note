@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="text-center">登録はこちら</h2>
    <button class="btn text-center"><a href="{{ route('signup.get') }}">新規登録</a></button>
@endsection