<?php

namespace App\Http\Controllers\Fornecedor;

use App\Http\Controllers\Controller;
use App\Models\endereco\Endereco;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = Fornecedor::all();
        return view('fornecedor.index',compact('fornecedores'));
    }
    public function create(){
        return view('fornecedor.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'nome'=>'required|string',
            'cnpj'=>'required|string',
            'telefone'=>'required|string',
            'email'=>'required|string'
            
        ]);
        $dataEndereco = $request->validate(
            ['cep'=>'nullable|string|max:255','cidade'=>'nullable|string|max:255','rua'=>'nullable|string|max:255','bairro'=>'nullable|string|max:255', 'estado'=>'nullable|string|max:255','complemento'=>'nullable', 'numero'=>'nullable']
        );

   
        $endereco = new Endereco($dataEndereco);
        if($endereco->save())
        {
            $data['endereco'] = $endereco->id;
            $fornecedor = new Fornecedor($data);
            if($fornecedor->save())
            {
                return redirect()->route('fornecedor.index');
            }
        }
    }
    public function fornecedorJson(){
        $fornecedores = Fornecedor::all();
        if($fornecedores->isEmpty()){
            return response()->json(["type"=>"error","fornecedor"=>[]],200);
        }
        $fornecedoresList =[];
        foreach($fornecedores as $fornecedor){
            $routeEdit = route('fornecedor.edit', $fornecedor->id);
            $routeQuartos = route('fornecedor.index',);
            $routedetalhes = route('fornecedor.show', $fornecedor->id);
            $btnEdit = "<a href=' $routeEdit' id='$fornecedor->id' class='btn btn-xs btn-default text-primary mx-1 shadow' title='Editar'><i class='fa fa-lg fa-fw fa-pen'></i></a>";
            
            $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow excluir-dado btn-delete" data-toggle="modal" data-target="#modal'.$fornecedor->id.'" title="Excluir" data-dado-id="'.$fornecedor->id.'"><i class="fa fa-lg fa-fw fa-trash"></i></button>';  
            
            $btnDetails = '<a href="'.$routedetalhes.'" class="btn btn-xs btn-default text-teal mx-1 shadow show-dado" data-dado-id="' . $fornecedor->id . '" title="todos usuarios"><i class="fas fa-fw fa-user" aria-hidden="true"></i></a>';

            $fornecedoresList[]=[
                'nome'=>$fornecedor->nome,
                'cnpj'=>$fornecedor->cnpj,
                'telefone'=>$fornecedor->telefone,
                'email'=>$fornecedor->email,
                'ativo'=>$fornecedor->ativo == 0 ? "ativo" : "inativo",
                'btna'=> '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>'

            ];
        }
        return response()->json(compact('fornecedoresList'));
    }
    public function edit(Fornecedor $fornecedor){
        $endereco = Endereco::findOrFail($fornecedor->endereco);

        return view('fornecedor.edit',compact(['fornecedor','endereco']));
    }
    public function update(Request $request, Fornecedor $fornecedor){
        $data = $request->validate([
            'nome'=>'required|string',
            'cnpj'=>'required|string',
            'telefone'=>'required|string',
            'email'=>'required|string'
            
        ]);
        $dataEndereco = $request->validate(
            ['cep'=>'nullable|string|max:255','cidade'=>'nullable|string|max:255','rua'=>'nullable|string|max:255','bairro'=>'nullable|string|max:255', 'estado'=>'nullable|string|max:255','complemento'=>'nullable', 'numero'=>'nullable']
        );
        $endereco = Endereco::findOrFail($fornecedor->endereco);
        if($fornecedor->update($data)){
            if($endereco->update($dataEndereco)){
                return redirect()->route('fornecedor.index');
            }
        }

    }
    public function destroy(Fornecedor $fornecedor){
     

        $endereco = Endereco::findOrFail($fornecedor->endereco);

        if($fornecedor->delete()){
            if($endereco->delete()){
                return redirect()->route('fornecedor.index');
            }
        }
    }

    public function show(Fornecedor $fornecedor){
        $endereco = Endereco::findOrFail($fornecedor->endereco);
        return view('fornecedor.show',compact(['fornecedor','endereco']));

    }
}
