<?php

namespace App\Http\Controllers;

use App\Models\{Produto,Unidade,ProdutoDetalhe,Fornecedor};
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //eager loader
        $produtos = Produto::with('produtoDetalhe','fornecedor')->paginate(10);
        

        //lazy loader
        $produtos = Produto::paginate(10);

        /*
        foreach($produtos as $key => $produto){
            //buscar registros no banco na tabela produto detalhes de acordo com o id do produto
            $produtosDetalhe = ProdutoDetalhe::where('produto_id',$produto->id)->first();
            if(isset($produtosDetalhe)){
                //incluir no produto os detalhes recuperados
                $produtos[$key]['comprimento'] = $produtosDetalhe->comprimento;
                $produtos[$key]['largura'] = $produtosDetalhe->largura;
                $produtos[$key]['altura'] = $produtosDetalhe->altura;
            }
        }*/

        return view('app.produto.index',['titulo' =>'Produtos','produtos' => $produtos,'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $unidades = Unidade::All();
        $fornecedores = Fornecedor::All();
        return view('app.produto.create',[
                    'titulo'        =>'Adicionar Produtos',
                    'produto'       => '',
                    'unidades'      => $unidades,
                    'classe'        => 'borda-preta',
                    'fornecedores'  => $fornecedores
                ]);
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
            'nome'          => 'required|min:3|max:40',
            'descricao'     => 'required|min:3|max:2000',
            'peso'          => 'required|integer',
            'unidade_id'    => 'exists:unidades,id'
        ];
        
        $feedback = [
            'email.email'           => 'O campo usuario (E-mail) é obrigatório',
            'nome.min'              => 'O campo :attribute deve ter no mínimo 3 caracteres',
            'nome.max'              => 'O campo :attribute deve ter no máximo 2000 caracteres',
            'peso.integer'          => 'O campo :attribute deve ser somente numeros',
            'unidade_id.exists'     => 'O campo unidade de medida não existe',
            'required'              => 'O campo :attribute precisa ser preenchido'

        ];

        $request->validate($regras,$feedback);

        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        
        return view('app.produto.show',['titulo' =>'Detalhes do Produto','produto' =>$produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {

        $fornecedores = Fornecedor::All();
        $unidades = Unidade::All();
        return view('app.produto.create',['titulo' =>'Editar Produto','produto' =>$produto,'classe' => 'borda-preta', 'unidades' =>$unidades,'fornecedores'  => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {

        $regras =[
            'nome'          => 'required|min:3|max:40',
            'descricao'     => 'required|min:3|max:2000',
            'peso'          => 'required|integer',
            'unidade_id'    => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedor,id'

        ];
        
        $feedback = [
            'email.email'           => 'O campo usuario (E-mail) é obrigatório',
            'nome.min'              => 'O campo :attribute deve ter no mínimo 3 caracteres',
            'nome.max'              => 'O campo :attribute deve ter no máximo 2000 caracteres',
            'peso.integer'          => 'O campo :attribute deve ser somente numeros',
            'exists'                => 'O campo :attribute  não existe',
            'required'              => 'O campo :attribute precisa ser preenchido'

        ];

        $request->validate($regras,$feedback);
        $produto->update($request->all());
        return redirect()->route('produto.show',$produto->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
