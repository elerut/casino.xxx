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
				header('Location:' . $siteurl.'/login.php');
			}
		}
		else
		{
			header('Location:' . $siteurl.'/login.php');
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
		<a href="/">casino.xxx</a>
	</div>
	<article id="main-block-prizes">
		<?php 
		$prizes = R::find('winners', 'winner = ?', [$login]);
		//print_r($prizes);
		foreach ($prizes as $prize) {
			echo '<div class="main-block-prize">' . $prize->prize . ' -- ' . $prize->status . "</div>\n";
		}?>
	</article>
</body>
</html>