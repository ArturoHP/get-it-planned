<?php 


/**
 * Arturo peña project
 */
class Invitados{
	
	function getInvitadosByEvento($id){

		$servername = "sql3.freesqldatabase.com";
	    $username = "sql3421442";
	    $password = "pKpe2hQRvs";
	    $dbname = "sql3421442";
	    
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    $conn -> set_charset('utf8');
	    
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }
	    
	    $sql = "SELECT * FROM allInvitados WHERE idevento = ".$id.";";
	    $result = $conn->query($sql);

	    $invitados = [];

	    if ($result->num_rows > 0) {
	        // output data of each row
	        while($row = $result->fetch_assoc()) {
	            array_push($invitados, $row);
	        }
	    }

	    return $invitados;

    	$conn->close();
		
	}

	function registerInvitado($data){

		$servername = "sql3.freesqldatabase.com";
	    $username = "sql3421442";
	    $password = "pKpe2hQRvs";
	    $dbname = "sql3421442";
	    
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    $conn -> set_charset('utf8');
	    
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }

	    $sql = "INSERT INTO allInvitados (`nombre`, `idevento`) VALUES ('".$data['nombre']."', '".$data['id']."');";

	    if ($conn->query($sql) === TRUE) {
 			return true;
		} else {
		    return false;
		}

    	$conn->close();

	}

	function registerInvitadoC($nombre,$idevento){

		$servername = "sql3.freesqldatabase.com";
	    $username = "sql3421442";
	    $password = "pKpe2hQRvs";
	    $dbname = "sql3421442";
	    
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    $conn -> set_charset('utf8');
	    
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }

	    $sql = "INSERT INTO `sql3421442`.`allInvitados` (`nombre`, `idevento`) VALUES ('".$nombre."', '".$idevento."');";

	    if ($conn->query($sql) === TRUE) {
 			return true;
		} else {
		    return false;
		}

    	$conn->close();

	}

	function updateInvitado($data){

		$servername = "sql3.freesqldatabase.com";
	    $username = "sql3421442";
	    $password = "pKpe2hQRvs";
	    $dbname = "sql3421442";
	    
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    $conn -> set_charset('utf8');
	    
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }

	    // UPDATE `sql3421442`.`allInvitados` SET `nombre` = 'A ver al cine' WHERE (`idpersona` = '8');

	    $sql = "UPDATE `sql3421442`.`allInvitados` SET `nombre` = '".$data['nombre']."' WHERE (`idpersona` = '".$data['id']."');";

	    if ($conn->query($sql) === TRUE) {
 			return true;
		} else {
		    return false;
		}

    	$conn->close();

	}

	function deleteInvitado($data){

		$servername = "sql3.freesqldatabase.com";
	    $username = "sql3421442";
	    $password = "pKpe2hQRvs";
	    $dbname = "sql3421442";
	    
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    $conn -> set_charset('utf8');
	    
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }

	    // DELETE FROM `sql3421442`.`allInvitados` WHERE (`idpersona` = '11');


	    $sql = "DELETE FROM allInvitados WHERE (`idpersona` = '".$data['id']."');";

	    if ($conn->query($sql) === TRUE) {
 			return true;
		} else {
		    return false;
		}

    	$conn->close();

	}










}



?>