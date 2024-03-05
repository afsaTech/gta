<?php

namespace App\Http\Requests\Packages;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('package');

        switch ($this->method()) {
            case 'POST':
                return [
                    'category_id' => 'required|exists:categories,id',
                    'title' => 'required|string|max:255',
                    'description' => 'required|string',
                    'size' => 'required|integer|min:0',
                    'days' => 'required|integer|min:0',
                    'nights' => 'required|integer|min:0',
                    'regular_price' => 'required|numeric|min:0',
                    'sales_price' => 'nullable|numeric|min:0',
                    'discount' => 'nullable|integer|min:0|max:100',
                    'region' => 'required|string|max:255',
                    'destination' => 'required|string|max:255',
                    'date' => 'required|date',
                    'keyword' => 'nullable|string|max:255',
                    'is_popular' => 'nullable|string|in:yes,no',
                    'status' => 'nullable|string|in:available,booked,sold out',
                ];
                break;
            case 'PUT':
            case 'PATCH':
                return [
                    'category_id' => 'sometimes|required|exists:categories,id',
                    'title' => 'sometimes|required|string|max:255',
                    'description' => 'sometimes|required|string',
                    'size' => 'sometimes|required|integer|min:0',
                    'days' => 'sometimes|required|integer|min:0',
                    'nights' => 'sometimes|required|integer|min:0',
                    'regular_price' => 'sometimes|required|numeric|min:0',
                    'sales_price' => 'sometimes|nullable|numeric|min:0',
                    'discount' => 'sometimes|nullable|integer|min:0|max:100',
                    'region' => 'sometimes|required|string|max:255',
                    'destination' => 'sometimes|required|string|max:255',
                    'date' => 'sometimes|required|date',
                    'keyword' => 'sometimes|nullable|string|max:255',
                    'is_popular' => 'sometimes|nullable|string|in:yes,no',
                    'status' => 'sometimes|nullable|string|in:available,booked,sold out',
                ];
                break;
            default:
                return [];
        }
    }
}