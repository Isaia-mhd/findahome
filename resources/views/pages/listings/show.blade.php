@extends("layouts.app")

@section("title", $listing->name)

@section("content")
<div class="min-h-screen py-10 px-4">
    @include("components.success")
    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-6">
        {{-- Title & Type --}}
        <div class="flex justify-between items-start mb-4">
            <h1 class="text-2xl font-bold text-blue-600">{{ $listing->name }}</h1>
            <span class="text-sm px-3 py-1 rounded-full
                {{ $listing->type === 'sale' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                For {{ ucfirst($listing->type) }}
            </span>
        </div>

        {{-- Type and Price --}}
        <div class="text-gray-700 mb-4 space-y-1">
            <p>
                <span class="font-medium">Price:</span>
                @if ($listing->offered)
                    <span class="line-through text-sm text-gray-500">{{ number_format($listing->regularPrice, 0, '.', '.') }} {{ $listing->type == "sale" ? " Ar":" Ar/Month" }}</span>
                    <span class="text-green-600 font-semibold ml-2">{{ number_format($listing->offeredPrice, 0, '.', '.') }} {{ $listing->type == "sale" ? " Ar":" Ar/Month" }}</span>
                @else
                    <span class="text-gray-900 font-semibold">{{ number_format($listing->regularPrice, 0, '.', '.') }} {{ $listing->type == "sale" ? " Ar":" Ar/Month" }}</span>
                @endif
            </p>
        </div>

        {{-- Image Gallery (if exists) --}}
         @php
            $images = json_decode($listing->images, JSON_FORCE_OBJECT)
        @endphp
        @if ($images && count($images))
        <div class="mb-6">
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                @foreach ($images as $image)
                    <img src="{{ asset("storage/" . $image) }}" alt="Listing image" class="w-full h-32 object-cover rounded">
                @endforeach
            </div>
        </div>
        @endif

        {{-- Description --}}
        <div class="mb-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-1">Description</h2>
            <p class="text-gray-600">{{ $listing->description }}</p>
        </div>

        {{-- Details --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 text-gray-700 text-sm mb-6">
            <div><strong>Bedrooms:</strong> {{ $listing->bedrooms }}</div>
            <div><strong>Bathrooms:</strong> {{ $listing->bathrooms }}</div>
            <div><strong>Parking:</strong> {{ $listing->parking ? 'Yes' : 'No' }}</div>
            <div><strong>Furnished:</strong> {{ $listing->furnished ? 'Yes' : 'No' }}</div>
            <div><strong>Latitude:</strong> {{ $listing->latitude ?? 'N/A' }}</div>
            <div><strong>Longitude:</strong> {{ $listing->longitude ?? 'N/A' }}</div>
        </div>

        {{-- Address --}}
        <div class="mb-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-1">Address</h2>
            <p class="text-gray-600">{{ $listing->address }}</p>
        </div>

        {{-- Actions --}}
        <div class="flex justify-between">
            <a href="{{ route('listings.index') }}" class="text-blue-600 hover:underline text-sm">← Back to listings</a>
            @auth
                @if (auth()->id() === $listing->owner_id)
                    <div class="space-x-2">
                        <a href="{{ route('listings.edit', $listing->id) }}" class="px-4 py-1 bg-blue-600 text-white rounded text-sm hover:bg-blue-700">Edit</a>
                        <form action="{{ route('listings.destroy', $listing->id) }}" method="POST" class="inline">
                            @csrf
                            @method("delete")
                            <button type="submit" onclick="return confirm('Do you really want to Delete this listing?')" class="cursor-pointer px-4 py-1 bg-red-600 text-white rounded text-sm hover:bg-red-700">
                                Delete
                            </button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>
@endsection
