@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/img/profile.jpg" class="rounded-circle">
        </div>
        <div class="col-9 pt-5">
            <div><h1>Slavek</h1></div>
            <div class="d-flex">
                <div class="pe-5"><strong>0</strong> posts</div>
                <div class="pe-5"><strong>0</strong> followers</div>
                <div class="pe-5"><strong>0</strong> following</div>
            </div>
            <div class="pt-4"><strong>Clavik Kolodeev</strong></div>
            <div>This is what is this</div>
            <div><a href="https://github.com/kolodxxv">www.github.com/kolodxxv</a></div>
        </div>
    </div>

    <div class='row pt-5'>
        <div class="col-4">
            <img src="/img/profile1.jpeg" class="w-100">
        </div>
    </div>
    <div class='row'>
        <div class="col-4">
            <img src="/img/profile2.jpeg" class="w-100">
        </div>
    </div>
    <div class='row'>
        <div class="col-4">
            <img src="/img/profile3.jpeg" class="w-100">
        </div>
    </div>
</div>
@endsection
