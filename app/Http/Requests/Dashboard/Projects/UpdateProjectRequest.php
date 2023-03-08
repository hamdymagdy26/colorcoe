<?php

namespace App\Http\Requests\Dashboard\Projects;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'title_ar' => 'sometimes|string',
            'title_en' => 'sometimes|string',
            'content_ar' => 'sometimes|string',
            'content_en' => 'sometimes|string',
            'location_ar' => 'sometimes|string',
            'location_en' => 'sometimes|string',
            'scope_ar' => 'sometimes|string',
            'scope_en' => 'sometimes|string',
            'date' => 'sometimes|integer',
            'client' => 'sometimes|string',
            'image' => 'nullable|mimes:jpg,png,jpeg',
            'file' => 'nullable|mimes:jpg,png,jpeg,pdf,docx,xlsx,csv',
        ];
    }
}
