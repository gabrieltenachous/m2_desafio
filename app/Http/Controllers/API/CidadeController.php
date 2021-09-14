<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CidadeRequest;
use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cidade::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CidadeRequest $request)
    { 
        $cidade = new Cidade();
        $cidade->nome = $request->nome;
        $cidade->grupo_cidade_id = $request->grupo_cidade_id;
        $cidade->save();
        return response()->json([
            'message' => 'Cidade cadastrado com sucesso',
            'data' => $cidade
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
        return Cidade::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campanhas  $campanhas
     * @return \Illuminate\Http\Response
     */
    public function update(CidadeRequest $request, $id)
    {
        $cidade = Cidade::find($id);
        $cidade->nome = $request->nome;
        $cidade->grupo_cidade_id = $request->grupo_cidade_id;
        $cidade->save();
        return response()->json([
            'message' => 'Cidade atualizado com sucesso',
            'data' => $cidade
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cidade  $campanhas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cidade = Cidade::find($id);
        $cidade->delete();
        return response()->json([
            'message' => 'Cidade deletado com sucesso',
            'data' => $cidade
        ], 200);
    }
}
