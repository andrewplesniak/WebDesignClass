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

     $firstName = $newemail = "";

     if (isset($_POST['submit'])){
          //Get values from form
          $firstName = $_POST['first_name'];
          $newemail = $_POST['email'];

          $query = "UPDATE CUSTOMER SET emailAddress = '$newemail' WHERE firstName = '$firstName'";

          // replace $link with $conn 
          $result=mysqli_query($conn, $query); 
          

          //if successfully insert data into database, displays message "successful". 
          if($result) { 
          header('Location: thankyou.php'); 
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
    <h1 class = "centered">Enter first name and new email address</h1>
    <form action="" method="post" class = "centered">
      <p>
         <label>First Name:</label>
         <input name="first_name" required="required" placeholder="John" type="text">
          <label>Your New E-Mail:</label>
         <input name="email" required="required" placeholder="random@mail.com" type="email">
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
