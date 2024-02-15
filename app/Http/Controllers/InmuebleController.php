<?php

namespace App\Http\Controllers;

use App\Models\Inmueble;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;

class InmuebleController extends Controller
{
    public function pdf($inmueble){
        $inmueble = Inmueble::where('id', $inmueble)->first();
        $pdf = PDF::loadView('exports.pdf.inmueble', compact('inmueble'));
        $pdf->seTPaper("A4");
        return $pdf->download('Inmueble.pdf');

    }

    public function own($id)
    {
        $inmuebles = Inmueble::where('user_id', $id)->get();
        return response()->json($inmuebles);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inmuebles = Inmueble::all();
        return response()->json($inmuebles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'description' => 'required|string',
            'movimiento' => 'required',
        ]);

        //Devolvemos un error de validación en caso de fallo en las verificaciones
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 422);
        }

        $inmueble = Inmueble::create([
            'nombre' => $data['nombre'],
            'direccion' => $data['direccion'],
            'descripcion' => $data['description'],
            'imagen' => 'https://img.freepik.com/vector-gratis/hermosa-casa_24877-50819.jpg',
            'movimiento' => $data['movimiento'],
            'user_id' => $data['user_id'],
        ]);

        return response()->json(['message' => 'Inmueble Creado']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function show($inmueble)
    {
        $inmueble = Inmueble::find($inmueble);
  
        if (is_null($inmueble)) {
            return response()->json(['error' => 'Inmueble no encontrado.'], 500);
        }
   
        return response()->json($inmueble);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function edit(Inmueble $inmueble)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $inmueble)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'movimiento' => 'required',
        ]);

        //Devolvemos un error de validación en caso de fallo en las verificaciones
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 422);
        }

        $inmueble = Inmueble::find($inmueble);
        $inmueble->nombre = $data['nombre'];
        $inmueble->direccion = $data['direccion'];
        $inmueble->descripcion = $data['descripcion'];
        $inmueble->movimiento = $data['movimiento'];
        $inmueble->save();

        return response()->json(['message' => 'Inmueble Editado']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inmueble $inmueble)
    {
        $inmueble->delete();

        return response()->json([
            'message'=>'Inmueble Eliminado!!'
        ]);
    }
}
