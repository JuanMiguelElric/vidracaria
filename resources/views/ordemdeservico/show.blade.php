@extends('adminlte::page')

@section('content_header')
<div class="border-bottom pb-3">
    <h3> Ordem de Serviço</h3>
</div>

@endsection
@section('content')
<div class="container p-5">
    <x-adminlte-card title=" Ordem de serviço" theme="light" theme-mode="full" class="elevation-3 text-black"
    body-class="bg-light" header-class="bg-dark" footer-class="bg-primary border-top rounded border-light"
     collapsible>
    <form action="{{route('ordemdeservico.update',$ordemdeservico->id)}}" id="form" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            
            
            

            
            
            <div class="col-6">
                <div class="form-group">
                    <label for="">Data de inicio:</label>
                    
                    <input type="date" class="form-control" disabled name="dataServico" value="{{$ordemdeservico->dataServico}}"  />
                </div>
             
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Prazo para conclusão</label>
                    
                    <input type="date" class="form-control" disabled name="prazo" value="{{$ordemdeservico->prazo}}" />
                </div>
             
            </div>
            <div class="col-6">
                <div class="form-group">
                    <x-adminlte-input name="valor" disabled placeholder="R$00.00:"
                    label="Valor da conclusão:" data-mask="000.00" icon="fas fa-bed" value="{{$ordemdeservico->valor}}" >

                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-dollar-sign text-yellow"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
  
    
                </div>
            </div>
            
           
            <div class="col-6">
                <div class="form-group">
                    <x-adminlte-select id="correto" disabled name="cliente" label=" o cliente:">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-user text-yellow"></i>
                            </div>
                        </x-slot>
                
                  
                            
                        <option value="{{$cliente->id}}" >{{$cliente->nome}}</option>
                 
                       
              
                    </x-adminlte-select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <x-adminlte-select id="correto" disabled name="produto" label=" produto para o serviço:">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-box text-yellow"></i>
                            </div>
                        </x-slot>
             
             
                            
                        <option value="{{$produto->id}}" >{{$produto->nome}}</option>
                    
                  
                       
              
                    </x-adminlte-select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <x-adminlte-select id="correto" disabled name="servico" label="serviço:">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-wrench text-yellow"></i>
                            </div>
                        </x-slot>
                     
                  
                            
                        <option value="{{$servico->id}}" >{{$servico->nome}}</option>
                    
           
                       
              
                    </x-adminlte-select>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <x-adminlte-select id="correto" disabled name="funcionario" label=" funcionário para a execução desse serviço:">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-wrench text-yellow"></i>
                            </div>
                        </x-slot>
                      
                      
                            
                        <option value="{{$funcionario->id}}" >{{$funcionario->nome}}</option>
                    
                    
                       
              
                    </x-adminlte-select>
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


    
