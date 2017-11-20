<?php
	$info = file_get_contents("mes.text");
	$info = rtrim($info, "@");
	if(strlen($info) >= 8){
		$lylist = explode("@@@", $info);
		$times = 0;
		$json = array();
		$array = array();
		foreach ($lylist as $k => $v) {
			$times ++;
			$ly = explode("##", $v);
			$arr = array('title' => $ly[0], 'name' => $ly[1], 'content' => $ly[2], 'ip' => $ly[3], 'time' => date("Y-m-d H:i:s", $ly[4]));
			array_push($array,$arr);
		}
		$json = array('total' => $times, 'content' => $array);
		if($times == 100){
			file_put_contents("mes.text", "");
		}
		echo json_encode($json, JSON_UNESCAPED_UNICODE);
	}
?>