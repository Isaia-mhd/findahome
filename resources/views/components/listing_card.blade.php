<div class="bg-white rounded shadow hover:shadow-md transition">
    <span class="text-white bg-slate-700 px-2 text-xs rounded-sm absolute font-bold">{{ $listing->type }}</span>
    <img src="{{ asset("storage/" . json_decode($listing->images, JSON_FORCE_OBJECT)[0]) }}" alt="House image" class="cursor-pointer rounded-t w-full h-48 object-cover">
    <div class="p-4">
        <h4 class="text-xl font-bold text-blue-700">{{ $listing?->name }}</h4>
        <p class="text-sm text-gray-600"><i class="fa-solid fa-location-dot text-green-600 pr-3"></i>{{ $listing?->address }}</p>
        <p class="text-lg font-semibold text-green-600 mt-2">
            {{ $listing->offered ? number_format($listing->offeredPrice, 0, ".", ".") : number_format($listing->regularPrice, 0, ".", ".") }} {{ $listing->type == "sale" ? "ar":" ar/Month" }}
        </p>
        <a href="{{ route("listings.show", $listing->id) }}" class="block text-blue-500 mt-3 hover:underline">View Details</a>
    </div>
</div>
