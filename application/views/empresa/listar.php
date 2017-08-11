<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3> <?php echo $titulo['titulo']?> <small><?php echo $titulo['descricao']?></small></h3>
      </div>
      
    </div>

    <div class="clearfix"></div>  
<!-- Dados -->  
    <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de Empresas</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                   <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Razão Social</th>
                        <th>CNPJ</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Ação</th>
                      </tr>
                    </thead>


                    <tbody>
                      <?php
                      //foreach($dados->result_array() as $dado) {

                          ?>

                        <tr>
                           <td><?php //echo $dado['CODIGO']?></td>
                           <td><?php //echo $dado['NOME']?></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td>
                               <div class="btn-group  btn-group-sm">
                                    <a href="#" class="btn btn-default" data-toggle="modal" data-target=".bs-modal-visualizar"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="btn btn-default" data-toggle="modal" data-target=".bs-modal-editar"><i class="fa fa-pencil"></i></a>
                                    <a href="#" class="btn btn-danger " data-toggle="modal" data-target=".bs-modal-excluir"><i class="fa fa-remove"></i></a>
                               </div>

                               <div class="modal fade bs-modal-visualizar" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                              </button>
                                              <h4 class="modal-title tile_info" id="myModalLabel2">Empresa XXXXX</h4>
                                            </div>
                                            <div class="modal-body">
                                                <h3>Dados Empresa</h3>
                                           </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                        </div>

                                      </div>
                                    </div>
                               </div>    

                               <div class="modal fade bs-modal-editar" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                              </button>
                                              <h4 class="modal-title tile_info" id="myModalLabel2">Editar Empresa XXXXX</h4>
                                            </div>
                                            <div class="modal-body">
                                                <h3>Folmulário</h3>
                                           </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                          <button type="button" class="btn btn-success">Salvar</button>
                                        </div>

                                      </div>
                                    </div>
                               </div>     
                               <div class="modal fade bs-modal-excluir" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-sm">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                  </button>
                                                  <h4 class="modal-title tile_info" id="myModalLabel2">Excluir Empresa</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <h3>Atenção!</h3>
                                                <h4>Voce deseja realmente<br/> excluir a empresa <br/>
                                               XXXXX</h4>
                                               </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                              <button type="button" class="btn btn-danger">Sim Excluir</button>
                                            </div>

                                          </div>
                                        </div>
                                    </div>
                                    </td>

                         </tr>
                         <?php
                     // }
                      ?>
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
        </div>


      

  </div>
</div>
<!-- /page content -->