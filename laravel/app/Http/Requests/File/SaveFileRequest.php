<?php

namespace App\Http\Requests\File;

use Illuminate\Foundation\Http\FormRequest;

class SaveFileRequest extends FormRequest
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
            'id_user' => 'required | int',
            'file'    => 'required | file'
        ];
    }
    public function messages()
    {
        return [
            'id_user.required' => 'This parameter is required.',
            'id_user.int'      => 'This parameter must be of type int',
            'file.required'    => 'This parameter is required.',
            'file.file'        => 'This parameter must be of type pdf'
        ];
    }
}