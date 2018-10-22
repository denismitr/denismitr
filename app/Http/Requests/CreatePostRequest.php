<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'name' => 'required|unique:posts,name',
            'slug' => 'required|unique:posts,slug',
            'body' => 'required|min:3',
            'published_at' => 'nullable|boolean',
            'lang' => 'required|in:ru,en'
        ];
    }
}
