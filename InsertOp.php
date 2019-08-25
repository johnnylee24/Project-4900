<?php
$con = mysqli_connect('localhost','root','');

if(!$con){
    echo 'Not Connected To Server';
}
if(!mysqli_select_db($con,'cc')){
    echo 'Database Not Selected';
}

$name = $_POST['name'];
$email = $_POST['email'];
$occupations = $_POST['occupations'];
$gender = $_POST['gender'];
$InterestedArea = $_POST['InterestedArea'];
$sql = "INSERT INTO Opportunities (name,email,gender,occipations,InterestedArea) VALUES ('$name','$email','$gender','$occupations','$InterestedArea')";

if(!mysqli_query($con,$sql)){
    echo 'no';
}else{
    echo '';
}

header("refresh:1; url=Opportunities.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit'])){
 $name = $_POST['name'];
 $email = $_POST['email'];
 $occupations = $_POST['occupations'];
 $gender = $_POST['gender'];
 $InterestedArea = $_POST['InterestedArea'];
require_once('connect.php');
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
   //Server settings
   $mail->SMTPDebug = 0;                                       // Enable verbose debug output
   $mail->isSMTP();                                            // Set mailer to use SMTP
   $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
   $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
   $mail->Username   = 'johnny1021234@gmail.com';                     // SMTP username
   $mail->Password   = '958johnny';                               // SMTP password
   $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
   $mail->Port       = 587;                                    // TCP port to connect to

   //Recipients
   $mail->setFrom($name,$email,$occupations,$gender,$InterestedArea);
   $mail->addAddress('johnny1021234@gmail.com', 'Johnny');     // Add a recipient
   // $mail->addAddress('ellen@example.com');               // Name is optional
   // $mail->addReplyTo('info@example.com', 'Information');
   // $mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');
   // Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

   // Content
   $mail->isHTML(true);                                  // Set email format to HTML
   $mail->Subject = 'Form Website Contact Form:';

   $mail->Body    = '<h1 align=center>Name: '.$_POST['email'].'<br>Email:' .$_POST['name'].'<br>
   gender: '.$_POST['gender'].'<br>
   occupations:' .$_POST['occupations'].' <br> Interested Area: '.$_POST['InterestedArea'].'   </h1>';

   $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

   $mail->send();
   echo 'Message has been sent';
} catch (Exception $e) {
   echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}
else{
 echo '';
}