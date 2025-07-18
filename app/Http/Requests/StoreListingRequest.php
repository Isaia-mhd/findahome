<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreListingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string|max:100",
            "description" => "required|string",
            "type" => "required",
            "offered" => "nullable",
            "offeredPrice" => "nullable|numeric",
            "regularPrice" => "required|numeric",
            "bedrooms" => "required|min:0",
            "bathrooms" => "required|min:0",
            "parking" => "nullable",
            "furnished" => "nullable",
            "address" => "required|string",
            "longitute" => "nullable|numeric",
            "latitude" => "nullable|nuimeric",
            "images.*" => "required|image|mimes:png,jpg,jpeg,webp"
        ];
    }
}
