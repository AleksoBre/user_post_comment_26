<x-layout>
    <x-slot:heading>User Profile: {{ $user->username }}</x-slot:heading>

    <div class="max-w-4xl mx-auto mt-8 space-y-8">
        
        <form action="/users/{{$user->id}}" method="post">
            @csrf
            @method('DELETE')
            <button>Delete User</button>
        </form>
        {{-- OVO DUGME SE POJAVLJUJE SAMO AKO SAM ULOGOVAN KAO TAJ USER --}}
        <a href="/users/{{ $user->id }}/edit">Edit User</a>
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 border-b border-gray-200 px-6 py-4">
                <h2 class="text-lg font-bold text-gray-800">Account Details</h2>
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