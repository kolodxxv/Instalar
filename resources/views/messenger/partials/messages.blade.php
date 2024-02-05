<div class="media">
    <div class="media-body">
        <div class="user-info">
            <img src="{{ $message->user->profile->profileImage() }}"
            alt="{{ $message->user->name }}" class="img-circle"
            style="max-width: 50px">
            <h5 class="media-heading">{{ $message->user->name }}</h5>
        </div>
        <p>{{ $message->body }}</p>
        <div class="text-muted">
            <small>Posted {{ $message->created_at->diffForHumans() }}</small>
        </div>
    </div>
</div>