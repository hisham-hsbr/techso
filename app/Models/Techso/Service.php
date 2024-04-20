<?php

namespace App\Models\Techso;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Service extends Model
{
    use HasFactory, LogsActivity;

     protected $fillable = [
        'name',
        'status'
    ];

    protected $casts =[
        'customer_accessories'=>'array',
        'customer_accessories_id'=>'array'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        $useLogName='Service';
        $run_seeder_disable=env('RUN_SEEDER_DISABLE');

        if($run_seeder_disable=='Y'){

            return LogOptions::defaults()
            ->logOnly(['description','date','job_number','job_type_id','customer_id','product_id','serial_number','lock','complaint_id','complaint_details','work_details','delivered_date','work_status_id','work_status_details','job_status_id','payment','advance','balance','status','created_at','updated_at'])
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
        return $this->belongsTo('App\Models\User','created_by','id');
    }
    public function updatedBy()
    {
        return $this->belongsTo('App\Models\User','updated_by','id');
    }

    public function jobType()
    {
        return $this->belongsTo(JobType::class,'job_type_id','id');
    }
    public function productName()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function customerName()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
}
