/*=============================================
EDITAR EMPLEADO
=============================================*/
$(".tablas").on("click", ".btnEditarEmpleado", function(){

	var idEmpleado = $(this).attr("idEmpleado");
	
	var datos = new FormData();
	datos.append("idEmpleado", idEmpleado);

	$.ajax({
		url:"ajax/empleado.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(respuesta){
			
			$("#idEmpleado").val(respuesta["id"]);
			$("#editarNombre").val(respuesta["nombre"]);
			$("#editarApellido").val(respuesta["apellido"]);
			$("#editarDocumento").val(respuesta["documento"]);
			$("#editarArea").val(respuesta["area"]);
			$("#editarCargo").val(respuesta["cargo"]);
			$("#editarTelefono").val(respuesta["telefono"]);
		}
	})

})


/*=============================================
ELIMINAR EMPLEADO
=============================================*/
$(".tablas").on("click", ".btnBorrarEmpleado", function(){

	var idEmpleado = $(this).attr("idEmpleado");

	swal({
        title: '¿Está seguro de borrar?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?idEmpleado="+idEmpleado;
        }

 	 })

})