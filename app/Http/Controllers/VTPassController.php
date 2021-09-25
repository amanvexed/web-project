<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Helpers\VTHost;
use Exception;
use GuzzleHttp\Client;
use Unicodeveloper\Paystack\Paystack;

class VTPassController extends Controller
{
    public function index()
    {
        try{
            $username = VTHost::username();
            $pwd = VTHost::pwd();
            $serviceCategoryEndpoint = VTHost::VT_SERVICE_CATEGORY_ENDPOINT();

            $response = Http::get($serviceCategoryEndpoint,[
                            'username' => $username,
                            'password' => $pwd
                            ]);

            $jsonData = $response->json();
        }catch (Exception $e) {
            return view('api_error');
        }

        //$responseArrayData = json_decode($response->json(), true);
        return view('welcome', ['data' => $jsonData]);
        //dd($jsonData);
    }

    public function processService(Request $request){

           $trxref = $request->input('trxref');
           $refer = $request->input('reference');

           //requery paystack transaction to see if successful
           $paystack = new Paystack();
           $this->checkPaystackTransactionAndInsertIntoLog($refer);

           //Log success into VTPass and Paystack DB
           //$this->updateVTPass($trxref,"VTPASS_PAYSTACK_PAYMENT_DONE");
           //$request['refer']=$refer;
           //$this->insertIntoPaystack($request);
    }

    public function checkPaystackTransactionAndInsertIntoLog($reference){
        $vt_host = new VTHost();
        $client = new Client();
        $endPointURL = $vt_host->paystackVerifyTransactionEndpoint."/".$reference;

        try{
        $res = $client->request('GET', $endPointURL, [
                                'headers' => [
                                'Authorization' => $vt_host->authorized_key,
                                //'Content-Type'  => 'application/json',
                                //'Accept'        => 'application/json'
                                ]
                                //'json' => [
                                //    'reference' => $reference,
                                //]
                ]);
                $body = $res->getBody();
                $arr_body = json_decode($body,true);

                //log transactions
                $paystacklogscontroller = new PaystackLogsController();
                $paystacklogscontroller->storePaystackLog($arr_body,$body);

                $resp_status = $arr_body['data']['status'];
                if($resp_status == "success"){
                    //process vtpass product for customer

                    //return true;
                }else{
                    //return false;
                }
                //var_dump($arr_body['data']['authorization_url']);
                //dd($arr_body);
                //$url = $arr_body['data']['authorization_url'];
                //return $url;
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
    }


    public function processVTPassProduct($reference)
    {
        # code...


    }


    public function updateVTPass($transactionId, $text){
        $vtpasslogscontroller = new VTPassLogsController();
        $vtpasslogscontroller->updateRecord($transactionId,$text);
    }
}
