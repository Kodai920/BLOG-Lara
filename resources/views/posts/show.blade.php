@extends('layouts.app')
@section('content')


<h1 class="text-center">Post Details</h1>

        <div class="card">
        <div class="card-header">{{ $post->title }}</div>
        <div class="card-body">
            <div>{!! $post->description !!}</div>
            <hr>
            <div><img src="{{ asset($post->featured_img)}}" width="80px" height="80px"></div>
            <p>Created By: {{ $user->name }}</p>
        <a class="btn btn-secondary float-right" href="{{route('posts.index')}}">Go Back</a>
        </div>
        </div>

@endsection