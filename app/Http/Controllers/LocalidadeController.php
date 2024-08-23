<?php

namespace App\Http\Controllers;

use App\Models\LocalidadeModel;
use Illuminate\Http\Request;

class LocalidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $localidades = LocalidadeModel::all();
        return response()->json($localidades);
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
            "rua" => "required|string|max:255",
            "bairro" => "required|string|max:255",
            "numero" => "required|string|max:255",
            "cep" => "required|string|max:255",
            "cidade" => "required|string|max:255",
            "estado" => "required|string|max:255",
            "pais" => "required|string|max:255",
        ]);
        $localidade = LocalidadeModel::create($validatedData);
        return response()->json($localidade, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $localidade = LocalidadeModel::find($id);
        if(!$localidade){
            return response()->json(["message" => "Localidade not found"], 404);
        }
        return response()->json($localidade);
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
        $localidade = LocalidadeModel::find($id);
        if(!$localidade){
            return response()->json(["message" => "Localidade not found"], 404);
        };
        $validatedData = $request->validate([
            "rua" => "required|string|max:255",
            "bairro" => "required|string|max:255",
            "numero" => "required|string|max:255",
            "cep" => "required|string|max:255",
            "cidade" => "required|string|max:255",
            "estado" => "required|string|max:255",
            "pais" => "required|string|max:255",
        ]);
        $localidade->update($validatedData);
        return response()->json($localidade, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $localidade = LocalidadeModel::find($id);
        if(!$localidade){
            return response()->json(["message" => "Localidade Not Found"], 404);
        }
        $localidade->delete();
        return response()->json(["message" => "Localidade Deleted Sucessfully"], 200);
    }
}
