<!-- file: login.php -->
<?php
session_start();
if(isset($_SESSION['user'])) {
	header('location: ./welcome.php');
	die;
}
?>
<html lang="it">
<head>
<title>log in</title>
<link rel="icon" type="image/png" href="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/60/joypixels/257/rocket_1f680.png" />
</head>
<body>
<?= (isset($_REQUEST['msg'])) ?  trim($_REQUEST['msg']) : '' ?>
<form method="post" action="signin.php">
<input required type="email" name="username" placeholder="(email)" /><br/>
<input required type="password" name="password" placeholder="(password)" /><br/>
<input type="submit" value="log in" />
<a href="register.php">registrati</a>
</form>
</body>
</html>