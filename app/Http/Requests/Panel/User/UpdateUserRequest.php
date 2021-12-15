<?php

namespace App\Http\Requests\Panel\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => ['nullable', 'image', 'max:2024'],
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('Users')->ignore(auth()->user()->id)],
            'mobile' => ['required', 'string', 'max:255', Rule::unique('Users')->ignore(auth()->user()->id)],
            'password' => ['nullable', 'min:8'],

        ];
    }
}