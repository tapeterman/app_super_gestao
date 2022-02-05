<?php

namespace App\Http\Controllers;

use App\Models\{ProdutoDetalhe,Produto,Unidade};
use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtoDetalhes = ProdutoDetalhe::paginate(10);
        return view('app.produto_detalhe.index',['titulo' =>'Detalhes dos Produtos','produtoDetalhes' => $produtoDetalhes,'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::All();
        $produtos = Produto::All();
        return view('app.produto_detalhe.create',['titulo' =>'Produto Detalhe','produtos' =>$produtos,'unidades' =>$unidades,'classe' => 'borda-preta']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      
        $regras =[
            'comprimento'   => 'required|integer',
            'largura'       => 'required|integer',
            'altura'        => 'required|integer',
            'produto_id'    => 'exists:produtos,id',
            'unidade_id'    => 'exists:unidades,id'
        ];
        
        $feedback = [
            'integer'          => 'O campo :attribute deve ser somente numeros',
            'exists'           => 'O campo :attribute precisa existir',
            'required'         => 'O campo :attribute precisa ser preenchido'

        ];

        
        $request->validate($regras,$feedback);


        ProdutoDetalhe::create($request->all());
        return redirect()->route('produto-detalhe.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProdutoDetalhe  $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function show(ProdutoDetalhe $produtoDetalhe)
    {
        return view('app.produto_detalhe.show',['titulo' =>'Detalhes do Produto','produtoDetalhe' =>$produtoDetalhe]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdutoDetalhe  $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutoDetalhe $produtoDetalhe)
    {
        $unidades = Unidade::find($produtoDetalhe);
        $produtos = Unidade::find($produtoDetalhe);
        return view('app.produto_detalhe.create',
            ['titulo' =>'Produto Detalhe',
            'produtoDetalhe' => $produtoDetalhe,
            'produtos' =>$produtos,
            'unidades' =>$unidades,
            'classe' => 'borda-preta'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdutoDetalhe  $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoDetalhe $produtoDetalhe)
    {
        $produtoDetalhe->update($request->all());
        return redirect()->route('produto-detalhe.show',$produtoDetalhe->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdutoDetalhe  $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutoDetalhe $produtoDetalhe)
    {
        $produtoDetalhe->delete();
        return redirect()->route('produto-detalhe.index');
    }
}
