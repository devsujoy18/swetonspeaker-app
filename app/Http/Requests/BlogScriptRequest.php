<?php

namespace App\Http\Requests;

use App\Models\BlogScript;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogScriptRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'page_type' => ['required', Rule::in([
                BlogScript::PageTypeBlog,
                BlogScript::PageTypeEvent,
            ])],
            'blog_id' => ['required', 'integer', 'min:1'],
            'position' => ['required', Rule::in([
                BlogScript::PositionHeader,
                BlogScript::PositionFooter,
            ])],
            'script' => ['required', 'string'],
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
