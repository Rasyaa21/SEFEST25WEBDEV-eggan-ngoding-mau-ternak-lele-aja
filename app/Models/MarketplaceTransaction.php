<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketplaceTransaction extends Model
{
    protected $fillable = [
        'code',
        'user_id',
        'customer_name',
        'customer_phone',
        'customer_address',
        'price',
        'payment_status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function transactionDetails(){
        return $this->hasMany(TransactionDetail::class);
    }
}
