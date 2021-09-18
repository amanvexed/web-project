<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\VTHost;
use App\Http\Controllers\TransactionIdController;

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
        //$request['TransactionId'] = $trnId;
        //dd($request);
        return view('purchase',['data' =>$request,$trnIdVal ]);
    }
}
