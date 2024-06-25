@extends('adminlte::page')
@section('title', 'Serviço')

@section('content')
@php
$heads = [
    'Nome do Serviço',
    'Preço',
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
                                            <i class="fas fa-phone text-yellow"></i>
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
                                            <i class="fas fa-phone text-yellow"></i>
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
            <a href="#" data-toggle="modal" data-target="#modalPurple">  <x-adminlte-button class="btn-flat " type="submit" label="Cadastrar novo Servico:" theme="success" icon="fas fa-lg fa-user"/></a>
        </div>

        <div class="col-12 mt-3">

            <x-adminlte-modal id="modalMin" title="Excluindo cliente">
             

            </x-adminlte-modal>
            
            
            <x-adminlte-datatable id="table2" :heads="$heads" :config="$config" head-theme="dark" striped hoverable compessed with-buttons />
        </div>
    </div>
</div>

        


@endsection
@push('js')
<script>
    $(document).on('click', '.excluir-dado', function() {
        var dadoId = $(this).data('dado-id');
        var $button = $(this);
        if (confirm('Tem certeza de que deseja excluir este dado?')) {
            $.ajax({
                type: 'DELETE',
                url: '/usuarios/' + dadoId,
                data: {
                    '_token': '{{ csrf_token() }}',
                },
                success: function(response) {
                    // Lógica de sucesso

                    toastr.success(response.message)
                    // Atualize a página ou faça outras ações necessárias
                    $button.parent().parent().parent().remove()
                    $('#table2').DataTable().ajax.reload();
                },
                error: function(xhr, status, error) {
                    // Lógica de erro
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        toastr.warning(value)
                    });
                }
            });
        }
    });
    
    $("#refresh").click(function() {
        $("#table2").DataTable().ajax.reload();
    })
</script>

@endpush
@section('plugins.Datatables', true)
@section('plugins.DatatablesExport', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Toastr', true)