<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            //
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'email' => 'nullable|email',
            'tel' => 'nullable|string',
            'address' => 'nullable|string',

        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'Nama toko harus berupa string',
            'name.max' => 'Nama toko tidak boleh lebih dari 255 karakter',
            'description.string' => 'Deskripsi toko harus berupa string',
            'email.email' => 'Email harus berupa email',
            'tel.string' => 'Nomor telepon harus berupa string',
            'address.string' => 'Alamat harus berupa string',
        ];
    }
}
