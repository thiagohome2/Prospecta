/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function save_limite_func(codigo){      
    $.ajax({
        url : "<?php echo base_url();?>empresa/save_limite_func",
        type: "POST",
        dataType : "json",
        data : {"codigo" : codigo,"valor" : $("#limite-func-"+codigo).val()},  
        success: 
             function(data){
               console.log(data);
            
             }
     });

}


function valida_cnpj(valor){
    
    // Garante que o valor é uma string
    valor = valor.toString();
    
    // Remove caracteres inválidos do valor
    valor = valor.replace(/[^0-9]/g, '');
 
    
    // O valor original
    var cnpj_original = valor;
 
    // Captura os primeiros 12 números do CNPJ
    var primeiros_numeros_cnpj = valor.substr( 0, 12 );
 
    // Faz o primeiro cálculo
    var primeiro_calculo = calc_digitos_posicoes( primeiros_numeros_cnpj, 5 );
 
    // O segundo cálculo é a mesma coisa do primeiro, porém, começa na posição 6
    var segundo_calculo = calc_digitos_posicoes( primeiro_calculo, 6 );
 
    // Concatena o segundo dígito ao CNPJ
    var cnpj = segundo_calculo;
 
    // Verifica se o CNPJ gerado é idêntico ao enviado
    if ( cnpj === cnpj_original ) {
        return true;
        console.log("CNPJ Válido!")
    }
    
    console.log("CNPJ Inválido!")
    // Retorna falso por padrão
    return false;
    
} // valida_cnpj
 
 
/*
 calc_digitos_posicoes
 
 Multiplica dígitos vezes posições
 
 @param string digitos Os digitos desejados
 @param string posicoes A posição que vai iniciar a regressão
 @param string soma_digitos A soma das multiplicações entre posições e dígitos
 @return string Os dígitos enviados concatenados com o último dígito
*/
function calc_digitos_posicoes( digitos, posicoes = 10, soma_digitos = 0 ) {
 
    // Garante que o valor é uma string
    digitos = digitos.toString();
 
    // Faz a soma dos dígitos com a posição
    // Ex. para 10 posições:
    //   0    2    5    4    6    2    8    8   4
    // x10   x9   x8   x7   x6   x5   x4   x3  x2
    //   0 + 18 + 40 + 28 + 36 + 10 + 32 + 24 + 8 = 196
    for ( var i = 0; i < digitos.length; i++  ) {
        // Preenche a soma com o dígito vezes a posição
        soma_digitos = soma_digitos + ( digitos[i] * posicoes );
 
        // Subtrai 1 da posição
        posicoes--;
 
        // Parte específica para CNPJ
        // Ex.: 5-4-3-2-9-8-7-6-5-4-3-2
        if ( posicoes < 2 ) {
            // Retorno a posição para 9
            posicoes = 9;
        }
    }
 
    // Captura o resto da divisão entre soma_digitos dividido por 11
    // Ex.: 196 % 11 = 9
    soma_digitos = soma_digitos % 11;
 
    // Verifica se soma_digitos é menor que 2
    if ( soma_digitos < 2 ) {
        // soma_digitos agora será zero
        soma_digitos = 0;
    } else {
        // Se for maior que 2, o resultado é 11 menos soma_digitos
        // Ex.: 11 - 9 = 2
        // Nosso dígito procurado é 2
        soma_digitos = 11 - soma_digitos;
    }
 
    // Concatena mais um dígito aos primeiro nove dígitos
    // Ex.: 025462884 + 2 = 0254628842
    var cpf = digitos + soma_digitos;
 
    // Retorna
    return cpf;
    
} // calc_digitos_posicoes

function msgjs(mensagem , tipo){
	
        //Requisito: <div id="msgjs"></div> posicionado na página

        //Tipos: 
        //1  Alertas
        //2  Erro
        //3  Sucesso
        //4  Informação 

        switch(tipo){
        case 1:
                $("div#msgjs").html("<div id='alert' class='alert'> <button type='button' class='close' data-dismiss='alert'>×</button> <strong>Atenção!</strong> "+mensagem+"  </div>");
        break;
        case 2:
                $("div#msgjs").html("<div id='alert' class='alert  alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button><strong>Erro!</strong> "+mensagem+"</div>");
        break;
        case 3:
                $("div#msgjs").html("<div id='alert' class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>×</button> "+mensagem+"</div>");
        break;
        case 4:
                $("div#msgjs").html("<div id='alert' class='alert alert-info'><button type='button' class='close' data-dismiss='alert'>×</button><strong>Informação!</strong> "+mensagem+"</div>");
        break;
        }
        $("#msgjs").slideDown( 400 );//Mostra o alerta
        $("div#msgjs").delay( 5000 ).slideUp( 400 ); //Temporisa e esconde
    }	

    //Desaparecimento automatico de erros
    $(".alert").delay( 10000 ).slideUp( 400 );
    
      function alerta(titulo,msg,tipo){
        $(function(){
            new PNotify({
                  title: titulo,
                  text: msg,
                  type: tipo,
                  styling: 'bootstrap3'
              });
        });
    }
            
    
    
     $('#datatable-responsive').dataTable( {
                "oLanguage": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar:",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                }
            });