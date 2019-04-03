<html> 
<head> 
<Title>Add a Customer</Title> 

</head> 
<body> 


<?php 
     include 'menu.html';// display menu 

     require_once 'logini.php'; 
      
     $query = "SELECT * from CUSTOMER"; 
     $result = $conn->query($query); 
     if(!$result) die ("Database Access Failed!"); 

     $rows = $result->num_rows; 

     $custometID = $lastName = $firstName = $streetAddress1 = $streetAddress2 = $city = $state = $postalCode = $country = $emailAddress = $homePhone = $facebookPageUrl = $cellPhone = $userid = $password = $salespersonID =  "";

     if (isset($_POST['submit'])){
          $custometID = fix_string($_POST['custometID']);
          $lastName = fix_string($_POST['lastName']);
          $firstName = fix_string($_POST['firstName']);
          $streetAddress1 = fix_string($_POST['streetAddress1']);
          $streetAddress2 = fix_string($_POST['streetAddress2']);
          $city = fix_string($_POST['city']);
          $state = fix_string($_POST['state']);
          $postalCode = fix_string($_POST['postalCode']);
          $country = fix_string($_POST['country']);
          $emailAddress = fix_string($_POST['emailAddress']);
          $homePhone = fix_string($_POST['homePhone']);
          $facebookPageUrl = fix_string($_POST['facebookPageUrl']);
          $cellPhone = fix_string($_POST['cellPhone']);
          $userid = fix_string($_POST['userid']);
          $password = fix_string($_POST['password']);
          $salespersonID = fix_string($_POST['salespersonID']);

          $query = "INSERT INTO CUSTOMER VALUES ($custometID, '$lastName','$firstName','$streetAddress1', '$streetAddress2','$city','$state', $postalCode, '$country','$emailAddress', '$homePhone','$facebookPageUrl','$cellPhone', '$userid','$password',$salespersonID);";

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
         

     echo <<<_END
     <br>
     <table border="0" bgcolor="#eeeeee" style = "margin: auto;">
      <th colspan="20" align="center">Add New Customer Data</th>

      <form method="post" action="">
        <tr><td>Customer ID</td>
          <td><input type="text"  name="custometID" value="$custometID">
          </td></tr><tr><td>Last Name</td>
          <td><input type="text"  name="lastName"  value="$lastName">
        </td></tr><tr><td>First Name</td>
          <td><input type="text"  name="firstName"  value="$firstName">
        </td></tr><tr><td>Street Address 1</td>
          <td><input type="text"  name="streetAddress1" value="$streetAddress1">
        </td></tr><tr><td>Street Address 2</td>
          <td><input type="text"  name="streetAddress2" value="$streetAddress2">
        </td></tr><tr><td>City</td>
          <td><input type="text"  name="city" value="$city">
        </td></tr><tr><td>State</td>
          <td><input type="text"  name="state"      value="$state">
        </td></tr><tr><td>Postal Code</td>
          <td><input type="text"  name="postalCode"    value="$postalCode">
        </td></tr><tr><td>Country</td>
          <td><input type="text"  name="country"      value="$country">
        </td></tr><tr><td>Email Address</td>
          <td><input type="text"  name="emailAddress"    value="$emailAddress">
          </td></tr><tr><td>Home Phone Number</td>
          <td><input type="text"  name="homePhone"    value="$homePhone">
          </td></tr><tr><td>Facebook URL</td>
          <td><input type="text"  name="facebookPageUrl"    value="$facebookPageUrl">
          </td></tr><tr><td>Cell Phone</td>
          <td><input type="text"  name="cellPhone"    value="$cellPhone">
          </td></tr><tr><td>User ID</td>
          <td><input type="text"  name="userid"    value="$userid">
          </td></tr><tr><td>Password</td>
          <td><input type="text"  name="password"    value="$password">
          </td></tr><tr><td>Sales Person ID</td>
          <td><input type="text"  name="salespersonID"    value="$salespersonID">
        </td></tr><tr><td colspan="20" align="center"><input type="submit" name = "submit"
          value="Add to Database"></td></tr>
      </form>
    </table>
_END;

  function fix_string($string)
  {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return htmlentities ($string);
  }

 
     echo "<br><br><h3>SOURCE CODE:</h3><br><br>";
     show_source("add.php"); // display menu 

?> 

</body> 
</html>