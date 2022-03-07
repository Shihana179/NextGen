
<?php
  
  // Get the user id 
  $company_name = $_REQUEST['company_name'];
    
  // Database connection
  $con = mysqli_connect("localhost", "root", "", "dummy_client_data");
    
  if ($company_name !== "") {
        
      // Get corresponding first name and 
      // last name for that user id    
      $query = mysqli_query($con, "SELECT * FROM client_data WHERE company_name='$company_name'");
    
      $row = mysqli_fetch_array($query);
    
      // Get the first name
      $email = $row["email"];
    
      // Get the first name
      $address=$row["address"].','.$row["city"].','.$row["country"].','.$row["zip"];
      $service_hour=$row["service_hours"];
  }
    
  // Store it in a array
  $result = array("$address", "$email", "$service_hour");
    
  // Send in JSON encoded form
  $myJSON = json_encode($result);
  echo $myJSON;
  ?>