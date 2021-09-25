<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaystackLogs extends Model
{
    use HasFactory;

    protected $table = 'paystacklogs';

    protected $fillable = [
        'email',
        'paystack_id',
        'reference',
        'amount',
        'status',
        'domain',
        'reference',
        'message',
        'gateway_response',
        'paystack_paid_at',
        'paystack_created_at',
        'channel',
        'currency',
        'paystack_status',
        'ip_address',
        'mobilenumber',
        'full_response'
    ];
}
