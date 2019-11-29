@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">Update Profile</div>
    <div class="card-body">
            @if(count($errors) > 0)
            <ul class="list-group">
                @foreach($errors->all() as $error)
                <li class="list-group-item text-danger"> {{$error}} </li>
                @endforeach
            </ul>
            @endif
    <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">User Name</label>
                <input type="text" name="name" value="{{$user->name}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input type="text" name="email" value="{{$user->email}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="avator">Upload new avator</label>
                <input type="file" name="avator" class="form-control">
            </div>
            <div class="form-group">
                <label for="about">About</label>
                <textarea name="about" id="" cols="30" rows="10"> {{ $user->profile->about }} </textarea>
            </div>
            <div class="form-group">
                <label for="facebook">Facebook Profile</label>
            <input type="text" name="facebook" class="form-control" value="{{$user->profile->facebook}}">
            </div>
            <div class="form-group">
                <label for="linkedin">Linkedin Profile</label>
                <input type="text" name="linkedin" class="form-control" value="{{$user->profile->linkedin}}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Updste Profile</button>
            </div>
        </form>
    </div>
</div>

@endsection