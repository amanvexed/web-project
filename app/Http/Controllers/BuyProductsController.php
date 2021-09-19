<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\VTHost;
use App\Http\Controllers\TransactionIdController;
use GuzzleHttp\Client;

class BuyProductsController extends Controller
{
    //
    public function buyProducts(Request $request){
        //dd($request);
        //var_dump($request);
        //$fullname = $request->fullname;
        //$content = $request->getContent();
        //$content = $request->productname;
        //$VT_HOST = new VTHost();
        //print($content);
        $trnId = new TransactionIdController();
        $trnIdVal = $trnId->getTransactionId();
        $request['TransactionId'] = $trnIdVal;
        //dd($request);
        return view('purchase',['data'=>$request ]);
    }

    public function purchaseProduct(Request $request){
        $VT_HOST = new VTHost();
        $client = new Client();
        $res = $client->request('GET', $VT_HOST->servicePurchaseProductEndpoint, [
                                'auth' => [$VT_HOST->username, $VT_HOST->pwd],
                                'query' => [
                                    'request_id' => $request->TransactionId,
                                    'serviceID' => $request->serviceID,
                                    'billersCode' => $request->mobilenumber,
                                    'variation_code'=> $request->productname,
                                    'amount'=> $request->amount,
                                    'phone'=> $request->mobilenumber,
                                ]
                ]);
                $body = $res->getBody();
                $arr_body = json_decode($body,true);
                //dd($arr_body);
                //return view('buyproducts', ['data' => $arr_body]);
    }
}
