@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row pt-5">
        <div class="col-2"></div>
        <div class="col-5">
            <img src="{{ asset($postt->image) }}" class="float-right img-fluid">
        </div>
        <div class="col-3">
            <div class="d-flex pt-3 align-items-center">
                <div class="pr-3">
                    <a href="/profile/{{ $postt->user->id }}">
                        <img src="{{ asset($postt->user->profile->profilePicture()) }}" class="img-fluid rounded-circle" style="max-width: 40px;">
                    </a>
                </div>
                <div class="d-flex align-items-baseline">
                    <a href="/profile/{{ $postt->user->id }}">
                        <h4>
                            <span class="text-dark">{{ $postt->user->username}}</span>
                        </h4>
                    </a>
                    <a href="" class="pl-2">Follow</a>
                </div>
            </div>
            <hr>
            <div class="d-flex align-items-center">
                <div class="pr-3">
                    <a href="/profile/{{ $postt->user->id }}">
                        <img src="{{ asset($postt->user->profile->image) }}" class="img-fluid rounded-circle" style="max-width: 40px;">
                    </a>
                </div>
                <div>
                    <div>{{ $postt->caption}}</div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>
@endsection