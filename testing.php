<?php

	$formsElement = [	"first_name" => "First Name",
										"last_name" => "Last Name",
									  "email" => "Email",
									  "company" => "Company Name",
									  "super_man" => "Super Man",
									];

	foreach($formsElement as $a => $value){
		echo $a. '&'. $value ;
	}

?>