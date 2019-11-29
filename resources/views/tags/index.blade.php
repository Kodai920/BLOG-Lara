@extends('layouts.app')
@section('content')


<div class="card">
    <div class="card-header">All Tags</div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <th>Name</th>
                <th></th>
            </thead>
            <tbody>
                @if($tags->count() > 0)
                @foreach ($tags as $tag)
                <tr>
                <td>{{$tag->name}}</td>
                <td>
                    <a href=" {{route('tags.edit',['id' => $tag->id])}} " class="btn btn-info">Edit</a>
                </td>
                <td>
                    <form action="{{route('tags.destroy',['id'=>$tag->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan=2>No Tags found yet.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>



@endsection