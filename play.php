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
					<div id="main-block-game-window-scoreblock-score">Баланс: <?php echo $user->cash; ?></div>
					<a id="main-block-game-window-scoreblock-putmoneybtn" href="/payments.php">Пополнить</a>
				</div>
				
				<img id="main-block-game-window-object" src="/img/prizes/qm.png">
				<br>
				<br>
				<div id="main-block-game-playbtn" onclick="play()">Играть!</div>
				<div id="main-block-game-winlabel" onclick=""></div>
				<div id="main-block-game-refundbtn" onclick="to_bill()">Вернуть X<?php echo $kfloyalgame ?>!</div>
		</div>
	</article>
	<script type="text/javascript">
		var i_prize = 0;
		var win = '';
		<?php echo "var userlogin = '$_SESSION[login]';\nvar token = '$_SESSION[token]';\n"; ?>
		<?php R::dispense('prizes');
		$prizes = R::find('prizes', 'count > ?', [0]);
		$jsprizes = 'var prizes = [';
		foreach ($prizes as $prize) {
			$jsprizes = $jsprizes  .'"' . $prize->image . '"' . ',';
		}
		substr($jsprizes, 0, -1);
		$jsprizes = $jsprizes  . ']' . ';';
		echo $jsprizes;
		echo 'var gamecost = ' . $gamecost . ';'
		?>
		var image =document.getElementById('main-block-game-window-object');
		var label =document.getElementById('main-block-game-winlabel');
		var balance = document.getElementById('main-block-game-window-scoreblock-score');
		var refundbtn = document.getElementById('main-block-game-refundbtn');
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
			label.innerHTML = '';
			refundbtn.style.display = '';
			var currentbalance = balance.innerHTML.replace('Баланс: ', "");
			if(Number(currentbalance) - gamecost<0)
			{
				ans = JSON.parse(ans);
				label.innerHTML = ans['about'];
			}
			else
			{
				game();
			}
		}
		function game(){
			var selected = prizes[getRandomInt(prizes.length)];
			image.src = selected;
			if(i_prize < 10)
			{
				//alert(selected);
				i_prize++;
				setTimeout("game()",100);
				console.log(i_prize);
				return;
			}

			if(i_prize < 20)
			{
				//alert(selected);
				i_prize++;
				setTimeout("game()",200);
				console.log(i_prize);
				return;
			}

			
			
			if(i_prize == 20){
				i_prize = 0;
				console.log(i_prize);
				//alert('win');
				//alert(win);
				var ans = JSON.parse(win);
				label.innerHTML = ans['about'];
				if(ans['img']){
					image.src = ans['img'];
				}
				
				balance.innerHTML = 'Баланс: ' + ans['balance'];
				if(ans['label'] == 'money'){
					refundbtn.style.display = 'block';
				}

			}
		}
		function to_bill(){
			var xhr = new XMLHttpRequest();
			xhr.open('POST', 'http://casino.xxx/random.php', false);
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhr.send("login="+userlogin+ "&token=" + token + "&to_bill=" + "true");
			if (xhr.status != 200) 
			{
				alert( xhr.status + ': ' + xhr.statusText ); // пример вывода: 404: Not Found
			} 
			else 
			{
				var ans = xhr.responseText;
				ans = JSON.parse(ans);
				console.log(ans);
				balance.innerHTML = 'Баланс: ' + ans['balance'];
				balance.innerHTML = 'Баланс: ' + ans['balance'];
				label.innerHTML = ans['about'];
				refundbtn.style.display = '';
			}

		}
		function getRandomInt(max) {
 			return Math.floor(Math.random() * Math.floor(max));
		}
	</script>
</body>
</html>