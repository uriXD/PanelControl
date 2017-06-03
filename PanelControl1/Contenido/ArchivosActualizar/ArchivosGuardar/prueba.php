<?php

	include("../conexion/conexion.php");

	$idcategoria = $_POST["IdCategoria1"];
	$opcion = $_POST["opcion"];


	$informacion = [];

	if ($opcion == "agregar") {
		$nombre = $_POST["NombreCategoria"];
	}

	switch ($opcion) {
		case 'agregar':
			agregar($nombre,$conexion);
			break;
		
		case 'eliminar':
			eliminar($idcategoria,$conexion);
			break;
	}

	function agregar($nombre,$conexion){
		$sql = "INSERT INTO Categorias (NombreCategoria) VALUES ('$nombre')";
		$resultado = mysqli_query($conexion,$sql);
		verificar_resultado($resultado);
		cerrar($conexion);
	}


    function eliminar($idcategoria,$conexion){
    	$query="DELETE FROM Categorias WHERE IdCategoria1 = $idcategoria ";
    	$resultado = mysqli_query($conexion,$query);
		verificar_resultado($resultado);
		cerrar($conexion);

    }

	function verificar_resultado($resultado){
		if (!$resultado) {
			$informacion["respuesta"] = "ERROR";
		}
		else{
			$informacion["respuesta"] = "BIEN";
			echo json_encode($informacion);
		}
	}

	function cerrar($conexion){
		mysqli_close($conexion);
	}


?>