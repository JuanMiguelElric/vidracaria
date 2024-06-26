@extends('adminlte::page')

@section('content_header')
<div class="border-bottom pb-3">
    <h3>Cadastrar Cliente</h3>
</div>

@endsection
@section('content')
<div class="container p-5">
    <x-adminlte-card title="Registrar Cliente" theme="light" theme-mode="full" class="elevation-3 text-black"
    body-class="bg-light" header-class="bg-dark" footer-class="bg-primary border-top rounded border-light"
     collapsible>
    <form action="{{route('cliente.update',$cliente->id)}}" id="form" method="POST">
        @method('PUT')
        
        @csrf

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <x-adminlte-input name="nome" placeholder="Informe aqui o nome do cliente"
                    label="Informe aqui o nome do cliente" icon="fas fa-bed" value="{{ $cliente->nome }}" >

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
                    <x-adminlte-input name="cpf" placeholder="XXX.XXX.XXX-XX"
                    label="Informe aqui o cpf do cliente:" data-mask="999.999.999-99" value="{{$cliente->cpf}}" >
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
                    <label for="">Data de Aniversário</label>
                    
                    <input type="date" class="form-control" name="dataNascimento" value="{{$cliente->dataNascimento}}"  />
                </div>
             
            </div>
            
           
            <div class="col-12">
                <div class="form-group">
                    <x-adminlte-select id="correto" name="sexo" label="Como se identifica:">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-heart text-yellow"></i>
                            </div>
                        </x-slot>
                        <option value="{{$cliente->sexo}}" selected>{{$cliente->sexo}}</option>
                        <option value="Masculino" >Masculino</option>
                        <option value="Feminino" >Feminino</option>
                        <option value="Transsexual" >Transsexual</option>
                        <option value="Binário" >Binário</option>
                        <option value="Binário" >Não especificar</option>
                       
              
                    </x-adminlte-select>
                </div>
           
           
            <div class="row  border-bottom pt-3">
                
       

       
                <div class="col-6">
                    <div class="form-group">
                        <x-adminlte-input name="telefone" placeholder="Telefone do Cliente:"
                        label="Numero do telefone do cliente:(caso houver)" data-mask="(99) 9999-9999" icon="fas fa-bed" value="{{$cliente->telefone}}" >
    
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
                        <x-adminlte-input name="email" type="email" placeholder="xxxxx@example.com"
                        label="Informe aqui o email do cliente:(caso houver)" icon="fas fa-envelope" value="{{$cliente->email}}" >
    
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
                        <x-adminlte-input name="cep" placeholder="Informe o CEP do seu cliente:"
                        label="Informe aqui o CEP do cliente" data-mask="00000-000" icon="fas fa-bed" value="{{ $endereco->cep }}">
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
                        <x-adminlte-input name="rua" id="endereco" placeholder="Logradouro"
                        label="Informe aqui o Logradouro:" icon="fas fa-bed" value="{{$endereco->rua}}">
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
                        <x-adminlte-input name="complemento" id="complemento" placeholder="Complemento"
                        label="Informe aqui o complemento:" icon="fas fa-bed" value="{{ $endereco->complemento }}">
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
                        <x-adminlte-input name="bairro" id="bairro" placeholder="bairro"
                        label="Informe aqui o bairro:" icon="fas fa-bed" value="">
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
                        <x-adminlte-input name="numero" id="numero" placeholder="Nº"
                        label="Informe aqui o número " icon="fas fa-bed" value="{{$endereco->numero}}">
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
                        <x-adminlte-input name="estado" id="estado" placeholder="Estado/UF"
                        label="Informe aqui o Estado/UF:" icon="fas fa-bed" value="{{ $endereco->estado }}">
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
                        <x-adminlte-input name="cidade" id="localidade" placeholder="Cidade"
                        label="Informe aqui a cidade:" icon="fas fa-bed" value="{{ $endereco->cidade}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-flag text-yellow"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="ativo" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                         Caso estiver inativo clique aqui
                        </label>
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
        $('#cancelar').click(function(){
            window.history.back();
            });
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
                sexo:"required",
                dataNascimento:"required",
                cpf:"required",
                endereco:"required",
                telefone:"required",
                email:"required",
                cep:"required",
                rua:"required",
                estado:"required",
                cidade:"required",
                complemento:"required"

                     
                
            },
            messages: {
                nome: campoRequired,
                sexo:campoRequired,
                dataNascimento:campoRequired,
                cpf:campoRequired,
                endereco:campoRequired,
                telefone:campoRequired,
                email:campoRequired,
                cep:campoRequired,
                rua:campoRequired,
                estado:campoRequired,
          
                complemento:campoRequired,
      

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


    
