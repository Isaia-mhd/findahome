<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            "firstName" => "required|string|max:100",
            "lastName" => "required|string|max:100",
            "email"=> "required|email|unique:users",
            "password"=> ["required","string", "confirmed", Password::min(6)->letters()->mixedCase()->numbers()->symbols()],
        ];
    }
}
