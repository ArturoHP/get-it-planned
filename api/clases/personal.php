<?php 


/**
 * Arturo pepeña
 */
class Personal {
	
	function getPersonalTypes(){
		$servername = "sql3.freesqldatabase.com";
	    $username = "sql3421442";
	    $password = "pKpe2hQRvs";
	    $dbname = "sql3421442";
	    
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    $conn -> set_charset('utf8');
	    
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }
	    
	    $sql = "SELECT * FROM personaltype";
	    $result = $conn->query($sql);

	    $personalTypes = [];

	    if ($result->num_rows > 0) {
	        // output data of each row
	        while($row = $result->fetch_assoc()) {
	            array_push($personalTypes, $row);
	        }
	    }

	    return $personalTypes;

    	$conn->close();
	}
}


?>