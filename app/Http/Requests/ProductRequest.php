<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required',
            'image' => ['sometimes', 'nullable', 'string'],
            'description' => '',
            'energy_value' => '',
            'proteins' => '',
            'fats' => '',
            'carbohydrates' => '',
            'new' => 'boolean',
            'hit' => 'boolean',
            'category_id' => ['exists:' . Category::class . ',id'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'new' => $this->toBoolean($this->new),
            'hit' => $this->toBoolean($this->hit),
        ]);
    }

    private function toBoolean($booleable): bool
    {
        return filter_var($booleable, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    }

    public function messages(): array
    {
        return [
            'required' => 'Это поле не может быть пустым',
        ];
    }
}
