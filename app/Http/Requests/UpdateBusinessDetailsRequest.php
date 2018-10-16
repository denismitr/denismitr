<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBusinessDetailsRequest extends FormRequest
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
            'email' => 'required|email',
            'first_name_en' => 'required|min:3',
            'last_name_en' => 'required|min:3',
            'first_name_ru' => 'required|min:3',
            'last_name_ru' => 'required|min:3',
            'twitter' => 'required|min:3',
            'facebook' => 'nullable|min:3',
        ];
    }
}
