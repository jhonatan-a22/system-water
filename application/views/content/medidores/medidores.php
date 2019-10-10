<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title"> MEDIDORES</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>inicio">Inicio</a></li>
                    <li class="active">Medidores</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="white-box">
                    <!--row -->
                <div class="row">
                  <?php if($this->session->flashdata("success")):?>
                        <div class="alert alert-success">
                            <p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><?php echo $this->session->flashdata("success")?></p>
                        </div>
                    <?php endif; ?>
                    <div class="col-lg-12">
                        <div class="white-box">
                            <div class="row">
                              <?php if($permisos->agregar == 1):?>
                                <div class="col-lg-2 col-sm-4" style="float: right;">
                                    <a href="<?php echo base_url();?>medidores/add" 
                                        class="btn btn-block btn-outline btn-info">
                                        <i class="mdi mdi-account-plus"></i> Nuevo medidor
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
                          <th>Medidor</th>
                          <th>Afiliado</th>
                          <th>Lectura inicial</th>
                          <th>Estado</th>
                          <th>Registar lectura</th>
                          <?php if($permisos->eliminar == 1):?>
                          <th>Opciones</th>
                          <?php endif;?>
                      </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($medidores)):?>
                      <?php foreach ($medidores as $medidor):?>
                      <tr>
                          <td><?php echo $medidor->id;?></td>
                          <td><?php echo $medidor->medidor;?></td>
                          <td><?php echo $medidor->nombres;?></td>
                          <td><?php echo $medidor->lectura;?></td>
                          <td><?php echo $medidor->estado;?></td>
                          <td>
                            <div class="btn-group">
                              <?php if($permisos->modificar == 1):?>
                              <a href="<?php echo base_url();?>medidores/reading/<?php echo $medidor->id;?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Registrar"><i class="mdi mdi-eye"></i> Registrar lectura </a>
                              <?php endif;?>
                            </div>
                          </td>
                          <?php if($permisos->eliminar == 1):?>
                          <td>  
                            <div class="btn-group">
                              <a href="<?php echo base_url();?>medidores/edit/<?php echo $medidor->id;?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="mdi mdi-lead-pencil"></i> Editar </a>
                            </div>
                          </td>
                          <?php endif;?>
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
