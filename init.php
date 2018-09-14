<?php
	$bchain->index = 1;
	$bchain->index->message = "first message";
	$bchain->index->hash1 = "db01a79b2801d711bc69a0ad143def4bca4b5e4e6f1d7d63492590607b14ea35";
	$bchain->index->hash2 = null;
	$info = json_encode($bchain);
	$mfile = fopen("messages.blockchain");
	$messages = fwrite($mfile, $info);
	fclose($mfile);
	
?>
<html>
	<head>
		<title>noobchain init</title>
		<link rel="shortcut icon" type="image/x-icon" href="https://urlordjames.ga/favicon.ico">
	</head>
	<body>
	</body>
</html>