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
            'price' => ['required', 'numeric', 'gt:0'],
            'image' => ['nullable', 'image'],
            'ingredients' => ['required', 'min:3', 'max:255', 'string'],
            'description' => ['nullable'],
            'availability' => ['required', 'boolean'],
            'restaurant_id' => ['exists:restaurants,id']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il campo nome è obbligatorio.',
            'name.string' => 'Il nome deve essere una stringa.',
            'name.min' => 'Il nome deve essere di almeno :min caratteri.',
            'name.max' => 'Il nome non può superare :max caratteri.',
            'price.required' => 'Il campo prezzo è obbligatorio.',
            'price.numeric' => 'Il prezzo deve essere un numero.',
            'price.gt' => 'Il numero deve essere positivo',
            'image.image' => "L'immagine deve essere un'immagine.",
            'ingredients.required' => 'Il campo ingredienti è obbligatorio.',
            'ingredients.min' => 'Gli ingredienti devono essere di almeno :min caratteri.',
            'ingredients.max' => 'Gli ingredienti non possono superare :max caratteri.',
            'ingredients.string' => 'Gli ingredienti devono essere una stringa.',
            'availability.required' => 'Il campo disponibilità è obbligatorio.',
            'restaurant_id.exists' => 'Il campo ristorante è obbligatorio.',

        ];
    }
}
