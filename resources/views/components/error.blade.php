@if (session()->has('error'))
    <div class="">
        <p class="text-red-600 text-xs">{{ session('error') }}</p>
    </div>
@endif
