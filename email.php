<?php
if(isset($_POST["submit"])){
	// Checking For Blank Fields..
	if($_POST["name"]==""||$_POST["email"]==""||$_POST["subject"]==""||$_POST["message"]==""){
		echo "Please fill all fields..";
	} else {
		$email=$_POST['email'];
		$email =filter_var($email, FILTER_SANITIZE_EMAIL);
		$email= filter_var($email, FILTER_VALIDATE_EMAIL);
		if (!$email) {
			echo "Invalid email";
		} else {
			$subject = $_POST['name'] . $_POST['subject'];
			$message = $_POST['message'];
			$headers = 'From:'. $email . "\r\n"; // Sender's Email
			$headers .= 'Cc:'. $email . "\r\n"; // Carbon copy to Sender
			$message = wordwrap($message, 70);
			mail("clarissemschneider@gmail.com", $subject, $message, $headers);
		}
	}
}
?>