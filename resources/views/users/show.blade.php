<x-layout>
    <x-slot:heading>User: {{$user->username}}</x-slot:heading>
    <div>
        <ul>
            <li>ID: {{ $user->id }}</li>
            <li>Username: {{ $user->username }}</li>
            <li>email: {{ $user->email }}</li>
        </ul>
    </div>
</x-layout>