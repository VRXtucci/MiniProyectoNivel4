<?php

namespace App\Http\Controllers;

use App\Models\docentes;
use Illuminate\Http\Request;

class DocentesController extends Controller
{
    public function index()
    {
        $docentes = docentes::all();
        return $docentes;
    }

    public function show($id)
    {
        $docentes = docentes::find($id);

        if (!$docentes) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json($docentes);
    }

    public function store(Request $request)
    {
        // Valida los datos entrantes
        $request->validate([
            'nombre_materia' => 'required',
            'descripccion' => 'required', // Asegúrate de que estés validando el campo "apellido"
        ]);

        // Crea un nuevo usuario utilizando los datos de la solicitud
        $docentes = new docentes();
        $docentes->nombre = $request->input('nombre_materia');
        $docentes->apellido = $request->input('descripcion'); // Asegúrate de asignar el apellido

        // Guarda el usuario en la base de datos
        $docentes->save();

        // Devuelve una respuesta de éxito
        return response()->json(['message' => 'Materia creado con éxito'], 201);
    }

    public function update(Request $request, $id)
    {
        // Valida los datos entrantes
        $request->validate([
            'nombre_materia' => 'required',
            'descripccion' => 'required', // Asegúrate de que estés validando el campo "apellido"
        ]);

        // Encuentra el usuario existente por ID
        $docentes = docentes::find($id);

        if (!$docentes) {
            return response()->json(['message' => 'Materia no encontrado'], 404);
        }

        // Actualiza los campos del usuario en función de los datos de la solicitud
        $docentes->nombre = $request->input('nombre_materia');
        $docentes->apellido = $request->input('descripcion');
        // Actualiza otros campos según sea necesario

        // Guarda los cambios en la base de datos
        $docentes->save();

        // Devuelve una respuesta de éxito
        return response()->json(['message' => 'Materia actualizado con éxito'], 200);
    }

    public function destroy($id)
    {
        $docentes = docentes::find($id);

        if (!$docentes) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        // Utiliza el método destroy para eliminar el usuario por su ID
        docentes::destroy($id);

        return response()->json(['message' => 'Usuario eliminado con éxito'], 200);
    }
}

