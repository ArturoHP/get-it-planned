<?php 

class Events {


	function getEventsTypes(){

		$servername = "sql3.freesqldatabase.com";
	    $username = "sql3440305";
	    $password = "6QcU8871D3";
	    $dbname = "sql3440305";
	    
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    $conn -> set_charset('utf8');
	    
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }
	    
	    $sql = "SELECT * FROM eventostype";
	    $result = $conn->query($sql);

	    $eventosTypes = [];

	    if ($result->num_rows > 0) {
	        // output data of each row
	        while($row = $result->fetch_assoc()) {
	            array_push($eventosTypes, $row);
	        }
	    }

	    return $eventosTypes;

    	$conn->close();
	}

	function getEventsOrderByDate($datesup){

		$servername = "sql3.freesqldatabase.com";
	    $username = "sql3440305";
	    $password = "6QcU8871D3";
	    $dbname = "sql3440305";
	    
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    $conn -> set_charset('utf8');
	    
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }
	    
	    $sql = "SELECT * FROM eventos WHERE fecha >= '".$datesup."' ORDER BY fecha,hora_inicio";
	    $result = $conn->query($sql);

	    $eventosByDate = [];

	    if ($result->num_rows > 0) {
	        // output data of each row
	        while($row = $result->fetch_assoc()) {
	            array_push($eventosByDate, $row);
	        }
	    }

	    return $eventosByDate;

    	$conn->close();
	}

	function getEventsForMonthOrderByDate($fdate,$sdate){

		$servername = "sql3.freesqldatabase.com";
	    $username = "sql3440305";
	    $password = "6QcU8871D3";
	    $dbname = "sql3440305";
	    
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    $conn -> set_charset('utf8');
	    
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }
	    
	    $sql = "SELECT * FROM eventos WHERE fecha >= '".$fdate."' AND fecha <= '".$sdate."' ORDER BY fecha,hora_inicio";
	    $result = $conn->query($sql);

	    $eventosByDate = [];

	    if ($result->num_rows > 0) {
	        // output data of each row
	        while($row = $result->fetch_assoc()) {
	            array_push($eventosByDate, $row);
	        }
	    }

	    return $eventosByDate;

    	$conn->close();
	}

	function getEventsOrderByDateNRange($fdate,$sdate){

		$servername = "sql3.freesqldatabase.com";
	    $username = "sql3440305";
	    $password = "6QcU8871D3";
	    $dbname = "sql3440305";
	    
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    $conn -> set_charset('utf8');
	    
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }

	    $sql = "SELECT * FROM eventos WHERE fecha >= '".$fdate."' AND fecha <= '".$sdate."' ORDER BY fecha,hora_inicio";
	    
	    
	    $result = $conn->query($sql);

	    $eventosByDate = [];

	    if ($result->num_rows > 0) {
	        // output data of each row
	        while($row = $result->fetch_assoc()) {
	            array_push($eventosByDate, $row);
	        }
	    }

	    return $eventosByDate;

    	$conn->close();
	}

	function getDates($datesup){

		//Se traen los dias que hay aun vigentes
		// SELECT DISTINCT fecha FROM eventos ORDER BY fecha;

		$servername = "sql3.freesqldatabase.com";
	    $username = "sql3440305";
	    $password = "6QcU8871D3";
	    $dbname = "sql3440305";
	    
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    $conn -> set_charset('utf8');
	    
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }
	    
	    $sql = "SELECT DISTINCT fecha FROM eventos WHERE fecha >= '".$datesup."' ORDER BY fecha";
	    $result = $conn->query($sql);

	    $fechas = [];

	    if ($result->num_rows > 0) {
	        // output data of each row
	        while($row = $result->fetch_assoc()) {
	            array_push($fechas, $row['fecha']);
	        }
	    }

	    return $fechas;

    	$conn->close();

	}

	function getDatesForMonth($fdate,$sdate){

		//Se traen los dias que hay aun vigentes
		// SELECT DISTINCT fecha FROM eventos ORDER BY fecha;

		$servername = "sql3.freesqldatabase.com";
	    $username = "sql3440305";
	    $password = "6QcU8871D3";
	    $dbname = "sql3440305";
	    
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    $conn -> set_charset('utf8');
	    
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }
	    
	    $sql = "SELECT DISTINCT fecha FROM eventos WHERE fecha >= '".$fdate."' AND fecha <= '".$sdate."' ORDER BY fecha";
	    $result = $conn->query($sql);

	    $fechas = [];

	    if ($result->num_rows > 0) {
	        // output data of each row
	        while($row = $result->fetch_assoc()) {
	            array_push($fechas, $row['fecha']);
	        }
	    }

	    return $fechas;

    	$conn->close();

	}

	function getDatesByRange($fdate,$sdate){

		$servername = "sql3.freesqldatabase.com";
	    $username = "sql3440305";
	    $password = "6QcU8871D3";
	    $dbname = "sql3440305";
	    
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    $conn -> set_charset('utf8');
	    
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }
	    
	    // SELECT DISTINCT fecha FROM sql3440305.eventos WHERE fecha >= '2021-07-02' AND fecha <= '2021-11-02' ORDER BY fecha;

	    $sql = "SELECT DISTINCT fecha FROM eventos WHERE fecha >= '".$fdate."' AND fecha <= '".$sdate."' ORDER BY fecha";
	    
	    $result = $conn->query($sql);

	    $fechas = [];

	    if ($result->num_rows > 0) {
	        // output data of each row
	        while($row = $result->fetch_assoc()) {
	            array_push($fechas, $row['fecha']);
	        }
	    }

	    return $fechas;

    	$conn->close();

	}
	
	function getEventsOrderByDateNDay(){
		$events = $this->getEventsOrderByDate();
		$fechas = $this->getDates();

		$datesWevents = [];

		foreach ($fechas as $key => $val) {
			$dayEvents = [];
			foreach ($events as $key => $value) {
				if ($val== $value['fecha']) {
					array_push($dayEvents, $value);
				}
			}
			array_push($datesWevents, $dayEvents);
		}

		return $datesWevents;
	}




	function getUbicaciones(){

		$servername = "sql3.freesqldatabase.com";
	    $username = "sql3440305";
	    $password = "6QcU8871D3";
	    $dbname = "sql3440305";
	    
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    $conn -> set_charset('utf8');
	    
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }
	    
	    $sql = "SELECT * FROM ubicaciones";
	    $result = $conn->query($sql);

	    $ubicaciones = [];

	    if ($result->num_rows > 0) {
	        // output data of each row
	        while($row = $result->fetch_assoc()) {
	            array_push($ubicaciones, $row);
	        }
	    }

	    return $ubicaciones;

    	$conn->close();
	}

	function getTypeEventById($id){
		$servername = "sql3.freesqldatabase.com";
	    $username = "sql3440305";
	    $password = "6QcU8871D3";
	    $dbname = "sql3440305";
	    
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    $conn -> set_charset('utf8');
	    
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }
	    
	    $sql = "SELECT * FROM eventostype WHERE id =".$id;
	    $result = $conn->query($sql);

	    $row = $result->fetch_assoc();

	    return $row['nombreevento'];

    	$conn->close();
	}

	function getUbicacionById($id){
		$servername = "sql3.freesqldatabase.com";
	    $username = "sql3440305";
	    $password = "6QcU8871D3";
	    $dbname = "sql3440305";
	    
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    $conn -> set_charset('utf8');
	    
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }
	    
	    $sql = "SELECT * FROM ubicaciones WHERE idubicacion =".$id;
	    $result = $conn->query($sql);

	    $row = $result->fetch_assoc();

	    return $row['nombreubicacion'];

    	$conn->close();
	}

	function getInfoEventById($id){

		$servername = "sql3.freesqldatabase.com";
	    $username = "sql3440305";
	    $password = "6QcU8871D3";
	    $dbname = "sql3440305";
	    
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    $conn -> set_charset('utf8');
	    
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }
	    
	    $sql = "SELECT * FROM eventos WHERE idevento =".$id;
	    $result = $conn->query($sql);

	    $row = $result->fetch_assoc();

	    return $row;

    	$conn->close();

	}

	function getDireccionById($id){

		$servername = "sql3.freesqldatabase.com";
	    $username = "sql3440305";
	    $password = "6QcU8871D3";
	    $dbname = "sql3440305";
	    
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    $conn -> set_charset('utf8');
	    
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }
	    
	    $sql = "SELECT * FROM ubicaciones WHERE idubicacion =".$id;
	    $result = $conn->query($sql);

	    $row = $result->fetch_assoc();


	    return $row['direccion'];

    	$conn->close();

	}

	function getEventsOrderByRange($fdate,$sdate){
		$events = $this->getEventsOrderByDateNRange($fdate,$sdate);
		$fechas = $this->getDatesByRange($fdate,$sdate);

		$datesWevents = [];

		foreach ($fechas as $key => $val) {
			$dayEvents = [];
			foreach ($events as $key => $value) {
				if ($val== $value['fecha']) {
					array_push($dayEvents, $value);
				}
			}
			array_push($datesWevents, $dayEvents);
		}

		return $datesWevents;
	}

	function getStateById($id){
		$servername = "sql3.freesqldatabase.com";
	    $username = "sql3440305";
	    $password = "6QcU8871D3";
	    $dbname = "sql3440305";
	    
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    $conn -> set_charset('utf8');
	    
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }
	    
	    $sql = "SELECT * FROM estados_eventos WHERE id =".$id;
	    $result = $conn->query($sql);

	    $row = $result->fetch_assoc();


	    return $row['nombre_estado'];

    	$conn->close();

	}

	//Insert event

	/*

	INSERT INTO `sql3440305`.`eventos` (`tipoevento`, `fecha`, `cantinvitados`, `nombreevento`, `hora_inicio`, `hora_fin`, `urlinvitados`, `ubicacionevento`, `nombreeventohtml`) VALUES ('Boda', '2021-10-05', '75', 'Boda 5', '20:30:00', '02:00:00', '0', '0', '0');

	*/

	function insertEvent($data){

		$servername = "sql3.freesqldatabase.com";
	    $username = "sql3440305";
	    $password = "6QcU8871D3";
	    $dbname = "sql3440305";
	    
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    $conn -> set_charset('utf8');
	    
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }

	    $typeevent = $this->getTypeEventById($data['tipoevento']);
	    $ubi = $this->getUbicacionById($data['ubicacionevento']);
	    
	    $sql = "INSERT INTO `sql3440305`.`eventos` (`tipoevento`,`cliente`,`no_contrato`,`tipoeventoid`, `fecha`, `cantinvitados`, `nombreevento`, `hora_inicio`, `hora_fin`, `urlinvitados`, `ubicacionevento`, `ubicacioneventoid`,`descripcion_evento`) VALUES ('".$typeevent."','".$data['nombrecliente']."','".$data['ncontrato']."','".$data['tipoevento']."', '".$data['fecha']."', '".$data['cantinvitados']."', '".$data['nombreevento']."', '".$data['hora_inicio']."', '".$data['hora_fin']."', '0', '".$ubi."','".$data['ubicacionevento']."','".$data['descripcion']."');";

	    if ($conn->query($sql) === TRUE) {
 			return true;
		} else {
		    return false;
		}

    	$conn->close();
		
	}

	//Update event

	/*
	
	UPDATE `sql3440305`.`eventos` SET `tipoevento` = 'Cumpleañoss', `tipoeventoid` = '2', `fecha` = '2021-07-01', `cantinvitados` = '230', `nombreevento` = 'Hola prueba idd', `hora_inicio` = '18:00:00', `hora_fin` = '02:30:00', `ubicacionevento` = 'El Gran Campanario', `ubicacioneventoid` = '2' WHERE (`idevento` = '14');

	*/

	function updateEvent($data){
		$servername = "sql3.freesqldatabase.com";
	    $username = "sql3440305";
	    $password = "6QcU8871D3";
	    $dbname = "sql3440305";
	    
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    $conn -> set_charset('utf8');
	    
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }

	    $typeevent = $this->getTypeEventById($data['tipoevento']);
	    $ubi = $this->getUbicacionById($data['ubicacionevento']);
	    
	    $sql = "UPDATE `sql3440305`.`eventos` SET `tipoevento` = '".$typeevent."',`descripcion_evento` = '".$data['descripcion']."',`no_contrato` = '".$data['ncontrato']."',`cliente` = '".$data['nombrecliente']."', `tipoeventoid` = '".$data['tipoevento']."', `fecha` = '".$data['fecha']."', `cantinvitados` = '".$data['cantinvitados']."', `nombreevento` = '".$data['nombreevento']."', `hora_inicio` = '".$data['hora_inicio']."', `hora_fin` = '".$data['hora_fin']."', `ubicacionevento` = '".$ubi."', `ubicacioneventoid` = '".$data['ubicacionevento']."' WHERE (`idevento` = '".$data['idevento']."');";

	    if ($conn->query($sql) === TRUE) {
 			return true;
		} else {
		    return false;
		}

    	$conn->close();
	}

	//Delete event

	// DELETE FROM `sql3440305`.`eventos` WHERE (`idevento` = '17');

	function deleteEvent($id){

		$servername = "sql3.freesqldatabase.com";
	    $username = "sql3440305";
	    $password = "6QcU8871D3";
	    $dbname = "sql3440305";
	    
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    $conn -> set_charset('utf8');
	    
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }
	    
	    $sql = "DELETE FROM `sql3440305`.`eventos` WHERE (`idevento` = '".$id."');";

	    if ($conn->query($sql) === TRUE) {
 			return true;
		} else {
		    return false;
		}

    	$conn->close();

	}

}
?>