<!DOCTYPE html>
<html>
	<head>
		<title>Lab 6 -- Andrew Plesniak</title>
	</head>

	<body>
		<?php 
			if (isset($_POST['submit3'])) {
				bill();
				
			}
			elseif (isset($_POST['submit2'])){
				prime();	
			}
			elseif (isset($_POST['submit1'])) {
				factorial();			
			}
			else { 
				home();
			} 

			echo "<br><br><h3>SOURCE CODE:</h3><br><br>";
			show_source("Lab6.php");

			function home() {
				
				$initialHTML = <<< initial

				<style>
					.centered{
						text-align: center;
						margin: auto;
					}

					#factorial {
						float: left;
						width: 33%;
					}

					#prime {
						float: left;
						width: 33%;

					}

					#bill {
						float: left;						
						width: 33%;
						height: 80%;
					}

					body {
						background-color: lightgrey;

					}

					h1 {
						font-size: 300%;
					}

					#wrapper {
						background-color: darkgrey;
						padding: 20px 0px 200px 0px;
						margin: 20px 50px 20px 50px;

					}

					#title {
						margin-bottom: 50px;
						margin-top: 20px;

					}
				</style>

				<script>
					function validateFactorial(form){
				        fail  = validateField(form.factorial.value)

				        if (fail == "")     return true
				        else { alert(fail); return false }
				      }

				    function validatePrime(form){
				        fail  = validateField(form.prime.value)

				        if (fail == "")     return true
				        else { alert(fail); return false }
				      }

				    function validatePretax(form){
				        fail  = validateField(form.pretax.value)

				        if (fail == "")     return true
				        else { alert(fail); return false }
				      }
			
				    function validateField(field){
				        if (field == "" || isNaN(field) || field < 0) return "Please Enter a Valid Non-Negative Number.\\n"
				        return ""
				      }

				</script>

				<div id = "wrapper">	
					<h1 class = "centered" id = "title">Calculator Programs</h1>

					<div id = "factorial">
						<table class = "centered" border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee">
		      				<th colspan="2" align="center">Factorial Calculator</th>

							<form method="post" onSubmit="return validateFactorial(this)">
								<tr>
									<td>Please Enter a Number:</td>
									<td><input type="text" name="factorial"></td>
								</tr>
								<tr>
								<td colspan="2" align="center"><input type="submit" value="Calculate" name="submit1"></td>
		          				</tr>
							</form>
						</table>
					</div>

					<div id = "prime">
						<table class = "centered" border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee">
		      				<th colspan="2" align="center">Prime Number?</th>

							<form method="post" onSubmit="return validatePrime(this)">
								<tr>
									<td>Please Enter a Number:</td>
									<td><input type="text" name="prime"></td>
								</tr>
								<tr>
								<td colspan="2" align="center"><input type="submit" value="Calculate" name="submit2"></td>
		          				</tr>
							</form>
						</table>
					</div>

					<div id = "bill">
						<table class = "centered" border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee">
		      				<th colspan="2" align="center">Total Bill Calculator</th>

							<form method="post" onSubmit="return validatePretax(this)">
								<tr>
									<td>Total Before Tax:   $</td>
									<td><input type="text" name="pretax"></td>
								</tr>
								<tr>
									<td>Desired Tip:</td>
									<td>
										<select name = "tip">
											<option value=0.10>10%</option>
										    <option value=0.15>15%</option>
										    <option value=0.20>20%</option>
										</select>
									</td>
								</tr>
								<td colspan="2" align="center"><input type="submit" value="Calculate" name="submit3"></td>
		          				</tr>
							</form>
						</table>
					</div>
				</div>


initial;
				print "$initialHTML";
			}

			function prime(){
				$input  = fix_string($_POST['prime']);
				$result = primecalc($input);
				
				$primeHTML = <<< primeresults

				<style>
					.centered{
						text-align: center;
						margin: auto;
					}

					body {
						background-color: lightgrey;

					}

					#wrapper {
						background-color: darkgrey;
						padding: 20px 0px 20px 0px;
						margin: 20px 50px 20px 50px;

					}
				</style>

				<script>
				</script>

				<div id = "wrapper">	
					<h1 class = "centered">Results</h1>
					<h2 class = "centered">$input $result</h2>
				</div>

primeresults;
				print "$primeHTML";
			}

			function primecalc($input) {
				if (($input%2 == 0 && $input != 2) || $input == 1){
					return("is not a prime number");
				}
        
			    else {
			        $i = floor(sqrt($input));
			        if ($i%2 == 0) {
			            $i--;
			        }

			        while ($i > 1) {
			            if ($input % $i == 0) {
			                return("is not a prime number");
			            }
			            $i = $i - 2; 
			        }
			        return("is a prime number");
			    }
			}

			function bill(){
				$pretax  = fix_string($_POST['pretax']);
				$tiprate = $_POST['tip'];
				$tax = round(0.07*$pretax,2);
				$tip = round($tiprate*($pretax + $tax),2);
				$total = round($pretax + $tax + $tip,2); 

				

				$billHTML = <<< billresults

				<style>
					.centered{
						text-align: center;
						margin: auto;
					}

					body {
						background-color: lightgrey;

					}

					#wrapper {
						background-color: darkgrey;
						padding: 20px 0px 20px 0px;
						margin: 20px 50px 20px 50px;

					}
				</style>

				<script>
				</script>

				<div id = "wrapper">	
					<h1 class = "centered">Results</h1>
					<h3 class = "centered">Pre-tax total: $ $pretax</h3>
					<h3 class = "centered">tax: $ $tax</h3>
					<h3 class = "centered">tip: $ $tip</h3>
					<h2 class = "centered">Your total bill is: $ $total</h2>
				</div>

billresults;
				print "$billHTML";
			}

			function factorial(){
				$input  = fix_string($_POST['factorial']);
				$factorial = 1;
				for ($i = $input; $i > 0; $i--){
					$factorial *= $i;
				}
				

				$factorialHTML = <<< factorialresults

				<style>
					.centered{
						text-align: center;
						margin: auto;
					}

					body {
						background-color: lightgrey;

					}

					#wrapper {
						background-color: darkgrey;
						padding: 20px 0px 20px 0px;
						margin: 20px 50px 20px 50px;

					}
				</style>

				<script>
				</script>

				<div id = "wrapper">	
					<h1 class = "centered">Results</h1>
					<h2 class = "centered">$input ! = $factorial</h2>
				</div>

factorialresults;
				print "$factorialHTML";
			}

			function fix_string($string){
			    if (get_magic_quotes_gpc()) $string = stripslashes($string);
			    return htmlentities ($string);
			  }
		 ?>
	</body>
</html>