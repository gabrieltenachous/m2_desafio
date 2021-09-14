<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DescontoRequest;
use App\Models\Desconto;
use App\Models\DescontoProduto;
use App\Models\Produto;
use Illuminate\Http\Request;

class DescontoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Desconto::with('desconto_produtos')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DescontoRequest $request)
    {

        $desconto = new Desconto();
        $desconto->nome = $request->nome;
        $desconto->desconto = $request->desconto;
        $desconto->save();
        $descontoProdutos = new DescontoProduto();
        $descontoProdutos->desconto_id = $desconto->id;
        $descontoProdutos->produto_id = $request->produto_id;

        $produto = Produto::find($request->produto_id);
        $descontoSubTotal = $produto->valor * ($desconto->desconto / 100);
        $descontoTotal = $produto->valor - $descontoSubTotal;

        $descontoProdutos->total = $descontoTotal;

        $descontoProdutos->save();
        $getDesconto = DescontoProduto::with('desconto', 'produto')->find($descontoProdutos->id);

        return response()->json([
            'message' => 'Desconto cadastrado com sucesso',
            'data' => $getDesconto
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
        return Desconto::with('desconto_produtos')->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campanhas  $campanhas
     * @return \Illuminate\Http\Response
     */
    public function update(DescontoRequest $request, $id)
    {

        $desconto = Desconto::find($id);
        $desconto->nome = $request->nome;
        $desconto->desconto = $request->desconto;
        $desconto->save();

        $produto = Produto::find($request->produto_id);
   
        $descontoSubTotal = $produto->valor * ($desconto->desconto / 100);
        $descontoTotal = $produto->valor - $descontoSubTotal;

        $descontoProdutos = DescontoProduto::where('produto_id', '=', $produto->id)->where('desconto_id', '=', $desconto->id)->first();
        if(isset($descontoProdutos)){
            $descontoProdutos->desconto_id = $desconto->id;
            $descontoProdutos->produto_id = $request->produto_id;
            $descontoProdutos->total = $descontoTotal;
    
            $descontoProdutos->save();
            $getDesconto = DescontoProduto::with('desconto', 'produto')->find($descontoProdutos->id);
    
            return response()->json([
                'message' => 'Desconto deitado com sucesso',
                'data' => $getDesconto
            ], 200);
        }else{
            return response()->json([
                'error' => 'O campo produto id selecionado é inválido.', 
            ], 422);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Desconto  $campanhas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desconto = Desconto::find($id);
        $desconto->delete();
        return response()->json([
            'message' => 'Desconto deletado com sucesso',
            'data' => $desconto
        ], 200);
    }
}
