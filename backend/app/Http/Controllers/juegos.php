<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;
use Illuminate\Validation\ValidationException;

class juegos extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        $juego = new Juego();
        $juego->id = null;
        $juego->nombre = $request->get('nombre');
        $juego->genero = $request->get('genero');
        $juego->descripcion = $request->get('desc');
        $juego->ano_publicacion = $request->get('año');
        $juego->desarrolladora_id = $request->get('desa');
        $juego->grupotraduccion_id = $request->get('grupo_tra');

        if (empty(trim($juego->nombre)
            && trim($juego->nombre)
            && trim($juego->genero)
            && trim($juego->descripcion))) {
            return redirect()->back()->with(['error' => 'Error Los datos no pueden ser enviados solo usnando espacios']);
        } else {
            try {
                $validatedData = $request->validate([
                    'nombre' => 'required|regex:/^[a-zA-Z0-9 ()]+$/',
                    'genero' => 'required|regex:/^[a-zA-Z,]+$/',
                    'desc' => 'required|regex:/^[a-zA-Z0-9 ()áéíóúÁÉÍÓÚüÜñÑ,.]+$/',
                    'año' => 'required|regex:/^[0-9]+$/',
                    'desa' => 'required|regex:/^[0-9]+$/',
                    'grupo_tra' => 'required|regex:/^[0-9]+$/'
                ]);
                $juego->save();
                return redirect('/dash/juegos')->with('agregado', 'Registro creado satisfactoriamente.');
            } catch (ValidationException $e) {
                return redirect('/dash/juegos')->with('error', 'ERROR Los datos no cumplen el formato en el que deberian ir');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
        try {/*
            echo($request->input('nombre') . " - ");
            echo($request->input('genero') . " - ");
            echo($request->input('desc') . " - ");
            echo($request->input('año') . " - ");
            echo($request->input('desa') . " - ");
            echo($request->input('grupo_tra') . " - ");
            */
            $juego = Juego::findOrFail($id);
            $juego->nombre = trim($request->input('nombre'));
            $juego->genero = trim($request->input('genero'));
            $juego->descripcion = trim($request->input('desc'));
            $juego->ano_publicacion = trim($request->input('año'));
            $juego->desarrolladora_id = trim($request->input('desa'));
            $juego->grupotraduccion_id = trim($request->input('grupo_tra'));
            if (!empty($juego->nombre || $juego->genero || $juego->descripcion ||
                $juego->ano_publicacion || $juego->desarrolladora_id || $juego->grupotraduccion_id)) {
                try {
                    $validatedData = $request->validate([
                        'nombre' => 'required|regex:/^[a-zA-Z0-9 ()]+$/',
                        'genero' => 'required|regex:/^[a-zA-Z,]+$/',
                        'desc' => 'required|regex:/^[a-zA-Z0-9 ()áéíóúÁÉÍÓÚüÜñÑ,.]+$/',
                        'año' => 'required|regex:/^[0-9]+$/',
                        'desa' => 'required|regex:/^[0-9]+$/',
                        'grupo_tra' => 'required|regex:/^[0-9]+$/'
                    ]);
                    $juego->save();
                    return redirect('/dash/juegos')->with('modificado', 'Registro modificado satisfactoriamente.');
                } catch (ValidationException $e) {
                    return redirect('/dash/juegos')->with('error', 'ERROR Los datos no cumplen el formato en el que deberian ir');
                }
            } else {
                return redirect('/dash/juegos')->with('error', 'ERROR Se enviaron datos con solo espacios!');
            }
        } catch (\Throwable $e) {
            //dd($e);
            //dd("Error la actualizzacion no pudo ser completada");
            return redirect('/dash/juegos')->with('modificado', 'Registro NO modificado satisfactoriamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registro = Juego::find($id);
        if (!$registro) {
            return redirect('/dash/juegos')->with('elimiadoCorrecto', 'El registro no pudo ser elimiando posiblemente ya no existe');
        }
        $registro->delete();
        //dd("Registro eliminado satisfactoria mente");
        return redirect('/dash/juegos')->with('elimiadoCorrecto', 'Registro eliminado satisfactoriamente.');
    }
}
