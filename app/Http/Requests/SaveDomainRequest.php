<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SaveDomainRequest extends FormRequest
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
        $domainId = optional(Auth::user()->domain)->id;

        return [
            'domain' => 'required|string|max:255|unique:domains,domain,' . $domainId,
        ];
    }

    public function messages(): array
    {
        return [
            'domain.required' => 'The domain field is required.',
            'domain.string' => 'The domain must be a string.',
            'domain.max' => 'The domain may not be greater than 255 characters.',
            'domain.unique' => 'The domain has already been taken by another user.',
        ];
    }
}
