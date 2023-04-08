$(document).ready(function($){
    /* Validações Rap */
    $('#celular_adolescente').mask('(00) 0 0000-0000');
    $('#whatsapp').mask('(00) 0 0000-0000');
    $('#telefone_responsavel').mask('(00) 000000000');
    $('#dt_expedicao_rg').mask('00/00/0000');
    $('#nis').mask('000.00000.00-0');
    $('#certidao-nascimento').mask('0000000000 0000 0 0000 000 0000000 00');
    /* Fim Validações Rap */

    /* Validações Jota */
    $('.date').mask('00/00/0000');
    $('.time').mask('00:00:00');
    $('.date_time').mask('00/00/0000 00:00:00');
    $('#cep').mask('00000-000');
    $('.cel_with_dd').mask('(00)00000-0000');
    $('.phone').mask('0000-0000');
    $('.phone_with_ddd').mask('(00) 00000-0000');
    $('.tel_with_ddd').mask('(00) 0000-0000');
    $('.phone_us').mask('(000) 000-0000');
    $('.mixed').mask('AAA 000-S0S');
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('.nis').mask('000.00000.00-0', {reverse: true});
    $('.ctps').mask('00000000', {reverse: true});
    $('#serie_cpts').mask('0000', {reverse: true});
    $('.money').mask('#.##0,00', {reverse: true});
    $('.money2').mask("#.##0,00", {reverse: true});
    $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
        translation: {
            'Z': {
                pattern: /[0-9]/, optional: true
            }
        }
    });
    $('.ip_address').mask('099.099.099.099');
    $('.percent').mask('##0,00%', {reverse: true});
    $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
    $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
    $('.fallback').mask("00r00r0000", {
        translation: {
            'r': {
                pattern: /[\/]/,
                fallback: '/'
            },
            placeholder: "__/__/____"
        }
    });
    $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
});
