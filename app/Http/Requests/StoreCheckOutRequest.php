<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCheckOutRequest extends FormRequest
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
            'telephone' => 'required|string|max:255',
            // 'user_id' => 'required|exists:users,id',
            'province_id' => 'required|exists:provinces,id',
            'city_id' => 'required|exists:cities,id',
            'courier_id' => 'required|exists:couriers,id',
            'subdistrict' => 'required|string|max:255',
            'address' => 'required|string',
            'description' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama produk harus diisi',
            'name.string' => 'Nama produk harus berupa string',
            'name.max' => 'Nama produk maksimal 255 karakter',
            'telephone.required' => 'Nomor telepon harus diisi',
            'telephone.string' => 'Nomor telepon harus berupa string',
            'telephone.max' => 'Nomor telepon maksimal 255 karakter',
            // 'user_id.required' => 'User harus diisi',
            // 'user_id.exists' => 'User tidak ditemukan',
            'province_id.required' => 'Provinsi harus diisi',
            'province_id.exists' => 'Provinsi tidak ditemukan',
            'city_id.required' => 'Kota harus diisi',
            'city_id.exists' => 'Kota tidak ditemukan',
            'courier_id.required' => 'Kurir harus diisi',
            'courier_id.exists' => 'Kurir tidak ditemukan',
            'subdistrict.required' => 'Kecamatan harus diisi',
            'subdistrict.string' => 'Kecamatan harus berupa string',
            'subdistrict.max' => 'Kecamatan maksimal 255 karakter',
            'address.required' => 'Alamat harus diisi',
            'address.string' => 'Alamat harus berupa string',
            'description.string' => 'Deskripsi harus berupa kata',
            'status.required' => 'Status harus diisi',
            'status.boolean' => 'Status harus berupa boolean',
        ];
    }
}
