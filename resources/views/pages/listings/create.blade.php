@extends("layouts.app")

@section("title", "New Listing")

@section("content")
<div class="min-h-screen py-8 flex justify-center items-start px-4">
    <div class="w-full max-w-md bg-blue-100 p-5 rounded-lg shadow-md text-xs sm:text-sm">
        <h2 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-5 text-center">➕ New Listing</h2>

        @include("components.success")
        @include("components.error")

        @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li class="text-xs">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{ route('listings.store') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-gray-700 mb-0.5">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="bg-blue-50 w-full border-gray-300 rounded focus:ring-blue-600 focus:border-blue-600 p-1.5 text-xs">
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-gray-700 mb-0.5">Description</label>
                <textarea name="description" id="description" rows="2"
                    class="bg-blue-50 w-full border-gray-300 rounded focus:ring-blue-600 focus:border-blue-600 p-1.5">{{ old('description') }}</textarea>
            </div>

            <!-- Type -->
            <div>
                <label for="type" class="block text-gray-700 mb-0.5">Type</label>
                <select name="type" id="type"
                    class="bg-blue-50 w-full border-gray-300 rounded focus:ring-blue-600 focus:border-blue-600 p-1.5">
                    <option value="sale" {{ old('type') == 'sale' ? 'selected' : '' }}>Sale</option>
                    <option value="rent" {{ old('type') == 'rent' ? 'selected' : '' }}>Rent</option>
                </select>
            </div>

            <!-- Offered -->
            <div class="flex items-center space-x-2">
                <input type="checkbox" name="offered" id="offered" class="text-blue-600" {{ old('offered') ? 'checked' : '' }}>
                <label for="offered" class="text-gray-700">Offered (special price)</label>
            </div>

            <!-- Offered Price -->
            <div>
                <label for="offeredPrice" class="block text-gray-700 mb-0.5">Offered Price</label>
                <input type="number" name="offeredPrice" id="offeredPrice" step="0.01" value="{{ old('offeredPrice') }}"
                    class="bg-blue-50 w-full border-gray-300 rounded focus:ring-blue-600 focus:border-blue-600 p-1.5">
            </div>

            <!-- Regular Price -->
            <div>
                <label for="regularPrice" class="block text-gray-700 mb-0.5">Regular Price</label>
                <input type="number" name="regularPrice" id="regularPrice" step="0.01" value="{{ old('regularPrice') }}"
                    class="bg-blue-50 w-full border-gray-300 rounded focus:ring-blue-600 focus:border-blue-600 p-1.5">
            </div>

            <!-- Bedrooms & Bathrooms -->
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label for="bedrooms" class="block text-gray-700 mb-0.5">Bedrooms</label>
                    <input type="number" name="bedrooms" id="bedrooms" min="0" value="{{ old('bedrooms') }}"
                        class="bg-blue-50 w-full border-gray-300 rounded focus:ring-blue-600 focus:border-blue-600 p-1.5">
                </div>
                <div>
                    <label for="bathrooms" class="block text-gray-700 mb-0.5">Bathrooms</label>
                    <input type="number" name="bathrooms" id="bathrooms" min="0" value="{{ old('bathrooms') }}"
                        class="bg-blue-50 w-full border-gray-300 rounded focus:ring-blue-600 focus:border-blue-600 p-1.5">
                </div>
            </div>

            <!-- Parking & Furnished -->
            <div class="flex items-center justify-between">
                <label class="flex items-center space-x-1 text-gray-700">
                    <input type="checkbox" name="parking" {{ old('parking') ? 'checked' : '' }}> <span>Parking</span>
                </label>
                <label class="flex items-center space-x-1 text-gray-700">
                    <input type="checkbox" name="furnished" {{ old('furnished') ? 'checked' : '' }}> <span>Furnished</span>
                </label>
            </div>

            <!-- Address -->
            <div>
                <label for="address" class="block text-gray-700 mb-0.5">Address</label>
                <textarea name="address" id="address" rows="2"
                    class="bg-blue-50 w-full border-gray-300 rounded focus:ring-blue-600 focus:border-blue-600 p-1.5">{{ old('address') }}</textarea>
            </div>

            <!-- Latitude & Longitude -->
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label for="latitude" class="block text-gray-700 mb-0.5">Latitude</label>
                    <input type="text" name="latitude" id="latitude" value="{{ old('latitude') }}"
                        class="bg-blue-50 w-full border-gray-300 rounded focus:ring-blue-600 focus:border-blue-600 p-1.5">
                </div>
                <div>
                    <label for="longitude" class="block text-gray-700 mb-0.5">Longitude</label>
                    <input type="text" name="longitude" id="longitude" value="{{ old('longitude') }}"
                        class="bg-blue-50 w-full border-gray-300 rounded focus:ring-blue-600 focus:border-blue-600 p-1.5">
                </div>
            </div>

            <!-- Images -->
            <div>
                <label for="images" class="block text-gray-700 mb-0.5">Images</label>
                <input type="file" name="images[]" id="images" multiple
                    class="w-full border-gray-300 rounded focus:ring-blue-600 focus:border-blue-600 p-1.5">
            </div>

            <!-- Submit -->
            <div>
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-1.5 cursor-pointer rounded hover:bg-blue-700 transition text-sm font-semibold">
                    Create Listing
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
