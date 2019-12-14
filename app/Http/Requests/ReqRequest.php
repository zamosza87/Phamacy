<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReqRequest extends FormRequest
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
            'user_id' => 'required|exists:users,identification_number',
            'description' => 'required',
            '_type' => 'required'
        ];
    }
    public function messages()
    {
    return [
        'user_id.required' => 'ระบุรหัสประจำตัว',
        'user_id.exists' => 'ไม่สมาชิกนี้ในระบบ',
        'description.required' => 'ระบุคำอธิบาย',
        '_type.required' => 'ระบุการใช้บริการ',
    ];
    }
}
