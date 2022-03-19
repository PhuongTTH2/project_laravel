<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdministratorsUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $requests = FormRequest::all();
        return [
            'account' =>'required|max:64|unique:administrators,account',
            'password'=>'required|min:6|max:64',
            'password_confirm'=>'same:password',
        ];
    }

    public function messages(){
        return [
                'password_confirm.same' => '2 mật khẩu không cùng nhau',
                'account.unique'=> 'account đã tồn tại',
                // 'account.ascii'=>'không nhập kí tự đặt biệt',
                // 'password.ascii'=>'không nhập kí tự đặt biệt',
        ];
    }
}
