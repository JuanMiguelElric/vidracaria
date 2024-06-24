<?php

namespace App\Http\Controllers\Fornecedor;

use App\Http\Controllers\Controller;
use App\Models\endereco\Endereco;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        //
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
    public function Destroy(Request $request,Fornecedor $fornecedor){
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

        if($fornecedor->destroy($data)){
            if($endereco->destroy($dataEndereco)){
                return redirect()->route('fornecedor.index');
            }
        }
    }
}
