<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnquiryReq extends FormRequest
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
            'message'=>'required',
            ];
    }
    public function message()
    {
        return[
            'name.required'=>'Please Enter Name',
            'mobile.required'=>'Please Enter mobile No',
            'email.required'=>'Please Enter email',
            'message.required'=>'write a message',
        ];
    }
}
