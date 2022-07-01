<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\StudentCourse;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use Illuminate\Contracts\Session\Session as SessionSession;
use Log;
class RazorpayPaymentController extends Controller
{


    public function index()
    {
        return view('razorpayView');
    }


    public function store(Request $request)
    {
        $input = $request->all();

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        $stid=$input['stid'];
        $cid=$input['cid'];
        $pay=$input['pay'];
        if(Course::where('offer_pice',$pay) ->where('cour_id',$cid)->first())
        {


            $stc=StudentCourse::where('student_id',$stid)
            ->where('course_id',$cid)
            ->whereRaw("payment_status IS NULL OR payment_status='Fails'")
            ->first();
            if(!$stc)
            {
                Session::flash('msg','Course Already Purchased OR Course Not Added in Cart');
                return Redirect()->back();
            }
            $stc->payment_id=$input['razorpay_payment_id'];


        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));

                $stc->payment_status='Completed';
                    if($stc->save())
                    {
                        Session::flash('msg', 'Payment successful');
                    }
                    else{
                        Session::flash('msg', 'Payment successful but Course not added');
                    }



            } catch (Exception $e) {

                $stc->payment_status='Failed';
                if($stc->save())
                {
                    Session::flash('msg', 'Payment Fail');
                }
                else{
                    Session::flash('msg', 'Payment Not Completed Course not added');
                }

                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
        return redirect()->back();
    }
    else
    {
        Session::flash('msg','OOPS !!! Course Not Found or already purchased !!!');
        return redirect()->back();
    }
}

}
