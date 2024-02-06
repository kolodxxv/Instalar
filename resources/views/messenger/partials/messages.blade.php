<div class="media">
    <div class="media-body" style="display: flex;">
        <div class="user-info">
            <img src="{{ $message->user->profile->profileImage() }}"
            alt="{{ $message->user->name }}" class="img-circle"
            style="max-width: 30px; border-radius: 3ch;">
            {{-- <p class="media-heading">{{ $message->user->name }}</p> --}}
        </div>
        <div class="message-context" style="float: right; padding-left: 10px;">
            <p>{{ $message->body }}</p>
        </div>
        <small class="text-muted" style="float: right; padding-left: 20px;">{{ $message->created_at->diffForHumans() }}</small>
        
        
    </div>
</div>