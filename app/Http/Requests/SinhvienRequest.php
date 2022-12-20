<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SinhvienRequest extends FormRequest
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
            
            'lop' => 'required',
            'hovaten' => 'required',
            'gioitinh' => 'required',
            'ngaysinh' => 'required',
            'diachi' => 'required',
            'anhdaidien' => 'image|max:2000'
        ];
    }

    public function messages()
    {
        return [
            'lop' => 'Vui lòng nhập thông tin!',
            'hovaten' => 'Vui lòng nhập thông tin!',
            'gioitinh' => 'Vui lòng nhập thông tin!',
            'ngaysinh' => 'Vui lòng nhập thông tin!',
            'diachi' => 'Vui lòng nhập thông tin!',
            'anhdaidien.image' => 'Không phải file ảnh!',
            'anhdaidien.max' => 'Kích thước file không vượt quá 200KB!',
            
        ];
    }
}
