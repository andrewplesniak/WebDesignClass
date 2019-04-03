<!DOCTYPE html> 
<html> 
<head> 
    <title>Lab 9 -- Andrew Plesniak</title> 
</head> 

<body>
<?php 
     include 'menu.html';// display menu 

     require_once 'logini.php'; 
      
     $query = "SELECT * from CUSTOMER"; 
     $result = $conn->query($query); 
     if(!$result) die ("Database Access Failed!"); 

     $firstName = "";

     if (isset($_POST['submit'])){
          //Get values from form
          $firstName = $_POST['first_name'];

          $query = "SELECT * from CUSTOMER WHERE firstName = '$firstName';"; 

          // replace $link with $conn 
          $result=mysqli_query($conn, $query);
          

          //if successfully insert data into database, displays message "successful". 
          if($result) { 
            $rows = $result->num_rows;
                if ($rows != 0){
                    echo "<br><h1 class = 'centered'>Search Results:</h1><table style = \"font-size:50%\"><tr><th>Customer ID</th><th>Last Name</th><th>First Name</th><th>Street Address 1</th><th>Street Address 2</th><th>City</th><th>State</th><th>Postal Code</th><th>Country</th><th>Email</th><th>Home Phone</th><th>Facebook</th><th>Cell</th><th>UserID</th><th>Password</th><th>Sales Person ID</th></tr>"; 
                
                 for ($j = 0; $j < $rows; ++$j){ 
                      $row = $result->fetch_array(MYSQLI_NUM); 

                      echo "<tr>"; 
                      for ($k = 0; $k < 16; ++$k) 
                           echo "<td>".htmlspecialchars($row[$k])."</td>"; 
                      echo "</tr>";
                  } 

                 echo "</table>"; 
              }
              else{
                echo "<br><h1 class = 'centered'> Search Results: No User Found</h1>";
                }
            }
          else { 
            echo "ERROR"; 
          } 

          //close mysql - replaced $link with $conn 
          mysqli_close($conn);                 
     }
?>

<br><br>
<div id = "wrapper">
    <h1 class = "centered">Enter First Name to Search</h1>
    <form action="" method="post" class = "centered">
      <p>
         <label>First Name:</label>
         <input name="first_name" required="required" placeholder="John" type="text">
          <input value="Submit" name = "submit" type="submit">
        </p>
    </form>
</div>

<?php 
echo "<br><br><h3>SOURCE CODE:</h3><br><br>";
show_source("edit.php"); // display menu 
?> 

</body> 
</html> 
