<?php
	
	require_once("../../config.php");
	$database="if16_martreba";

	function addTicket ($name, $row, $seat)	{
		
		$database = "if16_martreba";
		
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $database);
		
		$stmt = $mysqli->prepare("INSERT INTO veebiproge_eksam(name, row, seat) VALUE (?, ?, ?)");
		$stmt->bind_param("sii", $name, $row, $seat);
		
		if ($stmt->execute()){
				echo "Success";
				} 
		
		
		
	}

	
	function getAllPeople() {
		
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);

		$stmt = $mysqli->prepare("
			SELECT name, row, seat
			FROM veebiproge_eksam
			
		");
		$stmt->bind_result($name, $row, $seat);
		$stmt->execute();
		
		$results = array();
		
		// tsükli sisu tehakse nii mitu korda, mitu rida
		// SQL lausega tuleb
		while ($stmt->fetch()) {
			
			$human = new StdClass();
			$human->name = $name;
			$human->row = $row;
			$human->seat = $seat;
			
			
			//echo $color."<br>";
			array_push($results, $human);
			
		}
		
		return $results;
		
	}
	
?>