<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pond extends Model
{
    protected $fillable = [
        'user_id',
        'pond_name',
        'fish_type',
        'pond_size',
        'management_type',
        'water_temp',
        'ph_level',
        'dissolved_oxygen',
        'salinity',
        'measurement_date',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function recommendations(){
        return $this->hasMany(PondRecommendation::class);
    }
}
