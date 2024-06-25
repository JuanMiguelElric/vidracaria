$(document).ready(function(){
    $("[name='numeroprocesso']").on("blur", function(){
        var numeprocesso = document.getElementById("numeroprocesso").value;
        $.ajax({
            type: 'GET',
            url: '/pesquisa/search',
            data: { query: numeprocesso },
            success: function(response) {
                // Manipule a resposta da requisição AJAX aqui
                $("#vara").empty();
                $("#acao-input").empty();
                $("#tituloinput").empty();
                console.log(response);
                $("#tituloinput").val(+response.titulo_polo_ativo +" X "+response.titulo_polo_passivo);
                $('#resultado').html(JSON.stringify(response));
                $.each(response.fontes,function(index,hit){
                    $("#acao-input").val(hit.capa.classe);
                    $.each(hit.capa.informacoes_complementares, function(index, info) {
                        if(index >=1){
                            return false
                        }
                        $("#vara").val(info.valor);
                   
                    });
                    $("#foro").val(response.unidade_origem.cidade);
                })
                $.each(hit.capa.informacoes_complementares, function(index, info) {
                    if(index >=1){
                        return false
                    }

              
               
            });
            },
            error: function(error) {
                // Manipule os erros da requisição AJAX aqui
                console.log(error);
         
            }
        });
    });
});