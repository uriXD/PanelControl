<?php
  
  session_start();
  require 'conexion/conexion.php';
  
  if(!isset($_SESSION["id_usuario"])){
    header("Location: ../../LoginPanel.php");
  }
  
  $idUsuario = $_SESSION['id_usuario'];
  
  $sql="SELECT u.IdUsuarios, p.Nombre FROM Usuarios AS u INNER JOIN Personal AS p ON p.IdPersonal = u.IdPersonal WHERE u.IdUsuarios = '$idUsuario'";

  $result=$conexion->query($sql);
  $row = $result->fetch_assoc();


  $sql1 = "SELECT IdTipoUsuario,Tipo FROM TipoUsuario";
  $result=$conexion->query($sql1);

  mysqli_close($conexion);

?>




<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Tap Patio Panel Usuarios</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
	<!-- Buttons DataTables -->
	<link rel="stylesheet" href="css/buttons.bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilos2.css">

</head>
<body>

<header>
	<div class="container">
		<div class="row">

			<div class="col-md-1">
				<img src="../../img/Logo.jpg" alt="logo" class="LogoImg">
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
      <li class="active"><a href="../Panel_Control.php">Inicio</a></li>

      <?php if($_SESSION['tipo_usuario']==1) { ?>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuarios
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../RegistroUsuarios.php">Agregar Usuarios</a></li>
          <li><a href="ActualizarUser.php">Editar Y Eliminar Usuarios</a></li>
        </ul>
      </li>
      <?php } ?>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Productos
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
           <li><a href="../RegistroProductos.php">Agregar Productos</a></li>
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
          <li><a href="Categoria.php">Categorias</a></li>
          <li><a href="#">Revisar Retiros</a></li>
        </ul>
      </li>

<?php } ?>
      
       <li class="derecha2"><a href="../logout.php" >Cerrar Cesion</a></li>
         
   


    </ul>
  </div>
</nav>


<br><br>
<div class="container" style="background-color: #ffffff;">
	<div class="row">
		<div id="cuadro2" class="col-sm-12 col-md-12 col-lg-12 ocultar">
			<form class="form-horizontal" action="" method="POST">
				<div class="form-group">
					<h3 class="col-sm-offset-2 col-sm-8 text-center">					
					Formulario de Registro de Usuarios</h3>
				</div>
				<input type="hidden" id="IdUsuarios" name="IdUsuarios" value="0">
				<input type="hidden" id="opcion" name="opcion" value="modificar">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nick Usuario</label>
					<div class="col-sm-8"><input id="Usuario" name="Usuario" type="text" class="form-control"  autofocus></div>				
				</div>
				<div class="form-group">
					<label for="apellidos" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-8"><input id="Password" name="Password" type="text" class="form-control" ></div>
				</div>
				<div class="form-group">
				 <div class="center-a">
				 <label for="IdTipo" class="col-sm-2 control-label">Tipo Usuario</label>
	              <select id="IdTipo" name="IdTipo">
	                
	                <?php while($row = $result->fetch_assoc()){ ?>
	                  <option value="<?php echo $row['IdTipoUsuario']; ?>"><?php echo $row['Tipo']; ?></option>
	                <?php }?>
	              </select>
	              </div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-8">
						<input id="" type="submit" class="btn btn-primary" value="Guardar">
						<input id="btn_listar" type="button" class="btn btn-primary" value="Listar">
					</div>
				</div>
			</form>
			<div class="col-sm-offset-2 col-sm-8">
				<p class="mensaje"></p>
			</div>
			
		</div>
	</div>
	<div class="row">
		<div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12">
			<div class="col-sm-offset-2 col-sm-8">
				<h3 class="text-center"> <small class="mensaje"></small></h3>
			</div>
			<div class="table-responsive col-sm-12">		
				<table id="dt_cliente" class="table table-bordered table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>								
							<th>IdUsuario</th>
							<th>NickUsuario</th>
							<th>Contraseña</th>
							<th>IdTipoUsuario</th>
							<th></th>												
						</tr>
					</thead>					
				</table>
			</div>			
		</div>		
	</div>
	<div>
		<form id="frmEliminarUsuario" action="" method="POST">
			<input type="hidden" id="IdUsuarios" name="IdUsuarios" value="">
			<input type="hidden" id="opcion" name="opcion" value="eliminar">
			<!-- Modal -->
			<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="modalEliminarLabel">Eliminar Usuario</h4>
						</div>
						<div class="modal-body">							
							¿Está seguro de eliminar al usuario?<strong data-name=""></strong>
						</div>
						<div class="modal-footer">
							<button type="button" id="eliminar-usuario" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal -->
		</form>
	</div>

