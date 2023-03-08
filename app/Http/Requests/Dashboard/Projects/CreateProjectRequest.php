<?php

namespace App\Http\Requests\Dashboard\Projects;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateProjectRequest extends FormRequest
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
            'title_ar' => 'required|string',
            'title_en' => 'required|string',
            'content_ar' => 'required|string',
            'content_en' => 'required|string',
            'location_ar' => 'required|string',
            'location_en' => 'required|string',
            'scope_ar' => 'required|string',
            'scope_en' => 'required|string',
            'date' => 'required|integer',
            'client' => 'required|string',
            'images' => 'required|array',
            'images.*' => 'nullable|mimes:jpg,png,jpeg',
            'file' => 'required|mimes:jpg,png,jpeg,pdf,docx,xlsx,csv',
        ];
    }
}
