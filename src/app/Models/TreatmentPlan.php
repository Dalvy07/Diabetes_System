<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TreatmentPlan extends Model
{
    protected $table = 'treatment_plans';

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'creation_date',
        'last_updated',
        'status',
        'diet_recommendations',
        'activity_recommendations',
        'medication_plan',
        'glucose_target',
        'weight_target',
        'note',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
