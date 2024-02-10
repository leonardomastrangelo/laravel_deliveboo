<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
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
            'name' => 'required|min:3|max:200',
            'address' => 'required|min:3|max:255',
            'phone_number' => 'required|min:3|max:20',
            'email' => 'required|min:3|max:255',
            'image' => 'nullable|image',
            'pick_up' => 'required',
            'description' => 'nullable',
            'vat' => 'required|max:20',
            'user_id' => ['required', 'exists:users,id'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il nome e\' obbligatorio',
            'name.min' => 'Il nome deve avere almeno :min caratteri',
            'name.max' => 'Il nome deve avere al massimo :max caratteri',
            'address.required' => 'L\'indirizzo e\' obbligatorio',
            'address.min' => 'L\'indirizzo deve avere almeno :min caratteri',
            'address.max' => 'L\'indirizzo deve avere al massimo :max caratteri',
            'phone_number.required' => 'Il numero di telefono e\' obbligatorio',
            'phone_number.min' => 'Il numero di telefono deve avere almeno :min caratteri',
            'phone_number.max' => 'Il numero di telefono deve avere al massimo :max caratteri',
            'email.required' => 'L\'email e\' obbligatoria',
            'email.min' => 'L\'email deve avere almeno :min caratteri',
            'email.max' => 'L\'email deve avere al massimo :max caratteri',
            'image.image' => 'Il file immagine non e\' un immagine',
            'pick_up.required' => 'Il campo asporto e\' obbligatorio',
            'vat.required' => 'La partita IVA e\' obbligatoria',
            'vat.max' => 'La partita IVA deve avere al massimo :max caratteri',
        ];

    }
}
