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
                   <?php if($alerta != null){?>
                    <div class="alert alert-<?php echo $alerta['class'];?> fade in alert-dismissable">
                         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <?php echo $alerta['mansagem'];?>
                  </div>
                  <?php }?>
                  
                   <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>CNPJ</th>
                        <th>Razão Social</th>
                        <th>Nome Fantasia</th>                        
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
                           <td><?php echo substr($dado['cnpj'], 0, 15)?></td>
                           <td><?php echo substr($dado['razao_social'], 0, 40)?></td>
                           <td><?php echo substr($dado['nome_fantasia'], 0, 20)?></td>
                           <td><?php echo substr($dado['telefone'], 0, 15)?></td>
                           <td><?php echo substr($dado['email'], 0, 25)?></td>
                          
                           <td>
                               <div class="btn-group  btn-group-sm">
                                   <a href="#" class="btn btn-default" data-toggle="modal" data-target=".bs-modal-visualizar-<?php echo $dado['id']?>"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="btn btn-default" data-toggle="modal" data-target=".bs-modal-editar-<?php echo $dado['id']?>"><i class="fa fa-pencil"></i></a>
                                    <a href="#" class="btn btn-danger " data-toggle="modal" data-target=".bs-modal-excluir-<?php echo $dado['id']?>"><i class="fa fa-remove"></i></a>
                               </div>

                               <div class="modal fade bs-modal-visualizar-<?php echo $dado['id']?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
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
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                            
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                              </button>
                                              <h4 class="modal-title tile_info" id="ModalLabel-editar-<?php echo $dado['id']?>">Editar Empresa <?php echo $dado['nome_fantasia']?></h4>
                                            </div>
                                          <div class="modal-body">
                                                <div id="msgjs-alterar-<?php echo $dado['id']?>"></div>
                                                <form id="form-alterar-<?php echo $dado['id']?>"  data-parsley-validate="">  
                                                <div class="row">
                                                <div class="col-sm-9"> 
                                                    <div class="row">
                                                        <div class="col-xs-4 col-sm-12">
                                                            <label for="editar-cnpj-<?php echo $dado['id']?>" >CNPJ:</label>
                                                        </div>
                                                        <div class="col-xs-8 col-sm-12">
                                                            <input type="text" name="editar-cnpj-<?php echo $dado['id']?>" class="form-control" readonly="readonly" value="<?php echo $dado['cnpj']?>"  id="editar-cnpj-<?php echo $dado['id']?>">
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <div class="row">
                                                        <div class="col-xs-4 col-sm-12">
                                                            <label for="editar-razao-social-<?php echo $dado['id']?>" >Razão Social: <span class="required">*</span></label>
                                                        </div>
                                                        <div class="col-xs-8 col-sm-12">
                                                            <input type="text" name="editar-razao-social-<?php echo $dado['id']?>" class="form-control" value="<?php echo $dado['razao_social']?>" required="required"  id="editar-razao-social-<?php echo $dado['id']?>">
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <div class="row">
                                                        <div class="col-xs-4 col-sm-12">
                                                            <label for="editar-nome-fantasia-<?php echo $dado['id']?>" >Nome Fantasia: <span class="required">*</span></label>
                                                        </div>
                                                        <div class="col-xs-8 col-sm-12">
                                                            <input type="text" name="editar-nome-fantasia-<?php echo $dado['id']?>" class="form-control" value="<?php echo $dado['nome_fantasia']?>" required="required"  id="editar-nome-fantasia-<?php echo $dado['id']?>">
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <div class="row">
                                                        <div class="col-xs-4 col-sm-12">
                                                            <label for="editar-telefone-<?php echo $dado['id']?>" >Telefone: <span class="required">*</span></label>
                                                        </div>
                                                        <div class="col-xs-8 col-sm-12">
                                                            <input type="text" name="editar-telefone-<?php echo $dado['id']?>" class="form-control" value="<?php echo $dado['telefone']?>" data-inputmask="'mask' : '(99) 99999-9999'"  id="editar-telefone-<?php echo $dado['id']?>">
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <div class="row">
                                                        <div class="col-xs-4 col-sm-12">
                                                            <label for="editar-email-<?php echo $dado['id']?>" >Email: <span class="required">*</span></label>
                                                        </div>
                                                        <div class="col-xs-8 col-sm-12">
                                                        <input type="email" name="editar-email-<?php echo $dado['id']?>" value="<?php echo $dado['email']?>" class="form-control" id="editar-email-<?php echo $dado['id']?>">
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <div class="row">
                                                        <div class="col-xs-4 col-sm-12">
                                                            <label for="editar-site-<?php echo $dado['id']?>" >Site:</label>
                                                        </div>
                                                        <div class="col-xs-8 col-sm-12">    
                                                            <input type="url" name="editar-site-<?php echo $dado['id']?>"  value="<?php echo $dado['site']?>" class="form-control" id="editar-site-<?php echo $dado['id']?>">
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>  
                                                   
                                               </form>
                                                
                                           </div>
                                        <div class="modal-footer">
                                            <button type="button" onclick="fechar_modal()" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                            <button type="button" onclick="alterar_empresa(<?php echo $dado['id']?>)" class="btn btn-success">Salvar</button>
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
                                                    <div id="msgjs-excluir-<?php echo $dado['id']?>"></div>
                                                    <h3>Atenção!</h3>
                                                    <h4>Voce deseja realmente<br/> excluir a empresa </h4>
                                                    <h2><?php echo $dado['nome_fantasia']?></h2>
                                               </div>
                                            <div class="modal-footer">
                                              <button type="button" onclick="setTimeout(location.reload.bind(location), 500);"  class="btn btn-default" data-dismiss="modal">Fechar</button>
                                              <button type="button" onclick="excluir_empresa(<?php echo $dado['id']?>)" class="btn btn-danger">Sim Excluir</button>
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