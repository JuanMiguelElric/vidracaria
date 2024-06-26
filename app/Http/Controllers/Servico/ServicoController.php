<?php

namespace App\Http\Controllers\Servico;

use App\Models\Servico;
use App\Http\Controllers\Controller;
use App\Models\cliente\Cliente;
use App\Models\Funcionario;

use Illuminate\Http\Request;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicos = Servico::all();
     
        return view('servico.index',compact('servicos'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome'=>"required|string",
             'valor'=>"required|numeric",
            'descricao'=>'required|string'
        ]);
 
        $servico = new Servico($data);
        if($servico->save()){
            return redirect()->route('servico.index');
        }

    }
    public function ServicoJson(){
        $servicos = Servico::all();
        $servicoList=[];
        foreach($servicos as $servico){
            $routeEdit = route('servico.edit', $servico->id);
            $routeQuartos = route('servico.index',);
            $routedetalhes = route('servico.show', $servico->id);
            $btnEdit = "<a href=' $routeEdit' id='$servico->id' class='btn btn-xs btn-default text-primary mx-1 shadow' title='Editar'><i class='fa fa-lg fa-fw fa-pen'></i></a>";
            
            $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow excluir-dado btn-delete" data-toggle="modal" data-target="#modal'.$servico->id.'" title="Excluir" data-dado-id="'.$servico->id.'"><i class="fa fa-lg fa-fw fa-trash"></i></button>';  
            
            $btnDetails = '<a href="'.$routedetalhes.'" class="btn btn-xs btn-default text-teal mx-1 shadow show-dado" data-dado-id="' . $servico->id . '" title="todos usuarios"><i class="fas fa-fw fa-user" aria-hidden="true"></i></a>';

            $servicoList[]=[

                "nome"=>$servico->nome,
                "valor"=>$servico->valor,
                'ativo'=>$servico->ativo == 0 ? "ativo" : "inativo",
                'btna'=> '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>'
            ];

        }
        return response()->json(compact('servicoList'));


    }
    public function edit(Servico $servico)
    {
        return view('servico.edit',compact('servico'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Servico $servico)
    {
       return view('servico.show',compact('servico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servico $servico)
    {
        $data = $request->validate([
            'nome'=>"required|string",
             'valor'=>"required|numeric",
            'descricao'=>'required|string',
             'ativo'=>"nullable|numeric"
        ]);
        if($servico->update($data)){
            return redirect()->route('servico.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servico $servico)
    {
       if($servico->delete()){
         return redirect()->route('servico.index');
       }
    }
}
