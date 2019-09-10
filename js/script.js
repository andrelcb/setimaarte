$(document).ready(function(){
    $('#btn_pesquisar').click(function(){
        $('#conjunto').animate({marginTop: '2px'})
        $('#conteudo_filme').show();


        //requisicao ajax para página de pesquisa
        $.ajax({
            url: "pesquisar_filme.php",
            method: 'post',
            data: $('#formPesquisa').serialize(),
        }).done(function(retorno_requisicao) {
            $('#div_resultado_paginacao').html(retorno_requisicao).slideDown('slow');

            //ação que será tomada após clicar no link de paginação
            $('.paginar').clicark(function(){
                var pagina_clicada = $(this).data('pagina_clicada');
                pagina_clicada = pagina_clicada - 1; //necessário para ajusar o parâmetro offset
               
                //recupera os parametros de paginacao do formulario
                var registros_por_pagina = $('#registros_por_pagina').val();
                var pagina_atual = $('#pagina_atual').val();

                var offset_atualizado = pagina_clicada * registros_por_pagina;
                //aplica o valor atualizado do offset ao campo do form
                $('#offset').val(offset_atualizado);

                //refaz a pesquisa (chamada recursiva do método)
                $('#btn_pesquisar').click();
            });
        });

        return false; //para não ativar a trigger de submit do formulário

    })
})

window.onscroll = function(){scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-80px";
  }
}
