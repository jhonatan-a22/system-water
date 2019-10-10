        <!-- ============================================================== -->
        <!-- Page footer -->
        <!-- ============================================================== -->
        
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> <strong>Copyright &copy; 2019 </strong> Todos los derechos reservados - <b> Version</b> 1.00.0(Beta)</footer> 
        </div>
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="<?php echo base_url();?>vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>vendors/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?php echo base_url();?>vendors/theme/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url();?>vendors/theme/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>vendors/theme/js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="<?php echo base_url();?>vendors/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- Datatable responsive -->
    <script src="<?php echo base_url();?>vendors/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>vendors/datatable/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url();?>vendors/datatable/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url();?>vendors/datatable/js/responsive.bootstrap4.min.js"></script>
    <!-- Datatables  inicio-->
    <script type="text/javascript">
        $(document).ready(function() {
            $('table.display').DataTable({
                "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "No existen datos",
                "sInfo":           "Mostrando _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
            });
        } );
    </script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('table.display').DataTable();
      } );
    </script>



    <script type="text/javascript">
        $(".btn-view-factura").on("click", function(){
            var factura = $(this).val(); 
            var infofactura = factura.split("*");
            var consumo = (infofactura[5]-infofactura[4]);

            html = "<div class='row'>"
            html +=        "<div class='col-md-12'>"
            html +=            "<div class='white-box printableArea'>"
            html +=                "<h3><b>FACTURA DE PAGO </b> <span class='pull-right'></span></h3>"
            html +=                "<hr>"
            html +=                "<div class='row'>"
            html +=                    "<div class='col-md-12'>"
            html +=                        "<div class='pull-left'>"
            html +=                            "<address>"
            html +=                                "<h3><b class='text-danger'>C.I.: </b>" + infofactura[10] + "</h3>"
            html +=                                "<h3>NOMBRE: " + infofactura[9] + "</h3>"
            html +=                                "<p class=''>"
            html +=                                    "<b>DIRECCION:</b> " + infofactura[11] + " <br>"
            html +=                                    "<b>LECTURA ANTERIOR:</b> " + infofactura[4] + " &nbsp;&nbsp; <b>FECHA: </b> <i class='fa fa-calendar'></i> " + infofactura[6] + " <br>"
            html +=                                   "<b>LECTURA ACTUAL:</b> " + infofactura[5] + " &nbsp;&nbsp; <b>FECHA: </b> <i class='fa fa-calendar'></i> " + infofactura[7] + "" 
            html +=                                "</p>"
            html +=                            "</address>"
            html +=                        "</div>"
            html +=                        "<div class='pull-right text-right'>"
            html +=                            "<address>"
            html +=                                "<h3>NRO MEDIDOR: " + infofactura[13] + "</h3>"
            html +=                                "<p class='m-t'><b>FECHA EMISION:</b> <i class='fa fa-calendar'></i> " + infofactura[2] + "</p>"
            html +=                                "<p class='m-t'><b>PEDIODO:</b> " + infofactura[1] + "</p>"
            html +=                                "<p class='m-t'><b>CONSUMO:</b> " + consumo + " M3</p>"
            html +=                            "</address>"
            html +=                        "</div>"
            html +=                    "</div>"
            html +=                    "<div class='col-md-12'>"
            html +=                        "<div class='table-responsive m-t-40' style='clear: both;'>"
            html +=                            "<table class='table table-hover'>"
            html +=                                "<thead>"
            html +=                                    "<tr>"
            html +=                                        "<th class='text-center'>#</th>"
            html +=                                        "<th>Concepto</th>"
            html +=                                       "<th class='text-right'>Consumo</th>"
            html +=                                        "<th class='text-right'>Total</th>"
            html +=                                    "</tr>"
            html +=                                "</thead>"
            html +=                                "<tbody>"
            html +=                                    "<tr>"
            html +=                                        "<td class='text-center'>1</td>"
            html +=                                        "<td>Consumo de agua</td>"
            html +=                                        "<td class='text-right'>" + consumo + " m3</td>"
            html +=                                        "<td class='text-right'> " + infofactura[8] + "</td>"
            html +=                                    "</tr>"
                                                if (infofactura[12] == 1) {
            html +=                                    "<tr>"
            html +=                                        "<td class='text-center'>2</td>"
            html +=                                        "<td>Consumo de agua para riego</td>"
            html +=                                        "<td class='text-right'> 1 Hr </td>"
            html +=                                        "<td class='text-right'> 10 </td>"
            html +=                                    "</tr>"
                                                }
            html +=                                "</tbody>"
            html +=                            "</table>"
            html +=                        "</div>"
            html +=                    "</div>"
            html +=                    "<div class='col-md-12'>"
            html +=                        "<div class='pull-right m-t text-right'>"
            html +=                            "<hr>"
            html +=                            "<h3><b>Total :</b> " + infofactura[3] + " Bs</h3> </div>"
            html +=                        "<div class='clearfix'></div>"
            html +=                    "</div>"
            html +=                "</div>"
            html +=            "</div>"
            html +=        "</div>"
            html +=    "</div>"




            $("#modal-default .modal-body").html(html);
        });
    </script>

</body>

</html>
