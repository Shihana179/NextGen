<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 

$conn = mysqli_connect($servername, $username, $password,"dummy_client_data");

if($conn === false){
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
}
$query="SELECT * FROM client_data";
$result=mysqli_query($conn,$query);
?>