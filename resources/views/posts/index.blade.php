@extends('layouts.app')
@section('content')

<div class="card">
        <div class="card-header">Posts</div>

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
                            <a class="btn btn-primary" href="{{ route('posts.show',['id' => $post->id])}}"><i class="fas fa-eye"></i></a>
                    </td>
                    @if(Auth::check())
                    <td>
                        <a href=" {{route('posts.edit',['id' => $post->id]) }} " class="btn btn-info"><i class="fas fa-edit"></i></a>
                    </td>
                    <td>
                        <form action="{{route('posts.destroy',['id'=>$post->id]) }} " method="post">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-warning">Trash</button>
                    </form>
                    </td>
                    @endif
                    </tr>
                    @endforeach
                @else
                <tr>
                    <th colspan=2 class="text-center" >No posts yet!</th>
                </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection