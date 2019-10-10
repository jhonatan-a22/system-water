<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title"> AFILIADO </h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>inicio">Inicio</a></li>
                    <li class="active">Editar mis datos</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">

                <!--row -->
                <div class="row">
                    <form action="<?php echo base_url();?>usuarios/register" method="POST">
                    <div class="col-md-6"> 
                        <div class="white-box form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nombres *</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nombres" readonly class="form-control" value="<?php echo $usuario->nombres;?>">   
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Apellidos *</label>
                                <div class="col-sm-9">
                                    <input type="text" name="apellidos" readonly class="form-control" value="<?php echo $usuario->apellidos;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Provincia *</label>
                                <div class="col-sm-9">
                                    <input type="text" name="provincia" class="form-control" value="<?php echo $usuario->provincia;?>"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Sector *</label>
                                <div class="col-sm-9">
                                    <input type="text" name="provincia" class="form-control" value="<?php echo $usuario->sector;?>"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Direccion *</label>
                                <div class="col-sm-9">
                                    <input type="text" name="direccion" class="form-control" value="<?php echo $usuario->direccion;?>"> 
                                </div>
                            </div>
                        </div>   
                    </div>
                    <div class="col-md-6">
                        <div class="white-box form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Celular *</label>
                                <div class="col-sm-9">
                                    <input type="number" name="telefono" class="form-control" value="<?php echo $usuario->telefono;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">C.I.*</label>
                                <div class="col-sm-9">
                                    <input type="text" name="usuario" readonly class="form-control" value="<?php echo $usuario->usuario;?>"> 
                                </div>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("id_roles"))? 'has-error' : ''?>">
                                <label class="col-sm-3 control-label">Tipo de usuario *</label>
                                <div class="col-sm-9">
                                    <input type="text" name="usuario" readonly class="form-control" value="<?php echo$usuario->rol;?>"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">¿Es regante? *</label>
                                <div class="col-sm-9 radio radio-primary">
                                    <input type="radio" name="regante" value="1" disabled
                                    <?php echo($usuario->regante == 1) ? 'checked' : '' ?> >
                                    <label> Si </label>
                                </div>
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-9 radio radio-primary">
                                    <input type="radio" name="regante" value="0" disabled
                                    <?php echo($usuario->regante == 0) ? 'checked': ''; ?> >
                                    <label> No </label>
                                </div>
                            </div>
                            <input type="hidden" name="id" value=" <?php echo $usuario->id ?> ">
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
