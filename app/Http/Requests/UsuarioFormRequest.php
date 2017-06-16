<?php

namespace produccion\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioFormRequest extends FormRequest
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
        //N=Nombre
        //A=Apellido
        //U=User
        //C=Password
        //D=Depto
        //P=Puesto
        //R=Rol
        return [
            'N'=> 'required|min:3|max:50|regex:/^([A-Za-z\s]+((\s*)*))$/',
            'A'=> 'required|min:3|max:50|regex:/^([A-Za-z\s]+((\s*)*))$/',
            'U'=> 'required|min:4|max:15|alpha|unique:users,username',
            'C'=> 'required|regex:/^((?=^.{6,15}$)(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^A-Za-z0-9])+((\S*)*))$/',
            'D'=> 'required|regex:/^([A-Za-z\s\.]+((\.*)*))$/',
            'P'=> 'required|regex:/^([A-Za-z\s\.]+((\.*)*))$/',
            'R'=> 'required'
            
        ];
    }
}
