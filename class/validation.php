<?php

// Regex Examples
// Text Value only (no numbers or special Characters) = !preg_match("/^[a-zA-Z ]*$/" 
// Email validation, @sign and .dot = /([\w\-]+\@[\w\-]+\.[\w\-]+)/
//

	if ($_POST['first_name'] == "") {
	    $error .= "Please enter in your first name.<br>";
		} elseif (!preg_match("/^[a-zA-Z ]*$/",$_POST['first_name'])) {
			$error .= "Please enter in a valid first name.<br>";
	}

	if($_POST['last_name'] == ""){
	    $error .= "Please enter in your last name.<br>";
		} elseif (!preg_match("/^[a-zA-Z ]*$/",$_POST['last_name'])){
			$error .= "Please enter in a valid last name.<br>";
	}

	if($_POST['email'] == ""){
	    $error .= "Please enter in your email address.<br>";
		} elseif (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$_POST['email'])){
	  	$error .= "Please enter in a valid email address.<br>";
	}

	if($_POST['company'] == ""){
	    $error .= "Please enter in your company name.<br>";
	  } elseif (!preg_match("/^[a-zA-Z ]*$/", $_POST['first_name'])) {
			$error .= "Please enter in a valid company name.<br>";
	}


?>