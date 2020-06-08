<!DOCTYPE html>
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
			var idex = 0;
			var message = 'アップデートに失敗しました';
			if(!confirm('システムアップデートをかけてよろしいですか？')) return false;
			$('#update').css('display', 'none');
			$('#updating').css('display', 'block');
			
			$.ajax({  
				type: "GET",  
				url: "git_pull.php",
				
				success: function(data,dataType) {

					idx = data.indexOf("Already");
					if(idx != -1) {
						message = '既に最新です。'
					}
					
					idx = data.indexOf("Updating");
					if(idx != -1) {
						message = 'アップデートが完了しました。'
					}
					//console.log(message);
					$('#updated').html(message);
				},  
				error: function(XMLHttpRequest, textStatus, errorThrown){  
					//失敗した時の処理
					alert('通信に失敗しました');
				},
				complete: function(XMLHttpRequest){
					$('#updating').css('display', 'none');
					$('#updated').css('display', 'block');
					$('#update').css('display', 'block');
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
				<button class="selectBtnA00 btnUpdate" id="update" onClick="update()">アップデート</button>
				<div id="updating">
					<img src="images/loading.gif" style="width: 30px; height: 30px;"><br>
					アップデート中..しばらくお待ちください
				</div>
				<p class="alert" id="updated"></p>
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
