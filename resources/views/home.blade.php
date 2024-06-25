@extends('adminlte::page')
@section('content_header')
<div class="row">
    <div class="col-12">
            <x-adminlte-modal id="cad" title="Cadastrar Advogado" theme="dark"
            icon="fas fa-bolt" size='lg' disable-animations>
            <form action="" id="form" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <x-adminlte-input name="name"  placeholder="nome do advogado"
                            label="Nome do advogado:" icon="fas fa-envelope" value="" >
        
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-dark">
                                        <i class="fas fa-envelope text-yellow"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
          
            
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <x-adminlte-input name="sobrenome"  placeholder="sobrenome do advogado"
                            label="Sobrenome do advogado:" icon="fas fa-envelope" value="" >
        
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-dark">
                                        <i class="fas fa-envelope text-yellow"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
          
            
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <x-adminlte-input name="email" type="email" placeholder="xxxxx@example.com"
                            label="Informe aqui o email do avogado:" icon="fas fa-envelope" value="" >
        
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-dark">
                                        <i class="fas fa-envelope text-yellow"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
          
            
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Data de Aniversário</label>
                            
                            <input type="date" class="form-control" name="Data_de_Nascimento"  />
                        </div>
                     
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <x-adminlte-input name="cpf" placeholder="XXX.XXX.XXX-XX"
                            label="Informe aqui o cpf :" data-mask="999.999.999-99" value="{{ old('nome') }}" >
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-dark">
                                        <i class="fas fa-address-card text-yellow"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
        
            
                        </div>
            
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <x-adminlte-input name="rg" placeholder="XX.XXX.XXX-X"
                            label="Informe aqui o rg " data-mask="99.999.999-9" value="{{ old('cpf') }}" >
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-address-card text-yellow"></i>
                                </div>
                            </x-slot>
        
                            </x-adminlte-input>
            
                        </div>
            
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <x-adminlte-input name="pis" placeholder="XXX.XXXXX-XX"
                            label="Informe aqui o pis/pasep " data-mask="999.99999-99" value="{{ old('RG') }}" >
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-briefcase text-yellow"></i>
                                </div>
                            </x-slot>
                            </x-adminlte-input>
            
                        </div>
            
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <x-adminlte-input label="Password" name="password" type="text" placeholder="password" id="password" />
                            <button type="button" class="btn btn-primary" onclick="gerarSenha()">Gerar Senha</button>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="">Linceça do usuario </label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="0" checked>
                            <label class="form-check-label" for="inlineRadio1">Admin</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="1">
                            <label class="form-check-label" for="inlineRadio2">Funcionário</label>
                          </div>
                    </div>
                    <div class="col-12">
                        <x-adminlte-button class="btn-flat float-right" type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save"/>
                        <x-adminlte-button class="btn-flat float-right mr-3" type="button" label="Cancelar" id="cancelar" theme="danger" icon="fas fa-ban"/>
            
                    </div>
                </div>
            </form>
        </x-adminlte-modal>
        <div class="d-flex border-bottom p-3 ">
            <div class="mr-auto p-2">
                <h1>Área de Trabalho</h1>
    
            </div>
            <div class="p-2">
                <a href="#" id="voltar">Voltar</a>
            </div>
    
            <div class="mr-5 p-2">
                <div class="btn-group dropleft">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-plus-circle text-white"></i>
                    </button>
                    <div class="dropdown-menu mt-3" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('funcionario.create') }}">Cadastrar funcionario</a>
                        <a class="dropdown-item" href="{{ route('fornecedor.create') }}">Cadastrar Fornecedor</a>
                        <a class="dropdown-item" href="{{ route('cliente.create') }}">Cadastrar cliente</a>
                        <a class="dropdown-item" href="{{ route('produto.create') }}">Cadastrar produto</a>
               
                
                   





                    </div>
                </div>
    
        </div>
    </div>
</div>

@endsection


@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="row mt-3">
                <div class="col-4">
                   
                    <a href="#"  data-toggle="modal" data-target="#lembrete">
                        <x-adminlte-callout theme="dark" class="bg-dark" title-class="text-uppercase"
                        icon="fas fa-building text-white" title="Fornecedores {{$fornecedor}} ">
                        <i>meus fornecedores</i>
               
                         </x-adminlte-callout>

                    </a>

                </div>
                <div class="col-4">
                    <x-adminlte-callout theme="success" class="bg-gradient-green" title-class="text-uppercase"
                    icon="fas fa-box text-purple" title="Produto {{$produto}}">
                         <i>produtos registrados</i>
                     </x-adminlte-callout>

                </div>
                <div class="col-4">
                    <x-adminlte-callout theme="primary" class="bg-gradient-blue" title-class="text-uppercase"
                    icon="fas fa-user text-purple" title="Funcionários {{$funcionario}}  ">
                    <i>funcionários cadastrados.</i>
           
                     </x-adminlte-callout>

                </div>
                
                <div class="col-12 mt-3">
                
                        <canvas id="barChart" width="600" height="230"></canvas>
                  

                </div>
            </div>
            
        </div>
        
        
    </div>
</div>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="{{ asset('resources/jquery.mask.js') }}"></script>

<script src="{{ asset('https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js') }}"></script>
<script>
    var ctx = document.getElementById('barChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($data['labels']),
            datasets: [{
                label: 'Relatório do escritório',
                data: @json($data['data']),
                backgroundColor: 'rgba(222,61,21),rgba(282,61,21)',
                borderColor: 'rgba(56,173,83)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    
    </script>
<script>
    $(document).ready(function(){
        const campoRequired = "Por favor, preencha este campo:";
        $('#form').validate({
            rules: {
                nome: "required",
                sobrenome:"required",
                email:"required",
                password:"required",
                cpf:"required",
                rg:"required",
                pis:"required",
     
                
            },
            messages: {
                nome: campoRequired,
                sobrenome:campoRequired,
                email:campoRequired,
                password:campoRequired,
                cpf:campoRequired,
                rg:campoRequired,
                pis:campoRequired,
      

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
<script>
    function gerarSenha() {
    const upperCaseChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    const lowerCaseChars = "abcdefghijklmnopqrstuvwxyz";
    const specialChars = "!@#\$%\^&*()_-+=<>?";
    const numericChars = "0123456789";
    const allChars = upperCaseChars + lowerCaseChars + specialChars + numericChars;
    const comprimentoSenha = 8; // Você pode ajustar o comprimento da senha conforme necessário
    let senha = "";

    // Adicione pelo menos uma letra maiúscula, uma letra minúscula, um caractere especial e um número à senha
    senha += upperCaseChars.charAt(Math.floor(Math.random() * upperCaseChars.length));
    senha += lowerCaseChars.charAt(Math.floor(Math.random() * lowerCaseChars.length));
    senha += specialChars.charAt(Math.floor(Math.random() * specialChars.length));
    senha += numericChars.charAt(Math.floor(Math.random() * numericChars.length));

    for (let i = 4; i < comprimentoSenha; i++) {
        const randomIndex = Math.floor(Math.random() * allChars.length);
        senha += allChars.charAt(randomIndex);
    }

    // Embaralhe a senha para garantir que os caracteres estejam em ordem aleatória
    senha = senha.split('').sort(() => Math.random() - 0.5).join('');

    // Exibe a senha no campo de senha
    document.getElementById("password").value = senha;
}
</script>

@endpush
