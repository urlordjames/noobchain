<?php
	$message = "first message";
	$hash1 = "db01a79b2801d711bc69a0ad143def4bca4b5e4e6f1d7d63492590607b14ea35";
	$hash2 = null;
	$bchain = implode("|", [$message, $hash1, $hash2]);
	$mfile = fopen("messages.blockchain", w);
	$messages = fwrite($mfile, $bchain);
	fclose($mfile);
	echo("init success");
?>
<html>
	<head>
		<title>noobchain init</title>
		<link rel="shortcut icon" type="image/x-icon" href="https://urlordjames.ga/favicon.ico">
	</head>
	<body>
	</body>
</html>