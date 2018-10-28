<?php require 'bd.php'; ?>
<?php 
	if($_POST['submit'])
	{
		$login = $_POST['login']; 
		// echo print_r($_POST, true);
		$user = R::findone('users', 'login = ?', [$login] );
		if($user)
		{
			echo'<script>alert("Пользователь с таким логином уже зарегистрирован, попробуйте указать другой логин.");</script>';
		}
		else{
			$user = R::dispense('users');
			$user->login = $login;
			$user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			R::store($user);
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
	<article id="main-block-auth" action="/registration.php">
		<form method="POST" id="auth-block">
			Логин:
			<br>
			<input type="text" name="login" class="auth-block-input">
			<br>
			Пароль:
			<br>
			<input type="text" name="password" class="auth-block-input">
			<input type="submit" name="submit" value="Зарегистрироваться!" class="auth-block-registration-submit">
			<br>
			<a href="/login.php"  class="auth-block-a"> Есть аккаунт? Войти!</a>
		</form>

	</article>
</body>
</html>