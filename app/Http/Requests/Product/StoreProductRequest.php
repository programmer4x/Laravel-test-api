<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'        => 'required|string|min:8||max:255',
            'description' => 'required|string|min:50',
            'price'       => 'required|integer',
            'status'      => 'required|string',
            'score'       => 'required|integer|min:1',
            'category_id' => 'required|integer',
            'image.*'     => 'required|image',
            'title.*'     => 'required|array',
        ];
    }
}
