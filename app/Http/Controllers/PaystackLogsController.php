<?php

namespace App\Http\Controllers;

use App\Models\PaystackLogs;
use Illuminate\Http\Request;

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
