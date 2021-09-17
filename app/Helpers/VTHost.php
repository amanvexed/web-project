<?php
    namespace App\Helpers;

    class VTHost{

        public static $username;
        public static $pwd;
        public static $VT_SERVICE_CATEGORY_ENDPOINT;

    public function __construct()
    {
       // $this->token = config('values.accessToken');
        $this->username = env("VT_USER");
        $this->pwd =  env("VT_PWD");
        $this->VT_SERVICE_CATEGORY_ENDPOINT = env('VT_SERVICE_CATEGORY_ENDPOINT');
    }

    public static function username(){
        return env("VT_USER");
    }

    public static function pwd(){
        return env("VT_PWD");
    }

    public static function VT_SERVICE_CATEGORY_ENDPOINT(){
        return env("VT_SERVICE_CATEGORY_ENDPOINT");
    }

    public static function VT_SERVICE_ID_ENDPOINT(){
        return env("VT_SERVICE_ID_ENDPOINT");
    }

    public static function VT_SERVIVE_VARIATIONS(){
        return env("VT_SERVIVE_VARIATIONS");
    }

    public static function VT_SERVICE_PRODUCT_OPTIONS(){
        return env("VT_SERVICE_PRODUCT_OPTIONS");
    }


    }

?>
