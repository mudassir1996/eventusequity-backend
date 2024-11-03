<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;
    protected $fillable = [
        'trade_date',
        'event_id',
        'team_one_id',
        'team_two_id',
        'team_one_score',
        'team_two_score',
        'result',
        'running_total',
        'reward',
        'user_id',
        'notes',
    ];
}
