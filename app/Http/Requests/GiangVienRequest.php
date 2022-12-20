<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GiangVienRequest extends FormRequest
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
            
            'tengv' => 'required',
            'gioitinh' => 'required',
            'ngaysinh' => 'required',
            'sodienthoai' => 'required',
            'chucdanh' => 'required',
            'khoa' => 'required'
        ];
    }

    public function messages()
    {
        return [
           
            'tengv' => 'Vui lòng nhập lại tên!',
            'gioitinh' => 'Vui lòng nhập lại giới tính!',
            'ngaysinh' => 'Vui lòng nhập lại ngày sinh!',
            'sodienthoai' => 'Vui lòng nhập lại số điện thoại!',
            'chucdanh' => 'Vui lòng nhập lại chức danh',
            'khoa' => 'Vui lòng chọn lại khoa!'
        ];
    }
}
