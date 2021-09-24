<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Paystack;// as PaystackPaystack;
use App\Models\PaystackLogs;
use App\Models\VTPassLogs;

class PaymentController extends Controller
{
    //initializePaymentURL
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public $paystack;

    public function redirectToGateway(Request $request)
    {
        try{
            $paystack = new Paystack();
            //dd($request);
            //return Paystack::getAuthorizationUrl()->redirectNow();
            //return $paystack->getPaystackValidationURL()->redirectNow();
            //return $paystack->getAuthorizationUrl()->redirectNow();

            //Log into VTPass DB
            $this->insertIntoVTPass($request);

            $redirect_url = $paystack->getPaystackValidationURL();
            //return redirect()->away($redirect_url);
            if($redirect_url != ""){
                return redirect()->away($redirect_url);
            }

        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }



    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paystack = new Paystack();
        //$paymentDetails = Paystack::getPaymentData();
        $paymentDetails = $paystack->getPaymentData();
        dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }


    public function insertIntoVTPass(Request $request){
        $vtpasslogscontroller = new VTPassLogsController();
        $vtpasslogscontroller->store($request);
    }
}
