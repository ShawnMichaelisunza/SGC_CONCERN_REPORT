<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company_name' => ['required'],
            'dept' => ['required'],
            'emp_no' => ['required'],
            'name' => ['required'],
            'user_cn' => ['required'],
            'user_dept' => ['required'],
            'email' => ['required','email'],
            'password' => ['required', 'confirmed'],
            'usertype' => ['required']
        ];
    }
}
