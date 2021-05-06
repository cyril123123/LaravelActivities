@extends('layouts.app')

@section('content')
 

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <a class="btn btn-success pull-right" href="/posts/create">Create User</a>

            <div class="card">
                <div class="card-body">
                   
                        Title: {{$post->title}}<br>
                        Description: {{$post->description}}<br>
                        Created At: {{$post->created_at}}<br>
                        @if ($post->img != '')
                         Image: 
                        <img src="{{ asset('/storage/img/'.$post->img) }} ">
                        @endif
                        @include('/posts/comments')
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection