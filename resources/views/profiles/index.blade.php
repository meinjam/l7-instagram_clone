@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-3 p-5">
            <img src="{{ asset('img/profile.jpg') }}" height="160" alt="profile image" class="rounded-circle">
        </div>
        <div class="col-md-8 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h2>{{ $users->username}}</h2>
                <a href="/p/create">Add New post</a>
            </div>
            <div class="d-flex">
                <div class="pr-4"><strong>{{ $users->posts->count() }}</strong> posts</div>
                <div class="pr-4"><strong>867k</strong> followers</div>
                <div class="pr-4"><strong>2</strong> following</div>
            </div>
            <div class="pt-4"><h5>{{ $users->profile->title}}</h4></div>
            <div>{{ $users->profile->description}}</div>
            <div><a href="">{{ $users->profile->url}}</a></div>
        </div>
    </div>
    <div class="row">
        @foreach ($users->posts as $post)
            <div class="col-4 pb-4">
                <img src="{{ asset($post->image) }}" width="100%" alt="" class="img img-fluid">
            </div>
        @endforeach
    </div>
</div>
@endsection
