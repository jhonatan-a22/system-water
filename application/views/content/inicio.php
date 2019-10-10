
<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title"></h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                <ol class="breadcrumb">
                    <li class="active">Inicio</li>
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

                              <h4 class="font-bold m-t-0">Usuario: <?php echo $this->session->userdata("nombres") .' '. $this->session->userdata("apellidos");?></h4>
                              <h4 class="text-dark m-0"><b> C.I.: </b> <?php echo $this->session->userdata("usuario");?></h4>
                              <?php if(!empty($medidor)):?> <h4 class="text-dark m-0"><b> Nro medidor: </b> <?php echo $medidor->medidor ?> <?php endif;?> </h4>
                              <h4 class="text-dark m-0"><b> Direccion: </b><?php echo $this->session->userdata("direccion");?></h4>
                              <hr>
    
                              <div class="media-body"> 
                                <span class="media-meta pull-right">
                                <span class="label label-rouded label-warning pull-right"> <?php echo $cantadeudo->cant ?> </span>
                                </span>
                                  <h4 class="text-danger m-0">Facturas adeudadas</h4> 
                                  <small class="text-muted"></small> 
                              </div>
                          </div>
                          <hr>
                      </div>
                  </div>

                  <h3 class="box-title">Mis facturas</h3> 
                  <!--row -->
                <table id="" class="table table-striped table-bordered dt-responsive nowrap display" style="width:100%">
                  <thead>
                      <tr>
                          <th>Nro factura</th>
                          <th>Fecha anterior</th>
                          <th>Lectura anterior</th>
                          <th>Fecha actual</th>
                          <th>Lectura actual</th>
                          <th>Periodo</th>
                          <th>Consumo</th>
                          <th>Total</th>
                          <th>Estado</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($facturas)):?>
                      <?php foreach ($facturas as $fac):?>
                      <tr>
                          <td><?php echo $fac->id;?></td>
                          <td><?php echo $fac->fecha_anterior;?></td>
                          <td><?php echo $fac->l_anterior;?></td>
                          <td><?php echo $fac->fecha_actual;?></td>
                          <td><?php echo $fac->l_actual;?></td>
                          <td><?php echo $fac->periodo;?></td>
                          <td><?php echo ($fac->l_actual - $fac->l_anterior);?></td>
                          <td><?php echo $fac->total .' Bs';?></td>
                          <td> 
                          <?php if ($fac->status == 1) { ?> 
                            <div class="btn-group">
                              <a href="" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Pagado"><i class="mdi mdi-cash-multiple"></i> Pagado </a>
                            </div>
                          <?php } else { ?> 
                            <div class="btn-group">
                              <button class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="bottom" title="Adeudado"><i class="mdi mdi-cart-off"></i> Adeudo </button>
                            </div>
                          <?php } ?> 
                          </td>
                      </tr>
                    <?php endforeach;?> 
                    <?php endif;?> 
                  </tbody>
                </table>
                </div>



            </div>
        </div>
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
