<?php
require 'environment.php';

$config = array();
// environment.php alter for production
if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost:82/ranking/");
	$config['Database'] = 'Web_Rank';
	$config['Server'] = 'DESKTOP-2N5IUO8\SQLEXPRESS';
	$config['dbuser'] = 'developer';
	$config['dbpass'] = 'dev123@';
} else {
	define("BASE_URL", "ONLINE");
	$config['Database'] = '';
	$config['Server'] = '';
	$config['dbuser'] = '';
	$config['dbpass'] = '';
}

global $db;

try {
$db = new PDO("sqlsrv:Server=".$config['Server'].";Database=".$config['Database'], $config['dbuser'], $config['dbpass']);
		

} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}



/**** CONEXAO MYSQL
$config = array();
// environment.php alter for production
if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost:82/redebrasil_ranking/");
	$config['dbname'] = 'Web_Rank';
	$config['host'] = 'DESKTOP-2N5IUO8\SQLEXPRESS';
	$config['dbuser'] = 'developer';
	$config['dbpass'] = 'dev123@';
} else {
	define("BASE_URL", "onlineeee");
	$config['dbname'] = '';
	$config['host'] = '';
	$config['dbuser'] = '';
	$config['dbpass'] = '';
}

global $db;
try {
	$db = new PDO("sqlserv:host=".$config['host'].";dbname=".$config['dbname'], $config['dbuser'], $config['dbpass']);
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}
****/

?>

