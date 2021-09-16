<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ServiceIdController extends Controller
{
    //
    public function serviceID(Request $request){
        $username = env("VT_USER");
        $pwd = env("VT_PWD");
        $serviceIdEndpoint = env('VT_SERVICE_ID_ENDPOINT')+"="+$request->name;
        $response = Http::get($serviceIdEndpoint,[
                            'username' => $username,
                            'pssword' => $pwd
                            ]);

        $jsonData = $response->json();
        dd($jsonData);
        //$responseArrayData = json_decode($response->json(), true);
        //return view('welcome', ['data' => $jsonData]);
    }
}
