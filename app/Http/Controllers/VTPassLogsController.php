<?php

namespace App\Http\Controllers;

use App\Models\VTPassLogs;
use Illuminate\Http\Request;

class VTPassLogsController extends Controller
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
        //dd($request->email);
        //
        try{
            $vtpassLogs = new VTPassLogs();
            $vtpassLogs->email = $request->email;
            $vtpassLogs->transactionid = $request->TransactionId;
            $vtpassLogs->serviceid = $request->serviceID;
            $vtpassLogs->product = $request->productname;
            $vtpassLogs->amount = $request->amount;
            $vtpassLogs->mobilenumber = $request->mobilenumber;
            $vtpassLogs->status = "VTPASS_PAYSTACK_PAYMENT_INITIALIZED";
            $vtpassLogs->save();
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
     * @param  \App\Models\VTPassLogs  $vTPassLogs
     * @return \Illuminate\Http\Response
     */
    public function show(VTPassLogs $vTPassLogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VTPassLogs  $vTPassLogs
     * @return \Illuminate\Http\Response
     */
    public function edit(VTPassLogs $vTPassLogs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VTPassLogs  $vTPassLogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VTPassLogs $vTPassLogs)
    {
        //
    }



    public function updateRecord($transactionId, $text)
    {
        //
        try{
            VTPassLogs::where('transactionid',$transactionId)->update(['status' => $text]);
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VTPassLogs  $vTPassLogs
     * @return \Illuminate\Http\Response
     */
    public function destroy(VTPassLogs $vTPassLogs)
    {
        //
    }
}
