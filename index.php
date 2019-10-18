<?php

include "controlador.php";

?>

<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Registro empleado</title>
		<link rel="stylesheet" href="css/estilos.css">

      <!--=====================================
    PLUGINS DE CSS
    ======================================-->

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    
    <!-- AdminLTE Skins -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

     <!-- DataTables -->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/iCheck/all.css">

    <!-- Daterange Picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">

    <!-- Morris chart css -->
    <link rel="stylesheet" href="bower_components/morris.js/morris.css">

    <!--=====================================
    PLUGINS DE JAVASCRIPT
    ======================================-->

    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- FastClick -->
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    <!-- DataTables -->
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

    <!-- SweetAlert 2 -->
    <script src="plugins/sweetalert2/sweetalert2.all.js"></script>
    <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

    <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js"></script>

    <!-- InputMask -->
    <script src="plugins/input-mask/jquery.inputmask.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>

    <!-- JQUERY NUMBER -->
    <script src="plugins/jqueryNumber/jquerynumber.min.js"></script>

    <!-- DATE RANGE PICKER daterangepicker.com -->
    <script src="bower_components/moment/min/moment.min.js"></script>
    <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- MORRIS JS CHART  -->
    <script src="bower_components/raphael/raphael.min.js"></script>
    <script src="bower_components/morris.js/morris.min.js"></script>

    <!-- CHART JS chartjs.org  -->
    <script src="bower_components/chart.js/Chart.js"></script>


	</head>

	<body>
	
		<div class="content-wrapper">

      <section class="content-header">
        
        <h1>
          
          Administrar empleados
        
        </h1>

        <ol class="breadcrumb">
          
          <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
          
          <li class="active">Administrar registro empleados</li>
        
        </ol>

      </section>

      <section class="content">

        <div class="box">

          <div class="box-header with-border">
      
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEmpleado">
              
              Agregar empleado

            </button>

            

          </div>

          <div class="box-body">
            
           <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
             
            <thead>
             
             <tr>
               
               <th style="width:10px">#</th>
               <th>Nombre</th>
               <th>Apellidos</th>
               <th>Documento</th>
               <th>Area</th>
               <th>Cargo</th>
               <th>Telefono</th>
               <th>Fecha de ingreso</th>
               <th>Acciones</th>

             </tr> 

            </thead>

            <tbody>
            
             <?php

              

              $item = null;
              $valor = null;

              $empleados = empleados::mostrarEmpleado($item, $valor);

              foreach($empleados as $key => $value) {

                echo '<tr>
                        <td>'.($key+1).'</td>
                        <td>'.$value["nombre"].'</td>
                        <td>'.$value["apellido"].'</td>
                        <td>'.$value["documento"].'</td>
                        <td>'.$value["area"].'</td>
                        <td>'.$value["cargo"].'</td>
                        <td>'.$value["telefono"].'</td>
                        <td>'.$value["ingreso"].'</td>
                        <td>
                          <div class="btn-group">
                            
                            <button class="btn btn-warning btnEditarEmpleado" idEmpleado="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarEmpleado"><i class="fa fa-pencil"></i></button>
                            
                            <button class="btn btn-danger btnBorrarEmpleado" idEmpleado="'.$value["id"].'"><i class="fa fa-times"></i></button>

                          </div>
                        </td>
                </tr>';

              }

             ?> 

               

            </tbody>

           </table>

          </div>

        </div>

      </section>

    </div>

    <!--=====================================
    MODAL AGREGAR EMPLEADO
    ======================================-->

    <div id="modalAgregarEmpleado" class="modal fade" role="dialog">
      
      <div class="modal-dialog">

        <div class="modal-content">

          <form role="form" method="post" enctype="multipart/form-data">

            <!--=====================================
            CABEZA DEL MODAL
            ======================================-->

            <div class="modal-header" style="background:#3c8dbc; color:white">

              <button type="button" class="close" data-dismiss="modal">&times;</button>

              <h4 class="modal-title">Agregar empleado</h4>

            </div>

            <!--=====================================
            CUERPO DEL MODAL
            ======================================-->

            <div class="modal-body">

              <div class="box-body">


                <!-- ENTRADA PARA EL NOMBRE -->
                
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                    <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre del empleado" required>
                  </div>
                </div>

                <!-- ENTRADA PARA LOS APELLIDOS -->
                
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                    <input type="text" class="form-control input-lg" name="nuevoApellido" placeholder="Ingresar apellidos del empleado" required>
                  </div>
                </div>

                <!-- ENTRADA PARA EL DOCUMENTO -->
                
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-edit"></i></span> 
                    <input type="text" class="form-control input-lg" name="nuevoDocumento" placeholder="Ingresar numero de documento" required>
                  </div>
                </div>

                <!-- ENTRADA PARA AREA DE TRABAJO -->
                
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-building"></i></span> 
                    <input type="text" class="form-control input-lg" name="nuevaArea" placeholder="Ingresar area de trabajo" required>
                  </div>
                </div>

                <!-- ENTRADA PARA EL CARGO QUE DESEMPEÑA -->
                
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-comment"></i></span> 
                    <input type="text" class="form-control input-lg" name="nuevoCargo" placeholder="Ingresar el cargo que desempeña">
                  </div>
                </div>


               <!-- ENTRADA PARA EL TELEFONO -->

               <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span> 
                      <input type="number" class="form-control input-lg" name="nuevoTelefono" placeholder="Numero telefonico" required>
                  </div>
                </div>
                
                
              </div>

            </div>

            <!--=====================================
            PIE DEL MODAL
            ======================================-->

            <div class="modal-footer">

              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

              <button type="submit" class="btn btn-primary">Guardar empleado</button>

            </div>

            <?php

              $crearEmpledo = new empleados();
              $crearEmpledo -> guardarEmpleado();
            ?>

          </form>

        </div>

      </div>

    </div>


    <!--=====================================
    MODAL EDITAR EMPLEADO
    ======================================-->

    <div id="modalEditarEmpleado" class="modal fade" role="dialog">
      
      <div class="modal-dialog">

        <div class="modal-content">

          <form role="form" method="post" enctype="multipart/form-data">

            <!--=====================================
            CABEZA DEL MODAL
            ======================================-->

            <div class="modal-header" style="background:#3c8dbc; color:white">

              <button type="button" class="close" data-dismiss="modal">&times;</button>

              <h4 class="modal-title">Editar empleado</h4>

            </div>

            <!--=====================================
            CUERPO DEL MODAL
            ======================================-->

            <div class="modal-body">

              <div class="box-body">


                <!-- ENTRADA PARA EL NOMBRE -->
                
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                    <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" required>
                    <input type="hidden" id="idEmpleado" name="idEmpleado">
                  </div>
                </div>

                <!-- ENTRADA PARA LOS APELLIDOS -->
                
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                    <input type="text" class="form-control input-lg" id="editarApellido" name="editarApellido" required>
                  </div>
                </div>

                <!-- ENTRADA PARA EL DOCUMENTO -->
                
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-edit"></i></span> 
                    <input type="text" class="form-control input-lg" id="editarDocumento" name="editarDocumento" required>
                  </div>
                </div>

                <!-- ENTRADA PARA AREA DE TRABAJO -->
                
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-building"></i></span> 
                    <input type="text" class="form-control input-lg" id="editarArea" name="editarArea" required>
                  </div>
                </div>

                <!-- ENTRADA PARA EL CARGO QUE DESEMPEÑA -->
                
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-comment"></i></span> 
                    <input type="text" class="form-control input-lg" id="editarCargo" name="editarCargo">
                  </div>
                </div>


               <!-- ENTRADA PARA EL TELEFONO -->

               <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span> 
                      <input type="number" class="form-control input-lg" id="editarTelefono" name="editarTelefono" required>
                  </div>
                </div>
                
                
              </div>

            </div>

            <!--=====================================
            PIE DEL MODAL
            ======================================-->

            <div class="modal-footer">

              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

              <button type="submit" class="btn btn-primary">Guardar cambios</button>

            </div>

            <?php

              $editarEmpleado = new empleados();
              $editarEmpleado -> editarEmpleado();
              
            ?>

          </form>

        </div>

      </div>

    </div>

   
   <?php

    $borrarEmpleado = new empleados();
    $borrarEmpleado -> borrarEmpleado();

   ?>
		

	</body>


	
</html>

<script type="text/javascript" src="js/empleado.js"></script>