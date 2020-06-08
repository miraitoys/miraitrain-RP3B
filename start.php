<?php
	// ファイルを書き込みモードで開く

	$statusFile = "python/config/status.txt";
	$speedFile = "python/config/speed.txt";
	$mainFile = "python/main.py";

	$status = fopen($statusFile, "w");
	$speed = fopen($speedFile, "w");
	
	// ファイルに書き込む
	fwrite($status, 1);
	fwrite($speed, 0);
 
	// ファイルを閉じる
	fclose($status);
	fclose($speed);

	$code = $_POST["txt_program_area"];

	file_put_contents($mainFile, $code);

	$path = 'sudo python python/program.py > /dev/null &';
	//$path = 'sudo python python/program.py';
	putenv("PATH=$PATH:/usr/bin");
	exec($path);

	echo 1;
?>