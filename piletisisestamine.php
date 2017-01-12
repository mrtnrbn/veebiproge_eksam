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
<h3>Vabad kohad</h3>

<?php

	$html = "<h3>Vabad kohad</h3>";

	
	$html = "<table class='table table-striped'>";
	
		$html .= "<tr>";
			$html .= "<th>name</th>";
			$html .= "<th>row</th>";
			$html .= "<th>seat</th>";
		$html .= "</tr>";
		
		for ($r=1; $r <= 5; $r++)	{
			$exists = false;
				foreach ($people as $p) {
					if ($p->row == $r) {
						$exists = true;
					}
				}
				
					//rida
	
					for ($i=1; $i <= 5; $i++)	{
						
						//echo "$i<br>";
	
						$exists = false;
						
						foreach ($people as $p) {
						

							if ($p->seat == $i && $p->row == $r ){
									//echo "x<br>";
								$exists = true;
							}
						}
							//else
								//echo "$i<br>";
						if($exists){
							echo "X<br>";
						}else{
							echo "$i<br>";
						}
					}
			
	
		}
		foreach ($people as $p) {
			
			$html .= "<tr>";
				$html .= "<td>".$p->name."</td>";
				$html .= "<td>".$p->row."</td>";
				$html .= "<td>".$p->seat."</td>";


			$html .= "</tr>";
		
		}
		
	$html .= "</table>";
		
	
	
	echo $html;





?>



<br>

<label>Vali seanss:</label>
<form method="POST">
	<select name="seanss">
		<option value="8:15">8:15</option>
		<option value="10:15">10:15</option>
		<option value="12:15">12:15</option>
		<option value="14:15">14:15</option>
		<option value="16:15">16:15</option>
</form>
<input type="submit" value="Kinnita">