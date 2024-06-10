<?php

namespace App\Models\Techso;

use Carbon\Carbon;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\Techso\ProductTransaction;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'status'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        $useLogName = 'Product';
        $run_seeder_disable = env('RUN_SEEDER_DISABLE');

        if ($run_seeder_disable == 'Y') {

            return LogOptions::defaults()
                ->logOnly(['name', 'local_name', 'description', 'status', 'created_at', 'updated_at'])
                ->setDescriptionForEvent(fn (string $eventName) => "$useLogName {$eventName}")
                ->useLogName($useLogName)
                ->logOnlyDirty();
        }
        if ($run_seeder_disable == 'N') {

            return LogOptions::defaults()
                ->logOnly(['code', 'name'])
                ->setDescriptionForEvent(fn (string $eventName) => "$useLogName {$eventName}")
                ->useLogName($useLogName)
                ->logOnlyDirty();
        }
    }

    public function product_type()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
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
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }
    public function updatedBy()
    {
        return $this->belongsTo('App\Models\User', 'updated_by', 'id');
    }
    public function transactions()
    {
        return $this->hasMany(ProductTransaction::class);
    }

    public function getCurrentStockAttribute()
    {
        return $this->transactions->sum('received_quantity') - $this->transactions->sum('issued_quantity');
    }

    public function getAveragePriceAttribute()
    {
        $totalReceivedQuantity = $this->transactions->sum('received_quantity');
        if ($totalReceivedQuantity == 0) {
            return 0;
        }
        $totalReceivedPrice = $this->transactions->sum(function ($transaction) {
            return $transaction->received_quantity * $transaction->received_price;
        });
        return $totalReceivedPrice / $totalReceivedQuantity;
    }

    public function resetAveragePriceIfStockZero()
    {
        if ($this->current_stock == 0) {
            $this->transactions()->delete();
        }
    }
}
