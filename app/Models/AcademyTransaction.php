<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademyTransaction extends Model
{
    protected $fillable = [
        'code',
        'user_id',
        'price',
        'payment_status'
    ];

    protected $casts = [
        'payment_status' => 'boolean'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
