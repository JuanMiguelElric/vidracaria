@extends('adminlte::page')
@section('title', 'Ordem de Serviço')

@section('content')
@php
$heads = [
    'Cliente',
    'Serviço',
    'Data inicial',
    'Prazo',
    'valor',
    'situação',
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];
$config = [
    'ajax'=>[
        'url'=>"/ordemdeservicojson",
        'dataSrc'=>"ordemdeServicoList",
    ],
    'data'=>[],
    'order'=>[[0,'asc']],
    'columns'=>[
        ['data'=>'descricao'],
        ['data'=>'servico'],
        ['data'=>'dataServico'],
        ['data'=>'prazo'],
        ['data'=>'valor'],
        ['data'=>'ativo'],
        ['data'=>'btna']
],

];

@endphp
<div class="container">
    <div class="p-3 border-bottom mb-3">
        <h1>Listagem de Serviços</h1>

    </div>
    <div class="row">
        <div class="col-12 mb-3">
           
            <a href="{{route('ordemdeservico.create')}}">  <x-adminlte-button class="btn-flat " type="submit" label="Cadastrar novoa Ordem de Serviço:" theme="success" icon="fas fa-lg fa-user"/></a>
        </div>

        <div class="col-12 mt-3">

            @foreach ($ordemdeservicos as $ordemdeservico)
            <x-adminlte-modal id="modal{{ $ordemdeservico->id }}" title="Excluindo servico {{ $ordemdeservico->descricao }}">
                <form action="{{ route('ordemdeservico.destroy', $ordemdeservico->id) }}" method="POST" style="display:inline;">
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