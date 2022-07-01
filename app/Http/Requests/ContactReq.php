<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactReq extends FormRequest
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
            'email'=>'required | email',
            'message'=>'required',
            'subject'=>'required',
            ];
    }
    public function message()
    {
        return[
            'name.required'=>'Please Enter Name',
            'email.required'=>'Please Enter email',
            'message.required'=>'write a message',
            'subject.required'=>'write a message',
        ];
    }
}
