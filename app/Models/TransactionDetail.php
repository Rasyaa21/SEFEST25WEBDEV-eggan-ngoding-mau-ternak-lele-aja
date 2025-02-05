<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = [
        'marketplace_transaction_id',
        'product_id',
        'quantity',
        'subtotal'
    ];

    public function transactionDetail(){
        return $this->belongsTo(MarketplaceTransaction::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
