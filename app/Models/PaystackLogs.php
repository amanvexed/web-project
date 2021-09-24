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
        'reference',
        'amount',
        'status'
    ];
}
