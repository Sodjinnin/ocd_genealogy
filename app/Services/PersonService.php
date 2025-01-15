<?php

namespace App\Services;

use App\Http\Controllers\PersonController;
use App\Models\Person;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PersonService
{
    public function getPeople(){
        $timestart = microtime(true);
        $person = Person::findOrFail(84);
        $degree = $person->getDegreeWith(1265);
        dd(["degree"=>$degree, "time"=>microtime(true)-$timestart, "nb_queries"=>count(DB::getQueryLog())]);

        return Person::query()->with("creator")->get();
    }

    public function getOnePeople($id){
        return Person::query()->with("parents.parent","childs.child")->find($id);
    }


    public function savePeople($request){
        $validatedData = $request->all();
        $formattedData = [
            'created_by' => Auth::id(),
            'first_name' => ucfirst(strtolower($validatedData['first_name'])),
            'middle_names' => $validatedData['middle_names']
                ? implode(', ', array_map(fn($name) => ucfirst(strtolower(trim($name))), explode(',', $validatedData['middle_names'])))
                : null,
            'last_name' => strtoupper($validatedData['last_name']),
            'birth_name' => strtoupper($validatedData['birth_name'] ?? strtoupper($validatedData['last_name'])),
            'date_of_birth' => $validatedData['date_of_birth'] ?? null,
        ];
       return Person::create($formattedData);
    }


}
