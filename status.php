<?php
	// ファイルを書き込みモードで開く
	$file = "python/config/status.txt";
	$fp = fopen($file, "r");
 
	// ファイルに書き込む
	$status = fgets($fp);
 
	// ファイルを閉じる
	fclose($fp);
	//header('Content-Type: application/json; charset=utf-8');
	echo $status;
?>