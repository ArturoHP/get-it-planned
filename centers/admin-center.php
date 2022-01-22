<?php echo "Somos de lo nuestro";?> 
<?php 

	include_once('api/clases/events.php');
	include_once('api/clases/personal.php');

    $fecha = date("Y-m-d");
	$startDate = strftime("%B, %d %G", strtotime($fecha));
	$endDate = strftime("%B, %d %G", strtotime($fecha ."+ 6 days"));

	$month_ini = new DateTime("first day of this month");
	$month_end = new DateTime("last day of this month");

	$startMonth = $month_ini->format('Y-m-d');
	$endMonth = $month_end->format('Y-m-d');

	//$tplus1 = strftime("%B, %d %G", strtotime($fecha ."+ ".." days"));

	$Time = date('h:i ', time());
	$events = new Events();
	$personal = new Personal();

	$typepage = $_GET['typepage'];

	if ($typepage == 1) {
		$orderevent = $events->getEventsForMonthOrderByDate($fecha,$endMonth);
		$fechas = $events->getDatesForMonth($fecha,$endMonth);
	}else{

		$fdate = $_GET['fdate'];
		$fdatet = strftime("%B, %d %G", strtotime($fdate));
	
		$sdate = $_GET['sdate'];
		$sdatet = strftime("%B, %d %G", strtotime($sdate));

		if ($fdate > $sdate) {
			$orderevent = $events->getEventsOrderByDateNRange($sdate,$fdate);
			$fechas = $events->getDatesByRange($sdate,$fdate);
		}else{
			$orderevent = $events->getEventsOrderByDateNRange($fdate,$sdate);
			$fechas = $events->getDatesByRange($fdate,$sdate);
		}
		
	}

	$eventTypes = $events->getEventsTypes();
	$ubicaciones = $events->getUbicaciones();

	//$personalTypes = $personal->getPersonalTypes();

	/*foreach ($orderevent as $key => $value) {
		print_r($value);
		echo "<br>------------------------------------------<br>";
	}*/

	
	//$fdays = $events->getEventsOrderByDateNDay();
	//print_r($fdays[0]);

	
	
	//$eventtype = $events->getTypeEventById(1);
	//$fechas = $events->getEventsOrderByDateNDay();


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta name='viewport' content='width=device-width, initial-scale=1'>

	<title>Administrar Eventos</title>

	<style>

	  html {
	  	background: url('./imgs/boda.jpg')no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        font-family: "Fira Sans", Helvetica, Arial, sans-serif;

      }

	  body {
        background-color: transparent!important;
        font-family: "Fira Sans", Helvetica, Arial, sans-serif;
        
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
		  background-color: #ffffff;
		}
    </style>
</head>


