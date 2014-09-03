<?php
	$email_from = $fromemail;//<== update the email address
	$email_subject = "New Form submission";
	$email_body = "You have received a new message from the user as.\n".
	    "Here is the message:\n as".
	    
	$to = $toemail;//<== update the email address
	$headers = "From: $fromemail \r\n";
	$headers .= "Reply-To: $toemail \r\n";
	//Send the email!
	mail($to,$email_subject,$email_body,$headers);
	//done. redirect to thank-you page.

	// Function to validate against any email injection attempts
	function IsInjected($str) {
	  $injections = array('(\n+)',
	              '(\r+)',
	              '(\t+)',
	              '(%0A+)',
	              '(%0D+)',
	              '(%08+)',
	              '(%09+)'
	              );
	  $inject = join('|', $injections);
	  $inject = "/$inject/i";
	  if(preg_match($inject,$str)){
	    return true;
	  } else {
	    return false;
	  }
	}
?>