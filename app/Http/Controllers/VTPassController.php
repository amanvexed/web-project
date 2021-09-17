<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Helpers\VTHost;

class VTPassController extends Controller
{
    public function index()
    {
        $username = VTHost::username();
        $pwd = VTHost::pwd();
        $serviceCategoryEndpoint = VTHost::VT_SERVICE_CATEGORY_ENDPOINT();

        $response = Http::get($serviceCategoryEndpoint,[
                            'username' => $username,
                            'pssword' => $pwd
                            ]);

        $jsonData = $response->json();
        //$responseArrayData = json_decode($response->json(), true);
        return view('welcome', ['data' => $jsonData]);
        //dd($jsonData);
    }




}
