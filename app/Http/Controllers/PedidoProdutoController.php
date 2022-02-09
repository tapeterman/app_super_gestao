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
            'produto_id' =>'exists:produtos,id',
            'quantidade' =>'required|min:1'
        ];
        $feedback = [
            'exists'    => 'o :attribute não existe!',
            'required'  => 'o :attribute deve conter um numero valido',
            'min'       => 'o campo deve conter pelo menos 1 '
        ];

        $request->validate($regras,$feedback);

        $pedido->produtos()->attach(
            $request->get('produto_id'),
            ['quantidade' => $request->get('quantidade')]
        );
        /*
        $pedidoProduto = new PedidoProduto();
        $pedidoProduto->pedido_id   = $pedido->id;
        $pedidoProduto->produto_id  = $request->get('produto_id');
        $pedidoProduto->save();
        */

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
    public function destroy(PedidoProduto $pedidoProduto,$pedido_id)
    {
        /*convencional
        PedidoProduto::where([
            'pedido_id' => $pedido->id,
            'produto_id' => $produto->id
        ])->delete();
        */
        //$pedido->produtos()->detach($produto->id);
        $pedidoProduto->delete();

        return redirect()->route('pedido-produto.create',['pedido'=>$pedido_id]);

    }
}
