<?php	
	function sendOTP($email,$otp) {
		require('phpmailer/class.phpmailer.php');
		require('phpmailer/class.smtp.php');
	
		$message_body = "One Time Password for accessing college alumni portal:<br/><br/>" . $otp;
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers

		//$mail->SMTPDebug = 4;
		$mail->SMTPAuth = TRUE;
		$mail->SMTPSecure = 'tls'; // tls or ssl
		$mail->Port     = 587;
		$mail->Username = '17110092.it@hindusthan.net';                 // SMTP username
		$mail->Password = 'student123';                           // SMTP password$mail->Host     = "SMTP HOST";
		$mail->SetFrom('17110092.it@hindusthan.net');
		$mail->AddAddress($email);
		$mail->Subject = 'OTP to Login';
		$mail->MsgHTML($message_body);
		$mail->IsHTML(true);		
		$result = $mail->Send();
		
		return $result;
	}
?>