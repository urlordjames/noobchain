<?php
	//TODO: test
	$posnum = $_GET["num"];
	$message = $_GET["message"];
	if (!isset($posnum) || !isset($message) || !strlen($message) > 100)
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
		function readfile2($name)
	{
		$file = fopen($name, "r");
		$contents = fread($file, filesize($name));
		fclose($file);
		return $contents;
	}
	function readfile3($name, $i)
	{
		$file = new SplFileObject($name);
		$file->seek($i);
		$contents = $file->current();
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
	$ranhash = hash("sha256", $posnum);
	if (readfile2("guesses.bc") == $ranhash)
	{
		writefile($message, "messages.bc");
		writefile($hash1, "hashes.bc");
		writefile2(hash("sha256", rand(0, 1000000)), "guesses.bc");
	}
	else
	{
		echo(readfile2("guesses.bc") . "<br>" . $ranhash);
		echo("<br>hash mismatch");
		exit();
	}
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