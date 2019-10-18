<?php

require_once "conexion.php";

class ModeloEmpleados {

	/*=============================================
	MOSTRAR EMPLEADO
	=============================================*/

	static public function mdlMostrarEmpleado($tabla, $item, $valor) {

		if($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();

			return $stmt -> fetch();

		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		$stmt -> close();
		$stmt = null;

	}

	/*=============================================
	GUARDAR EMPLEADO
	=============================================*/

	static public function mdlCrearEmpleado($tabla, $datos) {

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellido, documento, area, cargo, telefono) VALUES (:nombre, :apellido, :documento, :area, :cargo, :telefono)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
		$stmt->bindParam(":area", $datos["area"], PDO::PARAM_STR);
		$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);

		
		if($stmt->execute()){

			return "ok";

		} else {

			return "error";

		}

		$stmt->close();
		$stmt=null;

	}

	/*=============================================
	EDITAR DATOS EMPLEADO
	=============================================*/

	static public function mdlEditarEmpleado($tabla, $datos) {

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido = :apellido, documento = :documento, area = :area, cargo = :cargo, telefono = :telefono WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
		$stmt->bindParam(":area", $datos["area"], PDO::PARAM_STR);
		$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);

		
		if($stmt->execute()){

			return "ok";

		} else {

			return "error";

		}

		$stmt->close();
		$stmt=null;

	}

	/*=============================================
	BORRAR EMPLEADO
	=============================================*/
	static public function mdlBorrarEmpleado($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		} else {

			return "error";
		
		}

		$stmt -> close();
		$stmt = null;

	}

}