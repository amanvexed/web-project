<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Paystack;// as PaystackPaystack;
//use Paystack;

class PaymentController extends Controller
{
    //initializePaymentURL
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public $paystack;

    public function redirectToGateway()
    {
        try{
            $paystack = new Paystack();
            //dd($request);
            //return Paystack::getAuthorizationUrl()->redirectNow();
            //return $paystack->getPaystackValidationURL()->redirectNow();
            //return $paystack->getAuthorizationUrl()->redirectNow();
            //Log into Database

            //redirect to Paystack Page
            return redirect()->away($paystack->getPaystackValidationURL());
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
        //dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }


    public function test(){
        "hello world";
    }

}
