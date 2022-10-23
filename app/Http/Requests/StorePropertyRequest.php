<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
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
            'property_type_id' => 'required|exists:property_types,name',
            'country_id' => 'required|exists:countries,name',
            'name' => 'required|string',
            'slug' => 'required|alpha_dash|unique:properties,slug',
            'main_photo' => 'nullable|image',
            'stars' => 'nullable|integer|min:0|max:5',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'zip_code' => 'required|integer',
            'pets_allowed' => 'nullable|boolean',
            'check_in_from' => 'required|string',
            'check_in_to' => 'required|string',
            'check_out_from' => 'required|string',
            'check_out_to' => 'required|string',
            'description' => 'required|string',
            'cancellation_policy' => 'nullable|string',
            'gallery_images' => 'nullable',
            'gallery_images.*' => 'required|image'
        ];
    }
}
