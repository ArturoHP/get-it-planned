<?php 

include_once('api/clases/events.php');
include_once('api/clases/invitados.php');

$events = new Events();
$invitados = new Invitados();

$idevento = $_GET['id'];


$eventTypes = $events->getEventsTypes();
$ubicaciones = $events->getUbicaciones();
$eventInfo = $events->getInfoEventById($idevento);

$direccion = $events->getDireccionById($eventInfo['ubicacioneventoid']);

$invitadosEvento = $invitados->getInvitadosByEvento($idevento);

$invitadosRestantes = $eventInfo['cantinvitados']-count($invitadosEvento);

$estadoStr = $events->getStateById($eventInfo['estado']);

//print_r($invitadosEvento);

//echo $direccion;

//print_r($eventInfo);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Editar Evento</title>

	<style>
	
	  html {
	  	background: url('./imgs/cumple.jpg')no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;

      }

	  body {
        background-color: transparent!important;
      }


	  .loaded {
   		opacity : 1;
	  }

      .img-rounded{
      	width: 80px;
  		height: 80px;
  		border-radius: 50%;
      }

      .div-rounded{
  		border-bottom-right-radius: 10px;
  		border-bottom-left-radius: 10px;
  		border-top-left-radius: 10px;
  		border-top-right-radius: 10px;
      }

      .logo {
        max-width: 80px;
      }

      ul {
		  list-style-type: none;
		  margin: 0;
		  padding: 0;
		  overflow: hidden;
		  background-color: #333;
		}

		li {
		  float: left;
		}

		li a {
		  display: block;
		  color: white;
		  text-align: center;
		  padding: 14px 16px;
		  text-decoration: none;
		}

		li a:hover {
		  background-color: #111;
		}

		
		.tab {
		  overflow: hidden;
		  border: 1px solid #ccc;
		  background-color: #f1f1f1;
		}

		/* Style the buttons that are used to open the tab content */
		.tab button {
		  background-color: inherit;
		  float: left;
		  border: none;
		  outline: none;
		  cursor: pointer;
		  padding: 14px 16px;
		  transition: 0.3s;
		}

		/* Change background color of buttons on hover */
		.tab button:hover {
		  background-color: #ddd;
		}

		/* Create an active/current tablink class */
		.tab button.active {
		  background-color: #ccc;
		}

		/* Style the tab content */
		.tabcontent {
		  display: none;
		  padding: 6px 12px;		  
		  border-top: none;
		}
    </style>
