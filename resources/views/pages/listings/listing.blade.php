@extends("layouts.app")

@section("title", "Listings")

@section("content")
<div class="min-h-screen bg-gray-50 py-8 px-4">
    @include("components.success")
    <div class="max-w-7xl mx-auto">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">🏘️ Available Listings</h1>

        @if ($listings->isEmpty())
            <div class="text-center text-gray-600 py-10">
                <p class="text-lg">No listings available at the moment.</p>
                <p class="text-sm mt-2">Please check back later or create a new one!</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($listings as $listing)
                    @include("components.listing_card", ['listing' => $listing])
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
