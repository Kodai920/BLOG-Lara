@extends('layouts.app')
@section('content')


<h1 class="text-center">Post Details</h1>

        <div class="card">
        <div class="card-header">{{$post->title}}</div>
        <div class="card-body">
            <div>{!! $post->description !!}
                    <strong> Created By </strong>{{$post->user->name}}<br>
                    <strong>Tags: </strong>
                        @foreach($post->tags as $tag)
                          {{$tag->name}}
                        @endforeach
                    <br>
                    <strong> Category: </strong>{{$post->category->name}}
                </div>
            <hr>
            <div><img src="{{ asset($post->featured_img)}}" width="80px" height="80px"></div>
        <a class="btn btn-secondary float-right" href="{{route('posts.index')}}">Go Back</a>
        </div>
        </div>

@endsection