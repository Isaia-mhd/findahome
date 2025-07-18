@if (session()->has('error'))
    <div class="w-[50%] mx-auto">
        <p class="py-1 bg-red-100 text-red-600 text-xs text-center">{{ session('error') }}</p>
    </div>
@endif
