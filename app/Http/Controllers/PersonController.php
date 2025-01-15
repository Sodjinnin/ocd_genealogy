<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePeopleRequest;
use App\Services\PersonService;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function __construct(private readonly PersonService $personService)
    {
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $people = $this->personService->getPeople();
        return view("pages.people.index", compact("people"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.people.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePeopleRequest $request)
    {
        try {
            $this->personService->savePeople($request);
            return redirect("people")->with("success","Enregistrement effectué");
        }catch (\Exception $e){
            return redirect("index")->with("error","Une erreur esy survenu, veuillez rééssayer");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $one_people = $this->personService->getOnePeople($id);
       // dd($one_people);
        return view("pages.people.show", compact("one_people"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
