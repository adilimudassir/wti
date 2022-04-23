<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create-payments');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $data = [
            'payment_method' => 'required',
            'payment_type' => 'required',
            'amount' => 'required',
        ];

        if (request()->payment_method == 'Bank Transfer') {
            $data['receipt'] = 'required|file|mimes:jpeg,png,jpg,pdf|max:1024';
        }

        return $data;
    }
}
