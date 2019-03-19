<!DOCTYPE html>
<html>
	<head>
		<title>Midterm -- Andrew Plesniak</title>
	</head>

	<body>
		<style>
			.centered{
						text-align: center;
						margin: auto;
					}
		</style>
		<?php 
			$months = array("January"=> 31,"February"=> 28,"March"=> 31,"April"=> 30,"May"=> 31,"June"=> 30,"July"=> 31,"August"=> 31,"September"=> 30,"October"=> 31,"November"=> 30,"December"=> 31);

			ksort($months);

			

			$tableheader = <<< tableheader

			<table class = "centered" border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee">
	      				<th colspan="4" align="center">Alphabetically Sorted Months</th>
	      				<tr></tr>
tableheader;

			print"$tableheader";



			foreach($months as $month => $numdays){
				$tablerow = <<< tablerow
				<tr>
					<td colspan="2">$month</td>
					<td colspan="2">$numdays</td>
				</tr>
tablerow;
			print"$tablerow";
			}


					print "</table>";



			echo "<br><br><br><h3>SOURCE CODE:</h3><br><br>";
			show_source("midterm.php");
		 ?>
	</body>
</html>