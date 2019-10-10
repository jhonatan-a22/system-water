<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title"> SECTORES </h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>inicio">Inicio</a></li>
                    <li><a href="<?php echo base_url();?>sectores">Sectores</a></li>
                    <li class="active">Editar sector</li>
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
                            <form action="<?php echo base_url();?>sectores/update" method="POST">
                                <input type="hidden" name="sectorId" value=" <?php echo $sector->id; ?> ">
                            <div class="form-group <?php echo !empty(form_error("sector"))? 'has-error' : ''?>">
                                <label class="col-sm-3 control-label">Sector *</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="sector" placeholder="Ingrese sector" value="<?php echo $sector->sector;?>">
                                    <?php echo form_error("sector", "<span class='help-block'>", "</span>");?> 
                                </div>
                            </div>
                            <div class="form-group m-b-0">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <a href="<?php echo base_url();?>sectores" class="btn btn-inverse waves-effect waves-light">Cancelar</a>
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
