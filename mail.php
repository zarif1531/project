<?php
// This PHP function sends an email to a user with a link to reset their password, using PHPMailer and
// a MySQL database.
// 
//@param to The email address where the password reset link will be sent.
//@param subject "Reset password" - This is the subject of the email that will be sent to the user.
//@param message The message parameter is the content of the email that will be sent to the user. It
//includes a link to reset their password and some text explaining what to do.
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$connection = mysqli_connect("localhost", "root", "", "project 2");
$email = $_POST["email"];

$sql = "SELECT * FROM registration WHERE email = '$email'";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0)
{
}else{
    echo "Email does not exists";
}
if (mysqli_num_rows($result) > 0)
{
    $reset_token =time(). md5($email);
}
else
{
    echo "Email does not exists";
}
$sql = "UPDATE registration SET reset_token='$reset_token' WHERE email='$email'";
mysqli_query($connection, $sql);
$message = "<p>Please click the link below to reset your password</p>";
$message .= "<a href='http://localhost/class15/resetpass.php?email=$email&reset_token=$reset_token'>";
$message .= "Reset password";
$message .= "</a>";
function send_mail($to, $subject, $message)
{
    $mail = new PHPMailer(true);
    try {
	$mail->SMTPDebug = 0;                                       
	$mail->isSMTP();                                          
	$mail->Host       = 'smtp.gmail.com;';  
	$mail->SMTPAuth   = true;                                   
	$mail->Username   = 'binr7479@gmail.com';                    
	$mail->Password   = 'iguvihraezjqbleh';                       
	$mail->SMTPSecure = 'ssl';                                 
	$mail->Port       = 465;                                    
	$mail->setFrom('binr7479@gmail.com', 'zarif');
	$mail->addAddress($to);
	$mail->isHTML(true);                                  
	$mail->Subject = $subject;
	$mail->Body    = $message;

	$mail->send();
	echo 'Message has been sent';
    } catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
send_mail($email, "Reset password", $message);
?>