<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PondRecommendation extends Model
{
    protected $fillable = [
        'pond_id',
        'recommended_ph',
        'recommended_temp',
        'recommended_oxygen',
        'recommended_salinity',
        'pond_status',
        'recommendation_notes'
    ];

    public function pond(){
        return $this->belongsTo(Pond::class);
    }
}
