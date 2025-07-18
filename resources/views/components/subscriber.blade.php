<h3 class="text-center uppercase py-2">Subscribe to Our Newsletters</h3>
<form action="{{ route('subscribe') }}" method="POST" class="w-full px-3 flex gap-2 justify-center items-center mb-6">
    @csrf
   <div class="">
     <input type="email" name="email" placeholder="Enter your email"
           class="w-full sm:w-auto flex-1 px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
    >
    @error("email")
        <span class="text-xs text-red-500">{{ $message }}</span>
    @enderror
   </div>

    <button type="submit"
            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
        Subscribe
    </button>
</form>
