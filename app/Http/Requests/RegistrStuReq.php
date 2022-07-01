<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrStuReq extends FormRequest
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
            'name'=>'required |min:3',
            'mobile'=> 'required | min:10 | max:13',
            'email'=>'required | email',
            'password'=>'required | min:8 | max:10',
            ];
    }
    public function message()
    {
        return[
            'name.required'=>'Please Enter Name',
            'mobile.required'=>'Please Enter mobile No',
            'email.required'=>'Please Enter email',
            'password.required'=>'Enter your Password',
        ];
    
    }
}
