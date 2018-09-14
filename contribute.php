<?php
	//TODO: verify hash and input message
	$poshash = $_GET["hash"];
	if (!isset($poshash))
	{
		echo("leave");
		exit();
	}
	function writefile($input, $name)
	{
		$file = fopen($name, "a+");
		fwrite($file, $input . "\n");
		fclose($file);
	}
	function readfile2($name)
	{
		$file = fopen($name, "r");
		$contents = fread($file, filesize($name));
		fclose($file);
		return $contents;
	}
	function increment($name)
	{
		$str = readfile2($name);
		$num = (string)$str + 1;
		$file = fopen($name, "w");
		fwrite($file, $num);
		fclose($file);
	}
	$message = "first message";
	$hash1 = hash("sha256", $message);
	$ranint = rand(0, 100000000000);
	$ranhash = hash("sha256", $ranint);
	writefile($message, "messages.bc");
	writefile($hash1, "hashes.bc");
	writefile($ranhash, "guesses.bc");
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