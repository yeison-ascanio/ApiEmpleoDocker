<?php

namespace App\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email'    => 'email | required',
            'password' => 'string | required'
        ];
    }

    public function messages()
    {
        return [
            'email.email'       => 'The email field must be a valid email address.',
            'email.required'    => 'This parameter is required.',
            'password.string'   => 'The email field must be a valid password',
            'password.required' => 'This parameter is required.'
        ];
    }
}
