<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'teacher'=>'required|min:4',
            'email'=> 'required|email',
            'contact'=>'required|min:2|numeric',
            'pic'=>'required|mimes:jpeg,png,jpg,gif',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            'pin_code'=>'required|min:5|numeric',
            'address'=>'required|min:6',
            'highest_qualification'=>'required',
            'cv'=>'required|mimes:pdf,docx',
            'password'=>'required|min:6'
            
        ];
    }
}
