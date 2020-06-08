<?php
	exec('sudo -u pi git pull origin master', $output, $param);
	echo empty($output[0]) ? '' : $output[0];
?>
