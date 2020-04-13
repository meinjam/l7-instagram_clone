@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row pt-5">
        <div class="col-2"></div>
        <div class="col-5">
            <img src="{{ asset($postt->image) }}" class="float-right img-fluid">
        </div>
        <div class="col-3">
            <div>
                <h3>{{ $postt->user->username}}</h3>
                <p>{{ $postt->caption}}</p>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>
@endsection