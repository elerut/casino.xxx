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
if($_POST['to_bill']=='true'){
	$newbalance = $user->lastprize * $kfloyalgame;
	$user->cash = $user->cash  + $newbalance;
	$answer = array('about' => "Вы перевели на игровой счет " . $newbalance . ", удачной игры!");
	$answer['balance'] = $user->cash;
	$user->lastprize = "";
	R::store($user);
}

else{
	if($user->cash-$gamecost<0){
		$answer = array('about' => "Недостатотчно средств для игры, пожалуйста, пополните счет!", 'balance' => $user->cash );
	}
	else{
	$winner = R::dispense('winners');
	if($user->lastprize != ""){ //если деньги решили не класть на игровой счет
		$winner->prize = 'Money' .' '. $user->lastprize;
		$winner->winner = $user->login;
		$winner->status = 'Не отправлено'; 
		R::store($winner);
		$winner = R::dispense('winners');
		$user->lastprize = "";
	}
	$user->cash =$user->cash - $gamecost;
	// $answer = array('' => , );
	R::store($user); 
	// $prize = array('About' => '', 'img' => '', 'label' => '');
	$prizes = R::find('prizes', 'count > ?', [0]);
	$prizes = array_values($prizes);
	$prizeid = rndget(0,count($prizes)-1);
	$prize = $prizes[intval($prizeid)];
	$prize->count =$prize->count - 1;
	if($prizeid != 0)
	{
	R::store($prize);
	}
	$answer = array('about' => $prize->about, 'img' => $prize->image);
	if ($prizeid == 0) 
	{
		$answer['label'] = 'money';
		$moneywin = rndget($minmoneywin,$maxmoneywin);
		$answer['about'] = "$moneywin \$\n" . $answer['about'];
		$answer['balance'] = $user->cash;
		//$user->cash = $user->cash + $moneywin;
		$user->lastprize = $moneywin;
		
	}
	else{
	
	$winner->prize = $prize->label  . ' ' . $moneywin;
	$winner->winner = $user->login;
	$winner->status = 'Не отправлено'; 
	R::store($winner);
	$answer['balance'] = $user->cash;
	
	// $answer = count($prizes);
	
	// print_r($prizeid);
	}
   }	
}
R::store($user);
echo json_encode($answer);
function rndget($min, $max){
	$rnd = file_get_contents("https://www.random.org/integers/?num=1&min=" . $min ."&max=" . $max ."&col=1&base=10&format=plain&rnd=new");
	return $rnd;
 }

 ?>
