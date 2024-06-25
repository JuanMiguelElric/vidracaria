<?php

namespace App\Http\Controllers;

use App\Models\cliente\Cliente;
use App\Models\Fornecedor;
use App\Models\Funcionario;
use App\Models\OrdemServico;
use App\Models\Produto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $funcionario = Funcionario::count();
        $produto = Produto::count();
        $fornecedor = Fornecedor::count();
        $cliente = Cliente::count();
        $ordemdeservicos = OrdemServico::count();

        $data = [
            'labels' => ['Clientes cadastrados', 'Produtos', 'Fornecedores','ordem de'],
            'data' => [$cliente, $produto, $fornecedor,$ordemdeservicos],
        ];

        return view('home',compact('funcionario','produto','fornecedor','data'));
    }
}
