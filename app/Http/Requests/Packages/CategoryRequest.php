<?php

namespace App\Http\Requests\Packages;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $categoryID = $this->route('category')->id ?? null;

        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|string|max:255',
                    'slug' => 'required|string|max:255|unique:categories,slug,'.$categoryID,
                    'description' => 'nullable|string',
                ];
                break;
            case 'PUT':
            case 'PATCH':
                return [
                    'name' => 'sometimes|required|string|max:255',
                    'slug' => 'sometimes|required|string|max:255|unique:categories,slug,'.$categoryID,
                    'description' => 'sometimes|nullable|string',
                ];
                break;
            default:
                return [];
        }
    }
}
