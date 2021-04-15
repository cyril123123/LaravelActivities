@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @foreach ($post as $posts)
                        <form method="POST" action="/posts/{{$posts->id}}">
                            @method('PATCH')
                            @csrf

                                <input type="text" name="title" value="{{$posts->title}}">
                                <textarea name="description" value="{{$posts->description}}">
                                    {{$posts->description}}
                                </textarea>

                                <input type="submit" value="Submit">
                        </form>
                       @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection