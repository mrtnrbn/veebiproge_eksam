<?php

require ("functions.php");


$name = "";
$row = "";
$seat = "";

if ( isset($_POST["name"])&&
		 isset($_POST["row"])&&
		 isset($_POST["seat"])&&
		 !empty($_POST["name"])&&
		 !empty($_POST["row"])&&
		 !empty($_POST["seat"])	)
		
		 {
		
		$name = $_POST["name"];
		$row = $_POST["row"];
		$seat = $_POST["seat"];
		
		addTicket ($name, $row, $seat);
		
		
		 }

	$people = getAllPeople();


?>

<form method="POST">
	<label>Nimi</label><br>
	<input type="text" name="name"><br>
	<label>Rea number</label>
	<input type="number" name="row" min="1" max="5"><br>
	<label>Istekoha number</label>
	<input type="number" name="seat" min="1" max="10"><br>
	<input type="submit" value="Sisesta pilet">
	
	
</form>

<?php


	
	$html = "<table class='table table-striped'>";
	
		$html .= "<tr>";
			$html .= "<th>name</th>";
			$html .= "<th>row</th>";
			$html .= "<th>seat</th>";
		$html .= "</tr>";
		
		foreach ($people as $p) {
			
			$html .= "<tr>";
				$html .= "<td>".$p->name."</td>";
				$html .= "<td>".$p->row."</td>";
				$html .= "<td>".$p->seat."</td>";
                //$html .= "<td><a href='edit.php?id=".$p->id."'>edit.php</a></td>";

			$html .= "</tr>";
		
		}
		
	$html .= "</table>";
	
	
	echo $html;





?>