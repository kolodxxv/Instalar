@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="w-100">
            <h1>{{ $thread->subject }}</h1>
            @each('messenger.partials.messages', $thread->messages, 'message')
        </div>
        <div class="col-sm-4 col-md-5 col-lg-9" style="position: absolute; bottom: 10px;">
            @include('messenger.partials.form-message')
        </div>
    </div>
@stop

<style>
   input[type="submit"] {
    position: absolute;
    top: 2px;
    right: 5px;
    width: 70px;
    height: 30px;
    border: 0;
    text-decoration: none;
   }

</style>

