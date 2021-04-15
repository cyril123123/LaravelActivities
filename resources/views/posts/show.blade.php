@extends('layouts.app')

@section('content')
 

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <a class="btn btn-success pull-right" href="/posts/create">Create User</a>

            <div class="card">
                <div class="card-body">
                    @foreach ($post as $posts)
                        Title: {{$posts->title}}<br>
                        Description: {{$posts->description}}<br>
                        Created At: {{$posts->created_at}}<br>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection