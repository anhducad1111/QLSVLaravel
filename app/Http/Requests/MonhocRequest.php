<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MonhocRequest extends FormRequest
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
            'tenmon' => 'required',
            'sotinchi' => 'required',
            'sotiet' => 'required',
            'khoa' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'tenmon' => 'Vui lòng nhập tên môn học !',
            'sotinchi' => 'Vui lòng nhập số tín chỉ !',
            'sotiet' => 'Vui lòng nhập số tiết !',
            'khoa' => 'Vui lòng chọn khoa !'
            
        ];
    }
}
