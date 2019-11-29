@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">{{ isset($tag)? 'Edit Tag' : 'New Tag'}}</div>

    <div class="card-body">
        @if(count($errors) > 0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
            <li class="list-group-item text-danger"> {{$error}} </li>
            @endforeach
        </ul>
        @endif

        <form action=" {{ isset($tag) ? route('tags.update',['id' => $tag->id]) : route('tags.store')}}" method="post">
            @csrf
            @if(isset($tag))
              @method('PUT')
            @endif
            <div class="form-group">
                <label for="title">Tag Name</label>
                <input type="text" name="name" class="form-control" value="{{ isset($tag) ? $tag->name : '' }}">
            </div>
            <div class="form-group">
                <button class="btn btn-success btn-block" type="submit">
                    {{ isset($tag) ? 'Update Tag' : 'Store Tag' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection