<?php

namespace App\Models\Techso;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Service extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'status'
    ];

    protected $casts =[
        'customer_accessories'=>'array',
        'customer_accessories_id'=>'array'
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
        return $this->belongsTo('App\Models\User','created_by','id');
    }
    public function updatedBy()
    {
        return $this->belongsTo('App\Models\User','updated_by','id');
    }
}
