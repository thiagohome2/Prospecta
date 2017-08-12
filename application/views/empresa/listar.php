<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3> <?php echo $titulo['titulo']?> <small><?php echo $titulo['descricao']?></small></h3>
      </div>
      <div id="msgjs"></div>
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
                        <th>Telefone</th>
                        <th>Email</th>
                       
                        <th>Ação</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                    if (!empty ($dados)){ 
                      foreach($dados->result_array() as $dado) {

                          ?>

                        <tr>
                           <td><?php echo substr($dado['nome_fantasia'], 0, 20)?></td>
                           <td><?php echo substr($dado['razao_social'], 0, 40)?></td>
                           <td><?php echo substr($dado['cnpj'], 0, 15)?></td>
                           <td><?php echo substr($dado['telefone'], 0, 15)?></td>
                           <td><?php echo substr($dado['email'], 0, 25)?></td>
                          
                           <td>
                               <div class="btn-group  btn-group-sm">
                                   <a href="#" class="btn btn-default" data-toggle="modal" data-target=".bs-modal-visualizar-<?php echo $dado['id']?>"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="btn btn-default" data-toggle="modal" data-target=".bs-modal-editar-<?php echo $dado['id']?>"><i class="fa fa-pencil"></i></a>
                                    <a href="#" class="btn btn-danger " data-toggle="modal" data-target=".bs-modal-excluir-<?php echo $dado['id']?>"><i class="fa fa-remove"></i></a>
                               </div>

                               <div class="modal fade bs-modal-visualizar-<?php echo $dado['id']?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                              </button>
                                              <h4 class="modal-title tile_info" id="ModalLabel-visualizar-<?php echo $dado['id']?>">Visualizar Empresa</h4>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Dados Empresa</h5>
                                                <p><strong>CNPJ:</strong> <?php echo $dado['cnpj']?></p>
                                                <p><strong>Razão Social:</strong> <?php echo $dado['razao_social']?></p>
                                                <p><strong>Nome Fantasia:</strong> <?php echo $dado['nome_fantasia']?></p>
                                                <p><strong>Telefone:</strong> <?php echo $dado['telefone']?></p>
                                                <p><strong>Email:</strong> <?php echo $dado['email']?></p>
                                                <p><strong>Site:</strong> <?php echo $dado['site']?></p>
                                                
                                           </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                        </div>

                                      </div>
                                    </div>
                               </div>    

                               <div class="modal fade bs-modal-editar-<?php echo $dado['id']?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                              </button>
                                              <h4 class="modal-title tile_info" id="ModalLabel-editar-<?php echo $dado['id']?>">Editar Empresa <?php echo $dado['nome_fantasia']?></h4>
                                            </div>
                                          <div class="modal-body">
                                                <h3>Folmulário</h3>
                                                
                                                 <input id="telefone" class="form-control col-md-7 col-xs-12" type="text" name="telefone" data-inputmask="'mask' : '(99) 99999-9999'" required="required" ><br/>
                                                        
                                                 <input id="email" class="form-control col-md-7 col-xs-12" type="email" name="email" required="required" ><br/>
                                                      
                                                 <input id="site" class="form-control col-md-7 col-xs-12" type="url" placeholder="www.seusite.com" name="site"><br/>
                                                        
                        
                                           </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                          <button type="button" class="btn btn-success">Salvar</button>
                                        </div>
                                      </div>
                                    </div>
                               </div>     
                               <div class="modal fade bs-modal-excluir-<?php echo $dado['id']?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-sm">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                  </button>
                                                  <h2 class="modal-title tile_info" id="">Excluir Empresa</h2>
                                                </div>
                                                <div class="modal-body">
                                                    <h3>Atenção!</h3>
                                                <h4>Voce deseja realmente<br/> excluir a empresa <br/>
                                               <?php echo $dado['nome_fantasia']?></h4>
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
                        }
                      }   
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