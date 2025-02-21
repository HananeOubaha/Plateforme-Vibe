<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'pseudo' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'bio' => ['nullable', 'string', 'max:500'], // Bio optionnel, max 500 caractères
            'profile_photo' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2048'], // Image max 2MB
        ];
    }
}
