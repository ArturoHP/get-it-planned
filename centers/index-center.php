<?php 


	include_once('api/clases/events.php');

    $fecha = date("Y-m-d");
	$startDate = strftime("%B, %d %G", strtotime($fecha));
	$endDate = strftime("%B, %d %G", strtotime($fecha ."+ 6 days"));

	$events = new Events();


?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">

	<style>
      html {
        background: url('./imgs/cumple.jpg') no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        font-family: 'Montserrat', Arial, sans-serif;
      }

      body {
        background-color: transparent!important;
      }

      .img-rounded{
      	width: 350px;
  		height: 350px;
  		border-radius: 50%;
      }

      .logo {
        max-width: 450px;
      }

      .pricing-header {
        max-width: 780px;
      }
    </style>

	<title>Get it Planned</title>

</head>


	<body class="bg-cover d-block d-sm-block d-md-flex flex-column w-100">


		<div class="pricing-header px-3 py-4 pt-md-5 pb-md-4 mx-auto text-center w-100">
	      <div class="row d-block d-sm-block d-md-flex justify-content-center">
	        <img class="logo img-rounded" src="./imgs/giplannedlogo.png" style="width: 200px; height: 200px;">
	      <div class="pricing-header px-3 py-4 pt-md-5 pb-md-4 mx-auto text-center">
	      <h3 class="h2 text-white">Podras planificar y administrar tu evento facilmente como deberia de ser</h3>
	    </div>

	    <div class="form-signin needs-validation my-6 mx-auto align-items-center">
	      <div class="form-label-group">
	      	<input type="text" id="inputuser" class="form-control" required autofocus>
	        <label for="inputEmail">Usuario</label>
	      </div>
	      <div class="form-label-group">
	      	<input type="password" id="inputpass" class="form-control" >
	        <label for="inputEmail">Contraseña</label>
	      </div>
	      <button class="btn btn-secondary btn-sm btn-block d-flex align-items-center justify-content-center"onclick="log()">Iniciar sesión</button>

    	</div>
		



	</body>


</html>


<script type="text/javascript">
	
	function log(){
		window.location = "admin.php?eventos&typepage=1";
	}

</script>