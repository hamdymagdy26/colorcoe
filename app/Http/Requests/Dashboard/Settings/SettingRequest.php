<?php

namespace App\Http\Requests\Dashboard\Settings;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SettingRequest extends FormRequest
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
            'footer_info_ar' => 'nullable|string',
            'footer_info_en' => 'nullable|string',
            'who_are_we_ar' => 'nullable|string',
            'who_are_we_en' => 'nullable|string',
            'vision_ar' => 'nullable|string',
            'vision_en' => 'nullable|string',
            'mission_ar' => 'nullable|string',
            'mission_en' => 'nullable|string',
            'about_us_ar' => 'nullable|string',
            'about_us_en' => 'nullable|string',
            'image' => 'nullable|mimes:jpg,png,jpeg,pdf,docs,xlsx|max:5000',
            'address_ar' => 'nullable|string',
            'address_en' => 'nullable|string',
            'phone' => 'nullable|string',
            'projects_no' => 'nullable|integer',
            'clients_no' => 'nullable|integer',
            'testomnials_no' => 'nullable|integer',
            'projects_no' => 'nullable|integer',
            'email' => 'nullable|email',
            'profile' => 'nullable|file'
        ];
    }
}
