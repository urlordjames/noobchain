<?php
	function verify($capdata)
	{
		$ip = $_SERVER['REMOTE_ADDR'];
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$data = array
		(
			'secret' => '6LfkJHEUAAAAAKRm7LUPkG10g3ngebHptFWQXdMg',
			'response' => $capdata,
			'remoteip' => $ip
		);
		$options = array
		(
			'http' => array (
				'method' => 'POST',
				'content' => http_build_query($data)
			)
		);
		$context = stream_context_create($options);
		$verify = file_get_contents($url, false, $context);
		$captcha_success=json_decode($verify);
		if ($captcha_success->success==false)
		{
			return false;
		} else if ($captcha_success->success==true)
		{
			return true;
		}
		else
		{
			return false;
			echo "wtf did you do?";
		}
	}
	$pass = $_POST["auth"];
	$capresponse = $_POST["g-recaptcha-response"];
	if (!verify($capresponse) || !hash("sha512", $pass) == "cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e")
	{
		echo("go away");
		exit();
	}
	$message = "first message\n<br>";
	$hash1 = hash("sha256", $message);
	$ranint = rand(0, 9);
	$ranhash = hash("sha256", $ranint);
	function writefile($input, $name)
	{
		$file = fopen($name, "w");
		fwrite($file, $input); // . "\n"
		fclose($file);
	}
	function readfile2($name)
	{
		$file = fopen($name, "r");
		$contents = fread($file, filesize($name));
		fclose($file);
		return $contents;
	}
	writefile($message, "messages.bc");
	writefile($hash1, "hashes.bc");
	writefile(hash("sha256", $ranhash . hash("sha256", readfile2("hashes.bc"))), "guesses.bc");
	writefile($ranint, "origin.bc");
	writefile(9, "difficulty.bc");
	echo($ranhash);
?>
<html>
	<head>
		<title>noobchain init</title>
		<link rel="shortcut icon" type="image/x-icon" href="https://urlordjames.ga/favicon.ico">
	</head>
	<body>
	</body>
</html>