<?php

namespace App\Http\Controllers;

use App\Models\alumnos;
use Illuminate\Http\Request;

class AlumnosController extends Controller
{
    public function index()
    {
        $alumnos = alumnos::all();
        return $alumnos;
    }

    public function show($id)
    {
        $alumnos = alumnos::find($id);

        if (!$alumnos) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json($alumnos);
    }

    public function store(Request $request)
    {
        // Valida los datos entrantes
        $request->validate([
            'nombre_materia' => 'required',
            'descripccion' => 'required', // Asegúrate de que estés validando el campo "apellido"
        ]);

        // Crea un nuevo usuario utilizando los datos de la solicitud
        $alumnos = new alumnos();
        $alumnos->nombre = $request->input('nombre_materia');
        $alumnos->apellido = $request->input('descripcion'); // Asegúrate de asignar el apellido

        // Guarda el usuario en la base de datos
        $alumnos->save();

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
        $alumnos = alumnos::find($id);

        if (!$alumnos) {
            return response()->json(['message' => 'Materia no encontrado'], 404);
        }

        // Actualiza los campos del usuario en función de los datos de la solicitud
        $alumnos->nombre = $request->input('nombre_materia');
        $alumnos->apellido = $request->input('descripcion');
        // Actualiza otros campos según sea necesario

        // Guarda los cambios en la base de datos
        $alumnos->save();

        // Devuelve una respuesta de éxito
        return response()->json(['message' => 'Materia actualizado con éxito'], 200);
    }

    public function destroy($id)
    {
        $alumnos = alumnos::find($id);

        if (!$alumnos) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        // Utiliza el método destroy para eliminar el usuario por su ID
        alumnos::destroy($id);

        return response()->json(['message' => 'Usuario eliminado con éxito'], 200);
    }
}
