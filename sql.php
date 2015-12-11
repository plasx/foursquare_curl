<?php
include 'config.php';

$connection = new mysqli(servername, username, password, dbname);

function sql_connect($conn, $tokenz = null){

	if ($conn->connect_error) {

        die("Connection failed: " . $conn->connect_error);

    }else{

	    if (isset($tokenz)){
			$sql = "UPDATE tokens SET token = '" . $tokenz . "' WHERE api = 'foursquare'";
		}else{
			$sql = "SELECT id, token, api FROM tokens WHERE api='foursquare'";
		}

	    $result = $conn->query($sql);
	    $row = $result->fetch_assoc();
	    $row = $row['token'];
	    return $row;
	    $conn->close();
	    
    }
	
}

?>