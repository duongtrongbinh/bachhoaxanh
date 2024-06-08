<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'brand_id' => 'required',
            'category_id' => 'required',
            'name' => 'required|max:255',
            'image' => 'required',
            'cost' => 'required|numeric',
            'price' => 'required|numeric|gte:cost',
            'quantity' => 'required',
        ];
    }

    // Define custom error messages
    public function messages(): array
    {
        return [
            'price.gte' => 'The price must be at least equal to the cost.',
        ];
    }
}
