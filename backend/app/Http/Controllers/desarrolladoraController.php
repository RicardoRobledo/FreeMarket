<?php

namespace App\Http\Controllers;

use App\Models\Desarrolladora;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Validation\ValidationException;

class desarrolladoraController extends Controller
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
            $desa = new Desarrolladora();
            echo ($request->get('nombre_desa'));
            $desa->id = null;
            $desa->nombre_desarrolladora = $request->get('nombre_desa');
            if (empty(trim( $desa->nombre_desarrolladora))){
                return redirect('/dash/desarrolladora')->with('ErrorAgregado', 'La insercion no pudo efectuarse solo pusiste espacios');
            }
            try {
                $validatedData = $request->validate([
                    'nombre_desa' => 'required|regex:/^[a-zA-Z ]+$/'
                ]);
                $desa->save();
                return redirect('/dash/desarrolladora')->with('agregado', 'Registro creado satisfactoriamente.');
            } catch (ValidationException $e) {
                return redirect('/dash/juegos')->with('error', 'ERROR Los datos no cumplen el formato en el que deberian ir');
            }
           
        } catch (\Throwable $th) {
            return redirect('/dash/desarrolladora')->with('ErrorAgregado', 'La insercion no pudo efectuarse');
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
    public function update(Request $request)
{
    try {
        $id = $request->input('id');
        $desa = Desarrolladora::findOrFail($id);
        $desa->nombre_desarrolladora = $request->input('nombre_desa');
        if (empty(trim( $desa->nombre_desarrolladora))){
            return redirect('/dash/desarrolladora')->with('ErrorAgregado', 'La modificacion no pudo efectuarse solo pusiste espacios!');
        }

        try {
            $validatedData = $request->validate([
                'nombre_desa' => 'required|regex:/^[a-zA-Z ]+$/'
            ]);
            $desa->save();
            return redirect('/dash/desarrolladora')->with('agregado', 'Registro creado satisfactoriamente.');
        } catch (ValidationException $e) {
            return redirect('/dash/juegos')->with('error', 'ERROR Los datos no cumplen el formato en el que deberian ir');
        }

        $desa->save();
        return redirect('/dash/desarrolladora')->with('modificado', 'Registro modificado satisfactoriamente.');
    } catch (\Throwable $e) {
        return redirect('/dash/desarrolladora')->with('modificado', 'Registro NO modificado satisfactoriamente verifica y vuelve a intentar.');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registro = Desarrolladora::find($id);
        if (!$registro) {
            return redirect('/dash/desarrolladora')->with('elimiadoCorrecto', 'El registro no pudo ser elimiando posiblemente ya no existe');
        }
        $registro->delete();
        //dd("Registro eliminado satisfactoria mente");
        return redirect('/dash/desarrolladora')->with('elimiadoCorrecto', 'Registro eliminado satisfactoriamente.');
    }
}
