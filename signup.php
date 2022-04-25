<?php
// file: signup.php -- registrazione area riservata
include_once './config.inc.php';
$firstname	=	$con->real_escape_string(checkParam('firstname'));
$lastname	=	$con->real_escape_string(checkParam('lastname'));
$gender		=	$con->real_escape_string(checkParam('gender'));
$username	=	$con->real_escape_string(checkParam('username'));
$password	=	$con->real_escape_string(checkParam('password'));
$password2	=	$con->real_escape_string(checkParam('password2'));

if(
	$firstname	=== false ||	
	$lastname	=== false ||
	$gender		=== false || !in_array(strtolower($gender), ['m', 'f']) || 
	$username	=== false ||
	$password	=== false || $password2	=== false || $password	!== $password2
)	sendRedirect('./register.php', 'Dati errati');

$q = trim("
INSERT INTO {$TABNAME} (
	username, password,
	firstname, lastname, gender
) VALUES
	('$username', SHA2('$password', 512), '$firstname', '$lastname', '$gender');
");
try {
	$rs = $con->query($q);
} catch (Exception $e) {
	if($con->errno > 0 || $rs->affected_rows === 0)
		sendRedirect('./register.php', 'impossibile registrare utente');
}

$con->close();
unset($rs, $con);

sendRedirect('./login.php', "$username corretametne registrato");