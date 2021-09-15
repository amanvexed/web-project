<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VTPassController extends Controller
{
    public function index()
    {
        $username = env("VT_USER");
        $pwd = env("VT_PWD");
        $serviceCategoryEndpoint = env('VT_SERVICE_CATEGORY_ENDPOINT');
        $response = Http::get($serviceCategoryEndpoint,[
                            'username' => $username,
                            'pssword' => $pwd
                            ]);

        $jsonData = $response->json();
        //$responseArrayData = json_decode($response->json(), true);
        return view('welcome', ['data' => $jsonData]);
        //dd($jsonData);
    }

    public function serviceID(Request $request){

    }


}
