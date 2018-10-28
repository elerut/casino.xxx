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
					<div id="main-block-game-window-scoreblock-score">Баланс:<?php echo $user->cash; ?></div>
					<div id="main-block-game-window-scoreblock-kf">Коэфициент:X<?php echo $user->koef; ?></div>
				</div>
				
				<img id="main-block-game-window-object" src="/img/prizes/qm.png">
				<br>
				<br>
				<div id="main-block-game-playbtn" onclick="play()">Играть!</div>
				<div id="main-block-game-winlabel" onclick=""></div>
		</div>
	</article>
	<script type="text/javascript">
		var i_prize = 0;
		var win = '';
		<?php echo "var userlogin = '$_SESSION[login]';\nvar token = '$_SESSION[token]';\n"; ?>
		var prizes = Array('img/prizes/real/bottle.png','img/prizes/real/bread.png','img/prizes/money.png');
		var image =document.getElementById('main-block-game-window-object');
		function play() {
			
			var xhr = new XMLHttpRequest();
			xhr.open('POST', 'http://casino.xxx/random.php', false);
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhr.send("login="+userlogin+ "&token=" + token);
			if (xhr.status != 200) 
			{
				//если ошибка
				alert( xhr.status + ': ' + xhr.statusText ); // пример вывода: 404: Not Found
			} 
			else 
			{
				var ans = xhr.responseText;
				// document.getElementById('main-block-game-window-object').src = ans;
				// alert(ans);
			}
			win = ans;
			i_prize = 0;
			game();
		}
		function game(){
			var selected = prizes[getRandomInt(prizes.length)];
			image.src = selected;
			if(i_prize < 10)
			{
				//alert(selected);
				i_prize++;
				setTimeout("game()",300);
				console.log(i_prize);
			}

			if(i_prize < 20)
			{
				//alert(selected);
				i_prize++;
				setTimeout("game()",400);
				console.log(i_prize);
			}

			
			
			if(i_prize == 20){
			i_prize = 21;
			console.log(i_prize);
			//alert('win');
			alert(win);
			image.src = win;
			}
		}

		function getRandomInt(max) {
 			return Math.floor(Math.random() * Math.floor(max));
		}
	</script>
</body>
</html>