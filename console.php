<?php
	$mainFile = "python/main.py";
	$path = 'sudo chmod 777 '.$mainFile;
	exec($path);

	$path = 'echo 0 | sudo tee /sys/devices/platform/soc/3f980000.usb/buspower';
	exec($path);

	$handle = fopen($mainFile, "r");
	$statusFile = "python/config/status.txt";
	$directory = "python/config";

	if(!file_exists($directory))
	{
		$path = 'sudo mkdir '.$directory;
		exec($path);
		$path = 'sudo chmod 777 '.$directory;
		exec($path);
		touch($statusFile);
		
	}else{
		if(!file_exists($statusFile)) {
			// touchでファイル作成
			touch($statusFile);
		}
	}
	
	$path = 'sudo chmod 777 '.$statusFile;
	exec($path);
	$path = 'sudo chown pi:pi '.$statusFile;
	exec($path);

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

		function checkStatus()
		{

			if($("#status").val() == 1){
				$.ajax({  
					type: "GET",  
					url: "status.php",
					
					success: function(data,dataType) {
						data = parseInt(data);
						$("#status").val(data);
						
						if(data == 0){
							document.getElementById("console").style.display = "table";
							document.getElementById("preview").style.display = "none";
						}
					},  
					error: function(XMLHttpRequest, textStatus, errorThrown){  
						//失敗した時の処理
					},
					complete: function(XMLHttpRequest){
					}
				});

			}
		}

		function changePage()
		{
			$("#status").val(1);
			var program = $('#txt_program_area').val();
			document.getElementById("console").style.display = "none";
			document.getElementById("preview").style.display = "table";
			if(program.match(/slider.speed()/)){
				document.getElementById("sliderDisplay").style.display = "block";
			};

			$.ajax({  
				type: "POST",  
				url: "start.php",
				dataType: "json",
				data : {
					"txt_program_area" : program,
				},
				success: function(data,dataType) {
					//alert(data);
				},  
				error: function(XMLHttpRequest, textStatus, errorThrown){  
					//失敗した時の処理 
				},
				
				complete: function(XMLHttpRequest){
					
				}
			});
		}

		function clearProgram()
		{
			if(!confirm("プログラムをクリアしてもよろしいですか？")) return false;
			document.getElementById("txt_program_area").value="";
			document.getElementById("txt_program_area").focus();
		}

		function stop()
		{
			$.ajax({  
				type: "GET",  
				url: "stop.php",
				dataType: "json",
				
				success: function(data,dataType) {
					alert('終了します！');
					location.href="console.php";
				},  
				error: function(XMLHttpRequest, textStatus, errorThrown){  
					//失敗した時の処理 
				},
				
				complete: function(XMLHttpRequest){
					
				}
			});
		}

		
	function fluctuation (param) {

		if((param > 100 || param < -100)) return false;
		
		$.ajax({  
			type: "GET",  
			url: "parameter.php",
			data: {
				"param" : param,
			},
			dataType: "json",
			success: function(data) {
				$("#speedDisplay").html(data);
			},  
			error: function(XMLHttpRequest, textStatus, errorThrown){  
			},
			complete: function(XMLHttpRequest){	
			}
		});

	}
	window.onload = function(){
	//1000ミリ秒（1秒）毎に関数「showNowDate()」を呼び出す
		setInterval("checkStatus()", 1000);
	}
	</script>

