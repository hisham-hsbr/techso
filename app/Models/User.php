<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    //-->start laravel-activitylog
    //only the `deleted` event will get logged automatically
    // protected static $recordEvents = ['deleted'];
    public function getActivitylogOptions(): LogOptions
    {
        $run_seeder_disable=env('RUN_SEEDER_DISABLE');

        if($run_seeder_disable=='Y'){
            return LogOptions::defaults()
            ->logOnly(['name','last_name','dob','phone1','phone2','gender','avatar','email','status','blood.name','cityName.city','timeZone.time_zone','created_at','updated_at'])
            // Chain fluent methods for configuration options

            ->setDescriptionForEvent(fn(string $eventName) => "This User has been {$eventName}")
            ->useLogName('User')
            // ->dontLogIfAttributesChangedOnly(['email']) //By default the updated_at attribute is not ignored and will trigger an activity being logged
            ->logOnlyDirty();
            // ->dontSubmitEmptyLogs(); //Prevent save logs items that have no changed attribute
        }
        if($run_seeder_disable=='N'){
            return LogOptions::defaults()
            ->logOnly(['name'])
            // Chain fluent methods for configuration options

            ->setDescriptionForEvent(fn(string $eventName) => "This User has been {$eventName}")
            ->useLogName('User')
            // ->dontLogIfAttributesChangedOnly(['email']) //By default the updated_at attribute is not ignored and will trigger an activity being logged
            ->logOnlyDirty();
            // ->dontSubmitEmptyLogs(); //Prevent save logs items that have no changed attribute
        }
    }

    // <--End laravel-activitylog

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'settings'=>'array'
    ];

    protected $attributes = [
        'settings' => '{"personal_settings":"1","card_header":1,"card_footer":1, "sidebar_collapse":null,"dark_mode":null,"default_status":1,"default_time_zone":1,"permission_view":"list"}'
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

        public function cityName()
        {
            return $this->belongsTo(CountryStateDistrictCity::class,'city_id','id');
        }
        public function blood()
        {
            return $this->belongsTo(Blood::class,'blood_id','id');
        }
}
