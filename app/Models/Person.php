<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Person extends Model
{

    protected $table = "people";
    protected $fillable = [
        'created_by',
        'first_name',
        'middle_names',
        'last_name',
        'birth_name',
        'date_of_birth',
    ];
    public function childs(){
        return $this->hasMany(Relationship::class,"parent_id");
    }

    public function parents(){
        return $this->hasMany(Relationship::class,"child_id");
    }

    public function creator(){
        return $this->belongsTo(User::class,"created_by");
    }

    public function getDegreeWith($target_people_id)
    {
        $already_checked = [];
        $queue = [[
            'people_id' => $this->id,
            'degree' => 0
        ]];

        while (!empty($queue)) {
            $current = array_shift($queue);
            $current_people_id = $current['people_id'];
            $current_degree = $current['degree'];
            /*            Log::info(["queue"=>$queue]);*/

            if ($current_degree > 25) {
                return false;
            }

            if ($current_people_id == $target_people_id) {
                return $current_degree;
            }

            if (!in_array($current_people_id, $already_checked)) {
                $already_checked[] = $current_people_id;

                $relations = DB::table('relationships')
                    ->where('parent_id', $current_people_id)
                    ->orWhere('child_id', $current_people_id)
                    ->get();
                /*                Log::info(["relations"=>$relations]);*/

                foreach ($relations as $relation) {
                    $next_people_id = $relation->parent_id == $current_people_id
                        ? $relation->child_id
                        : $relation->parent_id;
                    /*                    Log::info(["next_people_id"=>$next_people_id]);*/

                    if (!in_array($next_people_id, $already_checked)) {
                        $queue[] = [
                            'people_id' => $next_people_id,
                            'degree' => $current_degree + 1
                        ];
                    }
                }
            }
        }

        return false;
    }



}
