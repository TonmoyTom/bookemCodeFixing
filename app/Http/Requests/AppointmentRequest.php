<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'location' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'payment_type' => 'required',
            'payment_method' => 'required',
            'balance_transaction' => 'required',
            'currency' => 'required',
            'amount' => 'required',
            'currency' => 'required',
        ];
    }
}
