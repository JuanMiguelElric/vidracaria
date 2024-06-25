$(document).ready(function(){
    $("#form1").submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: "GET",
            url: "/pesquisa/processoOab",
            data: formData,
            success: function(response) {
                var data = response;
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
                $(".paraoab").empty();
    
                // Adiciona o título dos resultados
                $(".Resultado").append("<h4>Resultados da busca de processo por OAB </h4>");
    
                // Itera sobre os dados recebidos
                $.each(data.items, function(index, hit) {
                    if(index >= 1) {
                        return false;
                    }
                    // Adiciona os dados na tabela
                    var newRow = $("<tr></tr>");
                    let dataAjuizamento = new Date(hit.data);
                    let dataFormato = new Intl.DateTimeFormat('pt-BR').format(dataAjuizamento);
                    newRow.append("<th scope='row' class='inner'>" + hit.titulo_polo_passivo + " X " + hit.titulo_polo_ativo + "<br>" + hit.numero_cnj + "</th>");
                    newRow.append("<td class='tribunal'>" + hit.unidade_origem.sigla + "</td>");
                    newRow.append("<td class='Data'>" + dataFormato + "</td>");
                    newRow.append("<td><a href='#'><i class='fas fa-plus-circle abrir'></i> Pronto para Adicionar</a></td>");
                    $(".paraoab").append(newRow);
    
                    $(".tituloinput").val(hit.titulo_polo_passivo + " X " + hit.titulo_polo_ativo);
                    $(".numero").append(hit.numero_cnj);
                    $(".cliente_proc").val(hit.titulo_polo_passivo);
                    $(".numeroprocesso").val(hit.numero_cnj);
    
                    // Itera sobre os envolvidos
                    $.each(hit.envolvidos, function(index, envolvi) {
                        if (index >= 1) {
                            return false;
                        }
                        $(".cliente").append(envolvi.nome);
                        $(".cliente_tipo_normalizado").append(envolvi.tipo_normalizado);
                        $(".qualificacao").val(envolvi.tipo_normalizado);
    
                        $.each(envolvi.advogados, function(index, adv) {
                            $(".advo").append(adv.nome);
                            $(".tipo_advo").append(adv.tipo_normalizado);
                        });
                    });
    
                    $(".foro").val(hit.unidade_origem.cidade);
                    $(".data-input").val(dataFormato);
                    $(".juizo").append(hit.unidade_origem.nome);
    
                    $.each(hit.capa.informacoes_complementares, function(index, info) {
                        if(index >= 1) {
                            return false;
                        }
                        $(".vara").val(info.valor);
                    });
    
                    $(".tribunal").append(hit.sigla);
                    $(".acao").append(hit.capa.classe);
                    $(".acao-input").val(hit.capa.classe);
    
                    $('.abrir').click(function() {
                        $('.informacoes').show();
                    });
    
                    let datareceber = new Date(hit.data_inicio);
                    let formatoData = new Intl.DateTimeFormat('pt-BR').format(datareceber);
                    $(".Data").append(formatoData);
                });
            },
            error: function(response) {
                alert('Deu errado');
            }
        });
    });

})
        // Adicione seu script aqui
