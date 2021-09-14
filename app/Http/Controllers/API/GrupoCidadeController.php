<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GrupoCidadeRequest;
use App\Models\GrupoCidade;
use Illuminate\Http\Request;

class GrupoCidadeController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return GrupoCidade::with('cidades')->get(); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GrupoCidadeRequest $request)
    {
         $grupoCidade = new GrupoCidade();
         $grupoCidade->nome = $request->nome;
         $grupoCidade->campanha_id = $request->campanha_id;
         $grupoCidade->save();
         return response()->json([
            'message' => 'GrupoCidade cadastrado com sucesso',
            'data' => $grupoCidade
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
        return GrupoCidade::with('cidades')->find($id);
          
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campanhas  $campanhas
     * @return \Illuminate\Http\Response
     */
    public function update(GrupoCidadeRequest $request,$id)
    {   
        $grupoCidade = GrupoCidade::find($id);
        $grupoCidade->nome = $request->nome;
        $grupoCidade->campanha_id = $request->campanha_id;
         $grupoCidade->save();
         return response()->json([
            'message' => 'GrupoCidade atualizado com sucesso',
            'data' => $grupoCidade
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GrupoCidade  $campanhas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupoCidade = GrupoCidade::find($id);
        $grupoCidade->delete();
        return response()->json([
            'message' => 'GrupoCidade deletado com sucesso',
            'data' => $grupoCidade
        ], 200);
    }
}
