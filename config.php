<?php
ini_set('display_errors',0);

//Options
$debug = 0; //Either 0 or 1 (0 turn off debug mode and 1 turn on)
$debugemail = 'blahblah@blah.com'; //requires the debug mode to be turned on (the option above) [SALESFORCE]
$emailactivation = true;
$fromemail = 'jagmitg@gmail.com';
$toemail = 'jagmitg@gmail.com';
$validation = true; //Turn on [true] or off [false] the validation system
$validationtype = 3; //1 =simple validaton, check whether null, 2 = regex based validation, requires editing on validation file.
$captcha = true;
$formsElement = [	"first_name"		=> "First Name",
									"last_name" 		=> "Last Name",
								  "email" 				=> "Email",
								  "company" 			=> "Company Name"];

$additionalValue = ['Campaign_ID' => '701D0000000WmmL',
										'oid' 				=> '',
										'retURL' 			=> '/'];


//Empty
$query_string = ""; // Needs to be an empty query string
$error = ""; //Needs to be an empty error string

//SET DEBUG STATE//
if($debug === 1){
	$additionalValue["debug"] = "1";
		if($debugemail){
			$additionalValue["debugEmail"] = "$debugemail";
		}
} else {
	$additionalValue;
}

//GET FORM VALUES//

	if(isset($_POST['submit'])){

		if ($emailactivation){
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
		}

		//Validation Start
		if ($validation){
			if ($validationtype === 1){
				foreach($formsElement as $a => $value){
					if ($_POST[$a] == "") {
			        $error .= "Please enter in your $value <br>";
			    }
				}
			}elseif ($validationtype === 2){
				include("validation.php");
			}else{
				$error .= 'Invalid Validation point selected - Basic form of validation selected<br/><br/>';
				foreach($formsElement as $a => $value){
					if ($_POST[$a] == "") {
			        $error .= "Please enter in your $value <br>";
			    }
				}
			}
		} else {
			
		}


	// if($captcha){
	// 	$num1 = isset($_POST['num1']) ? $_POST['num1'] : "";
	// 	$num2 = isset($_POST['num2']) ? $_POST['num2'] : "";
	// 	$total = isset($_POST['captcha']) ? $_POST['captcha'] : "";
	// 	$final = intval($num1) + intval($num2) == intval($total);

	// 	var_dump(intval($num1));
	// 	var_dump(intval($num2));
	// 	var_dump(intval($total));

	// 	var_dump($final);

	// 	if(isset($final)){
	// 		$error .= "captcha code is wrong";

	// 	} else {
	// 		return $error;	

	// 	}
	// }


		//Validation End

		if(isset($error) && trim($error) != ""){
      //echo $error;
  	} else {

			if ($_POST) {
				//Initialize the $kv array for later use
				$kv = array();
				$super = array();

				//For each POST variable as $name_of_input_field => $value_of_input_field
				foreach ($_POST as $key => $value) {
					$kv[] = stripslashes($key)."=".stripslashes($value);
				}

				foreach($additionalValue as $b => $newvalue){
					$super[] = stripslashes($b)."=".stripslashes($newvalue);
				}

				$query_string = join("&", $super)."&".join("&", $kv);

				$finalCount = count($kv)+count($super);

				var_dump($query_string);
			}
			//Check to see if cURL is installed .
			if (!function_exists('curl_init')){
				die('Sorry cURL is not installed!');
			}

			//The original form action URL from Step 2 :)
			// $url = 'https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8';

			//Open cURL connection
			$ch = curl_init();

			//Set the url, number of POST vars, POST data
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, count($finalCount));
			curl_setopt($ch, CURLOPT_POSTFIELDS, $query_string);

			//Set some settings that make it all work :)
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, FALSE);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

			//Execute SalesForce web to lead PHP cURL
			$result = curl_exec($ch);

			//close cURL connection
			curl_close($ch);

  }

};

?>