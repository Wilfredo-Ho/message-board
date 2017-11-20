<?php
	$message = $_GET["message"];
	$name = $message["name"];
	$title = $message["title"];
	$content = $message["content"];
	$ip = $_SERVER["REMOTE_ADDR"];
	$addtime = time();

	$ly = "{$title}##{$name}##{$content}##{$ip}##{$addtime}@@@";

	$info = file_get_contents("mes.text");
	file_put_contents("mes.text", $info.$ly);

	echo "提交成功";
?>
