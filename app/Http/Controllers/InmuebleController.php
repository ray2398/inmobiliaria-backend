<?php

namespace App\Http\Controllers;

use App\Models\Inmueble;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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
        //
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
    public function update(Request $request, Inmueble $inmueble)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inmueble $inmueble)
    {
        //
    }
}
