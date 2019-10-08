<?php


require_once("admin/config/db.php");

require 'class/class.phpmailer.php';

$mail = new PHPMailer();

$link="<a href='http://localhost/fouritue/reset_pass.php?key=".$password_key."'>Click To Reset password</a>";

$mail->isSMTP();
$emailBody = $link;
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port     = '587';  
$mail->Username = 'admin@wedkings.in';
$mail->Password = '45rude88mud';
$mail->Host     = 'mail.wedkings.in';

$mail->setFrom('admin@wedkings.in', 'Wedkings ');
$mail->addAddress($_POST["email"]); 
$mail->Subject = "Forgot Password Recovery";		
$mail->MsgHTML($emailBody);
$mail->IsHTML(true);

if(!$mail->Send()) {
	$error_message = "<b>".'Problem in Sending Password Recovery Email'."</b>";
} else {
	$success_message = "<b>".'Please check your email to reset password!'."</b>";
}

?>
