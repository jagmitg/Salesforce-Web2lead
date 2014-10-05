<?php

//Options
$debug = 0; //Either 0 or 1 (0 turn off debug mode and 1 turn on)
$debugemail = 'blahblah@blah.com'; //requires the debug mode to be turned on (the option above) [SALESFORCE]
$emailactivation = true;
$fromemail = 'jagmitg@gmail.com';
$toemail = 'jagmitg@gmail.com';
$validation = true; //Turn on [true] or off [false] the validation system
$validationtype = 1; //1 =simple validaton, check whether null, 2 = regex based validation, requires editing on validation file.
$captcha = true;
$formsElement = ["first_name"		=> "First Name",
									"last_name" 		=> "Last Name",
								  "email" 				=> "Email",
								  "company" 			=> "Company Name"];

$additionalValue = ['Campaign_ID' => '701D0000000WmmL',
										'oid' 				=> '',
										'retURL' 			=> '/'];

?>