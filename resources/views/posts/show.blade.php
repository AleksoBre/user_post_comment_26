<x-layout>
    <x-slot:heading>
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold tracking-tight ">
                Post ID: {{ $post->id }}
            </h1>

            <div class="flex items-center gap-x-2">
                <a href="/posts/{{ $post->id }}/edit" 
                class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                    Edit
                </a>

                <form method="POST" action="/posts/{{ $post->id }}" class="inline-flex">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 transition">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </x-slot:heading>

    <div class="max-w-3xl mx-auto mt-6 bg-white p-6 rounded-lg shadow-sm border border-gray-200">
        
        <div class="border-b border-gray-200 pb-4 mb-6">
            
            <div class="flex items-center gap-2 mb-3">
                <span class="text-sm font-semibold text-gray-600">Tags:</span>
                <div class="flex gap-2">
                    @foreach ($post->tags as $tag)
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs rounded-full">
                            <a href="/tags/{{ $tag->id }}">{{ $tag->name }}</a>
                        </span>
                    @endforeach
                </div>
            </div>

            <div class="text-sm text-gray-600 space-y-1">
                <p>
                    <span class="font-semibold">Created by:</span> 
                    <a href="/users/{{ $post->user->id }}" class="text-blue-500 hover:underline hover:text-blue-700">
                        {{ $post->user->username }}
                    </a>
                </p>
                <p><span class="font-semibold">Email:</span> {{ $post->user->email }}</p>
            </div>
        </div>

        <div class="text-gray-800 text-lg mb-10 leading-relaxed">
            <p>{{ $post->content }}</p>
        </div>

        <div class="bg-gray-50 p-5 rounded-lg border border-gray-100">
            <div class="flex-col">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Comments</h3>
                @auth
                <a href="/posts/{{ $post->id }}/comment" class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Add comment</a>
                @endauth
                @guest
                    <p class="text-black">Log in to add a comment!</p>
                @endguest
            </div>

            <div class="space-y-4">
                @foreach ($post->comments as $comment)
                    <div class="bg-white p-4 rounded-md border border-gray-200 shadow-sm">
                        <p class="text-gray-700 mb-2">{{ $comment->content }}</p>
                        <p class="text-xs text-gray-500">
                            By: 
                            <a href="/users/{{ $comment->user->id }}" class="text-blue-500 hover:underline font-medium">
                                {{ $comment->user->username }}
                            </a>
                        </p>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</x-layout>