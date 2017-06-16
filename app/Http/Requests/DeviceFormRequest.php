<?php

namespace produccion\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\ServiceProvider;


class DeviceFormRequest extends FormRequest
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
        //S=Numero de Serie
        //M=MAC Address
        //L=Lote
        //PF= pFirmado
        //F= Fecha Proceso
        //I=Issue
       
        return [
            'S'=>array('required', 'regex:/^[0-9]{12}$/','unique:proceso,Serie'),
            'M'=>array('required', 'regex:/^(#?([0-9A-Fa-f]){2}[:]){5}(([0-9A-Fa-f]{2})?)$/','unique:proceso,Mac'),
            'L'=>array('required', 'regex:/^[0-9]{1,4}$/','limited_space'),
            'PF'=>'required',
            'F'=>'required',
            'I'=>'required'
        ];
    }
}
