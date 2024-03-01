<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:projects',
            'type_id' => 'required|exists:types,id',
            'repository_link' => 'required',
            'date_start' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'The project name is required',
            'name.unique' => 'The project name is already present!',
            'type_id.required' => 'Project Type is required.',
            'type_id.exists' => 'Project Type is not valid.',
            'repository_link.required' => 'The repository link is required',
            'date_start.required' => 'The start date is required',
        ];
    }
}
