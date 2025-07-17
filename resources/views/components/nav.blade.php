<nav class="space-x-4">
    <a href="#" class="text-gray-600 hover:text-blue-600">Home</a>
    <a href="#" class="text-gray-600 hover:text-blue-600">Listings</a>
    <a href="#" class="text-gray-600 hover:text-blue-600">Contact</a>
    @auth
        <span class="text-green-600 font-semibold">{{ Auth::user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="text-red-500 hover:underline ml-2">Logout</button>
        </form>
    @else
        <a href="" class="text-blue-600 font-semibold">Login</a>
        <a href="" class="text-blue-600 font-semibold">Register</a>
    @endauth
</nav>
