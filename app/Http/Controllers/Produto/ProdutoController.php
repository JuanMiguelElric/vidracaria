<?php

namespace App\Http\Controllers\Produto;

use App\Models\Produto;
use App\Http\Controllers\Controller;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('produto.index');
    }
    public function create()
    {
        $fornecedor = Fornecedor::all();
        return view('produto.create',compact('fornecedor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([

            'nome'=>'required|string',
            'fornecedor'=>'required|integer',
            'descricao'=>'required|string',
            'categoria'=>'required|string',
            'dataCompra'=>'required|date',
            'qtdProduto'=>'required|integer',
    
            'unidadeMedida'=>'required|string',
            'preco'=>'required|numeric',
        ]);

        $produto = new Produto($data);
        if($produto->save()){
            return redirect()->route('produto.index');
        }
    }
    public function produtoJson(){
        $produtos = Produto::all();
        if($produtos->isEmpty()){
            return response()->json(["type"=>"error","produto"=>[]],200);
        }
        $produtoList=[];
        foreach($produtos as $produto)
        {
            $routeEdit = route('produto.edit', $produto->id);
            $routeQuartos = route('produto.index',);
            $routedetalhes = route('produto.show', $produto->id);
            $btnEdit = "<a href=' $routeEdit' id='$produto->id' class='btn btn-xs btn-default text-primary mx-1 shadow' title='Editar'><i class='fa fa-lg fa-fw fa-pen'></i></a>";
            
            $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow excluir-dado btn-delete" data-toggle="modal" data-target="#modalMin" title="Excluir" data-dado-id="' . $produto->id . '"><i class="fa fa-lg fa-fw fa-trash"></i></button>';
            
            $btnDetails = '<a href="'.$routedetalhes.'" class="btn btn-xs btn-default text-teal mx-1 shadow show-dado" data-dado-id="' . $produto->id . '" title="todos usuarios"><i class="fas fa-fw fa-user" aria-hidden="true"></i></a>';

            $produtoList[]=[
                'nome'=>$produto->nome,
                'categoria'=>$produto->categoria,
                'dataCompra'=>$produto->dataCompra,
                'qtdProduto'=>$produto->qtdProduto,
                'preco'=>$produto->preco,
                'ativo'=>$produto->ativo == 0 ? "ativo" : "inativo",
                'btna'=> '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>'

            ];
        }
        return response()->json(compact('produtoList'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        $fornecedor = Fornecedor::all();
        $fornecedorEscolhido = Fornecedor::findOrFail($produto->fornecedor);
        return view('produto.show',compact(['fornecedor','produto','fornecedorEscolhido']));
    }
    public function edit(Produto $produto)
    {
        $fornecedor = Fornecedor::all();
        $fornecedorEscolhido = Fornecedor::findOrFail($produto->fornecedor);
        return view('produto.edit',compact(['fornecedor','produto','fornecedorEscolhido']));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $data = $request->validate([

            'nome'=>'required|string',
            'fornecedor'=>'required|integer',
            'descricao'=>'required|string',
            'categoria'=>'required|string',
            'dataCompra'=>'required|date',
            'qtdProduto'=>'required|integer',
    
            'unidadeMedida'=>'required|string',
            'preco'=>'required|numeric',
        ]);

        if($produto->update($data)){
            if($request->json ==1)
            {
                return response()->json(["type"=>"success","message"=>"produto editado com sucesso"]);
            }
            return redirect()->route('produto.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
 
        if($produto->delete()){
            return redirect()->route('produto.index');
        }
        
    }
}
