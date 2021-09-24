<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Helpers\VTHost;
use Exception;
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

           //check transaction was successfule
           $paystack = new Paystack();
           

           //Log success into VTPass and Paystack DB
           //$this->updateVTPass($trxref,"VTPASS_PAYSTACK_PAYMENT_DONE");
           //$request['refer']=$refer;
           //$this->insertIntoPaystack($request);
    }

    public function insertIntoPaystack(Request $request){
        $paystacklogscontroller = new PaystackLogsController();
        $paystacklogscontroller->store($request);
    }

    public function updateVTPass($transactionId, $text){
        $vtpasslogscontroller = new VTPassLogsController();
        $vtpasslogscontroller->updateRecord($transactionId,$text);
    }
}
