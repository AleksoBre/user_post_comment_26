<x-layout>
    <x-slot:heading>Posts</x-slot:heading>

    <div class="container mx-auto px-4 pt-8">
        <div class="flex items-center justify-between">
            <div>
                @if(request('filter') === 'has_comments')
                    <a href="/posts" 
                    class="inline-flex items-center gap-x-2 rounded-lg bg-gray-100 dark:bg-gray-700 px-4 py-2 text-sm font-semibold text-gray-700 dark:text-gray-200 shadow-sm hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Clear Filter
                    </a>
                @else
                    <a href="/posts?filter=has_comments" 
                    class="inline-flex items-center gap-x-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 px-4 py-2 text-sm font-semibold text-gray-700 dark:text-gray-200 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                        </svg>
                        Show only posts with comments
                    </a>
                @endif
            </div>

            @auth
            <a href="/posts/create" 
                class="inline-flex items-center gap-x-2 rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-200 hover:-translate-y-0.5 active:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Create Post
            </a>
            @endauth
        </div>
    </div>
    <div class="container mx-auto py-8 px-4">
        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($posts as $post)
                    <li class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                        <a href="/posts/{{ $post->id }}" class="block px-6 py-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center min-w-0">
                                    <div class="h-10 w-10 flex-shrink-0 rounded-full bg-indigo-100 dark:bg-indigo-900 flex items-center justify-center">
                                        <span class="text-sm font-medium text-indigo-700 dark:text-indigo-300">
                                            {{ strtoupper(substr($post->content, 0, 2)) }}
                                        </span>
                                    </div>
                                    
                                    <div class="ml-4">
                                        <p class="text-sm font-semibold text-gray-900 dark:text-white truncate">
                                            {{ $post->content }}
                                        </p>
                                        
                                        <div class="flex items-center space-x-2">
                                            <span class="text-xs font-medium text-indigo-600 dark:text-indigo-400">
                                                By {{ $post->user->username }}
                                            </span>
                                            
                                            <span class="text-gray-300 dark:text-gray-600">•</span>

                                            <span class="text-xs font-medium text-emerald-600 dark:text-emerald-400">
                                                {{ $post->comments_count }} {{ Str::plural('comment', $post->comments_count) }}
                                            </span>

                                            <span class="text-gray-300 dark:text-gray-600">•</span>

                                            <span class="text-xs font-medium text-orange-600 dark:text-orange-400">
                                                @foreach ($post->tags as $tag)
                                                    {{$tag->name}}
                                                @endforeach
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </div>
</x-layout>

