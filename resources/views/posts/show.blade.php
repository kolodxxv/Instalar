@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <img src="/storage/{{ $post->image }}" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pe-3">
                        <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" style="max-width: 40px">
                    </div>
                @if (auth()->id() != $post->user->id)
                    <div>
                        <div style="font-weight: bold;">
                            <a href="/profile/{{ $post->user->id}}" style="text-decoration:none; color: black">
                            {{ $post->user->username }}
                            </a>
                            <a href="#" style="text-decoration: none; padding: 10px">Follow</a>
                        </div>
                    </div>
                @endif
                @if (auth()->id() === $post->user->id)
                    <div class="align-items-center">
                        <div>
                            <form action="{{ route('posts.delete', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button style="bord" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                @endif
                </div>
            </div>
            <hr>
            
            <p>
                <span style="font-weight: bold;">
                    <a href="/profile/{{ $post->user->id }}" style="text-decoration:none; color: black">{{ $post->user->username }}</a>
                </span> {{ $post->caption }}
            </p>
        </div>
    </div>
</div>
@endsection