<?php

/*
	$hostMysql		= "181.41.198.253";  //Endereço ip do banco de dados
	$bdnameMysql	= "emporioa_desenvolvimento";  //Nome do banco de dados
	$userMysql		= "emporioa"; //Usuário de acesso ao banco de dados
	$passwordMysql	= "Euatopng"; //Senha de acesso ao banco de dados


$hostMysql		= "127.0.0.1";  //Endereço ip do banco de dados
$bdnameMysql	= "emporioa_desenvolvimento";  //Nome do banco de dados
$userMysql		= "mysql"; //Usuário de acesso ao banco de dados
$passwordMysql	= "179355"; //Senha de acesso ao banco de dados

*/
	$hostMysql		= "169.254.27.210";  //Endereço ip do banco de dados
	$bdnameMysql	= "emporioa_desenvolvimento";  //Nome do banco de dados
	$userMysql		= "usuario"; //Usuário de acesso ao banco de dados
	$passwordMysql	= "senha"; //Senha de acesso ao banco de dados
	
	$conexaoMysql = mysqli_connect($hostMysql,$userMysql,$passwordMysql,$bdnameMysql); // Conecta com o banco

	// Checa conexão
	if (mysqli_connect_errno())
	  {
	  echo "<br><br><br>Erro na conexão MySQL: " . mysqli_connect_error() . "<br><br><br>";
	  }
?>