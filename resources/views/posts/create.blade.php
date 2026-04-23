<x-layout>
    <x-slot:heading>Create a post</x-slot:heading>

    <form action="/posts" method="POST">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-white/10 pb-12">
            <h2 class="text-base/7 font-semibold text-white">Profile</h2>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="col-span-full">
                    <label for="content" class="block text-sm/6 font-medium text-white">Text</label>
                    <div class="mt-2">
                        <textarea id="content" name="content" rows="3" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" required></textarea>
                        @error('content')
                            <p class="text-red-500 text-sm">Content must be longer than 2 characters</p>
                        @enderror
                    </div>
                    
                    <label>Select Tags:</label>
                    <div class="tag-container">
                        @foreach($tags as $tag)
                            <div class="tag-item">
                                <input type="checkbox" 
                                    name="tags[]" 
                                    value="{{ $tag->id }}" 
                                    id="tag-{{ $tag->id }}">
                                <label for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/posts" class="text-sm/6 font-semibold text-white">Cancel</a>
            <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 cursor-pointer">Create</button>
        </div>
    </form>

</x-layout>

