<x-layout>
    <x-slot:heading>User: {{$user->username}}</x-slot:heading>
    <div>
        <ul>
            <li>ID: {{ $user->id }}</li>
            <li>Username: {{ $user->username }}</li>
            <li>email: {{ $user->email }}</li>
            <li># of comments: {{ $user->comments_count }}</li>
        </ul>
        <p>Tip: Click on the post text to go to the post</p>
        <br><br>
        <ul>
            @foreach ($user->posts as $post)
                <a href="/posts/{{ $post->id }}"><li>{{$post->content}}</li></a>
                <br>
            @endforeach
        </ul>
    </div>
</x-layout>