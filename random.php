<?php
require 'bd.php'; 
$userlogin = $_POST['login'];
$token = $_POST['token'];
$user = R::findone('users', 'login = ?', [$userlogin]);

if (!$user) {
	
	exit();
}
if ($user->session === $token) {
	
}
else{
	
	exit();
}
// https://www.random.org/integers/?num=1&min=1&max=6&col=1&base=10&format=plain&rnd=new
$user->cash =$user->cash - 50;
// $answer = array('' => , );
R::store($user); 
// $prize = array('About' => '', 'img' => '', 'label' => '');
$prizes = R::find('prizes', 'count > ?', [0]);
print_r($prizes);
exit;
$tmp = rand(1,3);
switch ($tmp) {
	case 1:
		echo 'img/prizes/money.png';
		$prize = array('About' => 'Некая сумма денег', 'img' => 'img/prizes/money.png', 'label' => 'Деньги');
	 	break;
	case 2:
		echo 'img/prizes/real/bottle.png';
	 	break;
	case 3:
		echo 'img/prizes/real/bread.png';
	 	break;		
}

function rndget($min, $max){
	$rnd = file_get_contents("https://www.random.org/integers/?num=1&min=" . $min ."&max=" . $max ."&col=1&base=10&format=plain&rnd=new");
	return $rnd;
 }

 ?>
