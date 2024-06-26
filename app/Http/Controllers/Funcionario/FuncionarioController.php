<?php

namespace App\Http\Controllers\Funcionario;

use App\Models\Funcionario;
use App\Http\Controllers\Controller;
use App\Models\endereco\Endereco;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funcionario = Funcionario::all();
        return view('funcionario.index',compact('funcionario'));
    }
    public function create()
    {

        return view('funcionario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome'=>'required|string',
            'dataNascimento'=>'required|string',
            'cpf'=>'required|string',
            'telefone'=>'required|string',
            'email'=>'required|string',
            'funcao'=>'required|string'
        ]);
        $dataEndereco = $request->validate(
            ['cep'=>'nullable|string|max:255','cidade'=>'nullable|string|max:255','rua'=>'nullable|string|max:255','bairro'=>'nullable|string|max:255', 'estado'=>'nullable|string|max:255','complemento'=>'nullable', 'numero'=>'nullable']
        );
 


   
        $endereco = new Endereco($dataEndereco); 
        if($endereco->save())
        {
            $data['endereco'] = $endereco->id;
            $funcionario = new Funcionario($data);
            if($funcionario->save())
            {
                return redirect()->route('funcionario.index');
            }
        }
    }
    public function edit(Funcionario $funcionario){
        $endereco = Endereco::findOrFail($funcionario->endereco);

        return view('funcionario.edit',compact(['funcionario','endereco']));
    }

    /**
     * Display the specified resource.
     */
    public function show(Funcionario $funcionario)
    {
        $endereco = Endereco::findOrFail($funcionario->endereco);
        return view('funcionario.show',compact(['funcionario','endereco']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        $data = $request->validate([
            'nome'=>'required|string',
            'dataNascimento'=>'required|string',
            'cpf'=>'required|string',
            'telefone'=>'required|string',
            'email'=>'required|string',
            'funcao'=>'required|string'
        ]);
        $dataEndereco = $request->validate(
            ['cep'=>'nullable|string|max:255','cidade'=>'nullable|string|max:255','rua'=>'nullable|string|max:255','bairro'=>'nullable|string|max:255', 'estado'=>'nullable|string|max:255','complemento'=>'nullable', 'numero'=>'nullable']
        );
        $endereco = Endereco::findOrFail($funcionario->endereco);
        
        if($funcionario->update($data)){
            if($endereco->update($dataEndereco)){
                return redirect()->route('funcionario.index');
            }

        }
        
    }

    /**
     * Remove the specified resource from storage.
     */

     public function funcionarioJson(){
        $funcionarios = Funcionario::all();
        $funcionarioList=[];
        foreach($funcionarios as $funcionario){
            $routeEdit = route('funcionario.edit', $funcionario->id);
            $routeQuartos = route('funcionario.index',);
            $routedetalhes = route('funcionario.show', $funcionario->id);
            $btnEdit = "<a href=' $routeEdit' id='$funcionario->id' class='btn btn-xs btn-default text-primary mx-1 shadow' title='Editar'><i class='fa fa-lg fa-fw fa-pen'></i></a>";
            
            $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow excluir-dado btn-delete" data-toggle="modal" data-target="#modalMin" title="Excluir" data-dado-id="' . $funcionario->id . '"><i class="fa fa-lg fa-fw fa-trash"></i></button>';
            
            $btnDetails = '<a href="'.$routedetalhes.'" class="btn btn-xs btn-default text-teal mx-1 shadow show-dado" data-dado-id="' . $funcionario->id . '" title="todos usuarios"><i class="fas fa-fw fa-user" aria-hidden="true"></i></a>';

            $funcionarioList[]=[
                'nome'=>$funcionario->nome,
                'cargo'=>$funcionario->funcao,
                'telefone'=>$funcionario->telefone,
                'email'=>$funcionario->email,
                'ativo'=>$funcionario->ativo == 0 ? "ativo" : "inativo",
                'btna'=> '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>'

            ];

        }
        return response()->json(compact('funcionarioList'));
     }
    public function destroy(Funcionario $funcionario)
    {
        $endereco = Endereco::findOrFail($funcionario->endereco);
        if($funcionario->delete()){
            if($endereco->delete()){
                return redirect()->route('funcionario.index');

            }
        }
    }
}