</div>







	<script src="js/jquery-1.12.3.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.js"></script>
	<!--botones DataTables-->	
	<script src="js/dataTables.buttons.min.js"></script>
	<script src="js/buttons.bootstrap.min.js"></script>
	<!--Libreria para exportar Excel-->
	<script src="js/jszip.min.js"></script>
	<!--Librerias para exportar PDF-->
	<script src="js/pdfmake.min.js"></script>
	<script src="js/vfs_fonts.js"></script>
	<!--Librerias para botones de exportación-->
	<script src="js/buttons.html5.min.js"></script>

	<script>		
		$(document).on("ready", function(){
			listar();
			guardar();
			eliminar();
		});

		$("#btn_listar").on("click", function(){
			listar();
		});


		var guardar = function(){
			$("form").on("submit",function(e){
				e.preventDefault();
				var frm = $(this).serialize();
				$.ajax({
					method:"POST",
					url:"ArchivosGuardar/guardarUser.php",
					data: frm
				}).done(function(info){
					var json_info = JSON.parse(info);
					mostrar_mensaje( json_info);
					limpiar_datos();
					listar();
				});
			});
		}



		var eliminar = function(){
			$("#eliminar-usuario").on("click", function(){
				var IdUsuarios = $("#frmEliminarUsuario #IdUsuarios").val(),
				    opcion= $("#frmEliminarUsuario #opcion").val();
				$.ajax({
					method:"POST",
					url:"ArchivosGuardar/guardarUser.php",
					data:{"IdUsuarios": IdUsuarios,"opcion":opcion}
				}).done(function(info){
					var json_info = JSON.parse(info);
					mostrar_mensaje( json_info);
					limpiar_datos();
					listar();

				});
			});
		}


		var listar = function(){

		$("#cuadro2").slideUp("slow");
		$("#cuadro1").slideDown("slow");

			var table = $("#dt_cliente").DataTable({
				"destroy":true,
				"ajax":{
					"method":"POST",
					"url": "ArchivosListar/listarUser.php"
				},
				"columns":[
					{"data":"IdUsuarios"},
					{"data":"NumUsuario"},
					{"data":"Password"},
					{"data":"IdTipo"},
					{"defaultContent": "<button type='button' class='editar btn btn-primary'><i class='fa fa-pencil-square-o'></i></button>	<button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='fa fa-trash-o'></i></button>"}	
				],
				"language": idioma_espanol
			});

			obtener_data_editar("#dt_cliente tbody",table);
			obtener_id_eliminar("#dt_cliente tbody",table);

		}



		var obtener_data_editar = function(tbody,table){
			$(tbody).on("click","button.editar",function(){
				var data = table.row($(this).parents("tr")).data();
				var idusuario = $("#IdUsuarios").val(data.IdUsuarios),
					nick = $("#Usuario").val(data.NumUsuario),
					contraseña = $("#Password").val(data.Password),
					//tipo = $("#IdTipo").val(data.IdTipo);
					opcion = $("#opcion").val("modificar"); 

					$("#cuadro2").slideDown("slow");
					$("#cuadro1").slideUp("slow");
			})
		}

		var obtener_id_eliminar = function(tbody,table){
			$(tbody).on("click","button.eliminar",function(){
				var data = table.row($(this).parents("tr")).data();
				var idusuario = $("#frmEliminarUsuario #IdUsuarios").val(data.IdUsuarios);

			})
		}


		var mostrar_mensaje = function( informacion ){
			var texto = "", color = "";
			if( informacion.respuesta == "BIEN" ){
					texto = "<strong>Bien!</strong> Se han guardado los cambios correctamente.";
					color = "#379911";
			}else if( informacion.respuesta == "ERROR"){
					texto = "<strong>Error</strong>, no se ejecutó la consulta.";
					color = "#C9302C";
			}else if( informacion.respuesta == "EXISTE" ){
					texto = "<strong>Información!</strong> el usuario ya existe.";
					color = "#5b94c5";
			}else if( informacion.respuesta == "VACIO" ){
					texto = "<strong>Advertencia!</strong> debe llenar todos los campos solicitados.";
					color = "#ddb11d";
			}else if( informacion.respuesta == "OPCION_VACIA" ){
					texto = "<strong>Advertencia!</strong> la opción no existe o esta vacia, recargar la página.";
					color = "#ddb11d";
			}

			$(".mensaje").html( texto ).css({"color": color });
			$(".mensaje").fadeOut(5000, function(){
					$(this).html("");
					$(this).fadeIn(3000);
			});			
		}

		var limpiar_datos = function(){
			$("#opcion").val("modificar");
			$("#IdUsuarios").val("");
			$("#Usuario").val("").focus();
			$("#Password").val("");
		}

		var idioma_espanol = {
		    "sProcessing":     "Procesando...",
		    "sLengthMenu":     "Mostrar _MENU_ registros",
		    "sZeroRecords":    "No se encontraron resultados",
		    "sEmptyTable":     "Ningún dato disponible en esta tabla",
		    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
		    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
		    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		    "sInfoPostFix":    "",
		    "sSearch":         "Buscar:",
		    "sUrl":            "",
		    "sInfoThousands":  ",",
		    "sLoadingRecords": "Cargando...",
		    "oPaginate": {
		        "sFirst":    "Primero",
		        "sLast":     "Último",
		        "sNext":     "Siguiente",
		        "sPrevious": "Anterior"
		    },
		    "oAria": {
		        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
		    }
		}

		

	</script>
</body>
</html>
