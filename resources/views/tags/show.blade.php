<x-layout>
    <x-slot:heading>Posts with tag: {{$tag->name}}</x-slot:heading>

    @foreach ($tag->posts as $post)
        Comment: {{$post->content}} <br>
        Created by: {{$post->user->username}} <br>
        # of comments: {{ $post->comments_count }} <br><br>

    @endforeach
</x-layout>