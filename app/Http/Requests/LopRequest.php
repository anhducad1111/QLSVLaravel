<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LopRequest extends FormRequest
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
            'tenlop' => 'required',
            'khoa_id' => 'required',

        ];
    }


    public function messages()
    {
        return [
            'tenlop' => 'Vui lòng nhập lại tên lớp!',
            'khoa_id' => 'Vui lòng chọn lại khoa',

        ];
    }
}
