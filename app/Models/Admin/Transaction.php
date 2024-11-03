<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_date',
        'transaction_amount',
        'client_balance',
        'transaction_type',
        'authorised_by',
        'user_id',
    ];
}
