@extends('adminlte::page')
@section('title', 'Serviço')

@section('content')
@php
$heads = [
    'Nome do Serviço',
    'Preço',
    'situação',
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];
$config = [
    'ajax'=>[
        'url'=>"/servicolist",
        'dataSrc'=>"servicoList",
    ],
    'data'=>[],
    'order'=>[[0,'asc']],
    'columns'=>[
        ['data'=>'nome'],
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
            <x-adminlte-modal id="modalPurple" title="Cadastrar Serviço" theme="dark"
                icon="fas fa-bolt" size='lg' disable-animations>
                <form action="{{route('servico.store')}}" id="form" method="POST">
                    @csrf
            
                    <div class="row">
                        
                        
                        
    
                        <div class="col-6">
                            <div class="form-group">
                                <x-adminlte-input name="nome" placeholder="nome do serviço"
                                label="Digite aqui o nome do serviço" data-mask="(99) 9999-9999" icon="fas fa-bed" value="" >
            
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-dark">
                                            <i class="fab fa-servicestack text-yellow"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
              
                
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <x-adminlte-input name="valor" placeholder="R$00.00:"
                                label="Valor do serviço:" data-mask="(99) 9999-9999" icon="fas fa-bed" value="" >
            
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-dark">
                                            <i class="fas fa-dollar-sign text-yellow"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
              
                
                            </div>
                        </div>
                        
                       
                        <div class="col-12">
                            <div class="form-group">
                                <x-adminlte-textarea name="descricao" label="Descrição" rows=5 label-class="text-dark"
                                igroup-size="sm" placeholder="Insert description...">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-dark">
                                        <i class="fas fa-lg fa-file-alt text-warning"></i>
                                    </div>
                                </x-slot>
                                </x-adminlte-textarea>
                            </div>
                        </div>
                        
                        
                       
                       
                       
                        
                       
                    </div>
                    <div class="col-12 p-3">
                        <x-adminlte-button class="btn-flat float-right" type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save"/>
                        <x-adminlte-button class="btn-flat float-right mr-3" type="button" label="Cancelar" id="cancelar" theme="danger" icon="fas fa-ban"/>
            
                    </div>
                </form>
            </x-adminlte-modal>
            <a href="#" data-toggle="modal" data-target="#modalPurple">  <x-adminlte-button class="btn-flat " type="submit" label="Cadastrar novo Serviço:" theme="success" icon="fab fa-servicestack"/></a>
        </div>

        <div class="col-12 mt-3">
           

            @foreach ($servicos as $servico)
            <x-adminlte-modal id="modal{{ $servico->id }}" title="Excluindo servico {{ $servico->nome }}">
                <form action="{{ route('servico.destroy', $servico->id) }}" method="POST" style="display:inline;">
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