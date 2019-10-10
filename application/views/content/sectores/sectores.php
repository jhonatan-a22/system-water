<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">SECTORES</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>inicio">Inicio</a></li>
                    <li class="active">Lista de Sectores</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <!--row -->
                <div class="row">
                    <div class="col-lg-12">
                        <?php if($this->session->flashdata("success")):?>
                          <div class="alert alert-success">
                              <p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><?php echo $this->session->flashdata("success")?></p>
                          </div>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="row">
                              <?php if($permisos->agregar == 1):?>
                                <div class="col-lg-2 col-sm-4" style="float: right;">
                                    <a href="<?php echo base_url();?>sectores/add" 
                                        class="btn btn-block btn-outline btn-info">
                                        <i class="mdi mdi-satellite-variant"></i> Nuevo sector
                                  </a>
                                </div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
                <!--row -->
                <table id="" class="table table-striped table-bordered dt-responsive nowrap display" style="width:100%">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Nombre</th>
                          <th>Opciones</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($sectores)):?>
                      <?php foreach ($sectores as $sector):?>
                      <tr>
                          <td><?php echo $sector->id;?></td>
                          <td><?php echo $sector->sector;?></td>
                          <td>  
                            <div class="btn-group">
                              <?php if($permisos->modificar == 1):?>
                              <a href="<?php echo base_url();?>sectores/edit/<?php echo $sector->id;?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="mdi mdi-lead-pencil"></i> Editar </a>
                              <?php endif;?>
                              <?php if($permisos->eliminar == 1):?>
                              <a href="<?php echo base_url();?>sectores/delete/<?php echo $sector->id;?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="mdi mdi-delete-forever"></i> Eliminar </a>
                              <?php endif;?>
                            </div>
                          </td>
                      </tr>
                    <?php endforeach;?> 
                    <?php endif;?> 
                  </tbody>
                </table>
            </div>
        </div>
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
