<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
//
//    public function getPathAttribute(){
//        return asset("api/question/$this->slug");
//    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
