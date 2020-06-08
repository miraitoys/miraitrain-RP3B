<?php

	$param = $_GET['param'];
	// ファイルを書き込みモードで開く
	$fp = fopen("python/config/speed.txt", "w");
 
	// ファイルに書き込む
	fwrite($fp, $param);
 
	// ファイルを閉じる
	fclose($fp);
	
	echo json_encode($param);
?>