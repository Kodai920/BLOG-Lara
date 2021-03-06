@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">{{isset($posts) ?'Create Post' : 'Edit Post' }} </div>

    <div class="card-body">


        @if(count($errors) > 0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
            <li class="list-group-item text-danger"> {{$error}} </li>
            @endforeach
        </ul>
        @endif

        <form action=" {{ isset($post) ? route('posts.store') : route('posts.update',['id' => $post->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" name="title" class="form-control" value=" {{isset($posts) ? '' : $post->name}} ">
            </div>

            <div class="form-group">
                <input id="description" type="hidden" name="description" class="form-control">
                <trix-editor input="description">{{isset($posts) ? '' : $post->description}} </trix-editor>
            </div>

            <div class="form-group">
                <label for="description">Featured image</label>
                <input type="file" name="featured" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="category">Select a category</label>
                <select name="category" id="category" class="form-control">
                    @foreach ($categories as $category)
                        <option value=" {{$category->id }} "> {{$category->name }} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tag">Select tags</label>
                @foreach($tags as $tag)
                   <label> <input type="checkbox" name="tags[]" value="{{$tag->id}}"> {{$tag->name}} </label>
                @endforeach
            </div>

            <div class="form-group">
                <button class="btn btn-success btn-block" type="submit">{{isset($posts) ?'Store Post' : 'Update Post' }} </button>
            </div>
        </form>
    </div>
</div>
@endsection
