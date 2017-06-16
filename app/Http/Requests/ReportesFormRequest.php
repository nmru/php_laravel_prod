<?php

namespace produccion\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportesFormRequest extends FormRequest
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
            
            'S'=>array('required', 'regex:/^[0-9]{12}$/'),
            'M'=>array('required', 'regex:/^(#?([0-9A-Fa-f]){2}[:]){5}(([0-9A-Fa-f]{2})?)$/'),
            'L'=>array('required', 'regex:/^[0-9]{1,4}$/'),
            'PR'=>'required',
            'F'=>'required',
            'I'=>'required'
        ];
    }
}
