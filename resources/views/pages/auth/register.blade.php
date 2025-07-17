@extends("layouts.app")

@section("title")
    Register
@endsection
@section("content")
<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md mx-auto mt-6">
    <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Create an Account</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li class="text-xs">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route("user.store") }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1" for="name">First Name</label>
            <input type="text" id="firstName" name="firstName"
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

              <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1" for="name">Last Name</label>
            <input type="text" id="lastName" name="lastName"
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1" for="email">Email</label>
            <input type="email" id="email" name="email"
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1" for="password">Password</label>
            <input type="password" id="password" name="password"
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-1" for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <button type="submit"
            class="cursor-pointer w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200">
            Sign Up
        </button>

        <p class="mt-4 text-center text-sm text-gray-600">
            Already have an account?
            <a href="{{ route("user.login") }}" class="text-blue-600 hover:underline">Login</a>
        </p>
    </form>
</div>
@endsection
