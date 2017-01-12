<?php
	
	require_once("../../config.php");

	function addTicket ($name, $row, $seat)	{
		
		$database = "if16_martreba";
		
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $database);
		
		$stmt = $mysqli->prepare("INSERT INTO veebiproge_eksam(name, row, seat) VALUE (?, ?, ?)");
		$stmt->bind_param("sii", $name, $row, $seat);
		
		if ($stmt->execute()){
				echo "Success";
				} 
		
		
		
	}

?>