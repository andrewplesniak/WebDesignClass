<!DOCTYPE html>
<html>
	<head>
		<title>Lab 5 -- Andrew Plesniak</title>
	</head>

	<body>
		<?php 
			$validinput = false;
			$validinput = validate();
			$validinput2 = false;
			$validinput2 = validate2();

			if (isset($_POST['send']) && ($validinput2 == true)) {
				ini_set( 'display_errors', 1 );
	        	error_reporting( E_ALL );
	        	$from = $_POST['from'];
	        	$to = $_POST['to'];
	        	$subject = $_POST['subject'];
	        	$message = $_POST['message'];
	        	$headers = "From:" . $from. "@andrewplesniakwebdesign.x10host.com";
	        	$mailaccepted = mail($to,$subject,$message, $headers);
	        	if ($mailaccepted == true){
		        	echo "<h2>Test email sent</h2> <br>";
		        	echo "From: ", $from. "@andrewplesniakwebdesign.x10host.com", "<br>";
		        	echo "To: ", $to, "<br>";
		        	echo "Subject: ", $subject, "<br>";
		        	echo "Message: ", $message, "<br>";
		        }
		        else{
		        	echo "<h3 style = \"color: red; text-align: center;\">There was an error in your email submission, please try again and fill in all fields.</h3>";
					getBMI();
		        }
			}
			elseif (isset($_POST['send']) && ($validinput2 == false)){
				echo "<h3 style = \"color: red; text-align: center;\">There was an error in your email submission, please try again and fill in all fields.</h3>";
				getBMI();
			}
			elseif (isset($_POST['submit']) && ($validinput == true)) {
				showBMI();
			}
			else { 
				getBMI();
			} 

			echo "<h3>SOURCE CODE:</h3><br><br>";
			show_source("Lab5.php");

			function getBMI() {
				
				$initalHTML = <<< intial

				<style>
					.centered{
						text-align: center;
						margin: auto;
					}

					#BMIimg {
						display: block;
						margin: 20px auto 25px auto;
						width: 40%;
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
					function validate(form){
				        fail  = validateFirstName(form.firstName.value)
				        fail += validateWeight(form.weight.value)
				        fail += validateHeight(form.height.value)

				        if (fail == "")     return true
				        else { alert(fail); return false }
				      }

				    function validateFirstName(field){
				        return (field == "") ? "No first name was entered.\\n" : ""
				      }

				    function validateWeight(field){
				        if (field == "" || isNaN(field)) return "No weight was entered.\\n"
				        else if (field < 100 || field > 300)
				          return "Weight must be between 100 and 300 pounds.\\n"
				        return ""
				      }

				    function validateHeight(field){
				        if (field == "" || isNaN(field)) return "No height was entered.\\n"
				        else if (field < 60 || field > 84)
				          return "Height must be between 60 and 84 inches.\\n"
				        return ""
				      }

				</script>

				<div id = "wrapper">	
					<h1 class = "centered">Calculate Your BMI</h1>
					<img id = "BMIimg" src = "http://www.journey-fit.com/wp-content/uploads/2016/09/bmi-categories_med.jpeg" alt = "BMI Image">
					<table class = "centered" border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee">
	      				<th colspan="2" align="center">BMI Calculator</th>

						<form method="post" onSubmit="return validate(this)">
							<tr>
								<td>First Name</td>
								<td><input type="text" maxlength="16" name="firstName"></td>
							</tr>
							<tr>
								<td>Weight (Pounds)</td>
								<td><input type="text" maxlength="3" name="weight"></td>
							</tr>
							<tr>
								<td>Height (Inches)</td>
								<td><input type="text" maxlength="2" name="height"></td>
							</tr>
							<tr>
							<td colspan="2" align="center"><input type="submit" value="Calculate" name="submit"></td>
	          				</tr>
						</form>
					</table>
				</div>


intial;
				print "$initalHTML";
			}

			function showBMI(){
				$weight  = fix_string($_POST['weight'])/2.2046;
				$height  = fix_string($_POST['height'])*.0254;
				$BMI = round(($weight/pow($height,2)),2);
				if ($BMI < 18.5){
					$category = "underweight";
				}
				else if ($BMI < 24.9) {
					$category = "normal";
				}
				else if ($BMI < 29.9) {
					$category = "overweight";
				}
				else{
					$category = "obese";
				}

				$resultsHTML = <<< results

				<style>
					.centered{
						text-align: center;
						margin: auto;
					}

					.text{
						width: 85%;
					}


					#BMIimg {
						display: block;
						margin: 20px auto 25px auto;
						width: 40%;
					}

					body {
						background-color: lightgrey;

					}

					#wrapper {
						background-color: darkgrey;
						padding: 20px 0px 20px 0px;
						margin: 20px 50px 20px 50px;

					}
					#emailform{
						width: 50%;
				}
				</style>

				<script>
				</script>

				<div id = "wrapper">	
					<h1 class = "centered">Results</h1>
					<h2 class = "centered">Your BMI is: $BMI</h2>
					<h2 class = "centered">You are $category</h2>
					<img id = "BMIimg" src = "http://www.journey-fit.com/wp-content/uploads/2016/09/bmi-categories_med.jpeg" alt = "BMI Image">
					<table class = "centered" id= "emailform" border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee">
	      				<th colspan="4" align="center">Feedback or Questions</th>

						<form method="post" onSubmit="return validate(this)">
							<tr>
								<td>TO:</td>
								<td colspan="3"><input type="text" name="to" class = "text"></td>
							</tr>
							<tr>
								<td>SUBJECT:</td>
								<td colspan="3"><input type="text" name="subject" class = "text"></td>
							</tr>
							<tr>
								<td>MESSAGE:</td>
								<td colspan="3"><textarea name="message" rows="4" cols="50"></textarea></td>
							</tr>
							<tr>
								<td>FROM:</td>
								<td colspan="3"><input type="text" name="from" class = "text"></td>
							</tr>
							<tr>
							<td colspan="4" align="center"><input type="submit" value="Send" name="send"></td>
	          				</tr>
						</form>
					</table>
				</div>

