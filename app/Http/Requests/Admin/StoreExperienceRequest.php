<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreExperienceRequest extends FormRequest
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
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'start_year' => 'required|integer|min:1970|max:' . date('Y'),
            'end_year' => 'nullable|integer|min:1970|max:' . (date('Y') + 10) . '|gte:start_year',
            'is_current' => 'boolean',
            'responsibilities' => 'nullable|array',
            'responsibilities.*' => 'nullable|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'company.required' => 'La empresa es obligatoria.',
            'position.required' => 'La posición es obligatoria.',
            'start_year.required' => 'El año de inicio es obligatorio.',
            'end_year.gte' => 'El año de fin debe ser mayor o igual al año de inicio.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_current' => $this->boolean('is_current'),
            'responsibilities' => array_filter($this->responsibilities ?? [], fn($r) => !empty($r)),
        ]);
    }
}
