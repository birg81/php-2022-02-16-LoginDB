<?php
// file: welcome.php
session_start();
if(!isset($_SESSION['user'])) {
	header('location: ./logout.php');
	die;
}
?>
<html lang="it">
<meta charset="utf-8" />
<head>
<title>Welcome <?= $_SESSION['user']['username'] ?></title>
<link rel="icon" type="image/png" href="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/60/facebook/304/circus-tent_1f3aa.png" />

</head>
<body>
<h1>Benvenut<?= $_SESSION['user']['gender'] === 'f' ? 'a' : 'o' ?></h1>
<p><i><?= $_SESSION['user']['firstname'] ?> <?= $_SESSION['user']['lastname'] ?></i>
(<b><?= $_SESSION['user']['username'] ?></b>)</p>
<p><a href="./logout.php">log out</a></p>
</body>
</html>