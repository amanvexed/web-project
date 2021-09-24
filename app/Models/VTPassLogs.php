<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VTPassLogs extends Model
{
    use HasFactory;

    protected $table = 'vtpasslogs';


    protected $fillable = [
        'email',
        'transactionid',
        'serviceid',
        'product',
        'mobilenumber',
        'paystack_reference',
        'amount'
    ];
}
