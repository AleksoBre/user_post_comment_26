<x-layout>
    <x-slot:heading>Users</x-slot:heading>

<div class="container mx-auto py-8 px-4">
    <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($users as $user)
                <li class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                    <a href="/users/{{ $user->id }}" class="block px-6 py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center min-w-0">
                                <div class="h-10 w-10 flex-shrink-0 rounded-full bg-indigo-100 dark:bg-indigo-900 flex items-center justify-center">
                                    <span class="text-sm font-medium text-indigo-700 dark:text-indigo-300">
                                        {{ strtoupper(substr($user->usename, 0, 2)) }}
                                    </span>
                                </div>
                                
                                <div class="ml-4">
                                    <p class="text-sm font-semibold text-gray-900 dark:text-white truncate">
                                        {{ $user->username }}
                                    </p>
                                    
                                    <div class="flex items-center space-x-3 mt-1">
                                        <p class="text-xs text-gray-500 dark:text-gray-400 truncate">
                                            {{ $user->email }}
                                        </p>
                                        <span class="text-gray-300 dark:text-gray-600">•</span>
                                        <div class="flex items-center space-x-2">
                                            <span class="text-xs font-medium text-blue-600 dark:text-blue-400">
                                                {{ $user->posts_count }} {{ Str::plural('post', $user->posts_count) }}
                                            </span>
                                            <span class="text-xs font-medium text-emerald-600 dark:text-emerald-400">
                                                {{ $user->comments_count }} {{ Str::plural('comment', $user->comments_count) }}
                                            </span>
                                        </div>
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
        {{ $users->links() }}
    </div>
</div>


</x-layout>