
<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">PAGAR</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>inicio">Inicio</a></li>
                    <li><a href="<?php echo base_url();?>facturacion">Facturas</a></li>
                    <li class="active">Realizar pagos</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box"> 
                    <h3 class="box-title">Pagar facturas</h3> <small>Ingrese numero de carnet de identidad para buscar...</small>
                    <?php if($this->session->flashdata("error")):?>
                        <div class="alert alert-danger">
                          <p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><?php echo $this->session->flashdata("error")?></p>
                        </div>
                    <?php endif; ?>
                    <!-- Form -->
                    <form action="<?php echo base_url();?>facturacion/searchfactura" method="POST" class="m-b-30 m-t-40">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="input-group <?php echo !empty(form_error("buscar"))? 'has-error' : ''?>">
                                    <input type="text" name="buscar" class="form-control js--animations" >
                                     <span class="input-group-btn">
                                        <button type="submit" value="pagar" class="btn btn-info js--triggerAnimation" name="pagar">Buscar</button>
                                    </span> 
                                </div>
                                <?php echo form_error("buscar", "<span class='help-block'>", "</span>");?>
                            </div>
                        </div>
                    </form>
                    <!-- / Form -->
                    
                    <?php if(!empty($medidor)):?>
                        <div class="row">
                          <div class="col-lg-12 col-md-12">
                              <div class="media m-b-30 p-t-20">
                                  <h4 class="font-bold m-t-0">Usuario: <?php echo $medidor->nombres; ?></h4>
                                  <h4 class="text-dark m-0"><b> C.I.: </b> <?php echo $medidor->ci; ?> </h4>
                                  <h4 class="text-dark m-0"><b> Nro medidor: </b> <?php echo $medidor->medidor; ?></h4>
                                  <h4 class="text-dark m-0"><b> Direccion: </b> <?php echo $medidor->direccion; ?></h4>
                              </div>
                              <hr>
                          </div>
                        </div>
                    <!--row -->
                    <table id="" class="table table-striped table-bordered dt-responsive nowrap display" style="width:100%">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Periodo</th>
                              <th>Fecha emision</th>
                              <th>Total</th>
                              <th>Opciones</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php if(!empty($facturas)):?>
                          <?php foreach ($facturas as $factura):?>
                          <tr>
                              <td><?php echo $factura->id;?></td>
                              <td><?php echo $factura->periodo;?></td>
                              <td><?php echo $factura->fecha_emision;?></td>
                              <td><?php echo $factura->total .' Bs';?></td>
                              <?php $datafactura = $factura->id."*".$factura->periodo."*".$factura->fecha_emision."*".$factura->total."*".$factura->l_anterior."*".$factura->l_actual."*".$factura->fecha_anterior."*".$factura->fecha_actual."*".$factura->importe."*".$medidor->nombres."*".$medidor->ci."*".$medidor->direccion."*".$medidor->regante."*".$medidor->medidor ;?>
                              <td>  
                                <div class="btn-group">
                                  <?php if($permisos->leer == 1):?>
                                  <button class="btn btn-info btn-print btn-view-factura" data-toggle="modal" data-target="#modal-default" value="<?php echo $datafactura ;?>"><span class="mdi mdi-cart-outline"></span> VER </button>
                                  <?php endif;?>
                                  <!-- <?php //if($permisos->modificar == 1):?> -->
                                  <a class="btn btn-primary btn-print" href="<?php echo base_url();?>facturacion/generarfactura/<?php echo $factura->id;?>/<?php echo $medidor->ci;?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Generar factura"><span class="mdi mdi-printer"></span> PAGAR </a>
                                  <!-- <?php //endif;?> -->
                                </div>
                              </td>
                          </tr>
                        <?php endforeach;?> 
                        <?php endif;?> 
                      </tbody>
                    </table>
                    <?php endif;?> 
                </div>
            </div>
        </div>
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->


        <!-- Large modal -->
        <div class="modal fade bd-example-modal-lg" id="modal-default">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
               
              <div class="modal-body">
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>