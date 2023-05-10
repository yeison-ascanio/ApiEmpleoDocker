<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'data'                    => 'required | array',
            'data.id'                 => 'int | required',
            'data.title'              => 'string | required',
            'data.content'            => 'string | required',
            'data.location'           => 'required | string',
            'data.job_mission'        => 'required | string',
            'data.functions_position' => 'required | string',
        ];
    }
    public function messages()
    {
        return [
            'data.id.int'                      => 'This parameter must be of type integer',
            'data.id.required'                 => 'This parameter is required.',
            'data.title.required'              => 'This parameter is required.',
            'data.title.email'                 => 'This parameter must be of type string.',
            'data.content.required'            => 'This parameter is required.',
            'data.content.string'              => 'This parameter must be of type string.',
            'data.functions_position.required' => 'This parameter must be of type string.',
            'data.functions_position.string'   => 'This parameter is required.',
            'data.job_mission.required'        => 'This parameter must be of type string.',
            'data.job_mission.string'          => 'This parameter is required.',
            'data.location.required'           => 'This parameter must be of type string.',
            'data.location.string'             => 'This parameter is required.'
        ];
    }
}
