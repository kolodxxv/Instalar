@extends('layouts.app')

@section ('content')


<body>
    <div class="container">
        <div class="content-msg" style="padding-left: 70px">
            <div class="msg-container">
                @include('messenger.partials.flash')
                <div class="msg-box">
                    @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
                </div>
            </div>
        </div>
    </div>
</body>


 {{-- <a href="/messages">Messages @include('messenger.unread-count')</a> --}}
 @endsection

 <style>
    .alert {
        /* background: rgb(226, 224, 221); */
        border-radius: 30px;
        opacity: 1.5;
        box-shadow: 1px 1px 5px 1px;
    }
 </style>