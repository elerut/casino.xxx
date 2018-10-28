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
		if($_POST['submit'])
		{
			
			if($_POST['money'])
			{
				$user->cash = $user->cash + intval($_POST['money']);
				R::store($user);
				header('Location: http://casino.xxx/play.php');
			}
			else{
				echo 'Введите число!';
			}
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
	<article id="main-block-game">
		<form method="POST" action="/payments.php" id="main-block-game-paymentwindow">
			<input type="text" name="cardnumber" class="auth-block-input" placeholder="Введите номер карты">
			<br>
			<input type="text" name="cvvcode" class="auth-block-input" placeholder="Введите ccv-2 код">
			<br>
			<input type="text" name="customer" class="auth-block-input" placeholder="Введите имя владельца карты">
			<br>
			<input type="text" name="money" class="auth-block-input" placeholder="Введите желаемую сумму">
			<br>
			<input type="submit" name="submit" class="auth-block-registration-submit" value="Оплатить!">
		</form>
	</article>
</body>
</html>