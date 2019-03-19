<!DOCTYPE html>
<html>
	<head>
		<title>Lab 7 -- Andrew Plesniak</title>
	</head>

	<body>
		<?php 

			initialHTML();
			temps();
			names();
			colorquote();
			colorsort();
			countries();
			movies();

			echo "<br><br><h3>SOURCE CODE:</h3><br><br>";
			show_source("Lab7.php");






			function initialHTML() {

			$initialHTML = <<< initial

				<style>
					.centered{
						text-align: center;
						margin: auto;
					}

					body {
						background-color: lightgrey;

					}

					h1 {
						font-size: 300%;
					}

					.wrapper {
						background-color: darkgrey;
						padding: 20px 0px 75px 0px;
						margin: 20px 50px 20px 50px;

					}

					#title {
						margin-bottom: 50px;
						margin-top: 20px;

					}
				</style>

				<script>
				</script>

initial;
			print "$initialHTML";

			}

			function temps() {

				//Temperatures
				$temps = array(78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73);
				$tempAvg = round(array_sum($temps)/count($temps),1);
				sort($temps);

				$temp1  = $temps[0];
				$temp2  = $temps[1];
				$temp3  = $temps[2];
				$temp4  = $temps[3];
				$temp5  = $temps[4];
				$temp6  = $temps[5];
				$temp7  = $temps[6];
				$tempr1 = $temps[count($temps) - 7];
				$tempr2 = $temps[count($temps) - 6];
				$tempr3 = $temps[count($temps) - 5];
				$tempr4 = $temps[count($temps) - 4];
				$tempr5 = $temps[count($temps) - 3];
				$tempr6 = $temps[count($temps) - 2];
				$tempr7 = $temps[count($temps) - 1];
				

				$tempsHTML = <<< tempsHTML

				<div class = "wrapper">	
					<h1 class = "centered" id = "title">Temperatures</h1>

					<h3 class = "centered">Average temperature is : $tempAvg</h3>

					<h3 class = "centered">List of seven lowest temperatures : $temp1, $temp2, $temp3, $temp4, $temp5, $temp6, $temp7</h3>
					<h3 class = "centered">List of seven highest temperatures : $tempr1, $tempr2, $tempr3, $tempr4, $tempr5, $tempr6, $tempr7</h3>

				</div>
tempsHTML;
				print($tempsHTML);

			}

			function names() {

				//Names
				$namesValA = array("Sophia"=>"31","Jacob"=>"41","William"=>"39","Ramesh"=>"40");
				$namesKeyA = $namesValA;
				$namesValD = $namesValA;
				$namesKeyD = $namesValA;
				asort($namesValA);
				ksort($namesKeyA);
				arsort($namesValD);
				krsort($namesKeyD);

				//$namesHTML = <<< namesHTML

				print("<div class = \"wrapper\">");
					print("<h1 class = \"centered\" id = \"title\">Names</h1>");

					print("<h3 class = \"centered\">Ascending order sort by value: </h3>");
					print("<br><h3 class = \"centered\">");
					print_r($namesValA);
					print("</h3><br><br>");

					print("<h3 class = \"centered\">Ascending order sort by Key: </h3>");
					print("<br><h3 class = \"centered\">");
					print_r($namesKeyA);
					print("</h3><br><br>");

					print("<h3 class = \"centered\">Descending order sorting by Value: </h3>");
					print("<br><h3 class = \"centered\">");
					print_r($namesValD);
					print("</h3><br><br>");

					print("<h3 class = \"centered\">Descending order sorting by Key: </h3>");
					print("<br><h3 class = \"centered\">");
					print_r($namesKeyD);
					print("</h3>");
				print("</div>");
				
//namesHTML;
				//print($namesHTML);
			}

			function colorquote() {

				$color = array('white', 'green', 'red', 'blue', 'black');

				$quoteHTML = <<< quoteHTML

				<div class = "wrapper">	
					<h1 class = "centered" id = "title">Color Quote</h1>
					<h3 class = "centered">The memory of that scene for me is like a frame of film forever frozen at that moment: the $color[2] carpet, the $color[1] lawn, the $color[0] house, the leaden sky. The new president and his first lady. - Richard M. Nixon</h3>

				</div>
				
quoteHTML;
				print($quoteHTML);

			}	

			function colorsort() {
				$color = array('white', 'green', 'red');
				$colorsorted = array('white', 'green', 'red');
				sort($colorsorted);

				$sortHTML = <<< sortHTML

				<div class = "wrapper">	
					<h1 class = "centered" id = "title">Color Sort</h1>
					<h3 class = "centered">Original Array Content Order :</h3>
					<h3 class = "centered">$color[0], $color[1], $color[2]</h3>
					<br>
					<h3 class = "centered">Modified Array Content Order :</h3>
					<h3 class = "centered">$colorsorted[0]</h3>
					<h3 class = "centered">$colorsorted[1]</h3>
					<h3 class = "centered">$colorsorted[2]</h3>
				</div>
				
sortHTML;
				print($sortHTML);

			}

			function countries() {

				$ceu = array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", "Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid", "Sweden"=>"Stockholm", "United Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech Republic"=>"Prague", "Estonia"=>"Tallin", "Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" => "Vienna", "Poland"=>"Warsaw");

				asort($ceu);				

				print("<div class = \"wrapper\">");	
					print("<h1 class = \"centered\" id = \"title\">Countries</h1>");
					foreach($ceu as $country => $capital){
						print("<h3 class = \"centered\">The capital of $country is $capital</h3>");
					}
				print("</div>");
				

			
			}

			function movies(){

				$movies = array(
					array("Ironman","Jon Favreau","2008"),
					array("Captian America","Joe Johnston","2011"),
					array("Thor","Kenneth Branagh", "2011"),
					array("Black Panther","Ryan Coogler","2018"),
					array("Avengers","Anthony Russo","2019")
				);

				

				

			$header = <<< header

			<div class = "wrapper">	
					<h1 class = "centered" id = "title">Movies</h1>

			<table class = "centered" border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee">
	      				<th colspan="6" align="center">Movie Information</th>
	      				<tr></tr>
	      				<tr>
	      					<th colspan="2"align= "center">Title</th> 
	      					<th colspan="2"align= "center">Director</th> 
	      					<th colspan="2"align= "center">Release Year</th> 
	      				</tr>
header;

			print"$header";
			for($i = 0; $i < 5; $i++){
				print("<tr>");
				for($j = 0; $j < 3; $j++){
					echo"<td colspan=\"2\"align= \"center\">".$movies[$i][$j]."</td>";
				}
				print("</tr>");
			}
			print("</table>");
			print("</div>");

			}
		 ?>
	</body>
</html>