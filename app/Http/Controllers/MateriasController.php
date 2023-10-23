<?php

namespace App\Http\Controllers;

use App\Models\materias;
use Illuminate\Http\Request;

class materiasController extends Controller
{
    public function index()
    {
        $materias = Materias::all();
        return $materias;
    }

    public function show($id)
    {
        $materias = materias::find($id);

        if (!$materias) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json($materias);
    }

    public function store(Request $request)
    {
        // Valida los datos entrantes
        $request->validate([
            'nombre_materia' => 'required',
            'descripcion' => 'required',
            'docente_id' => 'required',
        ]);

        // Crea un nuevo usuario utilizando los datos de la solicitud
        $materias = new materias();
        $materias->nombre_materia = $request->input('nombre_materia');
        $materias->descripcion = $request->input('descripcion');
        $materias->docente_id = $request->input('docente_id');

        // Guarda el usuario en la base de datos
        $materias->save();

        // Devuelve una respuesta de éxito
        return response()->json(['message' => 'Materia creado con éxito'], 201);
    }

    public function update(Request $request, $id)
    {
        // Valida los datos entrantes
        $request->validate([
            'nombre_materia' => 'required',
            'descripcion' => 'required', // Asegúrate de que estés validando el campo "apellido"
        ]);

        // Encuentra el usuario existente por ID
        $materias = materias::find($id);

        if (!$materias) {
            return response()->json(['message' => 'Materia no encontrado'], 404);
        }

        // Actualiza los campos del usuario en función de los datos de la solicitud
        $materias->nombre_materia = $request->input('nombre_materia');
        $materias->descripcion = $request->input('descripcion');
        // Actualiza otros campos según sea necesario

        // Guarda los cambios en la base de datos
        $materias->save();

        // Devuelve una respuesta de éxito
        return response()->json(['message' => 'Materia actualizado con éxito'], 200);
    }

    public function destroy($id)
    {
        $materias = materias::find($id);

        if (!$materias) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        // Utiliza el método destroy para eliminar el usuario por su ID
        materias::destroy($id);

        return response()->json(['message' => 'Usuario eliminado con éxito'], 200);
    }
}
