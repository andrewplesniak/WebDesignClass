<!DOCTYPE HTML> 
<html> 
<head> 
<title>PHP Login file sample</title> 
</head> 
<body> 

<?php //login.php 
     $db_hostname = 'localhost'; 
     $db_database = 'andrewpl_database1'; 
     $db_username = 'andrewpl_andrew'; 
     $db_password = 'andrew123'; 

//connect to server using mysqli 
     $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database); 
     if ($conn->connect_error) die("Fatal Error"); 

//select the database 
//mysql_select_db($db_database) 
//  or die("Unable to select database: ".mysql_error()); 

// echo "<br><br>"; 
// show_source("login.php"); 

?> 

</body> 
</html>