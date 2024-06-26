@extends('adminlte::page')
@section('title', 'Clientes')

@section('content')
@php
$heads = [
    'Nome do Cliente',
    'Cpf',
    'Telefone',
    'email',
    'situação',
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];
$config = [
    'ajax'=>[
        'url'=>"/clientejson",
        'dataSrc'=>"clientesList",
    ],
    'data'=>[],
    'order'=>[[0,'asc']],
    'columns'=>[
        ['data'=>'nome'],
        ['data'=>'cpf'],
        ['data'=>'telefone'],
        ['data'=>'email'],
        ['data'=>'ativo'],
        ['data'=>'btna']
],

];

@endphp
<div class="container">
    <div class="p-3 border-bottom mb-3">
        <h1>Listagem de Clientes</h1>

    </div>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="{{route('cliente.create')}}">  <x-adminlte-button class="btn-flat " type="submit" label="Cadastrar novo Cliente:" theme="success" icon="fas fa-lg fa-user"/></a>
        </div>

        <div class="col-12 mt-3">

            @foreach ($clientes as $cliente)
                <x-adminlte-modal id="modal{{ $cliente->id }}" title="Excluindo cliente {{ $cliente->nome }}">
                    <form action="{{ route('cliente.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <i class="fas fa-lg fa-exclamation-circle"></i>
                        <button type="submit" class="btn btn-link">
                            <i class="fa fa-md fa-fw fa-trash text-dark"></i>
                        </button>
                    </form>
                </x-adminlte-modal>
            @endforeach
               
             

            
            
            <x-adminlte-datatable id="table2" :heads="$heads" :config="$config" head-theme="dark" striped hoverable compessed with-buttons />
        </div>
    </div>
</div>

        


@endsection

@section('plugins.Datatables', true)
@section('plugins.DatatablesExport', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Toastr', true)