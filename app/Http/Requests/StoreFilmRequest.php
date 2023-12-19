<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFilmRequest extends FormRequest
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
        // Rating field must be a number between 0 and 10 (included) and allows a max of 2 decimals
        return [
            'director_id' => 'nullable',
            'title' => 'required|string',
            'rating' => 'bail|nullable|numeric|between:0,10|regex:/^\d*(\.\d{1,2})?$/',
            'has_seen' => 'nullable',
            'description' => 'nullable|string'
        ];
    }
}
