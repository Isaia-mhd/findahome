<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListingRequest;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Listing::all();
        return view("pages.listings.listing", compact("listings"));
    }
    public function create()
    {
        return view("pages.listings.create");
    }
    public function store(StoreListingRequest $request)
    {
        $listing = $request->validated();
        if($request->has("images"))
        {
            $images = $request->file("images");
            $paths= [];
            foreach ($images as $image) {
                $path = $image->store("listings", "public");
                $paths[] = $path;
            }
            $listing["images"] = json_encode($paths, JSON_FORCE_OBJECT);
        }
        $listing["owner_id"] = auth()->id();
        $listing["offered"] = $request->boolean("offered");
        if($request->boolean("offered") && $listing["offeredPrice"] >= $listing["regularPrice"])
        {
            return redirect()->back()->with("error","The offered price must be less than regular price.");
        }
        $listing["parking"] = $request->boolean("parking");
        $listing["furnished"] = $request->boolean("furnished");
        Listing::create($listing);
        return redirect()->back()->with("success","Listing created successfully.");
    }

    public function show(Listing $listing)
    {
        return view("pages.listings.show", compact("listing"));
    }
    public function update(StoreListingRequest $request, Listing $listing)
    {
        $listingUpdated = $request->validated();
        if($request->has("images"))
        {
            $images = $request->file("images");
            $paths= [];
            foreach ($images as $image) {
                $path = $image->store("listings", "public");
                $paths[] = $path;
            }
            $listingUpdated["images"] = json_encode($paths, JSON_FORCE_OBJECT);
        }
        $listingUpdated["offered"] = $request->boolean("offered");
        if($request->boolean("offered") && $listingUpdated["offeredPrice"] >= $listingUpdated["regularPrice"])
        {
            return redirect()->back()->with("error","The offered price must be less than regular price.");
        }
        $listingUpdated["parking"] = $request->boolean("parking");
        $listingUpdated["furnished"] = $request->boolean("furnished");
        $listing->update($listingUpdated);
        return redirect()->route("listings.show", $listing->id)->with("success","Listing updated successfully.");
    }
    public function destroy(Listing $listing)
    {
        if(!$listing)
        {
            return redirect()->back()->with("error","Listing does not exist.");
        }
        if(Gate::denies("owner", $listing->owner_id))
        {
            return redirect()->back()->with("error","Unauthorized.");
        }
        $listing->delete();
        return redirect()->route("listings.index")->with("success","Listing deleted successfully.");

    }
    public function edit(Listing $listing)
    {
        return view("pages.listings.edit", compact("listing"));
    }
}
