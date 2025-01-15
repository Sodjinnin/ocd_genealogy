<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{

    public function child(){
        return $this->belongsTo(People::class,"child_id");
    }


    public function parent(){
        return $this->belongsTo(People::class,"parent_id");
    }



}
