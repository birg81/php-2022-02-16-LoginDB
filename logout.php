<?php
// file: logout.php
session_start();
if(isset($_SESSION['user'])){
	include_once './config.inc.php';
	$q = trim("
UPDATE {$TABNAME}
SET lastAccess=CURRENT_TIME
WHERE id={$_SESSION['user']['id']};
	");
	$con->query($q);
	$con->close;
	unset($con);
}
session_unset();
session_register_shutdown();
session_regenerate_id(true);
session_destroy();

header('location: ./');
die;