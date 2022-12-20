<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiemRequest extends FormRequest
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
            'diemcc' => 'required|min:0|max:10',
            'diemtx' => 'required|min:0|max:10',
            'diemgk' => 'required|min:0|max:10',
            'diemck' => 'required|min:0|max:10',
            'hocky' => 'required|min:1|max:10'
        ];
    }
    public function messages()
    {
        return [
            'diemcc' => 'Vui lòng nhập lại điểm chuyên cần!',
            'diemtx' => 'Vui lòng nhập lại điểm thường xuyên!',
            'diemgk' => 'Vui lòng nhâp lại điểm giữa kì!',
            'diemck' => 'Vui lòng nhập lại điểm cuối kỳ!',
            'hocky' => 'Vui lòng nhập lại học kỳ!'
            
        ];
    }
}
