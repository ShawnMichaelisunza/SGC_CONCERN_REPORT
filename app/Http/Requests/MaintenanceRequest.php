<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaintenanceRequest extends FormRequest
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
            'user_id' => ['required'],
            'report_id' => ['required'],
            'action' => ['required'],
            'materials' => ['required'],
            'date_start' => ['required'],
            'date_end' => ['required'],
            'img_before' => ['required', 'mimes:png,jpg,jpeg'],
            'img_after' => ['required', 'mimes:png,jpg,jpeg']
        ];
    }
}
