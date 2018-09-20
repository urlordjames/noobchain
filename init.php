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
	$pass = $_POST["pass"];
	$capresponse = $_POST["g-recaptcha-response"];
	if (!verify($capresponse) || hash("sha512", $pass) != "3dca0a5cfbcb2015e1833e2ea3cb7d961a0705c85b101da07e80d9a7685b494d11a4aeb35db9423b6fddcd799c421f6086c64c7c516325ac2f0324e2120fd859")
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