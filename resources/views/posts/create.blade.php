@extends('layouts.app')

@section('content')

<div class="container">
    <form method="POST" action="/posts">
        @csrf
        <input type="text" name="title">
        <textarea name="description"></textarea>

        <input type="submit" value="Submit">
    </form>
</div>
@endsection