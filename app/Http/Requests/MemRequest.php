<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'telephone_number' => 'required',
            'parent_phone_number' => 'required',
            'faculty' => 'required',
            'birth' => 'required',
            'identification_number' => 'required',
            'congenital_disease' => 'required',
            'drug_allergies' => 'required'
        ];
    }
    public function messages()
    {
    return [
        'first_name.required' => 'ระบุชื่อ',
        'last_name.required' => 'ระบุนามสกุล',
        'telephone_number.required' => 'ระบุเบอร์โทรศัพท์',
        'parent_phone_number.required' => 'ระบุเบอร์โทรฉุกเฉิน',
        'faculty.required' => 'ระบุคณะ/สังกัด',
        'birth.required' => 'ระบุวันเกิด',
        'identification_number.required' => 'ระบุรหัสประจำตัว',
        'congenital_disease.required' => 'ระบุโรคประจำตัว',
        'drug_allergies.required' => 'ระบุอาการแพ้ยา'
    ];
    }
}
