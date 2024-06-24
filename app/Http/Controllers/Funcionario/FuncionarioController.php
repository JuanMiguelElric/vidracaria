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
        //
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
        //
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
