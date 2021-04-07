<x-layout>
    Babysitter platform
    @guest
        <a href="/login">Login</a>
        <a href="/register">Register</a>
    @endguest
    @auth
        <a href="/logout">Logout</a>
    @endauth
</x-layout>
