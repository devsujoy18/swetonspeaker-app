<?php

namespace App\Http\Requests;

use App\Models\PageFaq;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PageFaqRequest extends FormRequest
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
                PageFaq::PageTypePage,
                PageFaq::PageTypeCategory,
                PageFaq::PageTypeProduct,
                PageFaq::PageTypeBlog,
                PageFaq::PageTypeEvent,
            ])],
            'page_key' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'order_no' => ['required', 'integer', 'min:0'],
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
