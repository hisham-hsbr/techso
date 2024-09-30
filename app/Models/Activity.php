<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Models\Activity as SpatieActivitylog;

class Activity extends SpatieActivitylog
{

    public function activityUser()
    {
        return $this->belongsTo(User::class, 'causer_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function timeZone()
    {
        return $this->belongsTo(TimeZone::class, 'time_zone_id', 'id');
    }
}