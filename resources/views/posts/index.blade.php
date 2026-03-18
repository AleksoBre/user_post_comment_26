<x-layout>
    <x-slot:heading>Posts</x-slot:heading>

    <div>
        <a href="/posts?filter=has_comments">Show only posts that contain comments</a>
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

