
<?php
  require('ArchivosConexion/conexion.php');
  
  session_start();
  
  if(isset($_SESSION["id_usuario"])){
    header("Location: Contenido/Panel_Control.php");
  }
  
  if(!empty($_POST))
  {
    $usuario = mysqli_real_escape_string($conexion,$_POST['usuario']);
    $password = mysqli_real_escape_string($conexion,$_POST['password']);
    $error = '';


    $usuario;    
    $sha1_pass = sha1($password);
    
    $sql = "SELECT IdUsuarios, IdTipo FROM Usuarios WHERE NumUsuario = '$usuario' AND Password = '$sha1_pass'";
    $result=$conexion->query($sql);
    $rows = $result->num_rows;

    echo $rows;
    
    if($rows > 0) {
      $row = $result->fetch_assoc();
      $_SESSION['id_usuario'] = $row['IdUsuarios'];
      $_SESSION['tipo_usuario'] = $row['IdTipo'];
      
      header("location: Contenido/Panel_Control.php");
      } else {
      $error = "El nombre o contraseña son incorrectos";
    }
  }
?>



<!DOCTYPE html>
<html>
<head>
	<title>Login Panel Control</title>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">

</head>

<body>

<div class="container">

	<section class="col-md-7 col-sm-3">

		<div class="login">

			<div>
				<img src="img/Logo.jpg" alt="Logo Tap Patio" class="logo">
			</div>

			<form class="login" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

			  <div class="form-group">
			    <label for="NumeroControl" class="Letra"><span class="glyphicon glyphicon-home"></span> Usuario</label>
			    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Coloca Tu Numero De Usuario">
			  </div>

			  <div class="form-group">
			    <label for="pwd" class="Letra"><span class="glyphicon glyphicon-save"></span> Contraseña:</label>
			    <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
			  </div>

			  <button type="submit" value="Aceptar" class="btn btn-default">Entrar</button>
			</form>
<div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
		</div>

	</section>
	
</div>

</body>
</html>

