<?php
	$speedFile = "python/config/speed.txt";
	$path = 'sudo chmod 777 '.$speedFile;
	exec($path);

	// ファイルを書き込みモードで開く
	$status = fopen("python/config/status.txt", "w");
	$speed = fopen("python/config/speed.txt", "w");
 
	// ファイルに書き込む
	fwrite($status, 0);
 
	// ファイルを閉じる
	fclose($status);

	//1秒間止める。
	usleep(1000000);

	$path = 'sudo pkill -f python/program.py';
	//putenv("PATH=$PATH:/usr/bin");
	exec($path);
	
	//$path = 'sudo pkill -f python/program.py';
	$path = 'sudo python python/stop.py';
	putenv("PATH=$PATH:/usr/bin");
	exec($path);
	
	fwrite($speed, 999);
	fclose($speed);

	return 'ok';
?>