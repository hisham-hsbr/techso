<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status'
    ];




    public function getCreatedAtAttribute()
    {

        if (Auth::check() && Auth::user()->timeZone) {
            $time_zone = Auth::user()->timeZone->time_zone;
            return Carbon::parse($this->attributes['created_at'])->setTimezone($time_zone);
        }

        // Fallback if the user is not authenticated or timeZone is null
        return $this->attributes['created_at'];
    }

    public function getUpdatedAtAttribute()
    {
        if (Auth::check() && Auth::user()->timeZone) {
            $time_zone = Auth::user()->timeZone->time_zone;
            return Carbon::parse($this->attributes['updated_at'])->setTimezone($time_zone);
        }

        // Fallback if the user is not authenticated or timeZone is null
        return $this->attributes['created_at'];
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
