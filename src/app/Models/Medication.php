<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    protected $table = 'medications';

    protected $fillable = [
        'health_data_id',
        'name',
        'dosage',
        'frequency',
        'start_datetime',
        'end_datetime',
        'note',
    ];

    public function healthData()
    {
        return $this->belongsTo(HealthData::class);
    }
}
