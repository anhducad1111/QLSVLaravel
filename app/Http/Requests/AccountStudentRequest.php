<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountStudentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:1|max:6',
            // 'quyen' => 'required',
        
        ];
    }

    public function messages()
    {
        return [
            'name' => 'Vui lòng nhập lại tên!',
            'email' => 'Vui lòng nhập lại email!',
            'password' => 'Mật khẩu độ dài là 6!',
            // 'quyen' => 'Vui lòng chọn lại quyền'
        ];
    }
}
