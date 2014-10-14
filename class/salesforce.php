<?php
ini_set('display_errors',0);

require_once dirname(__FILE__) . '/../config.php';

//EMPTY//
$query_string = ""; // Needs to be an empty query string
$error = ""; //Needs to be an empty error string

//SET SALESFORCE DEBUG MODE//
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
		include('email.php');
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
			foreach($formsElement as $a => $value){
				if ($_POST[$a] == "") {
					$error .= "Please enter in your $value <br>";
				}
			}
		}
	} else {

	}

//Captcha Class

	if($captcha){
		include("captcha.php");		
	}

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