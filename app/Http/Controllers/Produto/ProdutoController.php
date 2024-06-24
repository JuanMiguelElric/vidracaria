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
        //
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

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        //
    }
}
