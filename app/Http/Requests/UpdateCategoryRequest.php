<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'status' => 'nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama kategori tidak boleh kosong',
            'name.string' => 'Nama kategori harus berupa string',
            'name.max' => 'Nama kategori tidak boleh lebih dari 255 karakter',
            'description.string' => 'Deskripsi kategori harus berupa string',
            'parent_id.exists' => 'Kategori induk tidak ditemukan',
            'status.required' => 'Status kategori tidak boleh kosong',
            'status.boolean' => 'Status kategori harus berupa boolean',
        ];
    }
}
