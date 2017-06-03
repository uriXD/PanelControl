<?php
  
  session_start();
  require 'ArchivosConexion/conexion.php';
  
  if(!isset($_SESSION["id_usuario"])){
    header("Location: ../LoginPanel.php");
  }

  $idUsuario = $_SESSION['id_usuario'];
  
  $sql="SELECT u.IdUsuarios, p.Nombre FROM Usuarios AS u INNER JOIN Personal AS p ON p.IdPersonal = u.IdPersonal WHERE u.IdUsuarios = '$idUsuario'";

  $result=$conexion->query($sql);
  $row = $result->fetch_assoc();

  mysqli_close($conexion);
  
?>



<!DOCTYPE html>
<html>
<head>
	<title>Panel De Control Tap Patio</title>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilos2.css">
</head>


<body>

<header>
	<div class="container">
		<div class="row">

			<div class="col-md-1">
				<img src="../img/Logo.jpg" alt="logo" class="LogoImg">
			</div>

			<div class="col-md-9">
				<h2>Panel De Administracion</h2>
			</div>

			<div class="col-md-2">
            <h4><?php echo 'Personal:  '.utf8_decode($row['Nombre']); ?></h4>
			</div>	
		</div>
	</div>
</header>

 <nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Opciones: </a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="Panel_Control.php">Inicio</a></li>

      <?php if($_SESSION['tipo_usuario']==1) { ?>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuarios
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="RegistroUsuarios.php">Agregar Usuarios</a></li>
          <li><a href="ArchivosActualizar/ActualizarUser.php">Editar Y Eliminar Usuarios</a></li>
        </ul>
      </li>
      <?php } ?>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Productos
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
           <li><a href="RegistroProductos.php">Agregar Productos</a></li>
          <li><a href="#">Editar Y Eliminar Productos</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Bebidas
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Agregar Bebida</a></li>
          <li><a href="#">Editar Y Eliminar Bebidas</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Barriles
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Recibir Barril</a></li>
          <li><a href="#">Reporte Barriles</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reportes
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">PROXIMAMENTE</a></li>
        </ul>
      </li>

 <?php if($_SESSION['tipo_usuario']==1) { ?>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Opciones Extras
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Ver Cantidades Bebidas</a></li>
          <li><a href="#">Precio Dolar</a></li>
          <li><a href="#">Reemprimir ticket</a></li>
          <li><a href="#">Reemprimir Corte</a></li>
          <li><a href="#">Promociones</a></li>
          <li><a href="ArchivosActualizar/Categoria.php">Categorias</a></li>
          <li><a href="#">Revisar Retiros</a></li>
        </ul>
      </li>

<?php } ?>
      
       <li class="derecha2"><a href="logout.php" >Cerrar Cesion</a></li>
         
   


    </ul>
  </div>
</nav>

<div class="container">
	<img src="../img/Logo.jpg" alt="logo" class="center">	
</div>





	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>

