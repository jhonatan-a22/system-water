
<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">PRECIOS</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>inicio">Inicio</a></li>
                    <li class="active">Precios</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box"> 
                  <div class="row">
                      <div class="col-lg-12 col-md-12">
                          <div class="media m-b-30 p-t-20">
                            <?php if($this->session->flashdata("success")):?>
                                <div class="alert alert-success">
                                    <p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><?php echo $this->session->flashdata("success")?></p>
                                </div>
                            <?php endif; ?>

                            <form action="<?php echo base_url();?>facturacion/registerp" method="POST">
                            <div class="col-md-7"> 
                                <div class="white-box form-horizontal">
                                    <div class="form-group <?php echo !empty(form_error("costoafiliado"))? 'has-error' : ''?>">
                                        <label class="col-sm-3 control-label">Nuevo precio [m3] *</label>
                                        <div class="col-sm-9">
                                            <input type="decimal" name="costoafiliado" class="form-control" placeholder="Ingrese nuevo precio" value="<?php echo set_value("costoafiliado");?>">
                                            <?php echo form_error("costoafiliado", "<span class='help-block'>", "</span>");?> 
                                        </div>
                                    </div>
                                </div>   
                            </div>
                            <div class="col-md-5" style="text-align: center;"> 
                                <div class="white-box form-horizontal">
                                    <span class="media-meta pull-right"> <?php if(!empty($precios)):?> <?php echo $precios->costoafiliado . ' Bs'?> <?php endif;?> </span>
                                <h4 class="text-danger m-0">Precio actual [m3]</h4> <small class="text-muted"></small>
                                </div>   
                            </div>
                            
                            <div class="col-md-7"> 
                                <div class="white-box form-horizontal">
                                    <div class="form-group <?php echo !empty(form_error("costoregante"))? 'has-error' : ''?>">
                                        <label class="col-sm-3 control-label">Nuevo precio [hr] *</label>
                                        <div class="col-sm-9">
                                            <input type="decimal" name="costoregante" class="form-control" placeholder="Ingrese nuevo precio para regantes" value="<?php echo set_value("costoregante");?>">
                                            <?php echo form_error("costoregante", "<span class='help-block'>", "</span>");?> 
                                        </div>
                                    </div>
                                </div>   
                            </div>
                            
                            
                            <div class="col-md-5" style="text-align: center;"> 
                                <div class="white-box form-horizontal">
                                    <span class="media-meta pull-right"> <?php if(!empty($precios)):?> <?php echo $precios->costoregante . ' Bs'?> <?php endif;?> </span>
                                <h4 class="text-danger m-0">Precio actual regantes [hr]</h4> <small class="text-muted"></small>
                                </div>   
                            </div>
                           

                            <div class="form-group m-b-0">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <a href="<?php echo base_url();?>inicio" class="btn btn-inverse waves-effect waves-light">Atras</a>
                                    <?php if($permisos->modificar == 1):?>
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Registar</button>
                                    <?php endif;?>
                                </div>
                            </div>
                            </form>
                          </div>
                          <hr>
                      </div>
                  </div>
                </div>
            </div>
        </div>
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
