<?php

include 'functions.php';

if (!empty($_POST))
{

	$data['success'] = true;
	$_POST	= multiDimensionalArrayMap('cleanEvilTags', $_POST);
	$_POST	= multiDimensionalArrayMap('cleanData', $_POST);

	//your email adress 
	$emailTo ="onlyzoran@gmail.com"; //"yourmail@yoursite.com";

	//from email adress
	$emailFrom ="taxi@netolab.ru"; //"contact@yoursite.com";

	//email subject
	$emailSubject = "Заявка с сайта";

	$name = $_POST["name"];
	if($name == "")
	{
		$data['success'] = false;
	}

	$phone = $_POST["phone"];
	if($phone == "")
	{
		$data['success'] = false;
	}

 if($data['success'] == true)
 {
  	$message = "Имя: $name<br>Телефон: $phone";


  	$headers = "MIME-Version: 1.0" . "\r\n"; 
  	$headers .= "Content-type:text/html; charset=utf-8" . "\r\n"; 
  	$headers .= "From: <$emailFrom>" . "\r\n";
  	mail($emailTo, $emailSubject, $message, $headers);

  	$data['success'] = true;
  	echo json_encode($data);
  }
}