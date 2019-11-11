<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestResetPassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     // * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     // * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required',
            'passwordVf' => 'required|same:password',
        ];
    }
    public function messages()
    {
         return [
            'password.required' => 'MK không được để trống',
            'passwordVf.required' => 'Yêu cầu nhập lại MK',
            'passwordVf.same' => 'Mk xác nhận không đúng',
        ];
    }
}
