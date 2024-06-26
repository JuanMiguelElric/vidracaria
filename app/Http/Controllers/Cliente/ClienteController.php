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
        $clientes = Cliente::all();
        return view('cliente.index',compact('clientes'));
    }
    public function create(){
        return view('cliente.create');
    }
    public function ClienteJson(){

        $clientes = Cliente::all();
        if($clientes->isEmpty()){
            return response()->json(["type"=>"error","cliente"=>[]],200);
        }
        $clientesList=[];
        foreach($clientes as $cliente){
            $routeEdit = route('cliente.edit', $cliente->id);
            $routeQuartos = route('cliente.index',);
            $routedetalhes = route('cliente.show', $cliente->id);
            $btnEdit = "<a href=' $routeEdit' id='$cliente->id' class='btn btn-xs btn-default text-primary mx-1 shadow' title='Editar'><i class='fa fa-lg fa-fw fa-pen'></i></a>";
            
            $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow excluir-dado btn-delete" data-toggle="modal" data-target="#modal'.$cliente->id.'" title="Excluir" data-dado-id="'.$cliente->id.'"><i class="fa fa-lg fa-fw fa-trash"></i></button>';  
            $btnDetails = '<a href="'.$routedetalhes.'" class="btn btn-xs btn-default text-teal mx-1 shadow show-dado" data-dado-id="' . $cliente->id . '" title="todos usuarios"><i class="fas fa-fw fa-user" aria-hidden="true"></i></a>';
         
            $clientesList[]=[
                'nome' => $cliente->nome,
                'cpf'=> $cliente->cpf,
                'telefone'=>$cliente->telefone,
                'email'=>$cliente->email,
                'ativo'=>$cliente->ativo == 0 ? "ativo" : "inativo",
                'btna'=> '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>'
                
            ];
          


        }
        return response()->json(compact('clientesList'));
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
                return redirect()->route('cliente.index');
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
            'telefone'=>"required|string",
            'ativo'=>"nullable|numeric"
         
        ]);
        $data3 = $request->validate(['cep'=>'nullable|string|max:255','cidade'=>'nullable|string|max:255','rua'=>'nullable|string|max:255','bairro'=>'nullable|string|max:255', 'estado'=>'nullable|string|max:255','complemento'=>'nullable', 'numero'=>'nullable']);
        $endereco = Endereco::findOrFail($cliente->endereco);
        if($cliente->update($data)){
  
      
         

            if($endereco->update($data3)){
                return redirect()->route('cliente.index');
            }
            
        }
    }
    public function destroy(Request $request, Cliente $cliente){

        $endereco = Endereco::findOrFail($cliente->endereco);
        if($cliente->delete()){
            if( $endereco->delete()){
                return redirect()->route('cliente.index');

            }
           
            
            

        }
    }
    public function show(Cliente $cliente){
        $endereco = Endereco::findOrFail($cliente->endereco);

        return view('cliente.show',compact(['cliente','endereco']));
        
    }
}
