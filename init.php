<?php
	function writefile($input, $name)
	{
		$file = fopen($name, w);
		fwrite($file, $input + "\n");
		fclose($mfile);
	}
	$message = "first message";
	$hash1 = "db01a79b2801d711bc69a0ad143def4bca4b5e4e6f1d7d63492590607b14ea35";
	$ranint = rand(0, 100000000000);
	$ranhash = hash("sha256", $ranint);
	writefile($message, "messages.bc");
	writefile($hash1, "hashes.bc");
	writefile($ranhash, "guesses.bc");
?>
<html>
	<head>
		<title>noobchain init</title>
		<link rel="shortcut icon" type="image/x-icon" href="https://urlordjames.ga/favicon.ico">
	</head>
	<body>
	</body>
</html>