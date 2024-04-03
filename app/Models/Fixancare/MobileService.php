<?php

namespace App\Models\Fixancare;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class MobileService extends Model
{
    use HasFactory, LogsActivity;

     protected $fillable = [
        'name',
        'status'
    ];
    protected $casts = [
        'date' => 'datetime'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        $useLogName='Mobile Service';
        $run_seeder_disable=env('RUN_SEEDER_DISABLE');

        if($run_seeder_disable=='Y'){

            return LogOptions::defaults()
            ->logOnly(['code','name','local_name','description','status','created_at','updated_at'])
            ->setDescriptionForEvent(fn(string $eventName) => "$useLogName {$eventName}")
            ->useLogName($useLogName)
            ->logOnlyDirty();
        }
        if($run_seeder_disable=='N'){

            return LogOptions::defaults()
            ->logOnly(['code','name'])
            ->setDescriptionForEvent(fn(string $eventName) => "$useLogName {$eventName}")
            ->useLogName($useLogName)
            ->logOnlyDirty();
        }
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
        // return $this->belongsTo(User::class,'created_by','id');
        return $this->belongsTo('App\Models\User','created_by','id');
    }
    public function updatedBy()
    {
        // return $this->belongsTo(User::class,'updated_by','id');
        return $this->belongsTo('App\Models\User','created_by','id');

    }
    public function jobType()
    {
        return $this->belongsTo(JobType::class,'job_type_id','id');
    }
    public function jobStatus()
    {
        return $this->belongsTo(JobStatus::class,'job_status_id','id');
    }
    public function workStatus()
    {
        return $this->belongsTo(WorkStatus::class,'work_status_id','id');
    }
    public function mobileModel()
    {
        return $this->belongsTo(MobileModel::class,'mobile_model_id','id');
    }
    public function mobileComplaint()
    {
        return $this->belongsTo(MobileComplaint::class,'mobile_complaint_id','id');
    }

    // public static function boot()
    // {
    //     parent::boot();
    //     static::creating(function($model){
    //         $model->number=MobileService::where('')
    //     })
    // }
}
