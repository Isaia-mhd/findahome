@extends("layouts.app")

@section("title")
    Login
@endsection
@section("content")
<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md mx-auto mt-6">
    <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Login to your Account</h2>

    <form action="{{ route("user.authenticate") }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1" for="email">Email</label>
            <input type="email" id="email" name="email"
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error("email")
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1" for="password">Password</label>
            <input type="password" id="password" name="password"
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error("password")
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
        </div>

        <button type="submit"
            class="cursor-pointer w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200">
            Sign In
        </button>
        @include("components.error")

        <p class="mt-4 text-center text-sm text-gray-600">
            Don't have an account?
            <a href="{{ route("user.register") }}" class="text-blue-600 hover:underline">Register</a>
        </p>
    </form>
</div>
@endsection
