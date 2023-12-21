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
                        <img src="/storage/{{ $post->user->profile->image }}" class="rounded-circle w-100" style="max-width: 40px">
                    </div>
                    <div>
                        <div style="font-weight: bold;">{{ $post->user->username }}</div>
                    </div>
                </div>
            </div>
            <hr>
            
            <p>{{ $post->caption }}</p>
        </div>
    </div>
</div>
@endsection