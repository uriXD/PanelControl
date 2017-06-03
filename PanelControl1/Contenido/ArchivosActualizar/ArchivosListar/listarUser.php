<?php

	session_start();
	$id = $_SESSION["id_usuario"];

	include ("../conexion/conexion.php");

	$query = "SELECT IdUsuarios,NumUsuario,Password,IdTipo FROM Usuarios WHERE IdUsuarios != '$id' ORDER BY IdUsuarios desc;";
	$resultado = mysqli_query($conexion, $query);


	if( !$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){
			$arreglo["data"][]= array_map("utf8_encode",$data);
		}

		echo json_encode($arreglo);

	}
	
	mysqli_free_result( $resultado );
	mysqli_close( $conexion );



?>