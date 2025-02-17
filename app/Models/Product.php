<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category',
        'product_name',
        'product_image',
        'description',
        'price',
        'stock'
    ];

    public function transactionDetails(){
        return $this->hasMany(TransactionDetail::class);
    }
}
