<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:200'],
            'price' => ['required', 'numeric'],
            'image' => ['nullable', 'image'],
            'ingredients' => ['required', 'min:3', 'max:255', 'string'],
            'availability' => ['required'],
            'restaurant_id' => ['exists:restaurants,id']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.min' => 'The name must be at least :min characters.',
            'name.max' => 'The name may not be greater than :max characters.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price must be a number.',
            'image.image' => 'The image must be an image.',
            'ingredients.required' => 'The ingredients field is required.',
            'ingredients.min' => 'The ingredients must be at least :min characters.',
            'ingredients.max' => 'The ingredients may not be greater than :max characters.',
            'ingredients.string' => 'The ingredients must be a string.',
            'availability.required' => 'The availability field is required.',
            'restaurant_id.exists' => 'The restaurant field is required.',
        ];
    }
}
