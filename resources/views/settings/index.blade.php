@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">Edit Blog Settings</div>
    <div class="card-body">
    <form action="{{route('settings.update')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Site Name</label>
                <input type="text" name="site_name" value="{{$settings->site_name}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Contact Number</label>
                <input type="text" name="contact_number" value="{{$settings->contact_number}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Contact Email</label>
                <input type="email" name="contact_email" value="{{$settings->contact_email}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" value="{{$settings->address}}" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Updste Setting</button>
            </div>
        </form>
    </div>
</div>

@endsection