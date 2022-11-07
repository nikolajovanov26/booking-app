<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
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
            'room_id' => 'required|integer|exists:rooms,id',
            'paymentMethod' => 'required|string|exists:payment_methods,name',
            'nights' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'date_from' => 'required|date|after:yesterday',
            'date_to' => 'required|date|after:date_from'
        ];
    }
}
