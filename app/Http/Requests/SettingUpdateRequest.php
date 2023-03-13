<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'group_name' => ['required', 'string', 'max:400'],
            'key' => ['required', 'string', 'max:400'],
            'type' => ['required', 'string', 'max:400'],
            'value' => ['required', 'string'],
        ];
    }
}
