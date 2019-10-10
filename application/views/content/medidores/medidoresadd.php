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
                    <li><a href="<?php echo base_url();?>inicio">Inicio</a></li>
                    <li><a href="<?php echo base_url();?>medidores">Medidores</a></li>
                    <li class="active">Nuevo medidor</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">

                <!--row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="white-box form-horizontal">
                            <form action="<?php echo base_url();?>medidores/register" method="POST">
                            <div class="form-group <?php echo !empty(form_error("medidor"))? 'has-error' : ''?>">
                                <label class="col-sm-3 control-label">Medidor *</label>
                                <div class="col-sm-9">
                                    <input type="number" name="medidor" class="form-control" placeholder="Ingrese nro de medidor" value="<?php echo set_value("medidor");?>"> 
                                    <?php echo form_error("medidor", "<span class='help-block'>", "</span>");?>
                                </div>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("id_usuarios"))? 'has-error' : ''?>">
                                <label class="col-sm-3 control-label">Afiliado *</label>
                                <div class="col-sm-9">
                                    <select name="id_usuarios" class="form-control">
                                        <option></option>
                                        <?php foreach ($usuarios as $usuario):?>
                                            <option value="<?php echo $usuario->id;?>"<?php echo $usuario->id==set_value("id_usuarios")? "selected":"";?>><?php echo $usuario->nombres .' '. $usuario->apellidos;?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <?php echo form_error("id_usuarios", "<span class='help-block'>", "</span>");?>
                                </div>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("lectura"))? 'has-error' : ''?>">
                                <label class="col-sm-3 control-label">Lectura*</label>
                                <div class="col-sm-9">
                                    <input type="number" name="lectura" class="form-control" placeholder="Ingrese lectura" value="<?php echo set_value("lectura");?>"> 
                                    <?php echo form_error("lectura", "<span class='help-block'>", "</span>");?>
                                </div>    
                            </div>
                            <div class="form-group <?php echo !empty(form_error("estado"))? 'has-error' : ''?>">
                                <label class="col-sm-3 control-label">Estado </label>
                                <div class="col-sm-9">
                                    <textarea name="estado" class="form-control"><?php echo set_value("estado");?>
                                    </textarea> 
                                    <?php echo form_error("estado", "<span class='help-block'>", "</span>");?>
                                </div>    
                            </div>
                            <div class="form-group m-b-0">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <a href="<?php echo base_url();?>medidores" class="btn btn-inverse waves-effect waves-light">Cancelar</a>
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
