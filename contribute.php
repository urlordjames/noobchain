<?php
	$ranhash = $_GET["num"];
	$message = $_GET["message"];
	if (!isset($ranhash) || !isset($message) || !strlen($message) > 100)
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
	function writefile2($input, $name)
	{
		$file = fopen($name, "w");
		fwrite($file, $input);
		fclose($file);
	}
	function writefile_no_newline($input, $name)
	{
		$file = fopen($name, "a+");
		fwrite($file, $input);
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
	$hash1 = hash("sha256", $message);
	if (readfile2("guesses.bc") == hash("sha256", hash("sha256", $ranhash) . hash("sha256", readfile2("hashes.bc"))))
	{
		writefile_no_newline("9", "difficulty.bc");
		$newval = rand(0, readfile2("difficulty.bc"));
		$blacklist = array("/", "<", ">", "#", ";", ":");
		$message = str_replace($blacklist, "", $message);
		writefile($message . "<br>", "messages.bc");
		writefile($hash1, "hashes.bc");
		writefile2(hash("sha256", hash("sha256", $newval) . hash("sha256", readfile2("hashes.bc"))), "guesses.bc");
		}
	else
	{
		echo(readfile2("guesses.bc") . "<br>" . hash("sha256", hash("sha256", $ranhash) . hash("sha256", readfile2("hashes.bc"))));
		echo("<br>hash mismatch");
		exit();
	}
	echo($ranhash);
?>
<html>
	<head>
		<title>noobchain contribute</title>
		<link rel="shortcut icon" type="image/x-icon" href="https://urlordjames.ga/favicon.ico">
	</head>
	<body>
	</body>
</html>