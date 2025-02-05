<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PremiumContent extends Model
{
    protected $fillable = [
        'title',
        'description',
        'video'
    ];
}
