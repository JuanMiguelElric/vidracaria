@extends('adminlte::page')
@section('title', 'fornecedor')

@section('content')
@php
$heads = [
    'Nome do Fornecedor',
    'Cnpj   ',
    'Telefone',
    'email',
    'situação',
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];
$config = [
    'ajax'=>[
        'url'=>"/fornecedorjson",
        'dataSrc'=>"fornecedoresList",
    ],
    'data'=>[],
    'order'=>[[0,'asc']],
    'columns'=>[
        ['data'=>'nome'],
        ['data'=>'cnpj'],
        ['data'=>'telefone'],
        ['data'=>'email'],
        ['data'=>'ativo'],
        ['data'=>'btna']
],

];

@endphp
<div class="container">
    <div class="p-3 border-bottom mb-3">
        <h1>Listagem de fornecedores</h1>

    </div>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="{{route('fornecedor.create')}}">  <x-adminlte-button class="btn-flat " type="submit" label="Cadastrar novo Fornecedor:" theme="success" icon="fas fa-lg fa-user"/></a>
        </div>

        <div class="col-12 mt-3">

            @foreach ($fornecedores as $fornecedor)
            <x-adminlte-modal id="modal{{ $fornecedor->id }}" title="Excluindo fornecedor {{ $fornecedor->nome }}">
                <form action="{{ route('fornecedor.destroy', $fornecedor->id) }}" method="POST" style="display:inline;">
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