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


 $sql1 = "SELECT IdCategoria1,NombreCategoria FROM Categorias";
 $result2=$conexion->query($sql1);



 $bandera = false;
 $error = '';


  if(!empty($_POST))
  {
    $nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
    $precio = mysqli_real_escape_string($conexion,$_POST['precio']);
    $descripcion = mysqli_real_escape_string($conexion,$_POST['descripcion']);
    $categoria = $_POST['categoria'];

  
  $sql = "INSERT INTO Productos (Nombre_Producto,Precio,Descripcion,Categoria) VALUES ('$nombre','$precio','$descripcion','$categoria')";
  $result = $conexion->query($sql);
  
      
    if($result>0)
    $bandera = true;
    else
    $error = "Error al Registrar";
      
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

      function validarPrecio()
      {
        valor = document.getElementById("precio").value;
        if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
          alert('Falta Llenar precio');
          return false;
        } else { return true;}
      }

      function validarDescripcion()
      {
        valor = document.getElementById("descripcion").value;
        if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
          alert('Falta Llenar la descripcion');
          return false;
        } else { return true;}
      }


      function validarTipoCategoria()
      {
        indice = document.getElementById("categoria").selectedIndex;
        if( indice == null || indice==0 ) {
          alert('Seleccione tipo de categoria');
          return false;
        } else { return true;}
      }

      function validar()
      {
        if(validarNombre() && validarPrecio() && validarDescripcion() && validarTipoCategoria())
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
      <h2>Registro De Productos A Venta : </h2>
      <br><br>
    </div>

      <div class="container col-md-6 col-md-offset-3">

          <form class="form-horizontal" id="registro" name="registro" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" > 

            <div class="form-group">
              <label class="control-label col-sm-2">Nombre Producto: </label>
              <div class="col-sm-10">
                  <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Indica el nombre del producto" >
              </div>
            </div>
            <br />
            
            <div class="form-group">
              <label class="control-label col-sm-2">Precio : </label>
              <div class="col-sm-10">
                  <input class="form-control" maxlength="8" id="precio" name="precio" type="text" placeholder="Indica un precio en Flotante, Ejem: 12.50">
              </div>
            </div>
            <br />
            
            <div class="form-group">
              <label class="control-label col-sm-2">Descripcion: </label>
              <div class="col-sm-10">
              <textarea class="form-control" id="descripcion" name="descripcion" rows="2" placeholder="indica una breve descricion del producto"></textarea>
              </div>
            </div>
            <br />
            
            
            <div class="form-group">
            <label class="control-label col-sm-2">Tipo Categoria: </label>
            <div class="col-sm-10">
              <select id="categoria" name="categoria">
                <option value="0">Seleccione tipo de Categoria...</option>
                <?php while($row2 = $result2->fetch_assoc()){ ?>
                  <option value="<?php echo $row2['IdCategoria1']; ?>"><?php echo $row2['NombreCategoria']; ?></option>
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

