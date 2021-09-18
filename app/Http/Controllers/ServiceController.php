<?php
namespace App\Http\Controllers;
//require_once "vendor/autoload.php";

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Posts;
use GuzzleHttp\Client;
use App\Helpers\VTHost;

class ServiceController extends Controller
{
    //
   /* private $username;// = VTHost::username();
    private $pwd;// = VTHost::pwd();
    private $serviceIdEndpoint;// = VTHost::VT_SERVICE_ID_ENDPOINT();
    private $serviceVariation;

    public function __construct()
    {
        $this->username = VTHost::username();
        $this->pwd = VTHost::pwd();
        $this->serviceIdEndpoint = VTHost::VT_SERVICE_ID_ENDPOINT();
        $this->serviceVariationEndpoint = VTHost::VT_SERVICE_VARIATIONS();
    }*/
    public function serviceID($serviceId){


        //$serviceIdEndpoint = $serviceIdEndpoint."=".$serviceId;
        //echo($serviceIdEndpoint);
        $VT_HOST = new VTHost();

        $client = new Client();
        $res = $client->request('GET', $VT_HOST->serviceIdEndpoint, [
                                'auth' => [$VT_HOST->username, $VT_HOST->pwd],
                                'query' => [
                                    'identifier' => $serviceId,
                                ]
                ]);
                $body = $res->getBody();
                $arr_body = json_decode($body,true);
                //dd($arr_body);
                //print_r($arr_body);
       /* $response = Http::get($serviceIdEndpoint,[
                            'username' => $username,
                            'pssword' => $pwd,
                            ['query' =>
                                ['identifier'=>$serviceId]]
                            ]);

        $jsonData = $response->json();
        dd($jsonData);*/
        //$responseArrayData = json_decode($response->json(), true);
        return view('serviceid', ['data' => $arr_body]);
    }

    public function serviceVariation($serviceId){
        $VT_HOST = new VTHost();
        $client = new Client();
        $res = $client->request('GET', $VT_HOST->serviceVariationEndpoint, [
                                'auth' => [$VT_HOST->username, $VT_HOST->pwd],
                                'query' => [
                                    'serviceID' => $serviceId,
                                ]
                ]);
                $body = $res->getBody();
                $arr_body = json_decode($body,true);
                return view('buyproducts', ['data' => $arr_body]);
    }
}
