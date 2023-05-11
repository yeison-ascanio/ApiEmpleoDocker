<?php

namespace App\Http\Requests\File;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFileRequest extends FormRequest
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
            'data'         => 'required | array',
            'data.name'    => 'required | string',
            'data.route'   => 'required | string',
            'data.id_file' => 'required | int',
        ];
    }
    public function messages()
    {
        return [
            'data.name.required'    => 'This parameter is required.',
            'data.name.string'      => 'This parameter must be of type string.',
            'data.route.string'     => 'This parameter must be of type string.',
            'data.route.required'   => 'This parameter is required.',
            'data.id_file.required' => 'This parameter is required.',
            'data.id_file.int'      => 'This parameter must be of type int'
        ];
    }
}