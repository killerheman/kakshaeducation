<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCourseReq extends FormRequest
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
            'course'=>'required|min:4',
            'course_price'=> 'required|min:3|numeric',
            'offer_pice'=>'required|min:2|numeric',
            'referal_pice'=>'required|min:2|numeric',
            'duration'=>'required',
            'pic'=>'required|mimes:jpeg,png,jpg,gif',
            'pic_2'=>'required|mimes:jpeg,png,jpg,gif',
            'video_link'=>'required',
            'short_desc'=>'required|min:20',
            'long_desc'=>'required|min:50'
            
        ];
    }
    public function message()
    {
        [
            'course.required'=>'Please Select enter course name.',
            'course.min'=>'Please Select enter course name min 4 characters.',
            'course_price.required'=>'Please enter course price.',
            'course_price.min'=>'Please enter course price min 3 digit.',
            'offer_pice.required'=>'Please enter offer price.',
            'offer_pice.min'=>'Please enter offer price min 2 digit.',
            'referal_pice.required'=>'Please enter referal price.',
            'referal_pice.min'=>'Please enter referal price min 2 digit.',
            'duration.required'=>'Please select course duration.',
            'pic.required'=>'Please select image and image must be jpeg,png,jpg,gif.',
            'pic_2.required'=>'Please select image and image must be jpeg,png,jpg,gif.',
            'year.max'=>'Please enter stablished year in 4 digits.',
            'video_link.required'=>'Please enter video link.',
            'short_desc.min'=>'Please enter short description min 20 characters.',
            'short_desc.required'=>'Please enter short description',
            'long_desc.required'=>'Please enter long description',
            'long_desc.min'=>'Please enter long description min 50 characters.'
        ];
    }
}
