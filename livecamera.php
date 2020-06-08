<?php
	$handle = fopen("python/main.py", "r");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>miraitoy</title>
	<meta name="viewport" content="initial-scale=1">

	<!-- =========================================================== -->
	<!-- ▼共通のJAVASCRIPT											 -->
	<!-- =========================================================== -->
	<script src="js/script.js"></script>
	<script src="js/lng-ja.js"></script>
	<script src="js/fc-list.js"></script>
	<script src="js/camera_script.js"></script>
	<script src="js/jquery-1.10.2.min.js"></script>
	
	<!-- =========================================================== -->
	<!-- ▼共通の装飾（配色や余白などは、このCSSソースをご覧下さい） -->
	<!-- =========================================================== -->
	<link type="text/css" rel="stylesheet" href="css/style.css">
	<link type="text/css" rel="stylesheet" href="css/common.css">
	<link type="text/css" rel="stylesheet" href="css/slider.css">
	<script>
        window.onload = function(){
        //1000ミリ秒（1秒）毎に関数「showNowDate()」を呼び出す
            setInterval("checkStatus()", 1000);
        }
	</script>

</head>
<body onload="setTimeout('init(0, 25, 1);', 100);">
    <div class="container-fluid text-center liveimage">
        <div style="text-align:center"><img id="mjpeg_dest" onclick="toggle_fullscreen(this);" src="./loading.jpg"></div>
    </div>
</body>
</html>
