@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/img/profile.jpg" class="rounded-circle">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="#">Add New Post</a>
            </div>
            <div class="d-flex">
                <div class="pe-5"><strong>0</strong> posts</div>
                <div class="pe-5"><strong>0</strong> followers</div>
                <div class="pe-5"><strong>0</strong> following</div>
            </div>
            <div class="pt-4"><strong>{{ $user->profile->title }}</strong></div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>

    <div class="row pt-4">
        <div class="col-4">
            <img src="/img/profile1.jpeg" class="w-100">
        </div>
        <div class="col-4">
            <img src="/img/profile2.jpeg" class="w-100 h-100">
        </div>
        <div class="col-4">
            <img src="/img/profile3.jpeg" class="w-100">
        </div>
    </div>
</div>
@endsection
