<?php

namespace App\Http\Requests\Users;

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
            'data'            => 'required | array',
            'data.name'       => 'string | required',
            'data.email'      => 'email | required | unique:users,email',
            'data.password'   => 'string | required',
            'data.last_name'  => 'string | required',
            'data.type'       => 'string | required',
            'data.image'      => 'string | required',
            'data.address'    => 'string | required',
        ];
    }
    public function messages()
    {
        return [
            'data.email.required'     => 'This parameter is required.',
            'data.email.email'        => 'The email field must be a valid email address.',
            'data.name.required'      => 'This parameter is required.',
            'data.name.string'        => 'This parameter must be of type string.',
            'data.password.required'  => 'This parameter is required.',
            'data.password.string'    => 'This parameter must be of type string.',
            'data.last_name.required' => 'This parameter is required.',
            'data.last_name.string'   => 'This parameter must be of type string.',
            'data.type.required'      => 'This parameter is required.',
            'data.type.string'        => 'This parameter must be of type string.',
            'data.image.required'     => 'This parameter is required.',
            'data.image.string'       => 'This parameter must be valid type.',
            'data.address.required'   => 'This parameter is required.',
            'data.address.string'     => 'This parameter must be of type date.',
        ];
    }
}
