<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = [
        'user_id',
        'invoice_number',
        'snap_token',
        'amount',
        'due_date',
        'invoice_date',
        'receiver',
        'address',
        'phone_number',
        'note',
        'redirect_url',
        'status',
        'receipt_number'
    ];

    public function transactionDetail(){
        return $this->belongsTo(MarketplaceTransaction::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
