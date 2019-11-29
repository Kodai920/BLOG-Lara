@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">Edit Post</div>

    <div class="card-body">

        @if(count($errors) > 0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
            <li class="list-group-item text-danger"> {{$error}} </li>
            @endforeach
        </ul>
        @endif
        <form action=" {{ route('posts.update',['id'=>$post->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                {{-- <textarea name="description" id="" cols="5" rows="5" class="form-control">{{ $post->description }}</textarea> --}}
            <input id="description" type="hidden" name="description" class="form-control" value="{{$post->description}}">
                <trix-editor input="description"></trix-editor>
            </div>
            <div class="form-group">
                <label for="featured">Featured image</label>
                <input type="file" name="featured" class="form-control-file">
            </div>

            <div class="form-group">
                    <label for="category">Select a category</label>
                    <select name="category" id="category" class="form-control">
                        @foreach ($categories as $category)
                            <option value=" {{$category->id }} "
                                @if($post->category_id == $category->id)
                                   selected
                                @endif
                                > {{$category->name }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tag">Select tags</label>
                    @foreach($tags as $tag)
                       <label> <input type="checkbox" name="tags[]" value="{{$tag->id}}"

                        @foreach($post->tags as $ta)
                           @if($tag->id == $ta->id)
                              checked
                           @endif
                        @endforeach
                        > {{$tag->name}} </label>
                    @endforeach
                </div>

            <div class="form-group">
                <button class="btn btn-success btn-block" type="submit">Update Post</button>
            </div>
        </form>
    </div>
</div>
@endsection