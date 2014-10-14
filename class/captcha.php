<?php

$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$total = $_POST['captcha'];
$final;

if($num1 == "" && $num2 == "" && $total == "")  {
	echo("Enter in a captcha code");
}

?>