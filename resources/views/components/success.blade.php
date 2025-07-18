@if (session()->has('success'))
    <div class="w-[50%] mx-auto mt-1 mb-1">
        <p class="py-2 bg-green-100 text-green-600 -text-xs text-center">{{ session('success') }}</p>
    </div>
@endif
