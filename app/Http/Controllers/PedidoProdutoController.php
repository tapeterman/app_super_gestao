<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Pedido,Produto,PedidoProduto};

class PedidoProdutoController extends Controller
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
    public function create(Pedido $pedido)
    {
        $produtos = Produto::All();
        $pedido->produtos; //eager loading
        return view('app.pedido_produto.create',[   
                                                    'titulo'    => 'Adicionar Produtos',
                                                    'classe'    => 'borda-preta',
                                                    'pedido'    => $pedido,
                                                    'produtos'  => $produtos
                                                ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Pedido $pedido)
    {
        $regras = [
            'produto_id' =>'exists:produtos,id'
        ];
        $feedback = [
            'exists' => 'o :attribute não existe!'
        ];

        $request->validate($regras,$feedback);

        $pedidoProduto = new PedidoProduto();
        $pedidoProduto->pedido_id   = $pedido->id;
        $pedidoProduto->produto_id  = $request->get('produto_id');
        $pedidoProduto->save();

        return redirect()->route('pedido-produto.create',['pedido' => $pedido->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }
}
