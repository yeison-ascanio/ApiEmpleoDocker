<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class SavePostRequest extends FormRequest
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
            'data.title'              => 'required | string',
            'data.location'           => 'required | string',
            'data.job_mission'        => 'required | string',
            'data.functions_position' => 'required | string',
            'data.content'            => 'required | string',
            'data.id_user'            => 'required | int'
        ];
    }
    public function messages()
    {
        return [
            'data.title.required'              => 'This parameter is required.',
            'data.title.email'                 => 'This parameter must be of type string.',
            'data.content.required'            => 'This parameter is required.',
            'data.content.string'              => 'This parameter must be of type string.',
            'data.location.string'             => 'This parameter must be of type string.',
            'data.location.required'           => 'This parameter is required.',
            'data.job_mission.required'        => 'This parameter is required.',
            'data.job_mission.string'          => 'This parameter must be of type string.',
            'data.functions_position.required' => 'This parameter is required.',
            'data.functions_position.string'   => 'This parameter must be of type string.',
            'data.id_user.required'            => 'This parameter is required.',
            'data.id_user.int'                 => 'This paramter must be of type int.'
        ];
    }
}
