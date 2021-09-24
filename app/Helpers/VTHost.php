<?php
    namespace App\Helpers;

    class VTHost{

        public $username;
        public $pwd;
        public $currency;
        public $callback_url;
        public $authorized_key;
        public $paystackInitializePaymentEndpoint;
        public $paystackVerifyTransactionEndpoint;
        public $serviceIdEndpoint;
        public $serviceVariationEndpoint;
        public $serviceCategoryEndpoint;
        public $servicePurchaseProductEndpoint;
    public function __construct()
    {
       // $this->token = config('values.accessToken');
       $this->username = env("VT_USER");// VTHost::username();
       $this->pwd = env("VT_PWD");//VTHost::pwd();
       $this->currency = env("PAYSTACK_CURRENCY");//VTHost::pwd();
       $this->callback_url = env("PAYSTACK_CALLBACK_URL");//VTHost::pwd();
       $this->authorized_key  = env("PAYSTACK_SECRET_KEY");
       $this->paystackInitializePaymentEndpoint  = env("PAYSTACK_INITIALIZE_PAYMENT");
       $this->paystackVerifyTransactionEndpoint  = env("PAYSTACK_VERIFY_TRANSACTION");
       $this->serviceIdEndpoint = env("VT_SERVICE_ID_ENDPOINT");//VTHost::VT_SERVICE_ID_ENDPOINT();
       $this->serviceVariationEndpoint = env("VT_SERVIVE_VARIATIONS");// VTHost::VT_SERVICE_VARIATIONS();
       $this->serviceCategoryEndpoint = env("VT_SERVICE_CATEGORY_ENDPOINT");
       $this->servicePurchaseProductEndpoint = env("VT_SERVICE_PURCHASE_PRODUCT");

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
