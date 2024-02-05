@extends('layouts.app')

@section ('content')


<body>
    <div class="container">
       
        
        <div class="content-msg" style="padding-left: 70px">
            <a href="/messages/create"><i class="bx bx-edit"></i></a>
            
            @include('messenger.partials.flash')

            @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
            
        </div>
    </div>
</body>


 {{-- <a href="/messages">Messages @include('messenger.unread-count')</a> --}}
 @endsection