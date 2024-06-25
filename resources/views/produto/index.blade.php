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

            <x-adminlte-modal id="modalMin" title="Excluindo produto">
             

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