<?php
	$mfile = fopen("messages.bc", r);
	$messages = fread($mfile, filesize("messages.bc"));
	fclose($mfile);
	echo($messages . "<br>");
?>
<html>
	<head>
		<title>noobchain</title>
		<link rel="shortcut icon" type="image/x-icon" href="https://urlordjames.ga/favicon.ico">
	</head>
	<body style="font-family: monospace">
		<!--send help-->
	</body>
</html>
