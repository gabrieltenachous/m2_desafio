<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutosRequest;
use App\Models\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Produto::with('desconto_produtos')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutosRequest $request)
    {
        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->valor = $request->valor;
        $produto->campanha_id = $request->campanha_id;
        $produto->save();
        return response()->json([
            'message' => 'Produto cadastrado com sucesso',
            'data' => $produto
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
        return Produto::with('desconto_produtos')->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campanhas  $campanhas
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutosRequest $request, $id)
    {
        $produto = Produto::find($id);
        $produto->nome = $request->nome;
        $produto->valor = $request->valor;
        $produto->campanha_id = $request->campanha_id;
        $produto->save();
        return response()->json([
            'message' => 'Produto atualizado com sucesso',
            'data' => $produto
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $campanhas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return response()->json([
            'message' => 'Produto deletado com sucesso',
            'data' => $produto
        ], 200);
    }
}
