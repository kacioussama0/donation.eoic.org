<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function  category() {
        return $this->belongsTo(Category::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function title() {

        if(config('app.locale') == 'en')
            return   $this -> title_en;
        elseif(config('app.locale') == 'fr')
            return  $this-> title_fr;

        return $this ->  title ;
    }

    public function slug() {

        if(config('app.locale') == 'en')
            return   $this -> slug_en;
        elseif(config('app.locale') == 'fr')
            return  $this-> slug_fr;

        return $this -> slug ;
    }

    public function description() {

        if(config('app.locale') == 'en')
            return   $this -> description_en;
        elseif(config('app.locale') == 'fr')
            return  $this-> description_fr;

        return $this ->  description ;
    }



}
