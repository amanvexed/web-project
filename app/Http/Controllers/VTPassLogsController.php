<?php

namespace App\Http\Controllers;

use App\Models\VTPassLogs;
use DateTime;
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
            $vtpassLogs->variationcode = $request->variationcode;
            $vtpassLogs->product_name = $request->productname;
            $vtpassLogs->amount = $request->amount;
            $vtpassLogs->phone = $request->mobilenumber;
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


    public function updateRecord($transactionId, $text, $arr_rec,$resp)
    {
        //\
        //dd($arr_rec);
        try{
            $date = new DateTime($arr_rec['transaction_date']['date']);
            $n_dt =  $date->format('Y-m-d H:i:s');
            VTPassLogs::where('transactionid',$transactionId)->update([
                'vtpass_status' => $arr_rec['content']['transactions']['status'],
                'unique_element' => $arr_rec['content']['transactions']['unique_element'],
                'unit_price' => $arr_rec['content']['transactions']['unit_price'],
                'quantity' => $arr_rec['content']['transactions']['quantity'],
                'service_verification' => $arr_rec['content']['transactions']['service_verification'],
                'channel' => $arr_rec['content']['transactions']['channel'],
                'commission' => $arr_rec['content']['transactions']['commission'],
                'total_amount' => $arr_rec['content']['transactions']['total_amount'],
                'discount' => $arr_rec['content']['transactions']['discount'],
                'type' => $arr_rec['content']['transactions']['type'],
                'name' => $arr_rec['content']['transactions']['name'],
                'convinience_fee' => $arr_rec['content']['transactions']['convinience_fee'],
                'platform' => $arr_rec['content']['transactions']['platform'],
                'response_description' => $arr_rec['response_description'],
                'platform' => $arr_rec['content']['transactions']['platform'],
                'method' => $arr_rec['content']['transactions']['method'],
                'transaction_date' => $n_dt,
                'full_response' => $resp,
                'status' => $text,
            ]);
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
