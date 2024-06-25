<?php

namespace App\Http\Controllers\Servico;

use App\Models\Servico;
use App\Http\Controllers\Controller;
use App\Models\cliente\Cliente;
use App\Models\Funcionario;
use App\Models\Produto;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('servico.index');
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

    /**
     * Display the specified resource.
     */
    public function show(Servico $servico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servico $servico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servico $servico)
    {
        //
    }
}
