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
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'email' => 'required|email|unique:alumnos', // Valida que el correo sea único
        ]);

        // Crea un nuevo usuario utilizando los datos de la solicitud
        $alumnos = new alumnos();
        $alumnos->nombre = $request->input('nombre');
        $alumnos->apellido = $request->input('apellido');
        $alumnos->direccion = $request->input('direccion');
        $alumnos->email = $request->input('email');

        // Guarda el usuario en la base de datos
        $alumnos->save();

        // Devuelve una respuesta de éxito
        return response()->json(['message' => 'Alumno creado con éxito'], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'email' => 'required|email|unique:alumnos', // Valida que el correo sea único
        ]);

        // Encuentra el usuario existente por ID
        $alumnos = alumnos::find($id);

        if (!$alumnos) {
            return response()->json(['message' => 'Materia no encontrado'], 404);
        }

        // Actualiza los campos del usuario en función de los datos de la solicitud
        $alumnos->nombre = $request->input('nombre');
        $alumnos->apellido = $request->input('apellido');
        $alumnos->nombre = $request->input('direccion');
        $alumnos->apellido = $request->input('email');
        // Actualiza otros campos según sea necesario

        // Guarda los cambios en la base de datos
        $alumnos->save();

        // Devuelve una respuesta de éxito
        return response()->json(['message' => 'Alumno actualizado con éxito'], 200);
    }

    public function destroy($id)
    {
        $alumnos = alumnos::find($id);

        if (!$alumnos) {
            return response()->json(['message' => 'Alumno no encontrado'], 404);
        }

        // Utiliza el método destroy para eliminar el usuario por su ID
        alumnos::destroy($id);

        return response()->json(['message' => 'Alumno eliminado con éxito'], 200);
    }
}
