<!DOCTYPE html>
<?php
/*
	if($_SERVER["REQUEST_METHOD"] == "POST"){

		exec('sudo -u pi git pull origin master', $output, $param);
		var_dump($output, $param);
	}
	
	$options = [
		'http' => [
			'method' => 'get',
			'timeout' => 3
		]
	];
	
	$url = 'https://www.google.co.jp';
*/
?>

<html lang="ja">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>MIRAITOY WEBコンソール - システム更新</title>
	<meta name="viewport" content="initial-scale=1">

	<!-- =========================================================== -->
	<!-- ▼共通のJAVASCRIPT											 -->
	<!-- =========================================================== -->
	<script src="js/script.js"></script>
	<script src="js/lng-ja.js"></script>
	<script src="js/jquery-1.10.2.min.js"></script>

	<!-- =========================================================== -->
	<!-- ▼共通の装飾（配色や余白などは、このCSSソースをご覧下さい） -->
	<!-- =========================================================== -->
	<link type="text/css" rel="stylesheet" href="css/style.css">
	<link type="text/css" rel="stylesheet" href="css/common.css">
	<script>
		function update()
		{
			if(!confirm('システムアップデートをかけてよろしいですか？')) return false;
			
			$.ajax({  
				type: "GET",  
				url: "git_pull.php",
				
				success: function(data,dataType) {
					console.log(data);
				},  
				error: function(XMLHttpRequest, textStatus, errorThrown){  
					//失敗した時の処理
					alert('error');
				},
				complete: function(XMLHttpRequest){
					alert('complete');
				}
			});
		}



	</script>

</head>
<body>
	<div class="pageHeader">
		<h1 class="logo"><img src="images/logo.png" alt="Fame Toys" /></h1>
		<p>WEBコンソール</p>
	</div>
	<div class="headerLine">&nbsp;</div>
	<div class="headerLanguage">Japanese（日本語）</div>


	<!-- ======================= -->
	<!-- ▼2カラムレイアウト領域 -->
	<!-- ======================= -->
	<div class="page-cover">

		<table class="pageTable">
			<tbody>
			<tr><td><p id="pageTableCaption">システム更新<p></td></tr>
			<tr><td>
				<button class="selectBtnA00 btnUpdate" onClick="update()">アップデート</button>
				<!--
				<form action="update.php" method="post">
				<button class="selectBtnA00 btnUpdate" type="submit">アップデート</button>
				</form>
	-->
			</td></tr>
			</tbody>
		</table>

	</div>
	<!-- ======================= -->
	<!-- ▲2カラムレイアウト領域 -->
	<!-- ======================= -->

	<div class="pageFooter">
		<div>ver.1.1.0</div>
		<footer class="pageFooterRights">Copyright© 2019 MIRAITOY®</footer>
	</div>

</body>
</html>
