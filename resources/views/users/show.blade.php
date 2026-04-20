<x-layout>
    <x-slot:heading></x-slot:heading>

    <div class="max-w-4xl mx-auto mt-8 space-y-8">
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

            <div class="bg-gray-50 border-b border-gray-200 px-6 py-4 flex justify-between items-center">
                <h2 class="text-lg font-bold text-gray-800">Account Details</h2>
                

                <div class="flex items-center space-x-3">

                    @can('edit_user', $user)
                    <a href="/users/{{ $user->id }}/edit" 
                    title="Edit Profile"
                    class="text-blue-600 hover:text-blue-700 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition-colors duration-200 border border-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>
                    </a>
                    @endcan

                    @can('delete_user', $user)
                    <form action="/users/{{$user->id}}" method="post" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button title="Delete User" class="cursor-pointer text-red-600 hover:text-red-700 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition-colors duration-200 border border-red-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </form>
                    @endcan
                </div>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">User</p>
                    <p class="text-xl font-bold text-gray-900">{{ $user->username }}</p>
                    <p class="text-sm text-gray-400">ID: #{{ $user->id }}</p>
                </div>

                <div>
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Email Address</p>
                    <p class="text-gray-700">{{ $user->email }}</p>
                </div>

                <div class="flex flex-col items-start md:items-end">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                        {{ $user->comments_count }} Comments written
                    </span>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <div class="flex items-center justify-between mb-4 px-2">
                <h3 class="text-xl font-bold text-gray-800">Recent Posts</h3>
                <span class="text-sm text-gray-500 italic">Tip: Click a card to view the full post</span>
            </div>

            <div class="grid gap-4">
                @forelse ($user->posts as $post)
                    <a href="/posts/{{ $post->id }}" 
                    class="block p-5 bg-white border border-gray-200 rounded-lg hover:border-blue-400 hover:shadow-md transition-all duration-200 group">
                        
                        <div class="flex flex-wrap gap-2 mb-3">
                            @foreach($post->tags as $tag)
                                <span class="text-[10px] uppercase tracking-widest font-bold px-2 py-0.5 bg-gray-100 text-gray-500 rounded group-hover:bg-blue-50 group-hover:text-blue-600 transition-colors">
                                    {{ $tag->name }}
                                </span>
                            @endforeach
                        </div>

                        <div class="flex justify-between items-start">
                            <p class="text-gray-700 group-hover:text-blue-600 transition-colors leading-relaxed">
                                {{ $post->content }}
                            </p>
                            <span class="text-gray-300 group-hover:text-blue-500 ml-4">
                                &rarr;
                            </span>
                        </div>
                    </a>
                @empty
                    <p class="text-gray-500 text-center py-10 bg-gray-50 rounded-lg border-2 border-dashed">
                        This user hasn't posted anything yet.
                    </p>
                @endforelse
            </div>
        </div>

    </div>
</x-layout>