results;
				print "$resultsHTML";
			}

			function validate(){
				$firstName = $weight = $height = "";

				if (isset($_POST['firstName']))
				    $firstName = fix_string($_POST['firstName']);
				if (isset($_POST['weight']))
				    $weight  = fix_string($_POST['weight']);
				if (isset($_POST['height']))
				    $height = fix_string($_POST['height']);

				$valid  = !(validate_notEmpty($firstName) || validate_weight($weight) || validate_height($height));

				return $valid;

			}

			function validate2(){
				$to = $from = $message = $subject = "";

				if (isset($_POST['to']))
				    $to = fix_string($_POST['to']);
				if (isset($_POST['from']))
				    $from  = fix_string($_POST['from']);
				if (isset($_POST['message']))
				    $message = fix_string($_POST['message']);
				if (isset($_POST['subject']))
				    $subject = fix_string($_POST['subject']);


				$valid  = !(validate_notEmpty($to) || validate_notEmpty($from) || validate_notEmpty($message) || validate_notEmpty($subject));

				return $valid;

			}

			function validate_notEmpty($field){
			    return ($field == "") ? true : false;
			  }

			function validate_height($field){
			    if ($field == ""){
			    	return true;
			    }
			    else if ($field < 60 || $field > 84){
			    	return true;
			    }
			  	else{
			    	return false;
			  	}
			  }

			function validate_weight($field){
			    if ($field == "") return true;
			    else if ($field < 100 || $field > 200)
			      return true;
			    return false;
			  }

			function fix_string($string){
			    if (get_magic_quotes_gpc()) $string = stripslashes($string);
			    return htmlentities ($string);
			  }

		 ?>
	</body>
</html>