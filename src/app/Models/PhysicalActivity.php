<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhysicalActivity extends Model
{
    protected $table = 'physical_activities';

    protected $fillable = [
        'health_data_id',
        'activity_type',
        'duration',
        'calories_burned',
        'activity_time',
        'note',
    ];

    public function healthData()
    {
        return $this->belongsTo(HealthData::class);
    }
}
