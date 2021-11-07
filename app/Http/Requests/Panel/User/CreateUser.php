<?php

namespace App\Http\Requests\Panel\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUser extends FormRequest
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
            "name" => ['required', 'max:255', 'string'],
            "email" => ['required', 'max:255', 'string', 'email', 'unique:users'],
            "mobile" => ['required', 'max:11', 'min:11', 'string', 'unique:users'],
            "role" => ['required'],
        ];
    }
}
