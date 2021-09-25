<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\VTHost;
use App\Http\Controllers\TransactionIdController;
use App\Models\VTPassLogs;
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
        //$trnId = new TransactionIdController();
        //$trnIdVal = $trnId->getTransactionId();
        //$request['TransactionId'] = $trnIdVal;
        //dd($request);
        return view('purchase',['data'=>$request ]);
    }

    public function purchaseProduct(){
        $VT_HOST = new VTHost();
        $client = new Client();
        $vtpassPurchaseInfo = VTPassLogs::firstWhere('transactionId', $_REQUEST['trxref']);
        try{
            $res = $client->request('POST', $VT_HOST->servicePurchaseProductEndpoint, [
                                'auth' => [$VT_HOST->username, $VT_HOST->pwd],
                                'query' => [
                                    'request_id' => $vtpassPurchaseInfo['transactionid'],// => $request->TransactionId,
                                    'serviceID'  => $vtpassPurchaseInfo['serviceid'],//=> $request->serviceID,
                                    'billersCode' => $vtpassPurchaseInfo['phone'],//=> $request->mobilenumber,
                                    'variation_code' => $vtpassPurchaseInfo['variationcode'],//=> $request->productname,
                                    'amount' => $vtpassPurchaseInfo['amount'],//=> $request->amount,
                                    'phone' => $vtpassPurchaseInfo['phone'],//=> $request->mobilenumber,
                                ]
                ]);
                $body = $res->getBody();
                $arr_body = json_decode($body,true);

                //log response
                $vtpasslogscontroller = new VTPassLogsController();
                $vtpasslogscontroller->updateRecord($_REQUEST['trxref'], "VTPASS_PRODUCT_PURCHASE_DONE", $arr_body,$body);
                //check code to know how far
                if($arr_body['code'] == "000"){
                    //success , redirect to success and thank you page
                }else{
                    //redirect to page, with error
                }
                //dd($arr_body);
            }catch (\GuzzleHttp\Exception\RequestException $e) {
                    if ($e->hasResponse()) {
                        $response = $e->getResponse();

                        var_dump($response->getStatusCode()); // HTTP status code;
                        var_dump($response->getReasonPhrase()); // Response message;
                        var_dump((string) $response->getBody()); // Body, normally it is JSON;
                        //var_dump(json_decode((string) $response->getBody())); // Body as the decoded JSON;
                        //var_dump($response->getHeaders()); // Headers array;
                        //var_dump($response->hasHeader('Content-Type')); // Is the header presented?
                        //var_dump($response->getHeader('Content-Type')[0]); // Concrete header value;*/
                    }
                }
                //dd($arr_body);
                //return view('buyproducts', ['data' => $arr_body]);
    }


}
