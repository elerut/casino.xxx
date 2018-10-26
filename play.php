<?php require 'bd.php'; ?>
<?php
		$login = $_SESSION['login']; 
		// echo print_r($_POST, true);
		$user = R::findone('users', 'login = ?', [$login] );
		if($user)
		{
			if($_SESSION['token'] === $user->session)
			{
							
			}
			else
			{
				header('Location: http://casino.xxx/login.php');
			}
		}
		else
		{
			header('Location: http://casino.xxx/login.php');
		}
		
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Большие выигрыши!</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="title">
		casino.xxx
	</div>
	<article id="main-block-game" action="/login.php">
		<div id="main-block-game-window">
				<div id="main-block-game-window-scoreblock">
					<div id="main-block-game-window-scoreblock-score">Баланс:0</div>
					<div id="main-block-game-window-scoreblock-kf">Коэфициент: x1</div>
				</div>
				
				<img id="main-block-game-window-object" src="/img/prizes/qm.png">
				<br>
				<br>
				<div id="main-block-game-playbtn" onclick="play()">Играть!</div>
		</div>
	</article>
	<script type="text/javascript">
		function play() {
			var xhr = new XMLHttpRequest();
			xhr.open('POST', 'http://casino.xxx/random.php', false);
			xhr.send();
			if (xhr.status != 200) 
			{
				//если ошибка
				alert( xhr.status + ': ' + xhr.statusText ); // пример вывода: 404: Not Found
			} 
			else 
			{
				var ans = xhr.responseText;
				// alert(ans);
				document.getElementById('main-block-game-window-object').src = ans;
			}
		}
	</script>
</body>
</html>