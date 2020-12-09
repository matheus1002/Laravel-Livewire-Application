<div>
    Show Tweets

    <p>{{ $content }}</p>

    <form method="post" wire:submit.prevent="create">
        <input type="text" name="content" id="content" wire:model="content">
        <button type="submit">Criar Tweet</button>
        @error('content')
            {{ $message }}
        @enderror
    </form>

    <hr>

    @foreach($tweets as $tweet)
        {{ $tweet->user->name }} - {{ $tweet->content }}
        @if($tweet->likes->count())
            <a href="#" wire:click.prevent="unlike({{ $tweet->id }})">Descutir</a>
        @else
            <a href="#" wire:click.prevent="like({{ $tweet->id }})">Curtir</a>
        @endif
        <br>
    @endforeach

    <hr>

    {{ $tweets->links() }}
</div>
