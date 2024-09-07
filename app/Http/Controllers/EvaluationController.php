<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEvaluationRequest;
use App\Http\Requests\UpdateEvaluationRequest;
use App\Models\Evaluation;
use App\Models\Etudiant;

class EvaluationController extends Controller
{



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEvaluationRequest $request, Etudiant $etudiant)
    {
        $request->validate([
            'etudiant_id' =>'required|integer',
            'matiere_id' =>'required|integer',
            'date' => 'required|date',
            'valeur' => 'required|integer|min:0|max:20',
        ]);

        $evaluation = $etudiant->evaluation()->create($request->all());

        return response()->json($evaluation, 201);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEvaluationRequest $request, Evaluation $evaluation)
    {
        $request->validate([
            'etudiant_id' =>'required|integer',
            'matiere_id' =>'required|integer',
            'date' => 'sometimes|required|date',
            'valeur' => 'required|integer|min:0|max:20',
        ]);

        $evaluation->update($request->all());

        return response()->json($evaluation, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        $evaluation->delete();

        return response()->json(null, 204);
    }
}
