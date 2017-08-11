        
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Processo seletivo Prospecta - Desenvolvido por Thiago de Olliveira
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/vendors/jquery/dist/jquery.min.js');?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/vendors/fastclick/lib/fastclick.js');?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('assets/vendors/nprogress/nprogress.js');?>"></script>
    <!-- jQuery custom content scroller -->
    <script src="<?php echo base_url('assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js');?>"></script>
    <!-- Switchery -->
    <script src="<?php echo base_url('assets/vendors/switchery/dist/switchery.min.js');?>"></script>
    
    <!-- Datatables -->
    <script src="<?php echo base_url('assets/vendors/datatables.net/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.print.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/jszip/dist/jszip.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/pdfmake/build/pdfmake.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/pdfmake/build/vfs_fonts.js');?>"></script>
     <!-- Parsley -->
    <script src="<?php echo base_url('assets/vendors/parsleyjs/dist/parsley.min.js');?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('assets/vendors/iCheck/icheck.min.js');?>"></script>
    <!-- PNotify -->
    <script src="<?php echo base_url('assets/vendors/pnotify/dist/pnotify.js');?>"></script>
    
    

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('assets/build/js/custom.js');?>"></script>
  
    <!-- Custom Theme Scripts -->
    <?php if ($entidade == "empresa"){ ?>
        <script>
            
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
            
            function save_limite_func(codigo){      
                $.ajax({
                    url : "<?php echo base_url();?>empresa/save_limite_func",
                    type: "POST",
                    dataType: "json",
                    data:{"codigo" : codigo,"valor" : $("#limite-func-"+codigo).val()},  
                    cache:false,
                    success: function(res){
                        //alert(res.msg);
                        console.log(res);
                        alerta('Atualização de limite',res.msg,res.tipo);
                    },
                    error: function(res){                      
                       alerta('Atualização de limite',res.msg,res.tipo); 
                    }          
                });

            }
            
           /*
             $("input").on('ifChecked', function(event){
                var codigo = $(this).closest("input").attr('cod');
                var valor = $(this).closest("input").prop('checked');
                atualiza_status_func (codigo, valor);
            });
            
            $('input').on('ifUnchecked', function (event) {
                var codigo = $(this).closest("input").attr('cod');
                var valor = $(this).closest("input").prop('checked');
                atualiza_status_func (codigo, valor);
            });
           */ 
            function atualiza_status_func (codigo){
                
                $.ajax({
                    url : "<?php echo base_url();?>empresa/atualiza_status_func",
                    type: "POST",
                    dataType: "json",
                    data:{"codigo" : codigo,"valor" :$("#status-func-"+codigo).val()},    
                    cache:false,
                    success: function(res){
                        //alert(res.msg);
                        //console.log(res);
                        
                        if ($("#status-func-"+codigo).val()){
                            $('#desc-status-'+codigo).html('Ativo');
                        }else{
                            $('#desc-status-'+codigo).html('Inativo');
                        }
                        
                        alerta('Atualização de status',res.msg,res.tipo);
                    },
                    error: function(res){                      
                       alerta('Atualização de status',res.msg,res.tipo); 
                    }          
                });

            };
            
            function relat_func(codigo){      
                $.ajax({
                    url : "<?php echo base_url();?>empresa/get_compras_func",
                    type: "POST",
                    dataType: "text",
                    data:{"codigo" : codigo}, 
                    cache:false,
                    success: function(res){
                        //alert(res.msg);
                        //console.log(res);
                        $("#modal-body-"+codigo).html(res);     
                    },
                    error: function(){                      
                        alerta('Problema de sessão','efetur o login novamente','error'); 
                    }          
                });

            }
            
        </script>
    <?php } ?>
  </body>
</html>