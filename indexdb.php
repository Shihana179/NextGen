<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 

$conn = mysqli_connect($servername, $username, $password,"dummy_client_data");

if($conn === false){
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $company_name=$_POST['company_name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $zip=$_POST['zip'];
    $country=$_POST['country'];
    $service=$_POST['service'];
    
    
    $sql ="INSERT INTO client_data (company_name, email, phone, address, city, zip, country, service_hours) VALUES ('$company_name','$email','$phone','$address','$city','$zip','$country','$service')";
    
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Success');</script>";
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
        mysqli_close($conn);

        
    }
?>