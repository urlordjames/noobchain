<?php
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