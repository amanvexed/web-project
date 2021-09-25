<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VTPassLogs extends Model
{
    use HasFactory;

    protected $table = 'vtpasslogs';


    protected $fillable = [
        'vtpass_status',
        'product_name',
        'unique_element',
        'unit_price',
        'quantity',
        'service_verification',
        'channel',
        'commission',
        'total_amount',
        'discount',
        'type',
        'email',
        'phone',
        'name',
        'convinience_fee',
        'amount',
        'platform',
        'method',
        'transactionid',
        'serviceid',
        'variationcode',
        'response_description',
        'transaction_date',
        'status',
        'full_response'
    ];
}
