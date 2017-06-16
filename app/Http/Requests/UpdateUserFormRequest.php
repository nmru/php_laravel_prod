<?php

namespace produccion\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserFormRequest extends FormRequest
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
            'N'=> 'required|min:3|max:50|regex:/^([A-Za-z\s]+((\s*)*))$/',
            'A'=> 'required|min:3|max:50|regex:/^([A-Za-z\s]+((\s*)*))$/',
            'D'=> 'required|regex:/^([A-Za-z\s\.]+((\.*)*))$/',
            'P'=> 'required|regex:/^([A-Za-z\s\.]+((\.*)*))$/',
            
            
        ];
    }
}
