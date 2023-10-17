<?php

namespace App\Http\Controllers;

use App\Models\matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{

    public function index()
    {
        $matricula = matricula::all();
        return $matricula;
    }
    
    public function show($id)
    {
        $matricula = matricula::find($id);

        if(!$matricula){
            return response()->json(['message' => 'Matricula no Encontrada'], 404);
        }

        return response()->json($matricula);
    }


    public function store(Request $request)
    {
        
    }

    public function update(Request $request, matricula $matricula)
    {

    }

    public function destroy($id)
    {
        $matricula = matricula::find($id);

        if (!$matricula) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        // Utiliza el método destroy para eliminar el usuario por su ID
        matricula::destroy($id);

        return response()->json(['message' => 'Usuario eliminado con éxito'], 200);
    }
}
