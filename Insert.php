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
$message = $_POST['message'];
$sql = "INSERT INTO Contact (name,email,message) VALUES ('$name','$email','$message')";

if(!mysqli_query($con,$sql)){
    echo '';
}else{
    echo '';
}

header("refresh:1; url=Contact.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit'])){
 $name = $_POST['name'];
 $email = $_POST['email'];

 $message = $_POST['message']; 
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
   $mail->Username   = '                    // SMTP username
   $mail->Password   = ;                               // SMTP password
   $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
   $mail->Port       = 587;                                    // TCP port to connect to

   //Recipients
   $mail->setFrom($name,$email);
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
    Message:' .$_POST['message'].'</h1>';

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
