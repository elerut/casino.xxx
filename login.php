<?php require 'bd.php'; ?>
<?php 
	if($_POST['submit'])
	{

		session_unset();
		$login = $_POST['login']; 
		// echo print_r($_POST, true);
		$user = R::findone('users', 'login = ?', [$login] );
		if($user)
		{
			if(password_verify($_POST['password'],$user->password))
			{
				// echo'<script>alert("Успех!");</script>';	
				$_SESSION['login'] = $login;
				$token = md5(rand(0, PHP_INT_MAX));
				$user->session = $token;
				$_SESSION['token'] = $token;
				R::store($user);
				header('Location: http://casino.xxx/play.php');
			}
			else
			{
				echo'<script>alert("Неправильный пароль!");</script>';
			}
		}
		else
		{
			echo'<script>alert("Неправильный логин!");</script>';
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
	<article id="main-block-auth" action="/login.php">
		<form method="POST" id="auth-block">
			Логин:
			<br>
			<input type="text" name="login" class="auth-block-input">
			<br>
			Пароль:
			<br>
			<input type="text" name="password" class="auth-block-input">
			<input type="submit" name="submit" value="Вход!" class="auth-block-login-submit">
			<br>
			<a href="/registration.php"  class="auth-block-a"> Нет аккаунта? Зарегистрироваться!</a>
		</form>

	</article>
</body>
</html>