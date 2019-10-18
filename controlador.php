<?php

include "modelo.php";


class empleados {


	static public function mostrarEmpleado($item, $valor) {

		$tabla = "empleados";

		$respuesta = ModeloEmpleados::mdlMostrarEmpleado($tabla, $item, $valor);

		return $respuesta;

	}


	static public function guardarEmpleado() {

		if(isset($_POST["nuevoNombre"])) {

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoApellido"]) &&
			preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["nuevoDocumento"]) &&
			preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaArea"]) &&
			preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCargo"]) &&
			preg_match('/^[0-9 ]+$/', $_POST["nuevoTelefono"])) {

				$tabla = "empleados";

				$datos = array(
							"nombre" => $_POST["nuevoNombre"],
							"apellido" => $_POST["nuevoApellido"],
							"documento" => $_POST["nuevoDocumento"],
							"area" => $_POST["nuevaArea"],
							"cargo" => $_POST["nuevoCargo"],
							"telefono" => $_POST["nuevoTelefono"]);

				$respuesta = ModeloEmpleados::mdlCrearEmpleado($tabla, $datos);

				if($respuesta == "ok") {

					echo '<script>
					swal({
						type: "success",
						title: "¡Guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Aceptar"
						}).then(function(result){
							if(result.value){
								window.location = "index.php";
							}
						});
					</script>';

				}

			} else {

				echo '<script>
					swal({
						type: "error",
						title: "¡No se permiten caracteres especiles!",
						showConfirmButton: true,
						confirmButtonText: "cerrar"
						}).then(function(result){
							if(result.value){
								window.location = "index.php";
							}
						});
				</script>';
			}

		}

	}


	static public function editarEmpleado() {

		if(isset($_POST["editarNombre"])) {

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"]) &&
			preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarApellido"]) &&
			preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["editarDocumento"]) &&
			preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarArea"]) &&
			preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCargo"]) &&
			preg_match('/^[0-9 ]+$/', $_POST["editarTelefono"])) {

				$tabla = "empleados";

				$datos = array(
							"id" => $_POST["idEmpleado"],
							"nombre" => $_POST["editarNombre"],
							"apellido" => $_POST["editarApellido"],
							"documento" => $_POST["editarDocumento"],
							"area" => $_POST["editarArea"],
							"cargo" => $_POST["editarCargo"],
							"telefono" => $_POST["editarTelefono"]);

				$respuesta = ModeloEmpleados::mdlEditarEmpleado($tabla, $datos);

				if($respuesta == "ok") {

					echo '<script>
					swal({
						type: "success",
						title: "¡Editado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Aceptar"
						}).then(function(result){
							if(result.value){
								window.location = "index.php";
							}
						});
					</script>';

				}

			} else {

				echo '<script>
					swal({
						type: "error",
						title: "¡No se permiten caracteres especiles!",
						showConfirmButton: true,
						confirmButtonText: "cerrar"
						}).then(function(result){
							if(result.value){
								window.location = "index.php";
							}
						});
				</script>';
			}

		}

	}


	/*=============================================
	BORRAR EMPLEADO
	=============================================*/

	static public function borrarEmpleado() {

		if(isset($_GET["idEmpleado"])) {

			$tabla = "empleados";
			$datos = $_GET["idEmpleado"];

			$respuesta = ModeloEmpleados::mdlBorrarEmpleado($tabla, $datos);

			if($respuesta == "ok") {

				echo'<script>

				swal({
					  type: "success",
					  title: "El empleado ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "index.php";

								}
							})

				</script>';	

			}

		}

	}
	

}