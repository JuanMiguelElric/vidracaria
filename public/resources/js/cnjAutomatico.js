$("#form").submit(function (e) { 
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        type: 'GET',
        url: '/pesquisa/search',
        data: formData,
        success: function(response){
            var data = response;
            console.log(data);
            
            $('.olha').show();
            $(".info_andamento").empty();
            
            // Limpa os resultados anteriores
            $(".Resultado").empty();
            $(".inner").empty();
            $(".numeroprocesso").empty();
            $(".foro").empty();
            $(".data-input").empty();
            $(".juizo").empty();
            $(".tribunal").empty();
            $(".acao").empty();
            $(".acao-input").empty();
            $(".vara").empty();
            $(".amostrar").empty();
            $(".info_andamento").empty();
            $(".Data").empty();
            $(".numero").empty();
            // Itera sobre os dados recebidos
            $(".Resultado").append("<h4>Resultados da busca de processos </h4>");
            $.each(data.fontes, function(index, hit) {
                if(index >= 1){
                    return false
                }
                
                $(".inner").append("<div>"+data.titulo_polo_passivo+" X "+data.titulo_polo_ativo+ " <a href='#' class='abrir'>"+ data.numero_cnj+ "</a>"+ "</div>");
                $(".tituloinput").val(data.titulo_polo_passivo+ " X "+data.titulo_polo_ativo);
                $(".numero").append(data.numero_cnj);
                $(".cliente_proc").val(data.titulo_polo_passivo);
                $(".numeroprocesso").val(data.numero_cnj);
                $.each(hit.envolvidos, function(index, envolvi) {
                    if (index >= 1) {
                        return false;
                    }
                    $(".cliente").append('<br>'+ envolvi.nome+' '+ envolvi.tipo_normalizado);
                  //  $(".cliente_tipo_normalizado").append(envolvi.tipo_normalizado);
                    $(".qualificacao").val(envolvi.tipo_normalizado);
            
                    $.each(envolvi.advogados, function(index, adv) {
                     
                        $(".advo").append('<br>'+adv.nome +' '+adv.tipo_normalizado);
                     
                    });
                });
              
                
                
                $(".foro").val(data.unidade_origem.cidade);
                let dataAjuizamento = new Date(data.data_inicio);
                let dataFormato = new Intl.DateTimeFormat('pt-BR').format(dataAjuizamento);
                $(".data-input").val(dataFormato);
                $(".juizo").append(data.unidade_origem.nome);
                

                $.each(hit.capa.informacoes_complementares, function(index, info) {
                        if(index >=1){
                            return false
                        }
                        $(".vara").val(info.valor);
                   
                });
           

                $(".tribunal").append(hit.sigla);
                $(".acao").append(hit.capa.classe);
                $(".acao-input").val(hit.capa.classe);

                

                $('.abrir').click(function(){
                            
                    $('.informacoes').show();

                 });

                let datareceber = new Date(data.data_ultima_movimentacao);
                let formatoData = new Intl.DateTimeFormat('pt-BR').format(datareceber);
                $(".Data").append(formatoData);
            });

            
        },
        error: function(response){
            alert('Erro ao buscar os dados');
        }
    });
});

