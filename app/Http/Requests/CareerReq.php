<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CareerReq extends FormRequest
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
            'mobile'=>'required | min:10 | max:13',
            'qualification'=>'required',
            'experience'=>'required',
            'cv'=>'required | mimes:pdf,doc,docx',
            ];
    }
    public function message()
    {
        return[
            'name.required'=>'Please Enter Name',
            'email.required'=>'Please Enter email',
            'mobile.required'=>'Please Enter mobile no.',
            'qualification.required'=>'write a message',
            'experience.required'=>'write a message',
            'cv.required'=>'upload cv',
        ];
    }
}
