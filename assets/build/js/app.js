/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function msgjs(id, mensagem , tipo){
	 //Requisito: <div id="msgjs"></div> posicionado na página

        //Tipos: 
        //1  Alertas
        //2  Erro
        //3  Sucesso
        //4  Informação 

        switch(tipo){
        case 1:
                $("#msgjs"+id).html("<div id='alert' class='alert'> <button type='button' class='close' data-dismiss='alert'>×</button> <strong>Atenção!</strong> "+mensagem+"  </div>");
        break;
        case 2:
                $("#msgjs"+id).html("<div id='alert' class='alert  alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button><strong>Erro!</strong> "+mensagem+"</div>");
        break;
        case 3:
                $("#msgjs"+id).html("<div id='alert' class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>×</button> "+mensagem+"</div>");
        break;
        case 4:
                $("#msgjs"+id).html("<div id='alert' class='alert alert-info'><button type='button' class='close' data-dismiss='alert'>×</button><strong>Informação!</strong> "+mensagem+"</div>");
        break;
        }
        $("#msgjs"+id).slideDown( 400 );//Mostra o alerta
        $("#msgjs"+id).delay( 5000 ).slideUp( 400 ); //Temporisa e esconde
    }	

    //Desaparecimento automatico de erros
    $(".alert").delay( 5000 ).slideUp( 400 );
    
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
            
            
    function excluir_empresa(id){      
    $.ajax({
        url : "excluir",
        type: "POST",
        dataType : "json",
        data : {"id" : id},  
        success: 
             function(res){
                msgjs('-excluir-'+id,res.msg , res.tipo);
                                     
             }
     });
    }
    
    
    function limpar_campos_cadastro(){
         $('#cnpj').val('');
         $('#razao_social').val('');
         $('#nome_fantasia').val('');
         $('#telefone').val('');
         $('#email').val('');
         $('#site').val('');
     }
     
    function alterar_empresa(id){      
         
         //$('#form-alterar-'+id).parsley();
         
        $.ajax({
          url : "alterar",
          type: "POST",
          dataType: "json",
          data:{
              "id" : id,
              "cnpj" : $("#editar-cnpj-"+id).val(),
              "razao_social" : $("#editar-razao-social-"+id).val(),
              "nome_fantasia" : $("#editar-nome-fantasia-"+id).val(),
              "telefone" : $("#editar-telefone-"+id).val(),
              "email" : $("#editar-email-"+id).val(),
              "site" : $("#editar-site-"+id).val()},
          cache: false,
          success: function(res){

              msgjs('-alterar-'+id,res.msg , res.tipo);
          },
          error: function(res){                      

              msgjs('-alterar-'+id,res.msg , res.tipo);
          }          
          });
    }
    
    function fechar_modal(){
        setTimeout(location.reload.bind(location), 500);
    }
       
        