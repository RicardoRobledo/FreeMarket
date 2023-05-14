<?php

namespace App\Http\Controllers;

use App\Models\grupotraduccion;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class traduccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        try {
            $trad = new grupotraduccion();
            //echo ($request->get('nombre_desa'));
            $trad->id = null;
            $trad->nombre_grupo = $request->get('nombre_tra');
            if (empty(trim( $trad->nombre_grupo))){
                return redirect('/dash/traductores')->with('errorAgregado', 'La insercion no pudo efectuarse solo pusiste espacios');
            }
            try {
                $validatedData = $request->validate([
                    'nombre_tra' => 'required|regex:/^[a-zA-Z ]+$/'
                ]);
                $trad->save();
                 return redirect('/dash/traductores')->with('agregado', 'Registro creado satisfactoriamente.');
            } catch (ValidationException $e) {
                return redirect('/dash/juegos')->with('errorAgregado', 'ERROR Los datos no cumplen el formato en el que deberian ir');
            }
            
        } catch (\Throwable $th) {
            return redirect('/dash/traductores')->with('errorAgregado', 'La insercion no pudo efectuarse');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        try {
            $id = $request->input('id');
            $trad = grupotraduccion::findOrFail($id);
            $trad->nombre_grupo = $request->input('nombre_tra');
            if (empty(trim( $trad->nombre_grupo))){
                return redirect('/dash/traductores')->with('errorAgregado', 'La modificación no pudo efectuarse solo pusiste espacios');
            }
            try {
                $validatedData = $request->validate([
                    'nombre_tra' => 'required|regex:/^[a-zA-Z ]+$/'
                ]);
                $trad->save();
                return redirect('/dash/traductores')->with('modificado', 'Registro modificado satisfactoriamente.');
            } catch (ValidationException $e) {
                return redirect('/dash/traductores')->with('errorAgregado', 'ERROR Los datos no cumplen el formato en el que deberian ir');
            }
        } catch (\Throwable $e) {
            return redirect('/dash/traductores')->with('modificado', 'Registro NO modificado satisfactoriamente verifica y vuelve a intentar.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registro = grupotraduccion::find($id);
        if (!$registro) {
            return redirect('/dash/traductores')->with('elimiadoCorrecto', 'El registro no pudo ser elimiando posiblemente ya no existe');
        }
        $registro->delete();
        //dd("Registro eliminado satisfactoria mente");
        return redirect('/dash/traductores')->with('elimiadoCorrecto', 'Registro eliminado satisfactoriamente.');
    }
}
