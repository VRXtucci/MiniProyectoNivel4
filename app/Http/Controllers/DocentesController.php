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
            return response()->json(['message' => 'Docente no encontrado'], 404);
        }

        return response()->json($docentes);
    }

    public function store(Request $request)
    {
        // Valida los datos entrantes
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'email' => 'required|email|unique:docentes', // Valida que el correo sea único
        ]);

        // Crea un nuevo usuario utilizando los datos de la solicitud
        $docentes = new docentes();
        $docentes->nombre = $request->input('nombre');
        $docentes->apellido = $request->input('apellido');
        $docentes->direccion = $request->input('direccion');
        $docentes->email = $request->input('email');

        // Guarda el usuario en la base de datos
        $docentes->save();

        // Devuelve una respuesta de éxito
        return response()->json(['message' => 'Docente creado con éxito'], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'email' => 'required|email|unique:docentes', // Valida que el correo sea único
        ]);

        // Encuentra el usuario existente por ID
        $docentes = docentes::find($id);

        if (!$docentes) {
            return response()->json(['message' => 'Docente no encontrado'], 404);
        }

        // Actualiza los campos del usuario en función de los datos de la solicitud
        $docentes->nombre = $request->input('nombre');
        $docentes->apellido = $request->input('apellido');
        $docentes->apellido = $request->input('direccion');
        $docentes->email = $request->input('email');
        // Actualiza otros campos según sea necesario

        // Guarda los cambios en la base de datos
        $docentes->save();

        // Devuelve una respuesta de éxito
        return response()->json(['message' => 'Docente actualizado con éxito'], 200);
    }

    public function destroy($id)
    {
        $docentes = docentes::find($id);

        if (!$docentes) {
            return response()->json(['message' => 'Docente no encontrado'], 404);
        }

        // Utiliza el método destroy para eliminar el usuario por su ID
        docentes::destroy($id);

        return response()->json(['message' => 'Docente eliminado con éxito'], 200);
    }
}

