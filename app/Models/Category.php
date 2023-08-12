<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

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

    public function projects() {
        return $this->belongsTo(Project::class);
    }
}
