@extends('adminlte::page')
@section('title', 'Produto')

@section('content')
@php
$heads = [
    'Nome do produto',
    'Categoria',
    'Data da Compra',
    'QTD',
    'Preço',
    'situação',
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];
$config = [
    'ajax'=>[
        'url'=>"/produtojson",
        'dataSrc'=>"produtoList",
    ],
    'data'=>[],
    'order'=>[[0,'asc']],
    'columns'=>[
        ['data'=>'nome'],
        ['data'=>'categoria'],
        ['data'=>'dataCompra'],
        ['data'=>'qtdProduto'],
        ['data'=>'preco'],
        ['data'=>'ativo'],
        ['data'=>'btna']
],

];

@endphp
<div class="container">
    <div class="p-3 border-bottom mb-3">
        <h1>Listagem de Produtos</h1>

    </div>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="{{route('produto.create')}}">  <x-adminlte-button class="btn-flat " type="submit" label="Cadastrar novo produto:" theme="success" icon="fas fa-lg fa-box"/></a>
        </div>

        <div class="col-12 mt-3">

            @foreach ($produtos as $produto)
            <x-adminlte-modal id="modal{{ $produto->id }}" title="Excluindo produto {{ $produto->nome }}">
                <form action="{{ route('produto.destroy', $produto->id) }}" method="POST" style="display:inline;">
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