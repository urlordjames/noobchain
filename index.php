<?php
	$mfile = fopen("messages.blockchain");
	$messages = fread($mfile);
	fclose($mfile);
	$data = json_decode($messages)
	echo($data);
?>
<html>
	<head>
		<title>noobchain</title>
		<link rel="shortcut icon" type="image/x-icon" href="https://urlordjames.ga/favicon.ico">
	</head>
	<body>
		welcome
	</body>
</html>