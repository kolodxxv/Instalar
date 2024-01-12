@extends('layouts.app')

@section('content')
<Navbar :user="{{ $user->id }}"></Navbar>
<div class="container">
    @foreach($posts as $post)
        <div class="row">
            <div class="col-sm-6 offset-3">
                <a href="/profile/{{ $post->user->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        </div>
        <div class="row pt-2 pb-4">
            <div class="col-6 offset-3">
                <div>
                    <p>
                    <span style="font-weight: bold;">
                        <a href="/profile/{{ $post->user->id }}" style="text-decoration:none; color: black">{{ $post->user->username }}
                        </a>
                    </span> {{ $post->caption }}
                    </p>
                </div>
            </div>
        </div>
    @endforeach

        {{-- Pagination --}}
        {{-- <div class="row">
            <div class=" col-12 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div> --}}
</div>
@endsection