<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    public function getNameAttribute()
    {

        return match (config('app.locale')) {
            'fr' => $this->title_fr,
            'en' => $this->title_en,
            default => $this->title,
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
