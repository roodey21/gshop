<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBankRequest extends FormRequest
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
            'account_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'status' => 'nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama bank tidak boleh kosong',
            'name.string' => 'Nama bank harus berupa string',
            'name.max' => 'Nama bank tidak boleh lebih dari 255 karakter',
            'account_name.required' => 'Nama pemilik rekening tidak boleh kosong',
            'account_name.string' => 'Nama pemilik rekening harus berupa string',
            'account_name.max' => 'Nama pemilik rekening tidak boleh lebih dari 255 karakter',
            'account_number.required' => 'Nomor rekening tidak boleh kosong',
            'account_number.numeric' => 'Nomor rekening harus berupa angka',
            'account_number.max' => 'Nomor rekening tidak boleh lebih dari 255 karakter',
        ];
    }
}
