<?php

include_once('api/clases/personal.php'); 
$personal = new Personal();

$personalTypes = $personal->getPersonalTypes();

print_r($personalTypes);



?>
<!DOCTYPE html>
<html>
<head>
	<title>Personal</title>

	<style>
	
	  html {
	  	background: url('./imgs/forpersonal.jpg')no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;

      }

	  body {
        background-color: transparent!important;
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
	      <a class="navbar-brand" href="admin.php?eventos"><img src="./imgs/giplannedlogo.png" class="img-rounded logo"></a>
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
      <div class="col-sm-12 text-left mt-4 mb-4">
          <a href="admin.php?eventos&typepage=1">
            <button class="form-control btn btn-secondary col-sm-2 mr-2 ml-4"><span class="fa fa-angle-left"></span> &nbsp;&nbsp; Atras </button>
          </a>
        </div>
			<div class="col-sm-12 text-right mt-4">
				<button class="form-control btn btn-secondary col-sm-3 mr-2" data-toggle="modal" data-target="#modaladdpersonal">Añadir personal &nbsp;&nbsp;<span class="fa fa-plus"></span></button>
			</div>
			
		</div>
	</div>


	<div class="modal fade" id="modaladdpersonal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Añadir personal</h4>
        </div>
        <div class="modal-body">

        	<div class="col-sm-12">

        		<div class="form-group mt-4">
        			<label>Nombre</label>
        			<input type="text" id="nombre" class="form-control">
        		</div>
        		<div class="form-group mt-4">
        			<label>Puesto</label>
        			<select class="form-control">
        				<option>Seleccione un puesto</option>
        				<?php foreach ($personalTypes as $key => $value): ?>
        					<option value="<?php echo($value['id']) ?>"><?php echo($value['nombretype']) ?></option>
        				<?php endforeach ?>
        			</select>
        		</div>
        		<div class="form-group mt-4">
        			<label>Sueldo</label>
        			<input type="text" id="sueldo" class="form-control" disabled="true">
        		</div>
        		
        	</div>
          


        </div>
        <div class="modal-footer">
          	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		    <button type="button" class="btn btn-danger" onclick="eraseEvent(<?php echo $idevento ?>)">Borrar</button>        
		</div>
      </div>
    </div>
  </div>




  <div class="modal fade" id="modaleditpersonal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Editar personal</h4>
        </div>
        <div class="modal-body">

        	<div class="col-sm-12">

        		<div class="form-group mt-4">
        			<label>Nombre</label>
        			<input type="text" id="nombre" class="form-control">
        		</div>
        		<div class="form-group mt-4">
        			<label>Puesto</label>
        			<select class="form-control" onchange="setSueldo()" id="puesto">
        				<option value="">Seleccione un puesto</option>
        				<?php foreach ($personalTypes as $key => $value): ?>
        					<option value="<?php echo($value['sueldo']) ?>"><?php echo($value['nombretype']) ?></option>
        				<?php endforeach ?>
        			</select>
        		</div>
        		<div class="form-group mt-4">
        			<label>Sueldo</label>
        			<input type="text" id="sueldo" class="form-control" disabled="true">
        		</div>
        		
        	</div>
          


        </div>
        <div class="modal-footer">
          	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		    <button type="button" class="btn btn-danger" onclick="eraseEvent(<?php echo $idevento ?>)">Borrar</button>        
		</div>
      </div>
    </div>
  </div>



</body>
</html>