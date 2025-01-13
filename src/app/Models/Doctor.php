<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';

    protected $fillable = [
        'user_id',
        'specializations',
        'certificates',
        'work_hours',
        'is_available',
    ];

    protected $casts = [
        'specializations' => 'array',
        'certificates'    => 'array',
        'is_available'    => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function treatmentPlans()
    {
        return $this->hasMany(TreatmentPlan::class);
    }

    public function patients() {
        return $this->belongsToMany(Patient::class, 'doctor_patient');
    }
}
