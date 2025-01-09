<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $table = 'alerts';

    protected $fillable = [
        'user_id',
        'type',
        'message',
        'creation_date',
        'is_read',
        'severity',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
