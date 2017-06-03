<?php

	include("../conexion/conexion.php");

    $idusuario = $_POST["IdUsuarios"];
    $opcion = $_POST["opcion"]; 
    $informacion = []; 


 
    if ($opcion == "modificar" || $opcion == "registrar") 
    { 
    	$usuario = $_POST["Usuario"]; 
    	$password = $_POST["Password"]; 
    	$tipo = $_POST["IdTipo"]; 
    }

	switch ($opcion) {
		case 'modificar':
			modificar($usuario, $password, $tipo,$idusuario,$conexion);
			break;
		
		case 'eliminar':
			eliminar($idusuario,$conexion);
			break;
	}


	function modificar($usuario, $password, $tipo,$idusuario,$conexion){
		$query= "UPDATE Usuarios SET NumUsuario = '$usuario', Password = '$password', IdTipo = '$tipo' WHERE IdUsuarios=$idusuario";
		$resultado = mysqli_query($conexion, $query);
		verificar_resultado($resultado);
		cerrar( $conexion);
	}


	function eliminar($idusuario,$conexion){
		$query="DELETE FROM Usuarios WHERE IdUsuarios = '$idusuario' ";
		$resultado = mysqli_query($conexion,$query);
		verificar_resultado($resultado);
		cerrar($conexion);
	}


	function verificar_resultado($resultado){
		if (!$resultado) {
			$informacion["respuesta"]="ERROR";
		}else{
			$informacion["respuesta"]="BIEN";
		}
		echo json_encode($informacion);
	}

	function cerrar($conexion){
		mysqli_close($conexion);
	}




?>