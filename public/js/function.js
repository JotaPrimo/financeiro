$(document).ready(function () {

    //tooltip
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    
    //Apresentar ou ocultar o menu
    $('.sidebar-toggle').on('click', function () {
        $('.sidebar').toggleClass('collapsed');
    });

    //Prevenindo múltiplos submits se o usuário clicar várias vezes seguidas no botão de salvar
    $('.form-prevent-multiples-submit').on('submit', function() {
        $('.btn-form-prevent-multiples-submit').attr('disabled', true);
        $('.spin').show();
    });

    //Verifica se a data é maior do que a data atual
    /* var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10){
            dd='0'+dd
        }
        if(mm<10){
            mm='0'+mm
        }

    today = yyyy+'-'+mm+'-'+dd;
    $("input[type='date']").attr("max", today); */
    
    //Verifica se a data fim é menor do que a data de início dos campos de busca por período
    $('#data_inicio').on('submit', function() {
        var data_inicio = $("#data_inicio").val();
        var data_termino = $("#data_termino").val();

        if(Date.parse(data_inicio) > Date.parse(data_termino)){
            alert("Invalid Date Range");
        }
        else{
            alert("Valid date Range");
        }
    })
    
});


