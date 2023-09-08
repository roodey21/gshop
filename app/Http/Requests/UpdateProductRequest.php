<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'status' => 'nullable|boolean',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:1024',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama produk harus diisi',
            'name.string' => 'Nama produk harus berupa string',
            'name.max' => 'Nama produk maksimal 255 karakter',
            'sku.string' => 'SKU harus berupa string',
            'sku.max' => 'SKU maksimal 255 karakter',
            'description.string' => 'Deskripsi harus berupa kata',
            'price.required' => 'Harga harus diisi',
            'price.integer' => 'Harga harus berupa angka',
            'weight.required' => 'Berat harus diisi',
            'weight.integer' => 'Berat harus berupa angka',
            'status.boolean' => 'Status harus berupa boolean',
            'category_id.required' => 'Kategori harus diisi',
            'category_id.exists' => 'Kategori tidak ditemukan',
        ];
    }
}
