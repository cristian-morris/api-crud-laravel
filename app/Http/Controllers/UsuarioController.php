<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Requests\UsuarioRequest;

class UsuarioController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();

        if ($usuarios->isEmpty()) {
           $data =  [
            'message' => "error, no hay usuarios",
            'status' => 200
           ];
           return response()->json($data, 200);
        }

        return response()->json($usuarios, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(UsuarioRequest $request)
    {
       $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'rol' => $request->rol,
            'estatus' => $request->estatus,
            'fecha_alta' => now(),
        ]);
        
        if (!$usuario) {
            $data =  [
                'message' => "error al crear el usuario",
                'status' => 500
               ];
               return response()->json($data, 500);
        }

        $data =  [
            'usuario' => $usuario,
            'status' => 201
           ];

           return response()->json($data, 201);
    }

    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            $data =  [
                'message' => "usuario no encontrado",
                'status' => 404
               ];
               return response()->json($data, 404);
        }

    

        return response()->json($usuario, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UsuarioRequest $request, $id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            $data =  [
                'message' => "usuario no encontrado",
                'status' => 404
               ];
               return response()->json($data, 404);
        }

        $usuario->nombre = $request->nombre;
        $usuario->apellidos = $request->apellidos;
        $usuario->rol = $request->rol;
        $usuario->estatus = $request->estatus;
        $usuario->fecha_modificacion = now();
       
         if ($request->estatus === 'inactivo') {
            $usuario->fecha_baja = now();
        } else {
            $usuario->fecha_baja = null;
        }

        $usuario->save();

        return response()->json([
            'success' => true,
            'usuario' => $usuario
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $usuario = Usuario::find($id);

        if (!$usuario) {
            $data =  [
                'message' => "usuario no encontrado",
                'status' => 404
               ];
               return response()->json($data, 404);
        }

        $usuario->delete();

        $data =  [
            'message' => "usuario eliminado",
            'status' => 200
           ];

        return response()->json($data, 200);   
    }
}
