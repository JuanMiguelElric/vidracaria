<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\cliente\Cliente;
use App\Models\endereco\Endereco;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
      //  return view('')
    }
    public function create(){
        return view('cliente.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'nome'=>"required|string",
            'sexo'=>"required|string",
            'dataNascimento'=>'required|string',
            'cpf'=>"required|string",
            'email'=>"required|string",
            'telefone'=>"required|string"
         
        ]);
        $data3 = $request->validate(['cep'=>'nullable|string|max:255','cidade'=>'nullable|string|max:255','rua'=>'nullable|string|max:255','bairro'=>'nullable|string|max:255', 'estado'=>'nullable|string|max:255','complemento'=>'nullable', 'numero'=>'nullable']);


        $endereco = new Endereco($data3);
        if($endereco->save()){
            $data['endereco'] = $endereco->id;
       
            $cliente = new Cliente($data);
            if($cliente->save()){
                return redirect()->route('cliente.create');
            }
            
        }
   
    }
    public function edit(Cliente $cliente){
        $endereco = Endereco::findOrFail($cliente->endereco);
        return view('cliente.edit',compact(['cliente','endereco']));
    }

    public function update(Request $request, Cliente $cliente){

        $data = $request->validate([
            'nome'=>"required|string",
            'sexo'=>"required|string",
            'dataNascimento'=>'required|string',
            'cpf'=>"required|string",
            'email'=>"required|string",
            'telefone'=>"required|string"
         
        ]);
        $data3 = $request->validate(['cep'=>'nullable|string|max:255','cidade'=>'nullable|string|max:255','rua'=>'nullable|string|max:255','bairro'=>'nullable|string|max:255', 'estado'=>'nullable|string|max:255','complemento'=>'nullable', 'numero'=>'nullable']);
        $endereco = Endereco::findOrFail($cliente->endereco);
        if($cliente->update($data)){
  
      
         

            if($endereco->update($data3)){
                return redirect()->route('cliente.create');
            }
            
        }
    }
    public function destroy(Request $request, Cliente $cliente){
        $data = $request->validate([
            'nome'=>"required|string",
            'sexo'=>"required|string",
            'dataNascimento'=>'required|string',
            'cpf'=>"required|string",
            'email'=>"required|string",
            'telefone'=>"required|string"
         
        ]);
        $data3 = $request->validate(['cep'=>'nullable|string|max:255','cidade'=>'nullable|string|max:255','rua'=>'nullable|string|max:255','bairro'=>'nullable|string|max:255', 'estado'=>'nullable|string|max:255','complemento'=>'nullable', 'numero'=>'nullable']);
        $endereco = Endereco::findOrFail($cliente->endereco);
        if($cliente->destroy($data)){
            if( $endereco->destroy($data3)){
                return redirect()->route('cliente.create');

            }
           
            
            

        }
    }
}
