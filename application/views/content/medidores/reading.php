<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">MEDIDORES</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Inicio</a></li>
                    <li><a href="javascript:void(0)">Medidores</a></li>
                    <li class="active">Registrar lectura</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">

                <!--row -->
                <div class="row">
                    <?php if($this->session->flashdata("error")):?>
                        <div class="alert alert-danger">
                            <p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><?php echo $this->session->flashdata("error")?></p>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-7">
                        <div class="white-box form-horizontal">
                            <form action="<?php echo base_url();?>medidores/readingadd" method="POST">
                            <input type="hidden" name="id_medidor" class="form-control" value="<?php echo $medidor->id;?>"> 
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Medidor</label>
                                <div class="col-sm-9" disabled="disabled">
                                    <input type="number" name="medidor" readonly class="form-control" value="<?php echo $medidor->medidor;?>"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Afiliado</label>
                                <div class="col-sm-9" disabled="disabled">
                                    <input type="text" name="id_usuarios" readonly class="form-control" value="<?php echo $medidor->nombres;?>"> 
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">Lectura anterior</label>
                                <div class="col-sm-9" disabled="disabled">
                                    <input type="number" name="lectura_anterior" readonly class="form-control" value="<?php echo (!$lectura) ? $medidor->lectura : $lectura->lectura_actual ?>"> 
                                </div>    
                            </div>
                            <div class="form-group <?php echo !empty(form_error("lectura_actual"))? 'has-error' : ''?>">
                                <label class="col-sm-3 control-label">Lectura actual *</label>
                                <div class="col-sm-9">
                                    <input type="number" name="lectura_actual" class="form-control" placeholder="Ingrese lectura actual" value="<?php echo set_value("lectura_actual");?>"> 
                                    <?php echo form_error("lectura_actual", "<span class='help-block'>", "</span>");?>
                                </div>    
                            </div>
                            <div class="form-group <?php echo !empty(form_error("observacion"))? 'has-error' : ''?>">
                                <label class="col-sm-3 control-label">Observacion </label>
                                <div class="col-sm-9">
                                    <textarea name="observacion" class="form-control"><?php echo set_value("observacion");?>
                                    </textarea> 
                                    <?php echo form_error("observacion", "<span class='help-block'>", "</span>");?>
                                </div>    
                            </div>
                            <input type="hidden" name="id_usuarios" value="<?php echo $medidor->uid;?>">
                            <input type="hidden" name="fecha_anterior" value="<?php echo (!$lectura) ? $medidor->fecha : $lectura->fecha_actual; ?>">
                            <input type="hidden" name="precioafiliado" value="<?php echo $precios->costoafiliado;?>">
                            <input type="hidden" name="precioregante" value="<?php echo $precios->costoregante;?>">
                            <div class="form-group m-b-0">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Registar</button>                                 
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->

