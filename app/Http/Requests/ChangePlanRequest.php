<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePlanRequest extends FormRequest
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'plan_id' => 'required|exists:plans,id',
        ];
    }

    public function messages(): array
    {
        return [
            'plan_id.required' => 'Plan ID is required.',
            'plan_id.exists' => 'The selected plan does not exist.',
        ];
    }
}
