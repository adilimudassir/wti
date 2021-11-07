<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create-topics');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'level_id' =>'required',
            'title' => 'required|string',
            'content' => 'required|string',
            'excerpt' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'level_id.required' => 'Please select a level',
        ];
    }
}
