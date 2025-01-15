<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{

    public function child(){
        return $this->belongsTo(Person::class,"child_id");
    }


    public function parent(){
        return $this->belongsTo(Person::class,"parent_id");
    }



}
