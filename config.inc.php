<?php
// file: config.inc.php

$HOST = 'localhost:3306';
$USER = 'root';
$PASS = '';
$DBNAME = 'UsersDB';
$TABNAME = 'UsersList';

// funzione che controlla i parametri e li ripulisce
function checkParam($param = '') {
	return (isset($_REQUEST[$param]) && !empty(trim($_REQUEST[$param])))
		? trim($_REQUEST[$param])
		: false;
}

// permette di spostarsi tra una pagina e l'altra
function sendRedirect($URL='./', $MSG='') {
	header("location: $URL" . (($MSG!=='') ? '?msg='.urlencode($MSG): ''));
	die;
}


try {
	$con = @new mysqli($HOST, $USER, $PASS);
} catch (Exception $e){
	echo $e->getMessage();
	die;
}

try {
	$rs = $con->select_db($DBNAME);
	unset($rs);
} catch(Exception $e){
	include_once "./{$DBNAME}.sql.php";
	$con->multi_query($SQL);
	echo "eseguita query<PRE>$SQL</PRE>";
}