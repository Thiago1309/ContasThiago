<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'type',
        'detail',
        'payment_form',
        'realization_date',
        'user_id',
        'payment_date',
        'status',
        'bank_id'
    ];

    public function bank(){
        return $this->belongsTo(Bank::class);
    }
}
