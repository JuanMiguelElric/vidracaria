var idContador =0;
function excluir(id)
{
    $('#'+id).parent().remove();
    idContador--

}
$(document).ready(function(){
    $("#Adicionar_campo").click(function(e){
        e.preventDefault();
        var tipoCampo = "Text";
        AdicionarCampo(tipoCampo);

    })
    function AdicionarCampo(tipo){
        idContador++
        var idCampo = "CampoExtra"+ idContador;
        var idForm = "formextra"+ idContador;
        var html =`
        <div class="col-12 d-flex" id="${idForm}">
                <div class="col-6 mt-3" id="${idCampo}">

                    <div class="form-group">
                                
                        <x-adminlte-select2  class="js-example-basic-single form-select js-example-responsive" igroup-size="lg" style="height: 100%;" name="cliente_envolvido[${idContador}]" label="Adicionar Envolvidos">
                            <x-slot name="cliente_envolvido[${{idContador}}]">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-black"></i>
                                </div>
                            </x-slot>
                        @foreach ($clientes as $cliente )
                     
                            <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                          
                   
                             
                         @endforeach

                        
                         </x-adminlte-select2>
 
                        
                    </div>

                </div>
        `;
        console.log(html);
        $("#imendaHtml" + tipo).append(html);
        $('.js-example-basic-single').select2();
    }

});