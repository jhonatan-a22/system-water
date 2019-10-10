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
                    <li class="active">Facturacion</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                <!--row -->
                <table id="" class="table table-striped table-bordered dt-responsive nowrap display" style="width:100%">
                  <thead>
                      <tr>
                          <th>Nro factura</th>
                          <th>Medidor</th>
                          <th>Afiliado</th>
                          <th>Lectura anterior</th>
                          <th>Lectura actual</th>
                          <th>Periodo</th>
                          <th>Total</th>
                          <th>Estado</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($facturacion)):?>
                      <?php foreach ($facturacion as $factura):?>
                      <tr>
                          <td><?php echo $factura->id;?></td>
                          <td><?php echo $factura->medidor;?></td>
                          <td><?php echo $factura->nombres;?></td>
                          <td><?php echo $factura->l_anterior;?></td>
                          <td><?php echo $factura->l_actual;?></td>
                          <td><?php echo $factura->periodo;?></td>
                          <td><?php echo $factura->total .' Bs';?></td>
                          <td>  
                            <?php if ($factura->status == 1) { ?>
                                <div class="btn-group">
                                  <a href="" class="btn btn-success btn-sm"><i class="mdi mdi-cash-usd"></i> Pagado </a>
                                </div>
                            <?php } else { ?>
                                <div class="btn-group">
                                  <a href="" class="btn btn-warning btn-sm"><i class="mdi mdi-cash-usd"></i> Adeudado </a>
                                </div>
                            <?php  } ?>
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
