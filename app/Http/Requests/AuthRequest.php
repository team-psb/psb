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
            'no_wa'=>'required|unique:biodata_ones,no_wa',
            // 'phone'=>'required',
            'password'=>'required|string|min:6|max:20',
            'gender'=>'required',
        ];
    }

}
