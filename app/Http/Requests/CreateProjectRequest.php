<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required|min:3',
            'description_ru' => 'nullable|min:3',
            'description_en' => 'nullable|min:3',
            'url' => 'nullable|url',
            'color' => 'required',
            'priority' => 'required|numeric|max:100',
            'picture' => 'nullable|file|mimes:jpeg,png',
        ];
    }
}
