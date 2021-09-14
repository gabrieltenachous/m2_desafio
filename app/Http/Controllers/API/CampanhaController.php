<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CampanhaRequest;
use App\Models\Campanha;
use App\Models\Campanhas;
use Illuminate\Http\Request;

class CampanhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Campanha::with('produtos','grupo_cidades')->get(); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CampanhaRequest $request)
    { 
         $campanha = new Campanha();
         $campanha->nome = $request->nome;
         $campanha->save();
         return response()->json([
            'message' => 'Campanha cadastrado com sucesso',
            'data' => $campanha
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campanhas  $campanhas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Campanha::with('produtos','grupo_cidades')->find($id);
          
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campanhas  $campanhas
     * @return \Illuminate\Http\Response
     */
    public function update(CampanhaRequest $request,$id)
    {   
        $campanha = Campanha::find($id);
        $campanha->nome = $request->nome;
        $campanha->save();
        return response()->json([
            'message' => 'Campanha atualizado com sucesso',
            'data' => $campanha
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campanha  $campanhas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campanha = Campanha::find($id);
        $campanha->delete();
        return response()->json([
            'message' => 'Campanha deletado com sucesso',
            'data' => $campanha
        ], 200);
    }
}
