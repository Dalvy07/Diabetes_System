<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlucoseMeasurement extends Model
{
    protected $table = 'glucose_measurements';

    protected $fillable = [
        'health_data_id',
        'glucose_level',
        'measurement_datetime',
        'is_before_meal',
        'note',
    ];

    /**
     * Связь: каждый замер глюкозы принадлежит конкретному HealthData.
     */
    public function healthData()
    {
        return $this->belongsTo(HealthData::class);
    }
}
