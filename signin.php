<?php
// file: signin.php -- accesso area riservata
include_once './config.inc.php';
$username = $con->real_escape_string(checkParam('username'));
$password = $con->real_escape_string(checkParam('password'));

if($username === false || $password === false)
	sendRedirect('./login.php', 'Credenziali Errate!');

$q = trim("
	SELECT *
	FROM {$TABNAME}
	WHERE
		username='$username' AND
		password=SHA2('$password', 512);
");

$rs = $con->query($q);

if($con->errno > 0 || $rs->num_rows === 0)
	sendRedirect('./login.php', 'Utente inesistente o password errata!');

session_start();
$_SESSION['user'] = $rs->fetch_assoc();
unset($_SESSION['user']['password']);

$rs->free();
$con->close();
unset($rs, $con);

sendRedirect('./welcome.php');