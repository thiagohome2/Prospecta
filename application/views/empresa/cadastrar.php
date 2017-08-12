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
                    <h2>Formulário de Cadastro <small>Preencha corretamente todos os campos</small></h2>
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
                    <?php// echo form_open('form'); ?>  
                    <form id="demo-form2" data-parsley-validate action="<?php echo base_url('empresa/adicionar');?>" method="POST"  class="form-horizontal form-label-left">
                            
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cnpj">CNPJ <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="cnpj" data-inputmask="'mask' : '99.999.999/9999-99'"  name="cnpj" required="required" value="<?php echo set_value('cnpj'); ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="razao-social" >Razão Social <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="razao_social" name="razao_social" required="required" value="<?php echo set_value('razao_social'); ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="nome_fantasia" class="control-label col-md-3 col-sm-3 col-xs-12">Nome Fantasia <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nome_fantasia" class="form-control col-md-7 col-xs-12" type="text" name="nome_fantasia" required="required" value="<?php echo set_value('nome_fantasia'); ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="telefone" class="control-label col-md-3 col-sm-3 col-xs-12">Telefone <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="telefone" class="form-control col-md-7 col-xs-12" type="text" name="telefone" data-inputmask="'mask' : '(99) 99999-9999'" required="required" value="<?php echo set_value('telefone'); ?>" >
                        </div>
                      </div>
                        <div class="form-group">
                        <label for="telefone" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="email" class="form-control col-md-7 col-xs-12" type="email" name="email" required="required" value="<?php echo set_value('email'); ?>" >
                        </div>
                      </div>
                     <div class="form-group">
                        <label for="site" class="control-label col-md-3 col-sm-3 col-xs-12">Site</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site" class="form-control col-md-7 col-xs-12" type="url" placeholder="www.seusite.com" name="site" value="<?php echo set_value('site'); ?>">
                        </div>
                      </div>
                        
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
			  <button class="btn btn-danger" type="reset">Limpar</button>
                          <button type="submit" class="btn btn-success">Enviar</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
        </div>
  </div>
</div>
<!-- /page content -->