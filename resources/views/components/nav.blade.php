<nav class="space-x-4">
    <a href="{{ route("home") }}" class="text-gray-600 hover:text-blue-600">Home</a>
    <a href="#" class="text-gray-600 hover:text-blue-600">Listings</a>
    <a href="#" class="text-gray-600 hover:text-blue-600">Contact</a>
    @auth
        <span class="text-green-600 font-semibold">{{ Auth::user()->name }}</span>
        <form method="POST" action="{{ route("user.logout") }}" class="inline">
            @csrf
            <button type="submit" class="cursor-pointer text-red-500 hover:underline ml-2">Logout</button>
        </form>
    @else
        <a href="{{ route("user.login") }}" class="text-blue-600 font-semibold">Login</a>
        <a href="{{ route("user.register") }}" class="text-blue-600 font-semibold hidden sm:inline">Register</a>
    @endauth
</nav>
