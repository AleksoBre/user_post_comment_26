<x-layout>
    <x-slot:heading>Post id: {{$post->id}}</x-slot:heading>
    <div>
        <ul>
            <li>ID: {{ $post->id }}</li>
            <li>Created by: <a href="/users/{{ $post->user->id }}">{{ $post->user->username }}</a></li>
            <li>email: {{ $post->user->email }}</li>
        </ul>
        <br><br>
        <p>Post: {{$post->content}}</p>
        <br><br>
        <p>Comments</p>
        <ul>
            @foreach ($post->comments as $comment)
                <li>{{$comment->content}}</li>
                <li>By: <a href="/users/{{ $comment->user->id }}">{{ $comment->user->username }}</a></li>
                <br>
            @endforeach
        </ul>
    </div>
</x-layout>