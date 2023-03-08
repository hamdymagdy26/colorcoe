<?php

namespace App\Http\Requests\Dashboard\Users;

use App\Utility\UserTypes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', Rule::unique('users', 'email')->ignore($this->user)],
            'name' => 'required|string',
            'mobile' => ['required', 'numeric', Rule::unique('users', 'email')->ignore($this->user)],
            'image' => 'sometimes|mimes:jpg,png,jpeg',
            'type' => ['required', Rule::in(UserTypes::types())],
            'salon_id' => ['required_if:type,'.UserTypes::TYPE_SALON, Rule::exists('salons', 'id')->whereNull('deleted_at')]
        ];
    }
}
