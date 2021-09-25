<?php

namespace App\Http\Controllers;

use App\Models\PaystackLogs;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class PaystackLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try{
            $paystackLogs = new PaystackLogs();
            $paystackLogs->email = $request->email;
            $paystackLogs->reference = $request->TransactionId;
            $paystackLogs->paystack_id = $request->id;
            $paystackLogs->product = $request->productname;
            $paystackLogs->amount = $request->amount;
            $paystackLogs->mobilenumber = $request->mobilenumber;
            $paystackLogs->status = "PAYSTACK_PAYMENT_DONE";
            $paystackLogs->save();

            //VTPassLogs::create($request->all());

        } catch (\Illuminate\Database\QueryException $exception) {
            // You can check get the details of the error using `errorInfo`:
            //$errorInfo = $exception->errorInfo;
            $errorInfo = $exception->getMessage();
            dd($errorInfo);
            //print($errorInfo);
            //return back()->with('error', $errorInfo);

            // Return the response to the client..
        }
    }

    public function storePaystackLog($arr,$body)
    {
        //
        //dd($arr);
        try{
            $paystackLogs = new PaystackLogs();
            $paystackLogs->email =$arr['data']['customer']['email'];
            $paystackLogs->reference = $arr['data']['reference'];
            $paystackLogs->paystack_id = $arr['data']['id'];
            $paystackLogs->domain = $arr['data']['domain'];
            $paystackLogs->amount = $arr['data']['amount'];
            $paystackLogs->channel = $arr['data']['channel'];
            $paystackLogs->status = "PAYSTACK_PAYMENT_DONE";
            $paystackLogs->paystack_status = $arr['data']['status'];
            $paystackLogs->message = $arr['data']['message'];
            $date = new DateTime($arr['data']['paid_at']);
            $n_dt =  $date->format('Y-m-d H:i:s');
            $paystackLogs->paystack_paid_at = $n_dt;//$arr['data']['paid_at'];
            $date = new DateTime($arr['data']['created_at']);
            $n_dt2 =  $date->format('Y-m-d H:i:s');
            $paystackLogs->paystack_created_at = $n_dt2;//$arr['data']['created_at'];
            $paystackLogs->currency = $arr['data']['currency'];
            $paystackLogs->ip_address = $arr['data']['ip_address'];
            $paystackLogs->mobilenumber =$arr['data']['customer']['phone'];
            $paystackLogs->gateway_response = $arr['data']['gateway_response'];
            $paystackLogs->full_response = $body;
            $paystackLogs->save();
            //VTPassLogs::create($request->all());

        } catch (\Illuminate\Database\QueryException $exception) {
            // You can check get the details of the error using `errorInfo`:
            //$errorInfo = $exception->errorInfo;
            $errorInfo = $exception->getMessage();
            dd($errorInfo);
            //print($errorInfo);
            //return back()->with('error', $errorInfo);

            // Return the response to the client..
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaystackLogs  $paystackLogs
     * @return \Illuminate\Http\Response
     */
    public function show(PaystackLogs $paystackLogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaystackLogs  $paystackLogs
     * @return \Illuminate\Http\Response
     */
    public function edit(PaystackLogs $paystackLogs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaystackLogs  $paystackLogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaystackLogs $paystackLogs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaystackLogs  $paystackLogs
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaystackLogs $paystackLogs)
    {
        //
    }
}
