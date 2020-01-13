<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaRequest extends FormRequest
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
            'diagnose' => 'required',
            'treatment' => 'required',
        ];
    }
    public function messages()
    {
    return [
        'diagnose.required' => 'ระบุวินิจฉัย',
        'treatment.required' => 'ระบุวิธีการรักษา',
    ];
    }
}
