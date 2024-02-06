
<form action="{{ route('messages.update', $thread->id) }}" method="post">
    {{ method_field('put') }}
    {{ csrf_field() }}
        
    <div class="form-group">
        <input title="text" name="message" class="form-control" placeholder="Message.." id="one"><input type="submit" class="btn form-control" id="two">
        
    </div>

    {{-- @if($users->count() > 0)
        <div class="checkbox">
            @foreach($users as $user)
                <label title="{{ $user->name }}">
                    <input type="checkbox" name="recipients[]" value="{{ $user->id }}">{{ $user->name }}
                </label>
            @endforeach
        </div>
    @endif --}}
</form>