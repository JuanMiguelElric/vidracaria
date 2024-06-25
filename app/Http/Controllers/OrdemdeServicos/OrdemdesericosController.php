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
        return view('ordemdeservico.index');
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
    public function ordemJson(){
        $ordemdeServicos = OrdemServico::all();
        $ordemdeServicoList =[];
        foreach($ordemdeServicos as $ordemdeservico){
            $routeEdit = route('ordemdeservico.edit', $ordemdeservico->id);
            $routeQuartos = route('ordemdeservico.index',);
            $routedetalhes = route('ordemdeservico.show', $ordemdeservico->id);
            $btnEdit = "<a href=' $routeEdit' id='$ordemdeservico->id' class='btn btn-xs btn-default text-primary mx-1 shadow' title='Editar'><i class='fa fa-lg fa-fw fa-pen'></i></a>";
            
            $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow excluir-dado btn-delete" data-toggle="modal" data-target="#modalMin" title="Excluir" data-dado-id="' . $ordemdeservico->id . '"><i class="fa fa-lg fa-fw fa-trash"></i></button>';
            
            $btnDetails = '<a href="'.$routedetalhes.'" class="btn btn-xs btn-default text-teal mx-1 shadow show-dado" data-dado-id="' . $ordemdeservico->id . '" title="todos usuarios"><i class="fas fa-fw fa-user" aria-hidden="true"></i></a>';

            $ordemdeServicoList[]=[

                'dataServico'=>$ordemdeservico->dataServico,
                'prazo'=>$ordemdeservico->prazo,
                'valor'=>$ordemdeservico->valor,
                'ativo'=>$ordemdeservico->ativo == 0 ? "ativo" : "inativo",
                'btna'=> '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>'

            ];

        }
        return response()->json(compact('ordemdeServicoList'));
    }
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
    public function edit( OrdemServico $ordemdeservico)
    {
        $cliente = Cliente::findOrFail($ordemdeservico->cliente);
        $funcionario = Funcionario::findOrFail($ordemdeservico->funcionario);
        $produto = Produto::findOrFail($ordemdeservico->produto);
        $servico = Servico::findOrFail($ordemdeservico->servico);
        return view('ordemdeservico.edit',compact(['ordemdeservico','cliente','funcionario','produto','servico']));
    }

    /**
     * Display the specified resource.
     */
    public function show(OrdemServico $ordemdeservico)
    {
        $cliente = Cliente::findOrFail($ordemdeservico->cliente);
        $funcionario = Funcionario::findOrFail($ordemdeservico->funcionario);
        $produto = Produto::findOrFail($ordemdeservico->produto);
        $servico = Servico::findOrFail($ordemdeservico->servico);
        return view('ordemdeservico.show',compact(['ordemdeservico','cliente','funcionario','produto','servico']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrdemServico $ordemdeservico)
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

        if($ordemdeservico->update($data)){
            return redirect()->route('ordemdeservico.index');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrdemServico $ordemdeservico)
    {
        //
        if($ordemdeservico->delete()){
            return redirect()->route('ordemdeservico.index');
        }
    }
}
