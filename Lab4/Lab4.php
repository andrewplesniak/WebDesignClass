<!DOCTYPE html>
<html>
	<head>
		<title>Lab 4 -- Andrew Plesniak</title>
	</head>

	<body>
		<?php 
			for ($i = 100; $i > 0; $i--){
				if ($i%5 == 0 && $i%3 == 0){
					echo("Hail to Pitt<br />");
				}
				else if ($i%3 == 0){
					echo("Hail to <br />");
				}
				else if ($i%5 == 0){
					echo("Pitt<br />");
				}
				else{
					echo("$i<br />");
				}
			}
			echo "<br><br><br><h3>SOURCE CODE:</h3><br><br>";
			show_source("Lab4.php");
		 ?>
	</body>
</html>