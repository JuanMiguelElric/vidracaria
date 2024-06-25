<?php

namespace App\Http\Controllers\OrdemdeServicos;

use App\Models\OrdemServico;
use App\Http\Controllers\Controller;
use App\Models\cliente\Cliente;
use App\Models\Funcionario;
use App\Models\Produto;
use App\Models\Servico;
use Illuminate\Http\Request;

class OrdemdesericosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function create(){
        $cliente = Cliente::all();
        $produto = Produto::all();
        $funcionario = Funcionario::all();
        $servico = Servico::all();

        return view('ordemdeservico.create',compact(['cliente','produto','funcionario','servico']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'dataServico'=>"required|date",
            'prazo'=>"required|date",
            'valor'=>"required|numeric",
            'servico'=>"required|integer",
            'funcionario'=>"required|integer",
            'cliente'=>"required|integer",
            'produto'=>"required|integer"
        ]);

        $ordemdeServico = new OrdemServico($data);
        if($ordemdeServico->save()){
            return redirect()->route('ordemdeservico.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(OrdemServico $ordemServico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrdemServico $ordemServico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrdemServico $ordemServico)
    {
        //
    }
}