<body class="bg-cover d-block d-sm-block d-md-flex flex-column w-100">

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

	<?php if(isset($_GET['eventos'])):?>

				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-right mt-4">
							<a href="admin.php?addevent">
								<button class="form-control btn btn-secondary col-sm-3 mr-2">Añadir un evento &nbsp;<span class="fa fa-plus"></span></button>
							</a>		
						</div>	
					</div>
				</div>

				<div class="container p-4">
				  	<h1 class="ml-4">Eventos de este mes</h1>

				  <!--<p class="ml-4">Rango de fecha: <?php echo $startDate?> - <?php echo $endDate?> </p>-->
				  <?php if (count($orderevent) > 0): ?>
				  		<?php foreach ($fechas as $key => $val): ?>

						<div class="container border border-primary mt-4 bg-white div-rounded text-center col-sm-4">
			    			<div class="row">
			    				<h2 class=" mt-2 mb-2 w-100"><?php echo strftime("%B, %d %G", strtotime($val))?></h2>
			   				</div>
						</div>


						<?php foreach ($orderevent as $key => $value): ?>

								<?php if ($val== $value['fecha']): ?>

									<div class=" div-rounded w-100 h-40 p-4 container mt-4 
									<?php if ($value["tipoeventoid"] == '1') echo "bg-dark text-white"; ?>
									<?php if ($value["tipoeventoid"] == '2') echo "bg-info text-white"; ?> 
									<?php if ($value["tipoeventoid"] == '3') echo "bg-secondary text-white"; ?>
									<?php if ($value["tipoeventoid"] == '4') echo "bg-light border border-dark text-dark"; ?>">

									  	<div class="row">

									  		<div class="col-sm-8 h-100">
									  			 <h2>Tipo de evento: <?php echo $value["tipoevento"]; ?></h2>
									  		</div>

									  		<div class="col-sm-4 h-100 w-100 d-flex justify-content-end">
									  			<h4>Identificacion del evento: <?php echo $value["id"]; ?></h4>
									  		</div>
									  		
									  	</div>

									  	<div class="row">

									  		<div class="col-sm-12 h-100">
									  			 <h5>Nombre del evento: <?php echo $value["nombreevento"];?></h5>
									  		</div>
									  		
									  	</div>

									  	<div class="row">

									  		<div class="col-sm-12 h-100">
									  			 <h5>Cantidad de Invitados: <?php echo $value["cantinvitados"];?> personas</h5>
									  		</div>
									  		
									  	</div>

									  	<br>

									  	<div class="row">

									  		<div class="col-sm-12">
										  		<div class="col-sm-6">
										  			<?php
										  				$temptimestart = date('g:i A', strtotime($value['hora_inicio'])); 
										  			?>
										  			<h5>Hora de inicio: <?php echo $temptimestart;?></h5>
										  		</div>

										  		<div class="col-sm-6">
										  			<?php
										  				$temptimeend = date('g:i A', strtotime($value['hora_fin'])); 
										  			?>
										  			<h5>Hora de fin: <?php echo $temptimeend;?></h5>
										  		</div>
									  		</div>

									  	</div>

									  	<div class="row">

									  		<div class="col-sm-8 h-100 w-100 d-flex text-right  mt-2">
									  			<a href="editevent.php?id=<?php echo $value['idevento'];?>">
									  				<button class="form-control btn btn-warning">
									  				 Editar   <span class="fa fa-edit"></span> 
									  				</button>
									  			</a>
									  		</div>

									  		<div class="col-sm-4 h-100 w-100 d-flex mt-2">
									  			<button class="form-control btn btn-warning" onclick="showModalWithQrsOfEvent(<?php echo $value['id']?>)">Codigos QR 
									  				<span class="fa fa-qrcode"></span> 
									  			</button>
									  		</div>
									  		
									  	</div>
									  	
									</div>
							
									<?php endif ?>
						
								<?php endforeach ?>
						<?php endforeach ?>

				  <?php else: ?>

				  	<div class="container border border-primary mt-4 bg-white div-rounded text-center col-sm-8">
    					<div class="row">
    						<h2 class=" mt-2 mb-2 w-100">No hay eventos para este mes</h2>
    					</div>
  					</div>
				  	
				  <?php endif ?>
					

					<input type="hidden" id="ideventoselected">

				</div>

				<?php if (count($orderevent) > 0): ?>

					<div class="btn bg-white" data-toggle="collapse" href="#multiCollapseExample1"
					style="position: absolute;right: 0px;top: 280px;max-width: 300px;height: 50px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;font-size: 15px;/* padding-left: 12px; */border-color: black;border: groove;padding: 13px; color: black">
					Rango de fecha
				</div>
				<div style="position: absolute;right: 0px;top: 350px;">
					<div class="bg-white collapse multi-collapse" id="multiCollapseExample1" style="border-top-left-radius: 10px;border-bottom-left-radius: 10px;border-color: black;border: groove;">
				        	<div style="border-top-left-radius: 15px;border-bottom-left-radius: 15px; padding: 15px;width: 250px">
									
									<div class="pb-4 pt-4">

										<div class="form-group">
						        			<label for="date">Primera Fecha</label>
						        			<input type="date" id="pfecha" class="form-control">
						        		</div>

									</div>

									
									<div class="pb-4 pt-4">

										<div class="form-group">
						        			<label for="date">Segunda Fecha</label>
						        			<input type="date" id="sfecha" class="form-control">
						        		</div>


									</div>

									<div class="pb-3">

										<div >
						        			<button class="btn btn-secondary" onclick="getDatesLoc()">Aplicar rango</button>
						        		</div>


									</div>

				        	</div>
				
					</div>
				</div>
					
				<?php endif ?>

				

				<div class="modal fade" id="modalinfoqrs" role="dialog">
				    <div class="modal-dialog modal-lg">
				      <div class="modal-content">
				        <div class="modal-header">
				          <h4 class="modal-title">Info QRs</h4>
				        </div>
				        <div class="modal-body">

				        	<div class="col-sm-12">

				        		<div class="form-group mt-4">
				        			<label>QR</label>
				        			<div class="col-sm-4 text-center">
							  			<img id='barcode' 
	            							 src="https://api.qrserver.com/v1/create-qr-code/?data=00000&amp;size=100x100"
									         title="N/A"
									         width="150" 
									         height="150" />
							  		</div>
				        		</div>
				        		
				        		<div class="form-group mt-4">
				        			<label>Id evento</label>
				        			<input type="text" id="ideventonum" class="form-control" disabled="true">
				        		</div>
				        		
				        	</div>
				          


				        </div>
				        <div class="modal-footer">
				          	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						    <button type="button" class="btn btn-danger">Borrar</button>        
						</div>
				      </div>
				    </div>
				</div>
	<?php endif;?>

	<?php if(isset($_GET['addevent'])):?>

		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-left mt-4 ml-2">
					<a href="admin.php?eventos&typepage=1">
						<button class="form-control btn btn-secondary col-sm-2 mr-2 ml-4"><span class="fa fa-angle-left"></span> &nbsp;&nbsp; Atras </button>
					</a>
					
				</div>
				
			</div>
		</div>


		<div class="container p-4" id="addev">
		  	<h2 class="ml-4">Añadir Evento</h2>

		  	<div class="form-group ml-4 mr-4">
		  		<label for="text">Nombre del Evento</label>
		  		<input type="text" id="nombreevento" class="form-control">
		  	</div>

		  	<div class="row ml-2 mr-2">
			  		<div class="col-md-6 form-group">
			  			<label>Nombre del cliente</label>
			  			<input type="text" id="nombreclienteadd" class="form-control">
			  		</div>
			  		<div class="col-md-6 form-group">
			  			<label>No. contrato</label>
			  			<input type="text" id="ncontratoadd" class="form-control">
			  		</div>
			  	</div>

		  	<div class="form-group ml-4 mr-4">
		  		<label for="text">Tipo de evento</label>
		  		<select id="eventtype" class="form-control">
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
				  		<select id="ubicacionW" class="form-control" onchange="setDir()">
				  			<option value="">Seleccione el salon</option>
				  			<?php foreach ($ubicaciones as $key => $value): ?>
				  				<option value="<?php echo $value['idubicacion']?>"><?php echo $value['nombreubicacion']?></option>
				  			<?php endforeach ?>
				  		</select>
		  			</div>
		  		</div>
		  		<div class="col-sm-8">
		  			<div class="form-group ml-4 mr-4">
			  			<label for="text">Dirección del salon</label>
				  		<input type="text" id="direccion" disabled="true" class="form-control">
		  			</div>
		  		</div>
		  	</div>

			<div class="container">
		        <div class="row ml-0 mr-0">

		        <div class="form-group col-sm-4">
		        	<label for="date">Fecha de Inicio</label>
		        	<input type="date" id="pfechaadd" class="form-control">
		        </div>
		        <div class="form-group col-sm-4">
		        	<label for="time">H/Inicio</label>
		        	<input type="time" id="ptimeadd" class="form-control">
		        </div>
		        <br>
		        <div class="form-group col-sm-4">
		        	<label for="time">H/Fin</label>
		        	<input type="time" id="stimeadd" class="form-control">
		        </div>
		        	
		        </div>
		    </div>



		    <div class="row ml-2 mr-2">
			    <div class="form-group col-sm-12">
			  		<label for="text">Cantidad de invitados</label>
			  		<input type="text" id="cantinvitados" class="form-control">
			  	</div>
			</div>

			<div class="form-group ml-4 mr-4">
			  	<label for="text">Descripcion del evento</label>
				<textarea id="descripcion" class="form-control">
		  		</textarea>
			</div>

		    <button class="form-control btn btn-primary" onclick="registerEvent()">Registrar Evento</button>

		</div>
	<?php endif;?>

	<?php if(isset($_GET['byrango'])):?>

		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-left mt-4">
					<a href="admin.php?eventos&typepage=1">
						<button class="form-control btn btn-secondary col-sm-2 mr-2 ml-4"><span class="fa fa-angle-left"></span> &nbsp;&nbsp; Atras </button>
					</a>
				</div>
			</div>
		</div>

		<div class="container p-4">
		  	<h1 class="ml-4">Eventos por Rango</h1>
		   
			<p class="ml-4">Rango de fecha: <?php echo $fdatet?> - <?php echo $sdatet?> </p>

			<?php if (count($orderevent) > 0): ?>

				<?php foreach ($fechas as $key => $val): ?>

				<div class="container border border-primary mt-4 bg-white div-rounded text-center col-sm-4">
    				<div class="row">
    					<h2 class=" mt-2 mb-2 w-100"><?php echo strftime("%B, %d %G", strtotime($val))?></h2>
    				</div>
  				</div>


				<?php foreach ($orderevent as $key => $value): ?>

					<?php if ($val == $value['fecha']): ?>

						<div class=" div-rounded w-100 h-40 p-4 container mt-4 
							<?php if ($value["tipoeventoid"] == '1') echo "bg-dark text-white"; ?>
							<?php if ($value["tipoeventoid"] == '2') echo "bg-info text-white"; ?> 
							<?php if ($value["tipoeventoid"] == '3') echo "bg-secondary text-white"; ?>
							<?php if ($value["tipoeventoid"] == '4') echo "bg-light border border-dark text-dark"; ?>">

						  	<div class="row">

						  		<div class="col-sm-8 h-100">
						  			 <h2>Tipo de evento: <?php echo $value["tipoevento"]; ?></h2>
						  		</div>

						  		<div class="col-sm-4 h-100 w-100 d-flex justify-content-end">
						  			<h4>Identificacion del evento: <?php echo $value["id"]; ?></h4>
						  		</div>
						  		
						  	</div>

						  	<div class="row">

						  		<div class="col-sm-12 h-100">
						  			 <h5>Nombre del evento: <?php echo $value["nombreevento"];?></h5>
						  		</div>
						  		
						  	</div>

						  	<div class="row">

						  		<div class="col-sm-12 h-100">
						  			 <h5 class="text-white">Cantidad de Invitados: <?php echo $value["cantinvitados"];?> personas</h5>
						  		</div>
						  		
						  	</div>

						  	<br>

						  	<div class="row">

						  		<div class="col-sm-8">
							  		<div class="col-sm-6">
							  			<?php
							  				$temptimestart = date('g:i A', strtotime($value['hora_inicio'])); 
							  			?>
							  			<h5>Hora de inicio: <?php echo $temptimestart;?></h5>
							  		</div>

							  		<div class="col-sm-6">
							  			<?php
							  				$temptimeend = date('g:i A', strtotime($value['hora_fin'])); 
							  			?>
							  			<h5>Hora de fin: <?php echo $temptimeend;?></h5>
							  		</div>
						  		</div>

						  		<!--<div class="col-sm-4 text-center">
						  			<img id='barcode' 
            							 src="https://api.qrserver.com/v1/create-qr-code/?data=<?php echo $value['id'] ?>&amp;size=100x100"
								         title="HELLO" 
								         width="150" 
								         height="150" />
						  		</div>-->
						  	</div>

						  	<div class="row">

						  		<div class="col-sm-8 h-100 w-100 d-flex text-right mt-2">
						  			<a>
						  				<button class="form-control btn btn-warning" onclick='gotoEdit("<?php echo $value['id']?>")'>
						  				 Editar   <span class="fa fa-edit"></span> 
						  				</button>
						  			</a>
						  		</div>

						  		<div class="col-sm-4 h-100 w-100 d-flex ">
						  			<button class="form-control btn btn-warning" onclick="showModalWithQrsOfEvent(<?php echo $value['id']?>)">Codigos QR
						  				<span class="fa fa-qrcode"></span> 
						  			</button>
						  		</div>
						  	</div>
						  	
						</div>
						
					<?php endif ?>
					
				<?php endforeach ?>
				
			<?php endforeach ?>
				
			<?php else: ?>

				<div class="container border border-primary mt-4 bg-white div-rounded text-center col-sm-8">
    				<div class="row">
    					<h2 class=" mt-2 mb-2 w-100">No hay eventos para este rango</h2>
    				</div>
  				</div>
				
			<?php endif ?>

			<div class="btn bg-white" data-toggle="collapse" href="#multiCollapseExample1"
			style="position: absolute;right: 0px;top: 280px;max-width: 300px;height: 50px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;font-size: 15px;/* padding-left: 12px; */border-color: black;border: groove;padding: 13px; color: black">
			Rango de fecha
		</div>
		<div style="position: absolute;right: 0px;top: 350px;">
			<div class="bg-white collapse multi-collapse" id="multiCollapseExample1" style="border-top-left-radius: 10px;border-bottom-left-radius: 10px;border-color: black;border: groove;">
		        	<div style="border-top-left-radius: 15px;border-bottom-left-radius: 15px; padding: 15px;width: 250px">
									
									<div class="pb-4 pt-4">

										<div class="form-group">
						        			<label for="date">Primera Fecha</label>
						        			<input type="date" id="pfecha" class="form-control">
						        		</div>

									</div>

									
									<div class="pb-4 pt-4">

										<div class="form-group">
						        			<label for="date">Segunda Fecha</label>
						        			<input type="date" id="sfecha" class="form-control">
						        		</div>


									</div>

									<div class="pb-3">

										<div >
						        			<button class="btn btn-secondary" onclick="getDatesLoc()">Aplicar rango</button>
						        		</div>


									</div>

				        	</div>
				
					</div>
				</div>

			<div class="modal fade" id="modalinfoqrs" role="dialog">
			    <div class="modal-dialog modal-lg">
			      <div class="modal-content">
			        <div class="modal-header">
			          <h4 class="modal-title">Info QRs</h4>
			        </div>
			        <div class="modal-body">

			        	<div class="col-sm-12">

			        		<div class="form-group mt-4">
			        			<label>QR</label>
			        			<div class="col-sm-4 text-center">
						  			<img id='barcode' 
            							 src="https://api.qrserver.com/v1/create-qr-code/?data=NA&amp;size=100x100"
								         title="HELLO" 
								         width="150" 
								         height="150" />
						  		</div>
			        		</div>
			        		
			        		<div class="form-group mt-4">
			        			<label>Identificador de evento</label>
			        			<input type="text" id="ideventonum" class="form-control" disabled="true">
			        		</div>
			        		
			        	</div>
			          


			        </div>
			        <div class="modal-footer">
			          	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					    <button type="button" class="btn btn-danger">Borrar</button>        
					</div>
			      </div>
			    </div>
			</div>
	<?php endif;?>

</body>
</html>

<?php if ($_GET['typepage'] == 2): ?>

<script type="text/javascript">

	var date1 = "<?php echo($fdate) ?>";
	var date2 = "<?php echo($sdate) ?>";

	setDatesAlreadySelected();

	function setDatesAlreadySelected(){
		$('#pfecha').val(date1);
		$('#sfecha').val(date2);
	}

	function gotoEdit(id){
		console.log("ID",id);
		//window.location = "editevent.php?id="+id;
	}

</script>
	
<?php endif ?>

<script type="text/javascript">

	

</script>