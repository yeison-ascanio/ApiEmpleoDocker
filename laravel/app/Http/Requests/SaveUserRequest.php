<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveUserRequest extends FormRequest
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
            'name'       => 'string | required',
            'email'      => 'email | required',
            'password'   => 'string | required',
            'last_name'  => 'string | required',
            'type'       => 'string | required',
            'last_login' => 'nullable | date',
            'image'      => 'string | required',
            'address'    => 'string | required'
        ];
    }
    public function messages()
    {
        return [
            'email.required'     => 'This parameter is required.',
            'email.email'        => 'The email field must be a valid email address.',
            'name.required'      => 'This parameter is required.',
            'name.string'        => 'This parameter must be of type string.',
            'password.required'  => 'This parameter is required.',
            'password.string'    => 'This parameter must be of type string.',
            'last_name.required' => 'This parameter is required.',
            'last_name.string'   => 'This parameter must be of type string.',
            'type.required'      => 'This parameter is required.',
            'type.string'        => 'This parameter must be of type string.',
            'last_login.date'    => 'This parameter must be of type date.',
            'image.required'     => 'This parameter is required.',
            'image.string'       => 'This parameter must be valid type.',
            'address.required'   => 'This parameter is required.',
            'address.string'     => 'This parameter must be of type date.',
        ];
    }
}
