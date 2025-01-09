<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DietEntry extends Model
{
    protected $table = 'diet_entries';

    protected $fillable = [
        'health_data_id',
        'food_name',
        'calories',
        'consumption_time',
        'carbohydrates',
        'proteins',
        'fats',
        'note',
    ];

    public function healthData()
    {
        return $this->belongsTo(HealthData::class);
    }
}
