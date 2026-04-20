<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</head>
<body class="h-full">
    <div class="min-h-full">
    <nav class="bg-gray-800/50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="size-8" />
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <x-nav-link href="/" :active="request()->is('/')" >Home</x-nav-link>
                            <x-nav-link href="/users" :active="request()->is('users')" >Users</x-nav-link>
                            <x-nav-link href="/posts" :active="request()->is('posts')" >Posts</x-nav-link>
                        </div>
                    </div>
                </div>
                @guest
                    <div>
                        <x-nav-link href="/login" :active="request()->is('login')">Log In</x-nav-link>
                        <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>

                    </div>
                @endguest
                @auth
                    <div>
                        <p class="text-white">Logged in: {{Auth::user()->username}}</p>
                        <form action="/session" method="post">
                            @csrf
                            @method('DELETE')
                            <x-nav-link :button="true">Log Out</x-nav-link>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <header class="relative bg-gray-800 after:pointer-events-none after:absolute after:inset-x-0 after:inset-y-0 after:border-y after:border-white/10">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-white">{{ $heading }}</h1>
        @auth
            <h1 class="text-white">Hello, {{Auth::user()->username}}!</h1>
        @endauth
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-white">
        {{ $slot }}
        </div>
    </main>
    </div>

</body>
</html>