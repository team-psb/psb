<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
        return [
            'name'=>'required',
            'full_name'=>'required',
            'age'=>'required',
            'family'=>'required',
            'no_wa'=>'required|unique:biodata_ones,no_wa|min:10|max:15',
            // 'phone'=>'required',
            'password'=>'required|string|min:6|max:20',
            'gender'=>'required',
        ];
    }
<<<<<<< HEAD
=======

    public function messages()
    {
        return [
            'family.required' => 'Data tidak boleh kosong.',
            'no_wa.unique' => 'Nomor ini sudah terdaftar.',
            'no_wa.min' => 'Wajib diisi 12 digit atau lebih.',
            'no_wa.max' => 'Nomor maksimal 15 digit.',
            'password.min' => 'Minimal password 6 karakter',
            'password.max' => 'Maksimal password 20 karakter',
        ];
    }

>>>>>>> 5379080e24fec487cbe5e7588ac978d28d1a1b3e
}
