$(document).ready(function () {
    $("#dia_inteiro").click(function(){
        var parentlistem = $(this).closest('li')
        if($(this).is(":checked")){
            $(".inicial").show('slow');
            $(".final").show('slow');
            $(".inicialhora").hide('slow')
            $(".inicialfinal").hide('slow')
            $(".remove_select").hide('slow')
            
        }
        else{
            $(".inicial").hide('slow');
            $(".final").hide('slow');
            $(".inicialhora").show('slow')
            $(".inicialfinal").show('slow')
            $(".remove_select").show('slow')

        }
    })
    $('#data_inicio').on("blur", function() {
        $('#datafinal').val($('#data_inicio').val());
    });
  })