@extends('layouts.app')
@section("title")
Home
@endsection
@section('content')
    @include("components.success")
    <section class="bg-blue-100 py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-blue-800 mb-4">Find Your Dream Home</h2>
            <p class="text-lg text-gray-700 mb-6">Buy or rent houses, apartments, and land anywhere in Madagascar.</p>
            <a href="#listings" class="inline-block bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700">Browse
                Listings</a>
        </div>
    </section>

    <section id="listings" class="py-12">
        <div class="container mx-auto px-4">
            <h3 class="text-2xl font-semibold text-center mb-8">Latest Properties</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($listings as $listing )
                    @include("components.listing_card")
                @endforeach
            </div>
        </div>
    </section>
@endsection
