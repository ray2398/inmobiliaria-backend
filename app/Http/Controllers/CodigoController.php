<?php

namespace App\Http\Controllers;

use App\Models\Codigo;
use Illuminate\Http\Request;

class CodigoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Codigo  $codigo
     * @return \Illuminate\Http\Response
     */
    public function show($inmueble)
    {
        $key = '';
        $pattern = '1234567890';
        $max = strlen($pattern)-1;
        for($i=0;$i < 6;$i++) $key .= $pattern{mt_rand(0,$max)};
        $codigo = new Codigo;
        $codigo->codigo = $key;
        $codigo->inmueble_id = $inmueble;
        $codigo->save();
        return response()->json($codigo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Codigo  $codigo
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        $codigo = Codigo::where('codigo', $codigo)->first();
        if (is_null($codigo)) {
            return response()->json(['error' => 'Código inválido'], 500);
        }
        return response()->json(['message' => 'Código válido']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Codigo  $codigo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Codigo $codigo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Codigo  $codigo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Codigo $codigo)
    {
        //
    }
}
