@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-75">
        </div>
        <div class="col-9 pt-5 text">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                
                @cannot('update', $user->profile)
                <div class="d-flex pe-5">
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>
                @endcan

                @can('update', $user->profile)
                    <a href="/p/create" style="text-decoration: none">Add New Post</a>
                @endcan
            </div>

            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit" style="text-decoration: none">Edit Profile</a>
            @endcan

            <div class="d-flex">
                <div class="pe-5"><strong>{{ $postCount }}</strong> posts</div>
                <div class="pe-5"><strong>{{ $followersCount }}</strong> followers</div>
                <div class="pe-5"><strong>{{ $followingCount }}</strong> following</div>
            </div>
            <div class="pt-4"><strong>{{ $user->profile->title }}</strong></div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>

    <div class="row pt-4">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection


   


