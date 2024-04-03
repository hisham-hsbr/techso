<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Permission extends Model
{
    use HasFactory,LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        $run_seeder_disable=env('RUN_SEEDER_DISABLE');

        if($run_seeder_disable=='Y'){
            return LogOptions::defaults()
            ->logOnly(['name','parent','status','timeZone.time_zone','created_at','updated_at'])
            ->setDescriptionForEvent(fn(string $eventName) => "This Permission has been {$eventName}")
            ->useLogName('Permission')
            ->logOnlyDirty();
        }
        if($run_seeder_disable=='N'){
            return LogOptions::defaults()
            ->logOnly(['name'])
            ->setDescriptionForEvent(fn(string $eventName) => "This Permission has been {$eventName}")
            ->useLogName('Permission')
            ->logOnlyDirty();
        }
    }

     protected $fillable = [
        'name',
        'parent',
        'guard_name',
        'status',
        'created_by',
        'updated_by',
    ];

    protected $attributes = [
        'guard_name'=>'web'
    ];

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
    public function timeZone()
    {
        return $this->belongsTo(TimeZone::class,'time_zone_id','id');
    }
}