</head>
<body  class="bg-cover d-block d-sm-block d-md-flex flex-column w-100">

	<nav class="navbar navbar-inverse w-100 bg-dark">
	  <div class="container">
	    <div class="navbar-header ml-4">
	      <a class="navbar-brand" href="admin.php?eventos&typepage=1"><img src="./imgs/giplannedlogo.png" class="img-rounded logo"></a>
	    </div>
	    <ul class="nav bg-dark">
		  <li><h5><a href="admin.php?eventos&typepage=1">Eventos &nbsp;&nbsp;<span class="fa fa-gift"></a></h5></li>
		  <!--<li><h5><a href="proveedores.php">Proveedores&nbsp;&nbsp;<span class="fa fa-cutlery"></a></h5></li>-->
		  <li><h5><a href="personal.php">Personal&nbsp;&nbsp;<span class="fa fa-briefcase"></a></h5></li>
		  <li><h5><a href="doubts.php">Ayuda&nbsp;&nbsp;<span class="fa fa-info-circle"></a></h5></li>
		</ul>
	  </div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-left mt-4 ml-2">
				<a href="admin.php?eventos&typepage=1">
					<button class="form-control btn btn-secondary col-sm-2 mr-2 ml-4"><span class="fa fa-angle-left"></span> &nbsp;&nbsp; Atras </button>
				</a>
				
			</div>
			
		</div>
	</div>


	<div class="container mt-4 text-white">
		<h2 class="text-center mb-4">Editar informacion del evento</h2>

		<div class="tab bg-secondary div-rounded ml-4 mr-4">
		  <button class="tablinks text-white" onclick="openTabEdit(event, 'editevent')" id="defaultOpen">Editar evento</button>
		  <button class="tablinks text-white" onclick="openTabEdit(event, 'editinvitados')" id="invitadosOpen">Editar Invitados</button>
		  <!--<button class="tablinks text-white" onclick="openTabEdit(event, 'editlogistica')" id="logisticaOpen">Editar Logistica</button>-->
		</div>

		<h3 class="mt-4 ml-4">Estado del evento:&nbsp;&nbsp;<?php echo $estadoStr ?></h3>


		<!--Editar eventosssssssssssssssssssssssssssssssss-->


		<div id="editevent" class="tabcontent">
		  
			<div class="container p-4" id="addev">
			  	<h2 class="ml-4">Editar Evento</h2>

			  	<div class="form-group ml-4 mr-4">
			  		<label for="text">Nombre del Evento</label>
			  		<input type="text" id="nombreevento" class="form-control" 
			  		<?php if ($eventInfo["estado"] == '2' || $eventInfo["estado"] == '3') echo "disabled"; ?>>
			  	</div>


			  	<div class="row ml-2 mr-2">
			  		<div class="col-md-6 form-group">
			  			<label>Nombre del cliente</label>
			  			<input type="text" id="nombreclienteedit" class="form-control"
			  			<?php if ($eventInfo["estado"] == '2' || $eventInfo["estado"] == '3') echo "disabled"; ?>>
			  		</div>
			  		<div class="col-md-6 form-group">
			  			<label>No. contrato</label>
			  			<input type="text" id="ncontratoedit" class="form-control"
			  			<?php if ($eventInfo["estado"] == '2' || $eventInfo["estado"] == '3') echo "disabled"; ?>>
			  		</div>
			  	</div>

			  	<div class="form-group ml-4 mr-4">
			  		<label for="text">Tipo de evento</label>
			  		<select id="eventtype" class="form-control"
			  		<?php if ($eventInfo["estado"] == '2' || $eventInfo["estado"] == '3') echo "disabled"; ?>>
			  			<option value="">Seleccione un tipo de evento</option>
			  			<?php foreach ($eventTypes as $key => $value): ?>
			  				<option value="<?php echo $value['id']?>"><?php echo $value['nombreevento']?></option>
			  			<?php endforeach ?>
			  		</select>
			  	</div>

			  	<div class="row">
			  		<div class="col-sm-4">
			  			<div class="form-group ml-4">
				  			<label for="text">Salon</label>
					  		<select id="ubicacionW" class="form-control" onchange="setDir()"
					  		<?php if ($eventInfo["estado"] == '2' || $eventInfo["estado"] == '3') echo "disabled"; ?>>
					  			<option value="">Seleccione el salon</option>
					  			<?php foreach ($ubicaciones as $key => $value): ?>	
					  				<option value="<?php echo $value['idubicacion']?>">
					  						<?php echo $value['nombreubicacion']?></option>
					  			<?php endforeach ?>
					  		</select>
			  			</div>
			  		</div>
			  		<div class="col-sm-8">
			  			<div class="form-group ml-4">
				  			<label for="text">Dirección del salon</label>
					  		<input type="text" id="direccion" disabled="true" class="form-control"
					  		<?php if ($eventInfo["estado"] == '2' || $eventInfo["estado"] == '3') echo "disabled"; ?>>
			  			</div>
			  		</div>
			  	</div>

				<div class="container ml-2">
			        <div class="row">

			        <div class="form-group col-sm-4">
			        	<label for="date">Fecha de Inicio</label>
			        	<input type="date" id="pfechaadd" class="form-control"
			        	<?php if ($eventInfo["estado"] == '2' || $eventInfo["estado"] == '3') echo "disabled"; ?>>
			        </div>
			        <div class="form-group col-sm-4">
			        	<label for="time">Hora de inicio</label>
			        	<input type="time" id="ptimeadd" class="form-control"
			        	<?php if ($eventInfo["estado"] == '2' || $eventInfo["estado"] == '3') echo "disabled"; ?>>
			        </div>
			        <br>
			        <div class="form-group col-sm-4">
			        	<label for="time">Hora de fin</label>
			        	<input type="time" id="stimeadd" class="form-control"
			        	<?php if ($eventInfo["estado"] == '2' || $eventInfo["estado"] == '3') echo "disabled"; ?>>
			        </div>
			        	
			        </div>
			    </div>

			    <div class="form-group ml-4 mr-4">
			  		<label for="text">Cantidad de invitados</label>
			  		<input type="text" id="cantinvitados" class="form-control"
			  		<?php if ($eventInfo["estado"] == '2' || $eventInfo["estado"] == '3') echo "disabled"; ?>>
			  	</div>

			  	<div class="form-group ml-4 mr-4">
			  		<label for="text">Descripcion del evento</label>
			  		<textarea id="descripcion" class="form-control"
			  		<?php if ($eventInfo["estado"] == '2' || $eventInfo["estado"] == '3') echo "disabled"; ?>>
			  		</textarea>
			  	</div>

			    <div class="text-right container mt-4 ml-1 row">
			    	<div class="col-sm-3 mt-2">
			    		<button class="form-control btn btn-danger" data-toggle="modal" data-target="#modalborrar"
			    		<?php if ($eventInfo["estado"] == '2' || $eventInfo["estado"] == '3') echo "disabled"; ?>>Borrar Evento</button>
			    	</div>
			    	<div class="col-sm-3 mt-2 ">
			    		<button class="form-control btn btn-primary" onclick="updateEvent()"
			    		<?php if ($eventInfo["estado"] == '2' || $eventInfo["estado"] == '3') echo "disabled"; ?>>Actualizar Evento</button>
			    	</div>
			    	
			    </div>

			</div>

		</div>

		<!--Editar invitadossssssssssssssssssssssssssssssssssss-->

		<div id="editinvitados" class="tabcontent">

			<div class="container p-4">
			  	<h2 class="ml-4">Editar Invitados</h2>
			  	<h4 class="ml-4">Limite de invitados:&nbsp;<?php echo $eventInfo['cantinvitados'] ?>&nbsp;personas</h4>
			  	<h4 class="ml-4 mb-4">Invitados restantes:&nbsp;<?php echo ($invitadosRestantes) ?>&nbsp;personas</h4>

			  	<?php if (!$invitadosRestantes == 0): ?>
			  		<div class="col-sm-12 text-right mt-4">
						<button class="form-control btn btn-secondary col-sm-3" data-toggle="modal" data-target="#modaladdinivitado"
						>Añadir &nbsp;<span class="fa fa-plus"></span></button>
						<!--<?php if ($eventInfo["estado"] == '2' || $eventInfo["estado"] == '3') echo "disabled"; ?>-->
					</div>
			  	<?php else: ?>
			  		
			  	<?php endif ?>

				  	

				<?php if (count($invitadosEvento) > 0): ?>

					<div class="row mt-2 bg-light text-dark div-rounded">

							<div class="col-sm-7 h-100 w-100 d-flex text-right mt-2 mb-2">
								<h4 class="ml-4">Nombre</h4>
							</div>

							<div class="col-sm-5 h-100 w-100 d-flex mt-2 mb-2">
								<button class="form-control btn btn-light col-sm-3 mr-2" >Editar 
								</button>
								<button class="form-control btn btn-light col-sm-3 mr-2">Borrar
								</button>
								<button class="form-control btn btn-light col-sm-3 ml-4">Temperatura
								</button>
								
							</div>
											  		
						</div>
					
					<?php foreach ($invitadosEvento as $key => $value): ?>
						
						<div class="row mt-2 bg-light text-dark div-rounded">

							<div class="col-sm-7 h-100 w-100 d-flex text-right mt-2 mb-2">
								<h4><?php echo $key+1;?>.-&nbsp;<?php echo $value['nombre']?></h4>
							</div>

							<div class="col-sm-5 h-100 w-100 d-flex mt-2 mb-2">
								<button class="form-control btn btn-light col-sm-3 mr-2" onclick="editInvitado('<?php echo $value['idpersona']?>','<?php echo $value['nombre']?>')"><span class="fa fa-edit"></span> 
								</button>
								<button class="form-control btn btn-light col-sm-3 mr-2" onclick="eraseInvitado('<?php echo $value['idpersona']?>')"><span class="fa fa-trash"></span> 
								</button>
								<h5 class="form-control"><?php echo $value['temperatura']?></h5>
							</div>
											  		
						</div>
					<?php endforeach ?>

				<?php else: ?>

					<div class="container border border-primary mt-4 bg-white text-dark div-rounded text-center col-sm-8">
    					<div class="row">
    						<h2 class=" mt-2 mb-2 w-100">Aun no hay invitados registrados</h2>
    					</div>
  					</div>
					
				<?php endif ?>



			</div>
			
		</div>

		<!--Editar logisticaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->

		<div id="editlogistica" class="tabcontent">

			<div class="container p-4">
			  	<h2 class="ml-4">Editar Logistica</h2>


			  			<!--<div class="form-group ml-4 mr-4">
					  		<label for="text">Nombre del cliente</label>
					  		<input type="text" id="nombrecliente" class="form-control">
					  	</div>-->

					  	<div class="row ml-2">
					  		<div class="col-sm-4 form-group">
					  			<label for="text">Fecha de separacion</label>
					  			<input type="date" class="form-control" id="fechasep">
					  		</div>
					  		<div class="col-sm-4 form-group">
					  			<label for="text">Salon</label>
					  			<input type="text" class="form-control" id="salon_logistica">
					  		</div>
					  		<div class="col-sm-4 form-group">
					  			<label for="text">Paquete</label>
					  			<input type="text" class="form-control" id="paquete_logistica">
					  		</div>
					  	</div>

					  	<!--Menu-->
					  	<div class="row ml-2">
					  		<h4 class="ml-3 p-2 div-rounded bg-dark">Menu</h4>
					  	</div>

					  	<div class="row ml-2">
					  		<h4 class="ml-3 p-2 div-rounded bg-dark">Hora de la cena: </h4>
					  	</div>

					  	<div class="row ml-2">
					  		<div class="col-sm-4 form-group">
					  			<label for="text">Entrada</label>
					  			<input type="text" class="form-control" id="entrada_comida">
					  		</div>
					  		<div class="col-sm-4 form-group">
					  			<label for="text">Crema</label>
					  			<input type="text" class="form-control" id="crema_comida">
					  		</div>
					  		<div class="col-sm-4 form-group">
					  			<label for="text">Plato Fuerte</label>
					  			<input type="text" class="form-control" id="platof_comida">
					  		</div>
					  	</div>

					  	<div class="row ml-2">
					  		<div class="col-sm-4 form-group">
					  			<label for="text">Guarniciones</label>
					  			<input type="text" class="form-control" id="guarniciones_comida">
					  		</div>
					  		<div class="col-sm-4 form-group">
					  			<label for="text">Postre</label>
					  			<input type="text" class="form-control" id="postre_comida">
					  		</div>

					  		<div class="col-sm-4 form-group">
					  			<label for="text">Canapes</label>
					  			<input type="checkbox" class="form-control" id="postre_comida">
					  		</div>
					  		
					  	</div>

					  	<!--Bebidas-->

					  	<div class="row ml-2">
					  		<h4 class="ml-3 p-2 div-rounded bg-dark">Bebidas</h4>
					  	</div>

					  	<div class="row ml-2">
					  		<div class="col-sm-4 form-group">
					  			<label for="text">Refrescos</label>
					  			<input type="text" class="form-control" id="refrescos_bebidas">
					  		</div>
					  		<div class="col-sm-4 form-group">
					  			<label for="text">Botellas</label>
					  			<input type="text" class="form-control" id="botellas_bebidas">
					  		</div>
					  		<div class="col-sm-4 form-group">
					  			<label for="text">Cerveza</label>
					  			<input type="text" class="form-control" id="cerveza_bebidas">
					  		</div>
					  	</div>

					  	<div class="row ml-2">
					  		<div class="col-sm-4 form-group">
					  			<label for="text">Barra libre</label>
					  			<input type="text" class="form-control" id="blibre_bebidas">
					  		</div>
					  		<div class="col-sm-4 form-group">
					  			<label for="text">Bebidas fantasia</label>
					  			<input type="text" class="form-control" id="bfant_bebidas">
					  		</div>

					  		<div class="col-sm-4 form-group">
					  			<label for="text">Whisky</label>
					  			<input type="text" class="form-control" id="whisky_bebidas">
					  		</div>
					  		
					  	</div>

					  	<!--Manteleria-->

					  	<div class="row ml-2">
					  		<h4 class="ml-3 p-2 div-rounded bg-dark">Manteleria</h4>
					  	</div>

					  	<div class="row ml-2">
					  		<div class="col-sm-6 form-group">
					  			<label for="text">Mantel</label>
					  			<input type="text" class="form-control" id="mantel_mant">
					  		</div>
					  		<div class="col-sm-6 form-group">
					  			<label for="text">Cubre Mantel</label>
					  			<input type="text" class="form-control" id="cubremant_mant">
					  		</div>
					  	</div>

					  	<div class="row ml-2">
					  		<div class="col-sm-4 form-group">
					  			<label for="text">Servilleta</label>
					  			<input type="text" class="form-control" id="servilleta_mant">
					  		</div>
					  		<div class="col-sm-4 form-group">
					  			<label for="text">Forma</label>
					  			<input type="text" class="form-control" id="formaserv_mant">
					  		</div>

					  		<div class="col-sm-4 form-group">
					  			<label for="text">Banditas</label>
					  			<input type="text" class="form-control" id="banditas_mant">
					  		</div>
					  		
					  	</div>

					  	<div class="row ml-2 mt-2 p-2 div-rounded bg-dark text-white">
					  		<h4 class="col-sm-7">Robot led</h4>
					  		<select class="col-sm-2 form-control  mr-1">
								<option value="true">Si</option>
				  				<option value="false">No</option>
				  			</select>
					  		<input class="col-sm-2 form-control" id="hora_rl">
					  	</div>

					  	<div class="row ml-2 mt-2 p-2 div-rounded bg-dark text-white">
					  		<h4 class="col-sm-7">Robot led</h4>
					  		<select class="col-sm-2 form-control  mr-1">
								<option value="true">Si</option>
				  				<option value="false">No</option>
				  			</select>
					  		<input class="col-sm-2 form-control" id="hora_rl">
					  	</div>




			</div>
			
		</div>

	</div>




		<div class="modal fade" id="modalborrar" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          
		          <h4 class="modal-title">Borrar Evento</h4>
		        </div>
		        <div class="modal-body">
		          <p>¿Seguro de que quieres borrar este evento?</p>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		          <button type="button" class="btn btn-danger">Borrar</button>
		        </div>
		      </div>
		      
		    </div>
		</div>


		<div class="modal fade" id="modaladdinivitado" role="dialog">
		    <div class="modal-dialog modal-lg">
		        <div class="modal-content">
		        	<div class="modal-header">
		          	<h4 class="modal-title">Añadir invitado</h4>
		        	</div>
			        <div class="modal-body">

			        	<div class="col-sm-12">

			        		<div class="form-group mt-4">
			        			<label>Nombre</label>
			        			<input type="text" id="nombreinvitado" class="form-control">
			        		</div>

			        		<div class="form-group mt-4">
			        			
			        		</div>
			        		
			        	</div>
			        </div>
			        <div class="modal-footer">
			        	<input type="hidden" id="idinvitadotemp">
			          	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					    <button type="button" class="btn btn-primary" onclick="addInvitado()">Añadir</button>        
					</div>
		        </div>
		    </div>
		</div>


		<div class="modal fade" id="modaleditinvitado" role="dialog">
		    <div class="modal-dialog modal-lg">
		        <div class="modal-content">
		        	<div class="modal-header">
		          	<h4 class="modal-title">Editar invitado</h4>
		        	</div>
			        <div class="modal-body">

			        	<div class="col-sm-12">

			        		<div class="form-group mt-4">
			        			<label>Nombre</label>
			        			<input type="text" id="nombreinvitadoedit" class="form-control">
			        		</div>

			        		<div class="form-group mt-4">
			        			
			        		</div>
			        		
			        	</div>
			        </div>
			        <div class="modal-footer">
			          	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					    <button type="button" class="btn btn-primary" onclick="updateInvitado()">Actualizar</button>        
					</div>
		        </div>
		    </div>
		</div>




		<input type="hidden" id="ideventoh">
</body>
</html>

<script type="text/javascript">

	var infoEvent = <?php echo json_encode($eventInfo); ?>;
	console.log(infoEvent);

	var ideve = '<?php echo $idevento?>';

	$('#ideventoh').val(ideve);

	var dir = "<?php echo $direccion?>";

    document.getElementById('pfechaadd').value = infoEvent['fecha'];
    $("#eventtype").val(infoEvent['tipoeventoid']);
    document.getElementById('cantinvitados').value = infoEvent['cantinvitados'];
    document.getElementById('nombreevento').value = infoEvent['nombreevento'];;
    document.getElementById('ptimeadd').value = infoEvent['hora_inicio'];
    document.getElementById('stimeadd').value = infoEvent['hora_fin'];
    $("#ubicacionW").val(infoEvent['ubicacioneventoid']);
    $('#nombreclienteedit').val(infoEvent['cliente']);
    $("#ncontratoedit").val(infoEvent['no_contrato']);
    $('#descripcion').val(infoEvent['descripcion_evento']);
    
    document.getElementById('direccion').value = dir;
</script>

<script>
	document.getElementById("invitadosOpen").click();
</script>
