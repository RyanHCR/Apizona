<?php

namespace App\Http\Controllers;

use App\Models\CompetidorModel;
use Illuminate\Http\Request;


class CompetidorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competidores = CompetidorModel::all();
        return response()->json($competidores);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nome" => "required|string|max:255",
            "idade" => "nullable|string",
            "altura" => "required|string|max:255",
            "peso" => "required|string|max:255",
            "sexo" => "required|string|max:255",
            "cpf" => "required|string|max:255",
            "rg" => "required|string|max:255",
            "equipe" => "required|string|max:255",

        ]);
        $competidor = CompetidorModel::create($validatedData);
        return response()->json($competidor, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $competidor = CompetidorModel::find($id);
        if(!$competidor){
            return response()->json(["message" => "Competidor not found"], 404);
        }
        return response()->json($competidor);
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
        $competidor = CompetidorModel::find($id);
        if(!$competidor){
            return response()->json(["message" => "Competidor not found"], 404);
        };
        $validatedData = $request->validate([
            "nome" => "required|string|max:255",
            "idade" => "nullable|string",
            "altura" => "required|string|max:255",
            "peso" => "required|string|max:255",
            "sexo" => "required|string|max:255",
            "cpf" => "required|string|max:255",
            "rg" => "required|string|max:255",
            "equipe" => "required|string|max:255",
        ]);
        $competidor->update($validatedData);
        return response()->json($competidor, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $competidor = CompetidorModel::find($id);
        if(!$competidor){
            return response()->json(["message" => "Competidor Not Found"], 404);
        }
        $competidor->delete();
        return response()->json(["message" => "Competidor Deleted Sucessfully"], 200);
}
}