<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function donations() {
        return $this->hasMany(Donation::class);
    }

    public function getProgressPercentageAttribute()
    {
        if ($this->target_amount <= 0) {
            return 0;
        }

        return round(($this->collected_amount / $this->target_amount) * 100, 2);
    }


    public function getTitleAttribute()
    {

        return match (config('app.locale')) {
            'fr' => $this->name_fr,
            'en' => $this->name_en,
            default => $this->name,
        };

    }

    public function getDescAttribute()
    {

        return match (config('app.locale')) {
            'fr' => $this->description_fr,
            'en' => $this->description_en,
            default => $this->description,
        };

    }


}
