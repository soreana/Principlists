<?php
	
	if( isset($_POST['email']) && !empty($_POST['email']) ){
		
		$email = $_POST['email'];
		error_log( "Email is:" . (string)$email);
		
		if( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
			die('error');
		}
		
		$myfile = fopen("../Emails.txt", "r") or die("error");
		$size = filesize("../Emails.txt");
		if( $size > 0 && strpos(fread($myfile, $size), $email) !== false ){
			fclose($myfile);
			die('exist');
		}
		fclose($myfile);
		
		$myfile = fopen("../Emails.txt", "a") or die("error");
		fwrite($myfile, $email.PHP_EOL);
		fclose($myfile);
		die('success');
	}
	
	else{
		die('error');	
	}
?>