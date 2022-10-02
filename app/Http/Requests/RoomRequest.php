<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'room_type' => 'required|exists:room_types,label',
            'room_view' => 'required|exists:room_views,label',
            'number_of_persons' => 'required|integer|min:0|max:8',
            'size' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'large_beds' => 'nullable|min:0|max:5',
            'double_beds' => 'nullable|min:0|max:5',
            'single_beds' => 'nullable|min:0|max:5',
            'sofa_beds' => 'nullable|min:0|max:5',
        ];
    }
}
