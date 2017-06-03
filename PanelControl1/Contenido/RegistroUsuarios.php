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


  $sql1 = "SELECT IdTipoUsuario,Tipo FROM TipoUsuario";
  $result=$conexion->query($sql1);

  $bandera = false;


  if(!empty($_POST))
  {
    $nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
    $usuario = mysqli_real_escape_string($conexion,$_POST['usuario']);
    $password = mysqli_real_escape_string($conexion,$_POST['password']);
    $tipo_usuario = $_POST['tipo_usuario'];
    $sha1_pass = sha1($password);
    
    $error = '';
    
    $sqlUser = "SELECT IdUsuarios FROM Usuarios WHERE NumUsuario = '$usuario'";
    $resultUser=$conexion->query($sqlUser);
    $rows = $resultUser->num_rows;
    
    if($rows > 0) {
      $error = "El numero de usuario ya existe";
      } else {
      
      $sqlPerson = "INSERT INTO Personal (Nombre) VALUES('$nombre')";
      $resultPerson=$conexion->query($sqlPerson);
      $idPersona = $conexion->insert_id;
      
      $sqlUsuario = "INSERT INTO Usuarios (NumUsuario, Password, IdPersonal, IdTipo) VALUES('$usuario','$sha1_pass','$idPersona','$tipo_usuario')";
      $resultUsuario = $conexion->query($sqlUsuario);
      
      if($resultUsuario>0)
      $bandera = true;
      else
      $error = "Error al Registrar";
      
    }
  }



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

        <script>
      function validarNombre()
      {
        valor = document.getElementById("nombre").value;
        if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
          alert('Falta Llenar Nombre');
          return false;
        } else { return true;}
      }
      
      function validarUsuario()
      {
        valor = document.getElementById("usuario").value;
        if(!/^([0-9])*$/.test(valor)) {
          alert('Falta Llenar Numero Usuario' + valor);
          return false;
        } else { return true;}
      }
      
      function validarPassword()
      {
        valor = document.getElementById("password").value;
        if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
          alert('Falta Llenar Password');
          return false;
          } else { 
          valor2 = document.getElementById("con_password").value;
          
          if(valor == valor2) { return true; }
          else { alert('Las contraseña no coinciden'); return false;}
        }
      }
      
      function validarTipoUsuario()
      {
        indice = document.getElementById("tipo_usuario").selectedIndex;
        if( indice == null || indice==0 ) {
          alert('Seleccione tipo de usuario');
          return false;
        } else { return true;}
      }
      
      function validar()
      {
        if(validarNombre() && validarUsuario() && validarPassword() && validarTipoUsuario())
        {
          document.registro.submit();
        }
      }
      
    </script>
</head>





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






<div class="container" style="background-color: #ffffff;">
    <div class="container">
      <h2>Registro De Usuarios Nuevos: </h2>
      <br><br>
    </div>

      <div class="container col-md-6 col-md-offset-3">

          <form class="form-horizontal" id="registro" name="registro" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" > 

            <div class="form-group">
              <label class="control-label col-sm-2">Nombre: </label>
              <div class="col-sm-10">
                  <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Indica Tu Nombre Y apellido" >
              </div>
            </div>
            <br />
            
            <div class="form-group">
              <label class="control-label col-sm-2">Numero Usuario: </label>
              <div class="col-sm-10">
                  <input class="form-control" maxlength="8" id="usuario" name="usuario" type="text" placeholder="Indica un Numero NIP Menor o igual a 8 digitos">
              </div>
            </div>
            <br />
            
            <div class="form-group">
              <label class="control-label col-sm-2">Contraseña: </label>
              <div class="col-sm-10">
              <input class="form-control" id="password" name="password" type="password" placeholder="Contraseña">
              </div>
            </div>
            <br />
            
            <div class="form-group">
              <label class="control-label col-sm-2">Confirmar: </label>
              <div class="col-sm-10">
              <input class="form-control" id="con_password" name="con_password" type="password" placeholder="Repite Contraseña">
              </div>
            </div>
            <br />
            
            <div class="form-group">
            <label class="control-label col-sm-2">Tipo Usuario: </label>
            <div class="col-sm-10">
              <select id="tipo_usuario" name="tipo_usuario">
                <option value="0">Seleccione tipo de usuario...</option>
                <?php while($row2 = $result->fetch_assoc()){ ?>
                  <option value="<?php echo $row2['IdTipoUsuario']; ?>"><?php echo $row2['Tipo']; ?></option>
                <?php }?>
              </select>
            </div>
            </div>
            <br />
            
            <div class="form-group"><input name="registar" type="button" value="Registrar" onClick="validar();"></div> 
          </form>
      
      <?php if($bandera) { ?>
        <h1>Registro exitoso</h1>
        
        
        <?php }else{ ?>
        <br />
        <div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
        
      <?php } ?>
      </div>
</div>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>

