<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class UpdatePostRequest extends CreatePostRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            'name' => ['required', Rule::unique('posts', 'name')->ignore($this->_id)],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($this->_id)],
        ]);
    }
}
