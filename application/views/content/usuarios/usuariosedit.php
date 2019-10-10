<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">AFILIADO</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>inicio">Inicio</a></li>
                    <li><a href="<?php echo base_url();?>usuarios">Afiliados</a></li>
                    <li class="active">Editar afiliado</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">

                <!--row -->
                <div class="row">
                    <form action="<?php echo base_url();?>usuarios/update" method="POST">
                    <div class="col-md-6"> 
                        <div class="white-box form-horizontal">
                            <input type="hidden" name="usuarioId" value=" <?php echo $usuario->id ?> ">
                            <div class="form-group <?php echo !empty(form_error("nombres"))? 'has-error' : ''?>">
                                <label class="col-sm-3 control-label">Nombres *</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nombres" class="form-control" placeholder="Ingrese nombres" value="<?php echo !empty(form_error('nombres')) ? set_value("nombres") :  $usuario->nombres;?>">
                                    <?php echo form_error("nombres", "<span class='help-block'>", "</span>");?> 
                                </div>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("apellidos"))? 'has-error' : ''?>">
                                <label class="col-sm-3 control-label">Apellidos *</label>
                                <div class="col-sm-9">
                                    <input type="text" name="apellidos" class="form-control" placeholder="Ingrese apellidos" value="<?php echo !empty(form_error('apellidos'))? set_value("apellidos") :  $usuario->apellidos;?>"> 
                                    <?php echo form_error("apellidos", "<span class='help-block'>", "</span>");?> 
                                </div>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("provincia"))? 'has-error' : ''?>">
                                <label class="col-sm-3 control-label">Provincia *</label>
                                <div class="col-sm-9">
                                    <input type="text" name="provincia" class="form-control" placeholder="Ingrese direccion" value="<?php echo !empty(form_error('provincia'))? set_value("provincia") :  $usuario->provincia;?>"> 
                                    <?php echo form_error("provincia", "<span class='help-block'>", "</span>");?> 
                                </div>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("id_sectores"))? 'has-error' : ''?>">
                                <label class="col-sm-3 control-label">Sector *</label>
                                <div class="col-sm-9">
                                    <select name="id_sectores" class="form-control">
                                        <option>Seleccione sector</option>
                                        <?php foreach ($sectores as $sector):?>
                                            <option value="<?php echo $sector->id;?>" <?php echo $sector->id == $usuario->id_sectores ? "selected":""; ?>> <?php echo $sector->sector;?> </option>
                                        <?php endforeach;?>
                                    </select>
                                    <?php echo form_error("id_sectores", "<span class='help-block'>", "</span>");?>
                                </div>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("direccion"))? 'has-error' : ''?>">
                                <label class="col-sm-3 control-label">Direccion *</label>
                                <div class="col-sm-9">
                                    <input type="text" name="direccion" class="form-control" placeholder="Ingrese direccion" value="<?php echo !empty(form_error('direccion'))? set_value("direccion") :  $usuario->direccion;?>"> 
                                    <?php echo form_error("direccion", "<span class='help-block'>", "</span>");?> 
                                </div>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("telefono"))? 'has-error' : ''?>">
                                <label class="col-sm-3 control-label">Celular *</label>
                                <div class="col-sm-9">
                                    <input type="number" name="telefono" class="form-control" placeholder="Ingrese nro de celular" value="<?php echo !empty(form_error('telefono'))? set_value("telefono") :  $usuario->telefono;?>">
                                    <?php echo form_error("telefono", "<span class='help-block'>", "</span>");?>  
                                </div>
                            </div>
                   
                        </div>   
                    </div>
                    <div class="col-md-6">
                        <div class="white-box form-horizontal">
                            <div class="form-group <?php echo !empty(form_error("usuario"))? 'has-error' : ''?>">
                                <label class="col-sm-3 control-label">C.I.*</label>
                                <div class="col-sm-9" disabled="disabled">
                                    <input type="text" name="usuario" readonly class="form-control" placeholder="Ingrese ci" value="<?php echo !empty(form_error('usuario'))? set_value("usuario") :  $usuario->usuario;?>"> 
                                    <?php echo form_error("usuario", "<span class='help-block'>", "</span>");?> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" style="color: red;">¿Cambiar clave?</label>
                                <div class="col-md-9">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input type="radio" name="pass" value="1" onclick="siClave()"> Si </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="pass" value="0" checked="" onclick="noClave()"> No </label>
                                    </div>
                                </div>
                            </div>

                            <script type="text/javascript">
                                function siClave() {
                                    var x = document.getElementById("cambiar1").readOnly = false;
                                    var y = document.getElementById("cambiar2").readOnly = false;
                                }
                                function noClave() {
                                    var x = document.getElementById("cambiar1").readOnly = true;
                                    var y = document.getElementById("cambiar2").readOnly = true;
                                }
                            </script>


                            <div class="form-group <?php echo !empty(form_error("clave"))? 'has-error' : ''?>">
                                <label class="col-sm-3 control-label">Clave *</label>
                                <div class="col-sm-9">
                                    <input type="password" name="clave" id="cambiar1" readonly class="form-control" placeholder="Ingrese clave" value="<?php echo set_value("clave");?>"> 
                                    <?php echo form_error("clave", "<span class='help-block'>", "</span>");?> 
                                </div>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("rclave"))? 'has-error' : ''?>">
                                <label class="col-sm-3 control-label">Repetir clave *</label>
                                <div class="col-sm-9">
                                    <input type="password" name="rclave" id="cambiar2" readonly class="form-control" placeholder="Repetir clave" value="<?php echo set_value("rclave");?>"> 
                                    <?php echo form_error("rclave", "<span class='help-block'>", "</span>");?> 
                                </div>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("id_roles"))? 'has-error' : ''?>">
                                <label class="col-sm-3 control-label">Tipo de usuario *</label>
                                <div class="col-sm-9">
                                    <select name="id_roles" class="form-control">
                                        <option></option>
                                        <?php foreach ($roles as $rol):?>
                                            <option value="<?php echo $rol->id;?>" <?php echo $rol->id == $usuario->id_roles ? "selected":""; ?>><?php echo $rol->nombre;?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <?php echo form_error("id_roles", "<span class='help-block'>", "</span>");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">¿Es regante? *</label>
                                <div class="col-sm-9 radio radio-primary">
                                    <input type="radio" name="regante" value="1" <?php echo ($usuario->regante == 1) ? 'checked' : '' ;?>>
                                    <label> Si </label>
                                </div>
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-9 radio radio-primary">
                                    <input type="radio" name="regante" value="0" <?php echo ($usuario->regante == 0) ? 'checked' : '' ;?>>
                                    <label> No </label>
                                </div>
                            </div>
                            <div class="form-group m-b-0">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <a href="<?php echo base_url();?>usuarios" class="btn btn-inverse waves-effect waves-light">Cancelar</a>
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Registar</button>
                                    
                                </div>
                            </div>
                   
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
