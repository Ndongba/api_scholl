<?php

namespace App\Http\Controllers;


use App\Models\Etudiant;
use App\Http\Requests\StoreetudiantRequest;
use App\Http\Requests\UpdateetudiantRequest;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants= Etudiant::all();
        return response()->json("liste des etudiants", $etudiants);
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreetudiantRequest $request)
    {
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:etudiants',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:255',
            'matricule' => 'required|string|max:50',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'date_naissance' => 'required|date|before:now',
        ]);

        $etudiant = Etudiant::create($request->all());

        return response()->json($etudiant,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(etudiant $etudiant)
    {
        return $etudiant;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateetudiantRequest $request, etudiant $etudiant)
    {
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:etudiants',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:255',
            'matricule' => 'required|string|max:50',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'date_naissance' => 'required|date|before:now',
        ]);

        $etudiant->update($request->all());

        return response()->json($etudiant,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(etudiant $etudiant)
    {
        $etudiant->delete();

        return response()->json(null,204);
    }
}
