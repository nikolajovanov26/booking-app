<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFilterRequest extends FormRequest
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
            'location' => 'required|string',
            'date_from' => 'required|date',
            'date_to' => 'required|date|after:date_from',
            'guests' => 'required|integer|min:0',
            'type' => 'nullable|string',
            'stars' => 'nullable|integer|min:0|max:5',
            'pets' => 'nullable|starts_with:allow-pets|ends_with:allow-pets'
        ];
    }
}
