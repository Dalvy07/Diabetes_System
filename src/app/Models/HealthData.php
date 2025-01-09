<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthData extends Model
{
    protected $table = 'health_data';

    protected $fillable = [
        'patient_id',
        'creation_datetime',
        'diagnosis_date',
    ];

    /**
     * Связь "HealthData" принадлежит одному пациенту.
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Связь "HealthData" имеет много записей уровня сахара.
     */
    public function glucoseMeasurements()
    {
        return $this->hasMany(GlucoseMeasurement::class);
    }

    /**
     * Связь "HealthData" имеет много записей о еде.
     */
    public function dietEntries()
    {
        return $this->hasMany(DietEntry::class);
    }

    /**
     * Связь "HealthData" имеет много записей физической активности.
     */
    public function physicalActivities()
    {
        return $this->hasMany(PhysicalActivity::class);
    }

    /**
     * Связь "HealthData" имеет много записей о приёме лекарств.
     */
    public function medications()
    {
        return $this->hasMany(Medication::class);
    }
}
