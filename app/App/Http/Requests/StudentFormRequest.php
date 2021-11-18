<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class StudentFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create-students');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $data = [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|confirmed',
            'account_type' => 'required',
            'state' => "required_unless:account_type,'CORPS MEMBER'",
            'state_code' => "required_unless:account_type,'CORPS MEMBER'",
        ];

        if (Request::isMethod('POST')) {
        }

        if (Request::isMethod('PATCH')) {
            $data['email'] = 'email';
            $data['phone'] = '';
            $data['password'] = '';
        }

        return $data;
    }

    public function messages()
    {
        return [
            'state.required_unless' => 'Please select state',
            'state_code.required_unless' => 'State code is required',
        ];
    }
}
