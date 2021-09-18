<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionId extends Model
{
    use HasFactory;

    public $table = 'transactionid';

    protected $fillable = [
        'transactionid'
        ];
}
