<?php

namespace App\Http\Requests;

use App\Models\SeoMeta;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SeoMetaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'page_type' => ['required', Rule::in([
                SeoMeta::PageTypePage,
                SeoMeta::PageTypeCategory,
                SeoMeta::PageTypeProduct,
            ])],
            'page_key' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'keywords' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'page_description' => ['nullable', 'string'],
            'canonical_url' => ['nullable', 'url', 'max:255'],
            'robots' => ['required', 'string', 'max:255'],
            'is_active' => ['boolean'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_active' => $this->boolean('is_active'),
        ]);
    }
}
