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
        $onsite_engineer=$_POST['onsite_engineer'];
        $date=$_POST['date'];
        $start_time=$_POST['start_time'];
        $end_time=$_POST['end_time'];
        $service_hour=$_POST['service_hour'];
        $address=$_POST['address'];
        $email=$_POST['email'];
        $problems=$_POST['problems'];
        $solution=$_POST['solution'];
        $feedback=$_POST['feedback'];
        $digital_signature=$_POST['digital_signature'];
    
    
    
    $sql ="INSERT INTO report (company_name, onsite_engineer, date, start_time, end_time, service_hour, address, problems, solution, feedback, email, digital_signature) VALUES ('$company_name','$onsite_engineer','$date','$start_time','$end_time','$service_hour','$address','$problems','$solution','$feedback','$email','$digital_signature')"; 
    
    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    $sql ="UPDATE client_data SET service_hours='$service_hour' WHERE company_name='$company_name'";
    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
        mysqli_close($conn);



    }

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
            $company_name=$_POST['company_name'];
            $onsite_engineer=$_POST['onsite_engineer'];
            $date=$_POST['date'];
            $start_time=$_POST['start_time'];
            $end_time=$_POST['end_time'];
            $service_hour=$_POST['service_hour'];
            $address=$_POST['address'];
            $email=$_POST['email'];
            $problems=$_POST['problems'];
            $solution=$_POST['solution'];
            $feedback=$_POST['feedback'];
            $digital_signature=$onsite_engineer."<br>".$date;


$mpdf = new \Mpdf\Mpdf();


$data="";
 $data.= '<div style="font:rubik; text-align:center;"><h1 style="color:#5c7292;">NextGenIT</h1>'
  .'<h3 style="text-align:right; font-size:18px;font-weight:bold; color:#BAABAB;">Service Report</h3><br>'
  .'<table style="margin:5px 40px; width:80%;"><tr><td style="font-size:13px; font-weight:bold;">On-Site Engineer:</td><td style="padding-right:20px; font-size:13px; font-weight:bold;"> '. $onsite_engineer.'</td>'
  .'<td style="font-size:13px; font-weight:bold;">Start Time: </td><td style="font-size:13px; font-weight:bold;">'. $start_time.'</td></tr>'
  .'<tr><td style="font-size:13px; font-weight:bold;">Date:</td><td style="padding-right:20px; font-size:13px; font-weight:bold;"> '. $date.'</td>'
  .'<td style="font-size:13px; font-weight:bold;">End Time:</td><td style="font-size:13px; font-weight:bold;"> '. $end_time.'</td></tr>'
  .'<tr><td style="font-size:13px; font-weight:bold; ">Service Hour:</td><td style="font-size:13px; font-weight:bold;">'. $service_hour.'</td></tr>'
  .'<tr><td style="font-size:15px; font-weight:bold; padding:20px 0;">Customer Details</td></tr>'
  .'<tr><td style="font-size:13px; font-weight:bold; padding-bottom:6px;"> Company Name:'. $company_name.'</td></tr>'
  .'<tr><td style="font-size:13px; font-weight:bold;">Address:</td></tr><tr><td style="font-size:13px; font-weight:bold; padding-bottom:6px;"> '. $address.'</td></tr>'
  .'<tr><td style="font-size:14px; font-weight:bold;">Problems: </td></tr><tr><td style="font-size:14px;padding-bottom:6px;">'. $problems.'</td></tr>'
  .'<tr><td style="font-size:14px; font-weight:bold;">Solution:</td></tr><tr><td style="font-size:14px;padding-bottom:6px;"> '. $solution.'</td></tr>'
  .'<tr><td style="font-size:14px; font-weight:bold;">Feedback:</td></tr><tr><td style="font-size:14px;padding-bottom:6px;"> '. $feedback.'</td></tr>'
  .'<tr><td style="font-size:14px; font-weight:bold;">Digital Signature: </td></tr><tr><td style="font-size:12px; font-family:Snell Roundhand, cursive">'. $digital_signature.'</td></tr></table></div>';

$mpdf->WriteHtml($data);

$pdf=$mpdf->output("",'S');


$mail = new PHPMailer();

$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "shihanafora2z@gmail.com";                 
$mail->Password = "NextGenIt";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to
$mail->Port = 587;

$mail->From = "shihanafora2z@gmail.com";
$mail->FromName = "Next Gen";

$mail->addAddress($email, $company_name);

//Provide file path and name of the attachments
$mail->addStringAttachment($pdf, "Report.pdf");        


$mail->isHTML(true);

$mail->Subject = "Service Report";
$mail->Body = "<i>Service Report attached</i>";
$mail->AltBody = "This is the plain text version of the email content";

try {
    $mail->send();
    echo $email;
    echo "Message has been sent successfully";
    header('Location: report.php');
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
}

?>