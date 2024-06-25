@extends('adminlte::page')

@section('content_header')
<div class="border-bottom pb-3">
    <h3>Editar Serviço</h3>
</div>

@endsection
@section('content')
<div class="container p-5">
    <x-adminlte-card title="Editar Serviço" theme="light" theme-mode="full" class="elevation-3 text-black"
    body-class="bg-light" header-class="bg-dark" footer-class="bg-primary border-top rounded border-light"
     collapsible>
     <form action="{{route('servico.update',$servico->id)}}" id="form" method="POST">
        @method('PUT')
        @csrf

        <div class="row">
            
            
            

            <div class="col-6">
                <div class="form-group">
                    <x-adminlte-input name="nome" placeholder="nome do serviço"
                    label="Digite aqui o nome do serviço"  icon="fas fa-bed" value="{{$servico->nome}}" >

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
                    label="Valor do serviço:" class="dinheiro" icon="fas fa-bed" value="{{$servico->valor}}" >

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
                    {{$servico->descricao}}
                    </x-adminlte-textarea>
                </div>
            </div>
            
            
           
           
           
            
           
        </div>
        <div class="col-12 p-3">
            <x-adminlte-button class="btn-flat float-right" type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save"/>
            <x-adminlte-button class="btn-flat float-right mr-3" type="button" label="Cancelar" id="cancelar" theme="danger" icon="fas fa-ban"/>

        </div>
    </form>
    </x-adminlte-card>
</div>

@stop
@push('js')
<script src="{{ asset('resources/jquery.mask.js') }}"></script>

<script>
    $(document).ready(function(){
            $('.dinheiro').mask('000000.00', {reverse: true});
        });
</script>
<script src="{{ asset('resources/requisicaoAjax.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- Script para inicializar o DateTimePicker -->
<script src="{{ asset('vendor/moment/moment.min.js') }}"></script>
<script src="{{ asset('https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js') }}"></script>


<script src="{{ asset('vendor\tempusdominus-bootstrap-4\js\tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('vendor\tempusdominus-bootstrap-4\js\tempusdominus-bootstrap-4.js') }}"></script>


<script>
    $(document).ready(function(){
        $("[name='cep']").on("blur", function(){
            var cep = $(this).val().replace(/\D/g, '');

            if(cep !== "" && cep.length == 8){
                $.ajax({
                    url: "https://viacep.com.br/ws/" + cep + "/json/",
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        if(data.erro !== undefined) {
                            console.log("CEP inválido ou não encontrado");
                        } else {
                            $("#endereco").val(data.logradouro);
                            $("#complemento").val(data.complemento);
                            $("#bairro").val(data.bairro);
                            $("#localidade").val(data.localidade);
                            $("#estado").val(data.uf);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert("Algum erro ocorreu, consulte o log.");
                    }
                });
            } else {
                console.log("Erro ao encontrar CEP");
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        const campoRequired = "Por favor, preencha este campo:";
        $('#form').validate({
            rules: {
                nome: "required",
     
                
            },
            messages: {
                nome: campoRequired,
      

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-valid').addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid').addClass('is-valid');
            }
        });
    });
</script>

@endpush


    
