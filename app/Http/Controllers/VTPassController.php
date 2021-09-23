<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Helpers\VTHost;
use Exception;

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

           print("1");
           print(request()->serviceID);
    }


}
