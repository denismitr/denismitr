<?php

namespace App\Http\Requests;

use App\Rules\OldPasswordIsCorrect;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSecurityRequest extends FormRequest
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
            'old_password' => ['required', new OldPasswordIsCorrect()],
            'new_password' => 'nullable|min:8|confirmed',
            'email' => 'required|email',
        ];
    }

    public function hasNewPassword(): bool
    {
        return !! $this->new_password;
    }
}
