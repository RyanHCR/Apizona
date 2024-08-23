<?php

namespace App\Http\Controllers;

use App\Models\TreinadorModel;
use Illuminate\Http\Request;

class TreinadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $treinadores = TreinadorModel::all();
        return response()->json($treinadores);
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
            "cpf" => "required|string|max:255",
            "rg" => "required|string|max:255",
        ]);
        $treinador = TreinadorModel::create($validatedData);
        return response()->json($treinador, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $treinador = TreinadorModel::find($id);
        if(!$treinador){
            return response()->json(["message" => "Treinador not found"], 404);
        }
        return response()->json($treinador);
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
        $treinador = TreinadorModel::find($id);
        if(!$treinador){
            return response()->json(["message" => "Treinador not found"], 404);
        };
        $validatedData = $request->validate([
            "nome" => "required|string|max:255",
            "idade" => "nullable|string",
            "altura" => "required|string|max:255",
            "peso" => "required|string|max:255",
            "cpf" => "required|string|max:255",
            "rg" => "required|string|max:255",
        ]);
        $treinador->update($validatedData);
        return response()->json($treinador, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $treinador = TreinadorModel::find($id);
        if(!$treinador){
            return response()->json(["message" => "Treinador Not Found"], 404);
        }
        $treinador->delete();
        return response()->json(["message" => "Treinador Deleted Sucessfully"], 200);
    }
}
