<x-layout>
    <x-slot:heading>
        <span class="text-gray-500 font-normal">Posts tagged with:</span> #{{ $tag->name }}
    </x-slot:heading>

    <div class="max-w-4xl mx-auto mt-8 px-4">
        <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-700">
                Latest Content
            </h2>
            <span class="bg-blue-50 text-blue-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                {{ $tag->posts->count() }} total posts
            </span>
        </div>

        <div class="space-y-6">
            @foreach ($tag->posts as $post)
                <div class="group relative bg-white p-6 rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition-all duration-200">
                    
                    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                        <div class="flex-1">
                            <a href="/posts/{{ $post->id }}" class="block group">
                                <p class="text-gray-800 text-lg leading-relaxed group-hover:text-blue-600 transition-colors">
                                    {{ $post->content }}
                                </p>
                            </a>
                            
                            <div class="mt-4 flex items-center gap-2">
                                <div class="h-6 w-6 rounded-full bg-gradient-to-tr from-blue-400 to-indigo-500 flex items-center justify-center text-[10px] text-white font-bold">
                                    {{ strtoupper(substr($post->user->username, 0, 1)) }}
                                </div>
                                <span class="text-sm text-gray-500">
                                    Published by 
                                    <a href="/users/{{ $post->user->id }}" class="font-medium text-gray-900 hover:text-blue-500 underline decoration-gray-200 underline-offset-4">
                                        {{ $post->user->username }}
                                    </a>
                                </span>
                            </div>
                        </div>

                        <div class="flex flex-row md:flex-col items-center justify-center bg-gray-50 rounded-lg p-3 border border-gray-100 min-w-[80px]">
                            <span class="text-xl font-bold text-gray-800">{{ $post->comments_count }}</span>
                            <span class="text-[10px] uppercase font-bold text-gray-400 tracking-tighter">Comments</span>
                        </div>
                    </div>

                    <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="text-blue-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                            </svg>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

        @if($tag->posts->isEmpty())
            <div class="text-center py-20 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200">
                <p class="text-gray-500 text-lg">No posts have been tagged with #{{ $tag->name }} yet.</p>
            </div>
        @endif
    </div>
</x-layout>