@extends('adminlte::page')

@section('title', 'Criar Fornecedor')

@section('content_header')
    <h1>Fornecedor </h1>
@stop

@section('content')
<div class="container p-5">
    <x-adminlte-card title="Fornecedor" theme="light" theme-mode="full" class="elevation-3 text-black"
    body-class="bg-light" header-class="bg-dark" footer-class="bg-primary border-top rounded border-light"
     collapsible>
    <form action="{{route('fornecedor.update',$fornecedor->id)}}" id="form" method="POST">
        @method('PUT')
        @csrf

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <x-adminlte-input name="nome" disabled placeholder=" nome do Fornecedor"
                    label=" nome do Fornecedor" icon="fas fa-bed" value="{{ $fornecedor->nome }}" >

                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-user text-yellow"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
  
    
                </div>
    
            </div>
            
            <div class="col-6">
                <div class="form-group">
                    <x-adminlte-input name="cnpj" disabled placeholder="00.000.000-0000-00"
                    label=" cnj do Fornecedor:" disabled data-mask="00.000.000-0000-00" value="{{ $fornecedor->cnpj }}" >
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-address-card text-yellow"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

    
                </div>
    
            </div>
            

            <div class="col-6">
                <div class="form-group">
                    <x-adminlte-input name="telefone" disabled placeholder="Telefone do Fornecedor:"
                    label="Numero do telefone do Fornecedor:(caso houver)" data-mask="(99) 9999-9999" icon="fas fa-bed" value="{{$fornecedor->telefone}}" >

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
                    <x-adminlte-input name="email" disabled type="email" placeholder="xxxxx@example.com"
                    label=" email do Fornecedor:(caso houver)" icon="fas fa-envelope" value="{{$fornecedor->email}}" >

                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-envelope text-yellow"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
  
    
                </div>
            </div>
            
           
           
            
        </div>
        <div class="row border-bottom">
            <div class="col-12">
                <h2>Localização:</h2>
            </div>


      
            <div class="col-4">
                <div class="form-group">
                    <x-adminlte-input name="cep" disabled placeholder="Informe o CEP do seu Fornecedor:"
                    label=" CEP do Fornecedor" data-mask="00000-000" icon="fas fa-bed" value="{{ old('cep') }}">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-city text-yellow"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <x-adminlte-input name="rua" disabled id="endereco" placeholder="Logradouro"
                    label=" Logradouro:" icon="fas fa-bed" value="{{$endereco->rua}}">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-map-marker-alt text-yellow"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <x-adminlte-input name="complemento" disabled id="complemento" placeholder="Complemento"
                    label=" complemento:" icon="fas fa-bed" value="{{ $endereco->complemento }}">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-thumbtack text-yellow"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <x-adminlte-input name="bairro" disabled id="bairro" placeholder="bairro"
                    label=" bairro:" icon="fas fa-bed" value="">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-home text-yellow"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <x-adminlte-input name="numero" disabled id="numero" placeholder="Nº"
                    label=" número " icon="fas fa-bed" value="{{$endereco->numero}}">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-home text-yellow"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <x-adminlte-input name="estado" disabled id="estado" placeholder="Estado/UF"
                    label=" Estado/UF:" icon="fas fa-bed" value="{{ $endereco->estado }}">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-flag text-yellow"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <x-adminlte-input name="cidade" disabled id="localidade" placeholder="Cidade"
                    label="Informe aqui a cidade:" icon="fas fa-bed" value="{{ $endereco->cidade}}">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-flag text-yellow"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
            </div>
        
        
    </div>
        <div class="col-12 p-3">
 
            <x-adminlte-button class="btn-flat float-right mr-3" type="button" label="Cancelar" id="cancelar" theme="danger" icon="fas fa-ban"/>

        </div>
    </form>
    </x-adminlte-card>
</div>
@stop
@push('js')
<script src="{{ asset('resources/jquery.mask.js') }}"></script>
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


    


