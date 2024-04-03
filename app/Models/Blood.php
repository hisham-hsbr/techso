<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\TimeZone;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Blood extends Model
{
    use HasFactory,LogsActivity;

     protected $fillable = [
        'name',
        'status'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        $run_seeder_disable=env('RUN_SEEDER_DISABLE');

        if($run_seeder_disable=='Y'){
            return LogOptions::defaults()
            ->logOnly(['name','description','status','created_at','updated_at'])
            ->setDescriptionForEvent(fn(string $eventName) => "This Blood Group has been {$eventName}")
            ->useLogName('Blood Group')
            ->logOnlyDirty();
        }
        if($run_seeder_disable=='N'){
            return LogOptions::defaults()
            ->logOnly(['name'])
            ->setDescriptionForEvent(fn(string $eventName) => "This Blood Group has been {$eventName}")
            ->useLogName('Blood Group')
            ->logOnlyDirty();
        }
    }

    // <--End laravel-activitylog

    public function timeZone()
    {
        return $this->belongsTo(TimeZone::class,'time_zone_id','id');
    }

    public function getCreatedAtAttribute()
    {
        $time_zone = Auth::user()->timeZone->time_zone;
        return Carbon::parse($this->attributes['created_at'])->setTimezone($time_zone);
    }

    public function getUpdatedAtAttribute()
    {
        $time_zone = Auth::user()->timeZone->time_zone;
        return Carbon::parse($this->attributes['updated_at'])->setTimezone($time_zone);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class,'updated_by','id');
    }
}