</head>
<body>
	<div class="pageHeader">
		<h1 class="logo"><img src="images/logo.png" /></h1>
		<p>WEBコンソール</p>
	</div>
	<div class="headerLine">&nbsp;</div>
	<div class="headerLanguage">
		Japanese（日本語）
	</div>

	<!-- ======================= -->
	<!-- ▼2カラムレイアウト領域 -->
	<!-- ======================= -->
	<div class="page-cover" id="console">

		<!-- ====================== -->
		<!-- ▼サイドを作るブロック -->
		<!-- ====================== -->
		<div class="side-column">

			<div class="side-box">
				<h2 id="area01">関数（かんすう）</h2>
				<div class="innterBOX">
					<h3>せんげん</h3>
					<ul class="functionArea">
						<li><a href="javascript:" onclick="MJ_INSERT_TXTAREA('txt_program_area',FC00());" class="selectBtnA01">やくそく</a></li>
					</ul>
					<h3>きょうつう</h3>
					<ul class="functionArea">
						<li><a href="javascript:" onclick="MJ_INSERT_TXTAREA('txt_program_area',FC01());" class="selectBtnA01">〇びょうまつ</a></li>
					</ul>
					<h3>モーター</h3>
					<ul class="functionArea">
						<li><a href="javascript:" onclick="MJ_INSERT_TXTAREA('txt_program_area',FC02());" class="selectBtnA01">モーターせんげん</a></li>
						<li><a href="javascript:" onclick="MJ_INSERT_TXTAREA('txt_program_area',FC03());" class="selectBtnA01">モーターうごく</a></li>
						<li><a href="javascript:" onclick="MJ_INSERT_TXTAREA('txt_program_area',FC04());" class="selectBtnA01">モーターとめる</a></li>
					</ul>
					<h3>LED</h3>
					<ul class="functionArea">
						<li><a href="javascript:" onclick="MJ_INSERT_TXTAREA('txt_program_area',FC05());" class="selectBtnA01">LEDせんげん</a></li>
						<li><a href="javascript:" onclick="MJ_INSERT_TXTAREA('txt_program_area',FC06());" class="selectBtnA01">LEDつける</a></li>
						<li><a href="javascript:" onclick="MJ_INSERT_TXTAREA('txt_program_area',FC07());" class="selectBtnA01">LEDけす</a></li>
					</ul>
					<h3>スピーカー</h3>
					<ul class="functionArea">
						<li><a href="javascript:" onclick="MJ_INSERT_TXTAREA('txt_program_area',FC08());" class="selectBtnA01">スピーカーせんげん</a></li>
						<li><a href="javascript:" onclick="MJ_INSERT_TXTAREA('txt_program_area',FC09());" class="selectBtnA01">スピーカーならす</a></li>
					</ul>
				</div>

			</div>
			
			<!--
			<div class="side-box">
				<h2 id="area02">コントローラー</h2>
				<div class="innterBOX">
					<ul class="functionArea">
						<li><a href="javascript:" onclick="MJ_INSERT_TXTAREA('txt_program_area',CTL01());" class="selectBtnA01">スライダー</a></li>
					</ul>
				</div>
			</div>
			-->
			
			<div class="side-box">
				<h2 id="area05">サンプル</h2>
				<div class="innterBOX">
					<ul class="functionArea">
						<!--<li><a href="javascript:" onclick="MJ_INSERT_TXTAREA('txt_program_area',SET01());" class="selectBtnA01">モータースライダー</a></li>-->
						<li><a href="javascript:" onclick="MJ_INSERT_TXTAREA('txt_program_area',SET02());" class="selectBtnA01">ゴー＆ストップ</a></li>
						<li><a href="livecamera.php" target="_blank" class="selectBtnA01">ライブカメラ</a></li>

					</ul>
				</div>
			</div>
		</div>
		<!-- ====================== -->
		<!-- ▲サイドを作るブロック -->
		<!-- ====================== -->

		<!-- ====================== -->
		<!-- ▼メインを作るブロック -->
		<!-- ====================== -->
		<div class="main-column">
			<div class="main-box">
				<h2 id="area03">プログラミングエリア</h2>
				<div class="innterBOX">
					<div class="programTextarea">
						<textarea placeholder="ここにプログラムをかく" id="txt_program_area" name="txt_program_area"><?php while ($line = fgets($handle)) echo $line;?></textarea>
					</div>
					<!--<a href="preview.html" class="selectBtnA02">実行する</a>-->
					<div>
						<table style="margin:0 auto;">
							<tr>
								<td><button id="fileButton" class="selectBtnA02" onClick="changePage()">じっこうする</button></td>
								<td style="vertical-align: bottom;"><a href="javascript:" onclick="clearProgram();">クリア</a></td>
							</tr>
						</table>
					</div>
<?php
	fclose($handle);
?>

				</div>
			</div>

		</div>
		<!-- ====================== -->
		<!-- ▲メインを作るブロック -->
		<!-- ====================== -->

	</div>
	<!-- ======================= -->
	<!-- ▲2カラムレイアウト領域 -->
	<!-- ======================= -->

	<!-- ======================= -->
	<!-- ▼2カラムレイアウト領域 -->
	<!-- ======================= -->
	<div class="page-cover" id="preview">

		<div class="main-box">
			<h2 id="area04">プレビューエリア</h2>
			<div class="innterBOX">
				<div class="previewArea">
					<div class="previewArea-disp">プログラム実行中</div>					
					<div id="sliderDisplay">
						<input type="range" value="1" min="-100" max="100" step="5" oninput="fluctuation(this.value)">
						<div style="text-align: center;" id="speedDisplay">0</div>
					</div>
				</div>
				<a href="#" onClick="stop()" class="selectBtnA02">ていしする</a>
			</div>
		</div>

	</div>
	<div class="pageFooter">
		<div>ver.1.0.0</div>
		<footer class="pageFooterRights">Copyright© 2019 miraitoy®</footer>
	</div>
	<input type="hidden" id="status" value="0">

	<script>
	function OnTabKey( e, obj ){
		// タブキーが押された時以外は即リターン
		if( e.keyCode!=9 ){ return; }

		// タブキーを押したときのデフォルトの挙動を止める
		e.preventDefault();

		// 現在のカーソルの位置と、カーソルの左右の文字列を取得しておく
		var cursorPosition = obj.selectionStart;
		var cursorLeft     = obj.value.substr( 0, cursorPosition );
		var cursorRight    = obj.value.substr( cursorPosition, obj.value.length );

		// テキストエリアの中身を、
		// 「取得しておいたカーソルの左側」+「タブ」+「取得しておいたカーソルの右側」
		// という状態にする。
		obj.value = cursorLeft+"\t"+cursorRight;

		// カーソルの位置を入力したタブの後ろにする
		obj.selectionEnd = cursorPosition+1;
	}

	// 対象となるテキストエリアにonkeydownイベントを追加する
	document.getElementById("txt_program_area").onkeydown = function(e){ OnTabKey( e, this ); }

	</script>
</body>
</html>
