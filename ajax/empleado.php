<?php

require_once "../controlador.php";
require_once "../modelo.php";

class AjaxEmpleado {

	/*=============================================
	EDITAR CLIENTE
	=============================================*/
	public $idEmpleado;

	public function ajaxEditarEmpleado(){

		$item = "id";
		$valor = $this->idEmpleado;

		$respuesta = empleados::mostrarEmpleado($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR EMPLEADO
=============================================*/
if(isset($_POST["idEmpleado"])) {

	$empleado = new AjaxEmpleado();
	$empleado -> idEmpleado = $_POST["idEmpleado"];
	$empleado -> ajaxEditarEmpleado();

}