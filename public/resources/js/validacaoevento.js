$(document).ready(function(){
    const campoRequired = "Por favor preencher esse campo";
    $('#form1').validate({
        rules:{
           titulo_evento: "required",
           dia_inicial: "required",
           hora_inicial: "required",
           dia_final: "required",
           hora_final: "required",
           alerta_number:"required",
           alerta_horas:"required",
           observacoes:"required",
    
        },
        messages:{
            titulo_evento: campoRequired,
            dia_inicial: campoRequired,
            hora_inicial: campoRequired,
            dia_final: campoRequired,
            hora_final: campoRequired,
            alerta_number:campoRequired,
            alerta_horas:campoRequired,
            observacoes:campoRequired,
       

        },
        errorElement: 'span',
        errorPlacement:function(error, element){
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-valid');
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            $(element).addClass('is-valid');
        },
        submitHandler: function(form) {
  
            $('#numeroprocesso').unmask();
            console.log(form.serialize());
            return;
            // form.submit();
        }

    });
});