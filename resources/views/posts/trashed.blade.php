@extends('layouts.app')
@section('content')

<div class="card">
        <div class="card-header">Trashed Posts</div>

        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>Image</th>
                    <th>Title</th>
                </thead>
                <tbody>
                    @if($posts->count() > 0)
                    @foreach($posts as $post)
                    <tr>
                    <td><img src="{{ $post->featured_img }}" width="80px" height="80px"></td>
                    <td>
                        {{ $post->title}}
                    </td>
                    <td>
                        <a href="{{ route('posts.restore',['id'=>$post->id]) }}" class="btn btn-info">Restore</a>
                    </td>
                    <td>
                        <a href="{{ route('posts.kill',['id'=>$post->id]) }}" class="btn btn-danger">Destroy</a>
                    </td>
                    </tr>
                    @endforeach
                @else
                <tr>
                    <th colspan=2 class="text-center" >No trashed posts yet!</th>
                </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection