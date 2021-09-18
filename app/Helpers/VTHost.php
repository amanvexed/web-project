<?php
    namespace App\Helpers;

    class VTHost{

        public $username;
        public $pwd;
        public $serviceIdEndpoint;
        public $serviceVariationEndpoint;
        public $serviceCategoryEndpoint;

    public function __construct()
    {
       // $this->token = config('values.accessToken');
       $this->username = env("VT_USER");// VTHost::username();
       $this->pwd = env("VT_PWD");//VTHost::pwd();
       $this->serviceIdEndpoint = env("VT_SERVICE_ID_ENDPOINT");//VTHost::VT_SERVICE_ID_ENDPOINT();
       $this->serviceVariationEndpoint = env("VT_SERVIVE_VARIATIONS");// VTHost::VT_SERVICE_VARIATIONS();
       $this->serviceCategoryEndpoint = env("VT_SERVICE_CATEGORY_ENDPOINT");
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

    public static function VT_SERVICE_VARIATIONS(){
        return env("VT_SERVIVE_VARIATIONS");
    }

    public static function VT_SERVICE_PRODUCT_OPTIONS(){
        return env("VT_SERVICE_PRODUCT_OPTIONS");
    }


    }

?>
