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

        if (!$matricula) {
            return response()->json(['message' => 'Matricula no Encontrada'], 404);
        }

        return response()->json($matricula);
    }


    public function store(Request $request)
    {
        $request->validate([
            'alumno_id' => 'required',
            'materia_id' => 'required',
        ]);

        // Crea un nuevo usuario utilizando los datos de la solicitud
        $matricula = new matricula();
        $matricula->nombre = $request->input('alumno_id');
        $matricula->apellido = $request->input('materia_id');

        // Guarda el usuario en la base de datos
        $matricula->save();

        // Devuelve una respuesta de éxito
        return response()->json(['message' => 'Matricula creado con éxito'], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alumno_id' => 'required',
            'materia_id' => 'required',
        ]);

        // Encuentra el usuario existente por ID
        $matricula = matricula::find($id);

        if (!$matricula) {
            return response()->json(['message' => 'Matricula no encontrado'], 404);
        }

        // Actualiza los campos del usuario en función de los datos de la solicitud
        $matricula->alumno_id = $request->input('alumno_id');
        $matricula->materia_id = $request->input('materia_id');

        // Guarda los cambios en la base de datos
        $matricula->save();

        // Devuelve una respuesta de éxito
        return response()->json(['message' => 'Matricula actualizado con éxito'], 200);
    }

    public function destroy($id)
    {
        $matricula = matricula::find($id);

        if (!$matricula) {
            return response()->json(['message' => 'Matricula no encontrado'], 404);
        }

        // Utiliza el método destroy para eliminar el usuario por su ID
        matricula::destroy($id);

        return response()->json(['message' => 'Matricula eliminado con éxito'], 200);
    }
}
