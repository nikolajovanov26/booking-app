<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DashboardTransactionFilterRequest extends FormRequest
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
            'search' => 'nullable|string',
            'date_from' => 'nullable|required_with:date_to|date',
            'date_to' => 'nullable|required_with:date_from|date|after:date_from'
        ];
    }
}
