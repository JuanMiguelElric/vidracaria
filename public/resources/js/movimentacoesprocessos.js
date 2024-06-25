$(document).ready(function() {
    console.log('aaaaa')
    $("#form").submit(function(e) {
        e.preventDefault(); // Previne o comportamento padrão do formulário

        var formData = $(this).serialize(); // Serializa os dados do formulário

        $.ajax({
            type: 'GET',
            url: '/movimentacaosendopesquisada/processo',
            data: formData,
            success: function(response) {
                var data = response;
                console.log(data);

                // Limpa os elementos antes de adicionar novos dados
                $(".info_andamento").empty();
                $(".amostrar").empty();

                    // Cria um novo div para cada item
                    $(".infosss").empty();

                    $.each(data.items, function(index, hit) {
                        // Cria um novo div para cada item com a classe 'item'

                        var newDiv = $("<div class='item'></div>");
    
                        // Adiciona o tipo de publicação com formatação de data
                        let dataAjuizamento = new Date(hit.data);
                        let dataFormato = new Intl.DateTimeFormat('pt-BR').format(dataAjuizamento);
                        newDiv.append("<div class='info_andamento'><h3 class='text-dark'><i class='fas fa-info-circle text-blue'></i> " + (hit.tipo_publicacao??hit.tipo) + " <span class='info_andamento'> " + dataFormato + "</span></div>");
                        var fontesDiv = $("<div class='d-flex flex-row-reverse'><small class='sma'></small></div>");
                        fontesDiv.append("<small class='sma'>"+hit.fonte.nome+"</small>")
                    
                        newDiv.append(fontesDiv);
    
                        // Adiciona o texto da categoria
                        newDiv.append("<p class='text-justify paragrafo'>" + (hit.texto_categoria ?? hit.conteudo)+ "</p>");
    
                        // Adiciona as fontes em formato de lista
                        
    
                        // Adiciona o novo div ao container principal
                        $(".infosss").append(newDiv);
                    })
            },
            error: function() {
                alert("Ocorreu um erro ao processar a solicitação.");
            }
        });
    });
});
