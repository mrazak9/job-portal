<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'salary' => 'required|numeric',
            'company_id' => 'required|exists:companies,id',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'skill_level' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'thumbnail' => 'sometimes|image|mimes:png,jpg,jpeg', // Misalnya, path ke thumbnail
            // 'slug' => 'required|string|unique:company_jobs,slug|max:255',
            'responsibilities.*' => 'required|string|max:255',
            'qualifications.*' => 'required|string|max:255',
            'about' => 'required|string|max:65535',
            // 'is_open' => 'required|boolean',
        ];
    }
}
