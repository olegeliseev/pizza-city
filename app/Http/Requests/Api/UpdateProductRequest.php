<?php

namespace App\Http\Requests\Api;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends CreateProductRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'name' => ['sometimes', 'required'],
            'price' => ['sometimes', 'required', 'integer'],
            'description' => '',
            'energy_value' => '',
            'proteins' => '',
            'fats' => '',
            'carbohydrates' => '',
            'new' => 'boolean',
            'hit' => 'boolean',
            'category_id' => ['sometimes', 'required', 'exists:' . Category::class . ',id'],
        ]);
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
}
