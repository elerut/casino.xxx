<?php require 'bd.php'; ?>
<?php
		$login = $_SESSION['login']; 
		// echo print_r($_POST, true);
		$user = R::findone('users', 'login = ?', [$login] );
		if($user)
		{
			if($_SESSION['token'] === $user->session)
			{
				header('Location: http://casino.xxx/play.php');	
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