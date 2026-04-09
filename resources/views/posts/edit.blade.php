<x-layout>
    <x-slot:heading>Edit post with id = {{$post->id}}</x-slot:heading>

    <form action="/posts/{{$post->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-white/10 pb-12">
            <h2 class="text-base/7 font-semibold text-white">User: {{$post->user->username}}</h2>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="col-span-full">
                <label for="content" class="block text-sm/6 font-medium text-white">Text</label>
                <div class="mt-2">
                    <textarea id="content" name="content" rows="3" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" required>{{$post->content}}</textarea>
                    @error('content')
                        <p class="text-red-500 text-sm">Content must be longer than 2 characters</p>
                    @enderror
                </div>
                </div>
            </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/posts" class="text-sm/6 font-semibold text-white">Cancel</a>
            <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 cursor-pointer">Save</button>
        </div>
    </form>

</x-layout>