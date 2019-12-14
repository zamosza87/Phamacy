<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhaRequest extends FormRequest
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
            'thai_name' => 'required',
            'generic_name' => 'required',
            'trade_name' => 'required',
            'company_Name' => 'required',
            'drug_type' => 'required',
            'package' => 'required',
            'timeuse' => 'required|not_in:0',
            'amount' => 'required',
            'properties' => 'required',
            'expiry_date' => 'required',
            'stock' => 'required'
        ];
    }

    public function messages()
    {
    return [
        'thai_name.required' => 'ระบุชื่อไทย',
        'generic_name.required' => 'ระบุชื่อสามัญทางยา',
        'trade_name.required' => 'ระบุชื่อทางการค้า',
        'company_Name.required' => 'ระบุชื่อบริษัท',
        'drug_type.required' => 'ระบุชนิดยา',
        'package.required' => 'ระบุประเภท',
        'timeuse.required' => 'ระบุวิธีการใช้',
        'amount.required' => 'ระบุปริมาณ',
        'properties.required' => 'ระบุสรรพคุณ',
        'expiry_date.required' => 'ระบุวันที่หมดอายุ',
        'stock.required' => 'ระบุจำนวน'
    ];
    }
}
